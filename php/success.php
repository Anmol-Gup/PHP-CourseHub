<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icons8-favicon.png" type="image/x-icon">
    <title>Payment Success</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Geologica:wght@300&family=Open+Sans:wght@500&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Geologica', sans-serif;
            font-family: 'Open Sans', sans-serif;
            text-decoration: none;
            list-style-type: none;
        }
        body{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to bottom right, #E3F0FF, #FAFCFF);
        }
        .container{
            width: 18rem;
            display: flex;
            flex-direction: column;
            padding: 1rem;
            background-color: #fff;
            text-align: center;
            box-shadow: 0px 25px 40px #1687d933;
        }
        img{
            width: 100%;
        }
        .container a{
            color: blue;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src='../images/icons8-success.svg' alt='success'/>
        <h2>Payment Succeeded!</h2>
        <a href="index.php">Back To Home</a>
    </div>
</body>

</html>