<?php
    include "../scripts/includes.php";

    session_start();
    // if  log in ung session ng student page babalik sa home page
    if(isset($_SESSION['studLogin'])){
        header("Location: home.php");
    }
    // if  log in ung session ng instructor page babalik sa dashboard page
    if(isset($_SESSION['instrLogin'])){
        header("Location: dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Orbit</title>
</head>
<body>
    <header class="header">
        <img src="../images/logo.png" alt="" class="logo">
        <div class="links">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
            <li class="login"><a id="vanlogin">Login</a></li>
        </div>  
    </header>
    <div id="modal"></div>
    <section class="contents" id="body-content">
        
    </section>

</body>
</html>