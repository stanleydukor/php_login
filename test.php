<?php 
    $connect = mysqli_connect('localhost', 'root', '', 'exsilio');

    $name = $email = $gender = $department = $session = "";
    
    $check_mail = mysqli_query($connect, "SELECT email FROM technology UNION ALL SELECT email FROM business UNION ALL SELECT email FROM oilandgas UNION ALL SELECT email FROM entertainment WHERE `email` = 'stanleydukor@gmail.com'");
    $hhh = mysqli_num_rows($check_mail);
    if ($hhh > 1)
        echo "already exists";
    else
        echo "does not exists";
?>