<?php

function insertDb($name, $email, $phone)
{
   
    require 'connection.php';
    $queryBuilder = $dbh->createQueryBuilder();

    $queryBuilder
    ->insert('persons')
    ->setValue('name', '?')
    ->setValue('email', '?')
    ->setValue('phone', '?')
    ->setParameter(0, $name)
    ->setParameter(1, $email)
    ->setParameter(2, $phone)
    ;
    
    $statement = $queryBuilder->execute();    
}
?>