<?php

require __DIR__ . '/src/db/insert.php';
  
$name  = readline('Enter a Name: ');
$email = readline('Enter a Email: ');
$phone = readline('Enter a Phone: ');

insertDB($name, $email, $phone);
    
?>