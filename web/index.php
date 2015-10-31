<?php

require __DIR__ . '/../config/autoload.php';

use Layer\Connector\ConnectBase;
use Layer\Manager\CrTables;
echo "Hi ALL__!";

//print_r('<br /> show databases:<br />');

$user=$config['db_user']; $pass=$config['db_password'];

$dsn='mysql:host='.$config['host'].';dbname='.$config['db_name'];
//try {
//echo$dsn;
    //$dbh = new PDO($dsn, $user, $pass);
    $dbh = new ConnectBase();
    $stmt = $dbh->connect($dsn,$user, $pass);
    $stmt = $dbh->getPdo();
//echo"1 ok ";
    $word = new CrTables($stmt);
    $word->crEngword();
    $word->crRuword();
    $word->crExample();

/*    $stmt = $dbh->getPdo()->prepare('show databases');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach($result as $row) {

        print_r($row);
        echo('<br />');
    }
*/
    $dbh->connectClose($dbh);
/*} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
} */

