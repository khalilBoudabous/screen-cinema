<?php

include 'C:\xampp\htdocs\ff\controller\inscriptionC.php';
include 'C:\xampp\htdocs\ff\model\inscription.php';
$error = "";


$sign_up = null;

$sign_upC = new  sign_upC();


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
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $sign_up = new  sign_up(
            null,
            $_POST['email'],
            $_POST['Birthdate'],
            $_POST['Username'],
            $_POST['Password']
        );
        var_dump($sign_up);
        
        $sign_upC->updatesign_up($sign_up,$_POST['id']);
        header('Location:listsign-up.php');
    } else
        $error = "Missing information";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  <link rel="stylesheet" href="\ff\Css\style2.css">
</head>
<body>
<audio autoplay loop>
    <source src="\ff\image_music\music.mp3" type="audio/mp3">
    
</audio>
<div id="error">
        <?php echo $error; ?>
    </div>
<?php
    if (isset($_POST['id'])) {
        $sign_up = $sign_upC->showsign_up($_POST['id']);
    }  
    ?>
    <section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="#">home</a></li>
            <li><a href="\ff\about\about.html">About</a></li>
            <li><a href="#">Buy a ticket</a></li>
            <li><a href="#">offre</a></li>
            <li><a href="#">event</a></li>
            </ul>
            <a id="colorToggleBtn"class="action_btn"><span class="icon"><ion-icon name="contrast-outline"></ion-icon></span></a>
            <a href="\ff\login page\login.php" class="action_btn">login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>



    </section>
    <section id="sing-up">
    <div class="sing-up-box"> 
        <form  id="myForm" action="" method = "post" >
            <h2>sign-up</h2>
            <div class="input2-box">
            <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
            <input type="text" name="id" id="id"  value="<?php echo $_POST['id'] ?>" readonly  />
            <label >id</label>
        </div>
            <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
            <input type="email" name="email" id="email" value="<?php echo $sign_up['email'] ?>">
            <label >email</label>
        </div>
        <div class="input2-box">
            <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
            <input type="date" name="Birthdate" id="Birthdate" value="<?php echo $sign_up['Birthdate'] ?>"  >
            <label >Birthdate</label>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
            <input type="text" name="Username" id="Username" value="<?php echo $sign_up['Username'] ?>">
            <label >Username</label>
        </div>


        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input  type="password" name="Password" id="Password" value="<?php echo $sign_up['Password'] ?>">
            <label >password</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password"  id="confirmPassword">
            <label >Confirm Password</label>
        </div>
        
        <button type="submit" class="btn btn-success" name="submit">Save</button>
       
               
        <p>you  have an account???  <a href="C:\Users\khllb\Desktop\New folder (2)\login\login.html">login</a><span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></p>
         
        </div>
    
    </form>
</div>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>
</body>
</html>


             









