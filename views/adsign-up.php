<?php
include 'C:\xampp\htdocs\ff\controller\inscriptionC.php';
include 'C:\xampp\htdocs\ff\model\inscription.php';
$error = "";
$sign_up = null;

$sign_upC = new sign_upC();
$pdo = Config::getConnexion(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];


    $queryCheckEmail = $pdo->prepare("SELECT * FROM signup WHERE email = ?");
    $queryCheckEmail->execute([$email]);
    $resultCheckEmail = $queryCheckEmail->rowCount();

    if ($resultCheckEmail > 0) {
        $error = "<span class='text-danger'>L'adresse e-mail existe déjà. Veuillez en choisir une autre.</span>";
    } else {
        
        if (
            isset($_POST["email"]) &&
            isset($_POST["Birthdate"]) &&
            isset($_POST["Username"]) &&
            isset($_POST["Password"])
        ) {
            if (
                !empty($_POST['email']) &&
                !empty($_POST["Birthdate"]) &&
                !empty($_POST["Username"]) &&
                !empty($_POST["Password"])
            ) {
                $sign_up = new sign_up(
                    null,
                    $_POST['email'],
                    $_POST['Birthdate'],
                    $_POST['Username'],
                    $_POST['Password']
                );
                $sign_upC->addsign_up($sign_up);
                header('Location:listsign-up.php');
            } else {
                $error = "Missing information";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  <link rel="stylesheet" href="\ff\style2.css">
</head>
<body>
    <section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="#">home</a></li>
            <li><a href="\ff\about\about.html">About</a></li>
            <li><a href="#">Program Today</a></li>
            <li><a href="#">Buy a ticket</a></li>
            <li><a href="#">offre</a></li>
            <li><a href="#">event</a></li>
            </ul>
            <a id="colorToggleBtn"class="action_btn"><span class="icon"><ion-icon name="contrast-outline"></ion-icon></span></a>
            <a href="\ff\login page\login.php" class="action_btn">login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>

            
    </section>
    <audio autoplay loop>
    <source src="\ff\music.mp3" type="audio/mp3">
    
</audio>
    <section id="sing-up">
    <div class="sing-up-box">
        <form  id="myForm" action="" method = "post" >
            <h2>sign-up</h2>
            <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
            <input type="email" name="email" id="email">
            <label >email</label>
        </div>
        <div class="input2-box">
            <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
            <input type="date" name="Birthdate" id="Birthdate" >
            <label >Birthdate</label>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
            <input type="text" name="Username" id="Username">
            <label >Username</label>
        </div>


        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input  type="password" name="Password" id="Password">
            <label >password</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password"  id="confirmPassword">
            <label >Confirm Password</label>
        </div>

        
        <div class="error-message">
    <?php echo $error; ?>
</div>
        <button type="submit" class="btn_btn_success" name="submit" onclick="validateForm()" >Save</button>

       
               
        <p>you  have an account???  <a href="\ff\login page\login.html">login</a><span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></p>
         
        </div>
    
    </form>
</div>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\script.js" > </script>
<script src="\ff\colorchange.js"></script>
</body>
</html>