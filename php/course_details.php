<?php
$id = $_GET['id'];

if (isset($id)) {
    require 'connection.php';

    $connction = connect_db();
    $selectquery = "SELECT * FROM courses WHERE course_id=$id";
    $result = $connction->query($selectquery);
    $row = $result->fetch_array();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../css/course_details.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../images/icons8-favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>

    <body>
        <?php require 'header.php'; ?>
        <section>
            <div class="course_container">
                <div class="description">
                    <h2>Description</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt beatae id qui quibusdam tempore excepturi! Ex eius veritatis alias, dolorem labore sapiente atque quaerat culpa eos eum. Ipsam neque officia blanditiis libero inventore velit laudantium debitis tempore explicabo voluptatum illum et necessitatibus in, corrupti quo hic? Tempora asperiores, eos, et, cum inventore eum laborum alias numquam consectetur quasi pariatur minima aperiam repudiandae minus non esse quo fugit vel possimus doloremque beatae? Similique ut officia accusantium sint id. Optio velit voluptas blanditiis quibusdam repudiandae iure ullam beatae, placeat odio, voluptate cumque ipsam sed! Aspernatur, rem rerum. Sapiente suscipit iste nihil exercitationem.</p>
                </div>
                <div class="card_container">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/<?php echo $row[6] ?>" alt="<?php echo $row[1] ?>" alt=<?php echo $row[1] ?> />
                        <div class="content">
                            <h3><?php echo $row[1] ?></h3>
                            <span><?php echo $row[2] ?></span>
                            <span class="fa fa-star checked"></span>
                            <div class="price_duration">
                                <p style="font-weight: bold;">Price: &#8377;<?php echo $row[3] ?></p>
                                <p><i class="fa fa-clock-o"></i> <?php echo $row[4] ?></p>
                            </div>
                            <button class='course_id' id="${value[0]}" onclick='add_cart(this.id)'>Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require 'footer.php' ?>
    </body>

    </html>
<?php
} else {
    header('location:index.php');
}
?>