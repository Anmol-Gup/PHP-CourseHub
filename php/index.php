<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseHub</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link rel="shortcut icon" href="../images/icons8-favicon.png" type="image/x-icon">
    <script src="../js/index.js"></script>
</head>

<body>
    <?php
    require 'header.php';
    // require 'footer.php';
    ?>
    <section>
        <div class="categories">
        </div>
        <div class="card_container">
        </div>
        <div class="toast" id="toast">
            <div class="toast-body">
                <p>Added to Cart</p>
            </div>
        </div>
        <br />
        <div class="top">
            <p><img width="40" height="40" src='../images/icons8-back-50.png' /></p>
        </div>
    </section>

    <?php require 'footer.php'; ?>
    <script>
        const back_to_top=document.querySelector('.top p');
        const top_div=document.querySelector('.top')

        window.addEventListener('scroll',()=>{
            if(window.pageYOffset>200)
            {
                top_div.classList.add('show_back_top');
            }
            else{
                top_div.classList.remove('show_back_top');
            }
        })

        back_to_top.addEventListener('click', () => {
            window.scroll(0, 0)
        })
    </script>
</body>

</html>