<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';


?>
<!DOCTYPE html>
<html>

<head>


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- Main File css   -->
    <link rel="stylesheet" href="\ff\Css\chaymatemplate.css" />
  
    <!-- MultiSelect Function -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="offre-body">
    <header>
        <nav>
        <section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            li><a href="template.php">home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="Testing.php">Buy a ticket</a></li>
                <li><a href="frontoffres.php">offre</a></li>
                <li><a href="#">event</a></li>
           
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="\ff\login page\login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>
            </section>
        </nav>
    </header>


    <div class="section-offre">
        <h2>OFFRES</h2>
        <div class="list-offre-cards">

            <div class="card-offre">
                <div class="card-offre-body">
                    <div class="image-offre-container">
                        <img src="\ff\image_music\3dglasses.jpg" style="width: 100%;height: 100%;" />
                    </div>
                    <span>offre</span>
                    <span></span>
                </div>
            </div>
            <div class="card-offre">
                <div class="card-offre-body">
                    <div class="image-offre-container">
                        <img src="\ff\image_music\image123.jpeg" style="width: 100%;height: 100%;" />
                    </div>
                    <span>Offre Septembre</span>
                </div>
            </div>
            <div class="card-offre">
                <div class="card-offre-body">
                    <div class="image-offre-container">
                        <img src="\ff\image_music\download.png" style="width: 100%;height: 100%;" />
                        <span> Offre</span>
                    </div>


                </div>
            </div>
            <div class="card-offre">
                <div class="card-offre-body">
                    <div class="image-offre-container">
                        <img src="\ff\image_music\download1.png" style="width: 100%;height: 100%;" />
                    </div>
                    <span>offre</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="\ff\js\colorchange.js"></script>
</body>

</html>