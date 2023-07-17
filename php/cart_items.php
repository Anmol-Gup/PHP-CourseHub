<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../images/icons8-favicon.png" type="image/x-icon">
    <script src="../js/index.js"></script>
</head>

<body>
    <?php
    require 'header.php';
    require 'cart.php';

    $cart = new Cart();
    $result = $cart->ShowCart();

    if (!isset($result)) {
        echo '<section><div class="no_data">
        <img src="../images/empty-box.png" alt="no data"/>
        <h2>Cart is Empty</h2>
        </div></section>';
    } else {
        $connection = connect_db();
        echo '<section>';
        echo "
            <div class='cart_items responsive-table'>
                <table>
                    <thead>
                        <th>Course Name</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </thead>";

        $_SESSION['total_price'] = 0;
        foreach ($result as $value) {
            $selectquery = "SELECT * FROM courses WHERE course_id=$value";
            $result = $connection->query($selectquery);
            $row = $result->fetch_assoc();
            $_SESSION['total_price'] += (intval($row['price']));
            echo '<tr id=' . $row['course_id'] . '>
                    <td>' . $row['course_name'] . '</td>
                    <td>' . floatval($row['price']) . '</td>
                    <td>
                    <button><i class="material-icons" style="color:red;" onclick="delete_course(' . intval($row["course_id"]) . ',' . floatval($row["price"]) . ')">delete</i></button>
                    </td>
                </tr>';
        }
        echo "</table>
        </div>
        <div class='checkout'>";
        if (isset($_SESSION['total_price'])) {
            echo '<h3>Total Price</h3>';
            echo '<h2>' . $_SESSION['total_price'] . '</h2>';
        }
        $cart = json_encode($_SESSION['cart']);
        echo "<button id='rzp-button1' class='course_id' onclick='checkout($cart)'>CheckOut</button>";
        echo "</div>";
        echo "</section>";
        require 'footer.php';
    }
    ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        const delete_course = (id, price) => {

            const request = new XMLHttpRequest();
            request.open('POST', 'cart.php');
            request.setRequestHeader('Content-Type', 'application/json')
            request.send(JSON.stringify({
                id,
                price,
                function: "DeleteCourse"
            }))

            request.onload = () => {
                console.log(request.responseText)
            }

            const h2 = document.querySelector('h2');
            id = parseInt(id)
            price = parseFloat(price)
            h2.innerText = parseFloat(h2.innerText) - price;
            document.getElementById(id).remove();
        }

        let order_id = 0;
        const checkout = async (cart) => {
            amount = parseFloat(document.querySelector('.checkout h2').innerHTML);
            order_id = insert_order(amount, "<?php echo $_SESSION['customer_name']; ?>", 0)

            const options = {
                "key": "rzp_test_dubYbWRGwUD3yZ", // Enter the Key ID generated from the Dashboard
                "amount": amount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "CourseHub",
                "description": "Learn Courses & Upgrade your skills.",
                "image": "../images/icons8-favicon.png",
                //"id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function(response) {
                    update_order(order_id, response.razorpay_payment_id)
                    window.location.href='success.php';
                },
                "prefill": {
                    "name": "<?php echo $_SESSION['customer_name']; ?>",
                    "email": "<?php echo $_SESSION['email']; ?>",
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            const rzp1 = new Razorpay(options);
            rzp1.open();

        }
        const insert_order = (amount, customer_name, status, payment_id) => {
            const request = new XMLHttpRequest();
            request.open('POST', 'cart.php')
            request.setRequestHeader('Content-Type', 'application/json')
            request.send(JSON.stringify({
                amount,
                customer_name,
                status,
                payment_id,
                function: "CheckOut"
            }));

            request.onload = () => {
                order_id = request.responseText
            }
        }

        const update_order = (order_id, payment_id) => {
            const request = new XMLHttpRequest()
            request.open('POST', 'cart.php');
            request.setRequestHeader('Content-Type', 'application/json')
            request.send(JSON.stringify({
                order_id,
                payment_id,
                function: "UpdateOrder"
            }))

            request.onload = () => {
                console.log(request.responseText)
            }
        }
    </script>
</body>

</html>