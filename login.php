<?php

  $connect = mysqli_connect('localhost', 'root', '', 'exsilio');

  $name = $email = $gender = $department = $session = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $gender = $_POST["gender"];
    $email = test_input($_POST["email"]);
    $department = test_input($_POST["department"]);
    $session = $_POST["session"];
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $countT = mysqli_num_rows(mysqli_query($connect, "SELECT id FROM technology")) + 1;
  $countB = mysqli_num_rows(mysqli_query($connect, "SELECT id FROM business")) + 1;
  $countE = mysqli_num_rows(mysqli_query($connect, "SELECT id FROM entertainment")) + 1;
  $countO = mysqli_num_rows(mysqli_query($connect, "SELECT id FROM oilandgas")) + 1;

  $check_mail = mysqli_query($connect, "SELECT email FROM technology WHERE `email` = '$email' UNION ALL SELECT email FROM business WHERE `email` = '$email' UNION ALL SELECT email FROM oilandgas WHERE `email` = '$email' UNION ALL SELECT email FROM entertainment WHERE `email` = '$email'");
    $hhh = mysqli_num_rows($check_mail)+1;
    if ($hhh > 1) {
      echo "<div style='text-align: center;'>
          <p style='font-size: 20px;'>Already registered for a Session</p>
          <img src='fail.png' style='align: center;' alt='success'>
          </div>";
          header("Refresh: 3;url = index.html"); /* Redirect browser */
          exit();
    }
    else {
      if ($session == "Technology") {
        if ($countT > 1000) {
          echo "<div style='text-align: center;'>
          <p style='font-size: 20px;'>Sorry, we have reached maximum no of registered attendees. Try checking other sessions</p>
          <img src='fail.png' style='align: center;' alt='success'>
          </div>";
          header("Refresh: 3;url = index.html"); /* Redirect browser */
          exit();
        } 
        else {
          $sqlT = "insert into technology (name, gender, email, department) values ('$name', '$gender', '$email', '$department')";
          $queryT = mysqli_query($connect, $sqlT);
          if($queryT) {
            echo "<div style='text-align: center;'>
            <p style='font-size: 20px;'>Successfully registered, Redirecting</p>
            <img src='success.png' style='align: center;' alt='success'>
            </div>";
            header("Refresh: 3;url = index.html"); /* Redirect browser */
            exit();
          }
          else {
            echo "<div style='text-align: center;'>
            <p style='font-size: 20px;'>Could not register, try again! Redirecting</p>
            <img src='fail.png' style='align: center;' alt='success'>
            </div>";
            header("Refresh: 3;url = index.html"); /* Redirect browser */
            exit();
          }
        }
      } 
      elseif ($session == "Business") {
        if ($countB > 1000) {
          echo "<div style='text-align: center;'>
          <p style='font-size: 20px;'>Sorry, we have reached maximum no of registered attendees. Try checking other sessions</p>
          <img src='fail.png' style='align: center;' alt='success'>
          </div>";
          header("Refresh: 3;url = index.html"); /* Redirect browser */
          exit();
        } 
        else {
          $sqlB = "insert into business (name, gender, email, department) values ('$name', '$gender', '$email', '$department')";
          $queryB = mysqli_query($connect, $sqlB);
          if($queryB) {
            echo "<div style='text-align: center;'>
            <p style='font-size: 20px;'>Successfully registered, Redirecting</p>
            <img src='success.png' style='align: center;' alt='success'>
            </div>";
            header("Refresh: 3;url = index.html"); /* Redirect browser */
            exit();
          }
          else {
            echo "<div style='text-align: center;'>
            <p style='font-size: 20px;'>Could not register, try again! Redirecting</p>
            <img src='fail.png' style='align: center;' alt='success'>
            </div>";
            header("Refresh: 3;url = index.html"); /* Redirect browser */
            exit();
          }
        }
      } 
      elseif ($session == "Entertainment") {
        if ($countE > 1000) {
          echo "<div style='text-align: center;'>
          <p style='font-size: 20px;'>Sorry, we have reached maximum no of registered attendees. Try checking other sessions</p>
          <img src='fail.png' style='align: center;' alt='success'>
          </div>";
          header("Refresh: 3;url = index.html"); /* Redirect browser */
          exit();
        } 
        else {
          $sqlE = "insert into entertainment (name, gender, email, department) values ('$name', '$gender', '$email', '$department')";
          $queryE = mysqli_query($connect, $sqlE);
          if($queryE) {
            echo "<div style='text-align: center;'>
            <p style='font-size: 20px;'>Successfully registered, Redirecting</p>
            <img src='success.png' style='align: center;' alt='success'>
            </div>";
            header("Refresh: 3;url = index.html"); /* Redirect browser */
            exit();
          }
          else {
            echo "<div style='text-align: center;'>
            <p style='font-size: 20px;'>Could not register, try again! Redirecting</p>
            <img src='fail.png' style='align: center;' alt='success'>
            </div>";
            header("Refresh: 3;url = index.html"); /* Redirect browser */
            exit();
          }
        }
      } 
      else {
        if ($countO > 1000) {
          echo "<div style='text-align: center;'>
          <p style='font-size: 20px;'>Sorry, we have reached maximum no of registered attendees. Try checking other sessions</p>
          <img src='fail.png' style='align: center;' alt='success'>
          </div>";
          header("Refresh: 3;url = index.html"); /* Redirect browser */
          exit();
        } else {
          $sqlO = "insert into oilandgas (name, gender, email, department) values ('$name', '$gender', '$email', '$department')";
          $queryO = mysqli_query($connect, $sqlO);
          if($queryO) {
            echo "<div style='text-align: center;'>
            <p style='font-size: 20px;'>Successfully registered, Redirecting</p>
            <img src='success.png' style='align: center;' alt='success'>
            </div>";
            header("Refresh: 3;url = index.html"); /* Redirect browser */
            exit();
          }
          else {
            echo "<div style='text-align: center;'>
            <p style='font-size: 20px;'>Could not register, try again! Redirecting</p>
            <img src='fail.png' style='align: center;' alt='success'>
            </div>";
            header("Refresh: 3;url = index.html"); /* Redirect browser */
            exit();
          }
        }
      }
    }

?>