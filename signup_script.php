<?php
    session_start();

    if(isset($_POST['email']))
    {

      $servername = "192.168.55.106";
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

      $name=$_POST['Name'];
      $email=$_POST['email'];
      $password=$_POST['pwd'];
      echo $email."--".$name."--".$password;
      $sql = "SELECT email FROM stu_details";
      $result = mysqli_query($conn, $sql);
      $count=0;
      if (mysqli_num_rows($result) > 0) 
      {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
        {
          if($row['email']==$email)
          { 
            $count++;
          }
        }
        if($count>0)
        {
          echo 'already user exists';
        }
        else
        {
          $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";

          if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            $_SESSION['email']=$email;

            header('location:Success.php');
          } 
          else 
          {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
      } 
      else 
      {
        $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";

          if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            $_SESSION['email']=$email;
            header('location:Success.php');
          } 
          else 
          {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
      }
      mysqli_close($conn);
    }
    else
    {
      echo 'email not entered';
    }
?>