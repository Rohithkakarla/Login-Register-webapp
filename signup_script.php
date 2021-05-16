<?php
    session_start();

    if(isset($_POST['email']))
    {

      include 'common.php';

      $name=$_POST['Name'];
      $email=$_POST['email'];
      $password=$_POST['pwd'];

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