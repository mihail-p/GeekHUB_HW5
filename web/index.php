<?php

require __DIR__ . '/../config/autoload.php';

echo "Hi ALL__!";

print_r('<br /> show databases:<br />');

$user='root'; $pass='gfhjkmlkzsql';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    foreach($dbh->query('show databases') as $row) {

        print_r($row);
        echo('<br />');
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

