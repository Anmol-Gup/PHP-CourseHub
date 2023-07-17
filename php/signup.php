<?php

    require 'customer.php';

    if ($_SERVER['REQUEST_METHOD']==='POST' and isset($_POST['submit'])) {
        $name=htmlspecialchars(stripslashes(trim($_POST['name'])));
        $email=htmlspecialchars(stripslashes(trim($_POST['email'])));
        $password=htmlspecialchars(stripslashes(trim($_POST['password'])));

        if(empty($name) or empty($email) or empty($password)){
            echo '<script>alert("Field Required")</script>';
        }
        else{
            $customer=new Customer();
            if($customer->signup($name,$email,$password)){
                echo '<script>alert("Successfully Registered!")</script>';
                echo '<script>window.location.href="login.php"</script>';
            }
            else{
                echo '<script>alert("Oops! Unable to Register")</script>';
                echo '<script>window.location.href="signup.php"</script>';
            }
        }
    }
?>
<?php
    // session_start();
    if(isset($_SESSION['Isloggedin']))
    {
        header('location:index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                <h2>SignUp Form</h2>
            </div>
            <br />
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="inputs">
                    <input type="text" name="name" placeholder="Name" pattern="^[A-Za-z ]{2,100}$" title="Name must start with a letter and contain only letters and blank spaces, with a minimum length of 2 and maximum length of 100 characters." required /><br />
                    <input type="email" name="email" placeholder="Email Address" required pattern="^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$" title="Invalid Email Address"/><br />
                    <input type="password" name="password" placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                    <i class="far fa-eye" id="togglePassword_signup"></i>
                    <br /> 
                    <input type="submit" name='submit' value="SignUp" /><br />
                </div>
            </form>
            <div class="signup_form">
                <a href="login.php">Login Now</a>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
    <script>
        const togglePassword=document.getElementById('togglePassword_signup');
        const input=document.querySelector('input[type=password]')
        
        togglePassword.addEventListener('click',()=>{
            (input.getAttribute('type')==='password')? input.setAttribute('type','text'):input.setAttribute('type','password') 
        });
    </script>
</body>

</html>