<?php
session_start();

class Config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=projphp',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

$pdo = Config::getConnexion();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['Password'];

    $query = $pdo->prepare("SELECT * FROM signup WHERE email = ?");
    $query->execute([$email]);

    $result = $query->rowCount();

    if ($result == 0) {
        $error = "<span class='text-danger'>L'adresse e-mail n'existe pas. Veuillez en choisir une autre.</span>";
    } else {
        $user = $query->fetch();

        if ($password === $user['Password']) {
            $_SESSION['Username'] = $user['Username']; 
            if ($email == "admin@gmail.com") {
                header("Location: listsign-up.php");
            } else {
                header("Location: about.php");
            }
            exit();
        } else {
            $error = "<span class='text-danger'>Mot de passe incorrect. Veuillez réessayer.</span>";
        }
        
        if ($email == "admin@gmail.com") {
            header("Location: /ff/about/listsign-up.php");
            exit();
        } else {
            header("Location: template.php");
            exit();
        }
        
    }
}

function customHashFunction($password)
{
    return md5($password);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="\ff\Css\style.css">
</head>

<body>

<section id="navbar-box">
    <div class="navbar">
        <div class="logo"><a href="#">DREAM SCREEN</a></div>
        <ul class="links">
            <li><a href="template.php">home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="#">Buy a ticket</a></li>
            <li><a href="frontoffres.php">offre</a></li>
            <li><a href="#">event</a></li>
        </ul>
        
        <a id="colorToggleBtn" class="action_btn"><span class="icon"><ion-icon name="contrast-outline"></ion-icon></span></a>
        <a href="adsign-up.php" class="action_btn">sign_up <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
    </div>
</section>
<audio autoplay loop>
    <source src="\ff\music.mp3" type="audio/mp3">
    
</audio>
<section id="login">
    <div class="login-box">
        <form action="" method="post">
            <h2>login</h2>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                <input type="email" name="email" required>
                <label >email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="Password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit"> login</button>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
            <div class="sing-up">
                 :Forgot Password?<a href="email.html">Cliquez ici</a>
                <p>dont have an account???  <a href="adsign-up.php">sing up</a><span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></p>
            </div>
        </form>
    </div>
</section>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="script.js"></script>
<script src="\ff\colorchange.js"></script>

</body>

</html>
