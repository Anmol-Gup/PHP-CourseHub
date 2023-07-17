<?php
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<header>
    <nav>
        <h1><img src="../images/icons8-favicon.png" alt="favicon" /><a href="index.php">CourseHub</a></h1>
        <div class="menu_bar">
            <ul class="menu">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="#">Contact Us</a>
                </li>
                <?php
                // session_start();
                if (isset($_SESSION['Isloggedin'])) {
                    echo '<a href="logout.php">Logout</a>';
                } else { ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="signup.php">Signup</a>
                    </li>
                    <?php
                }
                ?>
                <li>
                    <a href="cart_items.php"><i class="fa fa-shopping-cart" style="font-size:2rem"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>