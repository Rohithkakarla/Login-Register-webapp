<?php
    $servername = "192.168.55.107";
    $username = "rohith";
    $password = "8538";
    $DBname="student";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$DBname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    
    $email=$conn->real_escape_string($_POST['email']);
    $password=$conn->real_escape_string($_POST['pwd']);

    $sql = "SELECT id,email FROM stu_details";
    $result = $conn->query($sql);

    $sql = "SELECT * FROM stu_details WHERE email='$email' and password='password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        header('location:Success.php');
    } 
    else 
    {
      echo "No User Exists.";
    }
    mysqli_close($conn);
?>