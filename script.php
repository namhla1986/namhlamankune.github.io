<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    //Database connection
    $conn = new mysqli('localhost', 'root','','duncans');
    if($conn->connect_error){
        die('Connection Failed : '. $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into messages(name, email, message) values(?, ?, ?)");
        $stmt->bind_param("sss", $customerName, $customerEmail, $customerMessage);
        $stmt->execute();
        echo("Message sent successfully..");
        $stmt->close();
        $conn->close();
    }

    header('Location: form-success.html');
		exit();
?>
