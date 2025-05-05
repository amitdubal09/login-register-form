<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:/login_register/index.php");
} else {

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class="main">

            <div class="navbar">
                <p>ZERO MATRIX</p>
            </div>
            <div class="menu">
                <img style="width:30px;" src="http://localhost/login_register/adminimg/list.png">

                <img style="margin-left:50px;" src="http://localhost/login_register/adminimg/magnifying-glass.png">

                <input type="search" name="searchbar" placeholder="Search Dashboard . . ." required>

                <img style="width:30px;" src="http://localhost/login_register/adminimg/expand.png">

                <img style="width:30px;" src="http://localhost/login_register/adminimg/email.png">

                <img style="width:30px;" src="http://localhost/login_register/adminimg/notification.png">

                <button name="logout">LogOut</button>
                
            </div>

        </div>



        <ul>
            <li class="list-head">DASHBOARD</li>
            <li>Dashboard</li>
            <li>layouts</li>
            <li class="list-head">ECCOMERCE</li>
            <li>ECOMMERCE</li>
            <li>Email</li>
            <li class="list-head">Apps</li>
            <li>Charts</li>
            <li class="list-head">UI COMPONENTS</li>
            <li>UI</li>
            <li>Components</li>
            <li>Widgets</li>
            <li class="list-head">FORMS</li>
            <li>Forms</li>
            <li class="list-head">TABLE</li>
            <li>Table</li>
            <li>Pages</li>
        </ul>
    </body>

    </html>
    <?php
}
?>