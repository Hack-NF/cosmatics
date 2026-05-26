<?php

// 1. CREATE DATABASE
$conn = new mysqli("localhost","root","");

if($conn->connect_error){
    die("Connection Failed");
}

$sql = "CREATE DATABASE IF NOT EXISTS cosmeticdb";
$conn->query($sql);

// 2. SELECT DATABASE
$conn->select_db("cosmeticdb");

// 3. CREATE TABLE
$sql = "CREATE TABLE IF NOT EXISTS orders (

id INT AUTO_INCREMENT PRIMARY KEY,

name VARCHAR(50),
email VARCHAR(50),
phone VARCHAR(20),

product VARCHAR(100),
quantity INT,

address TEXT,
city VARCHAR(50),
country VARCHAR(50),

payment VARCHAR(50),

form_type VARCHAR(50),
order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP

)";
$conn->query($sql);

// 4. GET FORM DATA
$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];

$product  = $_POST['product'];
$quantity = $_POST['quantity'];

$address  = $_POST['address'];
$city     = $_POST['city'];
$country  = $_POST['country'] ?? '';
$payment  = $_POST['payment'];

$form_type = $_POST['form_type'];

// 5. INSERT DATA
$sql = "INSERT INTO orders
(name,email,phone,product,quantity,address,city,country,payment,form_type)
VALUES
('$name','$email','$phone','$product','$quantity','$address','$city','$country','$payment','$form_type')";

if($conn->query($sql) === TRUE){
    echo "Order Placed Successfully ✔️";
} else {
    echo "Error ❌";
}

$conn->close();
?>