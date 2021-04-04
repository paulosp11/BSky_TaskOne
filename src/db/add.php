<?php

function addDb($id, $age)
{   
     require 'connection.php';
     $queryBuilder = $dbh->createQueryBuilder();   
   
   
     $queryBuilder
    ->update('persons', 'p')
    ->set('p.age', '?')
    ->where('p.id = ?')
    ->setParameter(0, $age)
    ->setParameter(1, $id)
    ; 
    
    $statement = $queryBuilder->execute();  

}
?>