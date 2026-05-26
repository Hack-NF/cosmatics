<?php

// 1. CREATE DATABASE
$conn = new mysqli("localhost","root","");

if($conn->connect_error){
    die("Connection Failed");
}

$sql = "CREATE DATABASE IF NOT EXISTS contactdb";
$conn->query($sql);

// 2. SELECT DATABASE
$conn->select_db("contactdb");

// 3. CREATE TABLE
$sql = "CREATE TABLE IF NOT EXISTS contacts (

id           INT AUTO_INCREMENT PRIMARY KEY,
name         VARCHAR(50),
email        VARCHAR(50),
subject      VARCHAR(100),
message      TEXT,
form_type    VARCHAR(50),
contact_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP

)";
$conn->query($sql);

// 4. GET FORM DATA
$name      = $_POST['name'];
$email     = $_POST['email'];
$subject   = $_POST['subject']  ?? '';
$message   = $_POST['message']  ?? '';
$form_type = $_POST['form_type'];

// 5. INSERT DATA
$sql = "INSERT INTO contacts
(name,email,subject,message,form_type)
VALUES
('$name','$email','$subject','$message','$form_type')";

if($conn->query($sql) === TRUE){
    echo "Message Sent Successfully ✔️";
} else {
    echo "Error ❌";
}

$conn->close();
?>