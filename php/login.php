<?php
    // session_start();
    if(isset($_SESSION['Isloggedin']))
    {
        header('location:index.php');
        exit;
    }
?>
<?php

    require 'customer.php';

    if ($_SERVER['REQUEST_METHOD']==='POST' and isset($_POST['submit'])) {

        $email=htmlspecialchars(stripslashes(trim($_POST['email'])));
        $password=htmlspecialchars(stripslashes(trim($_POST['password'])));

        if(empty($email) or empty($password)){
            echo '<script>alert("Field Required")</script>';
        }
        else{

            $customer=new Customer();
            $result=$customer->login($email,$password);
            if($result){

                if(isset($_POST['rememberme'])){
                    setcookie('emailcookie',$email,time()+86400); // 1 day
                    setcookie('passwordcookie',$password,time()+86400); // 1 day 
                }
                
                echo '<script>alert("Successfully Loggedin!")</script>';
                echo '<script>window.location.href="index.php"</script>';
            }
            else{
                echo '<script>alert("Inavlid Credentials")</script>';
                echo '<script>window.location.href="login.php"</script>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/icons8-favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container">
        <div class="signup">
            <div class="heading">
                <h2>Login Form</h2>
            </div>
            <br />
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="inputs">
                    <input type="email" name="email" placeholder="Email Address" value="<?php if(isset($_COOKIE['emailcookie'])) echo $_COOKIE['emailcookie']  ?>" pattern="^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$" title="Invalid Email Address" required /><br />
                    <input type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['passwordcookie'])) echo $_COOKIE['passwordcookie'] ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required /><br />
                    <i class="far fa-eye" id="togglePassword"></i>
                    <div class="check">
                        <input type="checkbox" name='rememberme' id='rememberme' />
                        <label for="rememberme">&nbsp;Remember Me</label>
                    </div>
                    <br/>
                    <input type="submit" name='submit' value="Login"/><br/>
                </div>
            </form>
            <div class="login_form">
                <a href="signup.php">SignUp Now</a>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
    <script>
        const togglePassword=document.getElementById('togglePassword');
        const input=document.querySelector('input[type=password]')
        
        togglePassword.addEventListener('click',()=>{
            (input.getAttribute('type')==='password')? input.setAttribute('type','text'):input.setAttribute('type','password') 
        });
    </script>
</body>

</html>