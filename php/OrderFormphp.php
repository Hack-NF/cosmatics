```php
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $conn = new mysqli("localhost","root","","");

    if($conn->connect_error){
        die("Connection Failed");
    }

    // CREATE DATABASE
    $sql = "CREATE DATABASE IF NOT EXISTS glowifydb";
    $conn->query($sql);

    // SELECT DATABASE
    $conn->select_db("glowifydb");

    // CREATE TABLE
    $table = "CREATE TABLE IF NOT EXISTS orders(

        id INT AUTO_INCREMENT PRIMARY KEY,

        name VARCHAR(50),
        email VARCHAR(50),
        phone VARCHAR(20),

        product VARCHAR(100),
        quantity INT,

        address TEXT,
        city VARCHAR(50),

        payment VARCHAR(50),

        form_type VARCHAR(50),

        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $conn->query($table);

    // GET FORM DATA
    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];

    $product   = $_POST['product'];
    $quantity  = $_POST['quantity'];

    $address   = $_POST['address'];
    $city      = $_POST['city'];

    $payment   = $_POST['payment'];

    $form_type = $_POST['form_type'];

    // INSERT DATA
    $insert = "INSERT INTO orders
    (name,email,phone,product,quantity,address,city,payment,form_type)

    VALUES

    ('$name','$email','$phone','$product','$quantity','$address','$city','$payment','$form_type')";

    if($conn->query($insert) === TRUE){

        echo "<h2 style='color:green; text-align:center; margin-top:50px;'>
        Order Placed Successfully ✔️
        </h2>";

    } else {

        echo "<h2 style='color:red; text-align:center; margin-top:50px;'>
        Error ❌
        </h2>";
    }

    $conn->close();
}
?>
```
