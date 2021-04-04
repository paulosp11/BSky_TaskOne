<?php

function listDb() {  

     require 'connection.php';
     $queryBuilder = $dbh->createQueryBuilder();
    
     $statement = $queryBuilder 
     ->select('id as ID, name as Name, email as Email, 
                         phone as Phone, age as Age')
     ->from('persons')
     ->groupBy('id, name')
    
     ->execute();   
     print_r($statement->fetchAllAssociative());     
}
?>