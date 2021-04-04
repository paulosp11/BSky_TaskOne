<?php
require_once __DIR__ . '/vendor/autoload.php';


$config = new \Doctrine\DBAL\Configuration();

$connectionParams = array(
	'dbname' => 'mydb_php',
	'user' => 'root',
	'password' => '',
	'host' => 'localhost',
	'driver' => 'pdo_mysql',
);

$dbh = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
/* 
$queryBuilder = $dbh->createQueryBuilder();

$queryBuilder
->insert('persons')
->setValue('name', '?')
->setValue('email', '?')
->setValue('phone', '?')
->setParameter(0, 'Paulo')
->setParameter(1, '@')
->setParameter(2, 2345)
;

$statement = $queryBuilder->execute(); */

