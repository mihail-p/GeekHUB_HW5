<?php

require __DIR__ . '/../config/autoload.php';

use Layer\Connector\ConnectBase;
use Layer\Manager\CrTables;
use Models\Word\EngWord;

echo "Hi ALL__!";

$user=$config['db_user'];
$pass=$config['db_password'];
$dsn='mysql:host='.$config['host'].';dbname='.$config['db_name'];

$dbh = new ConnectBase();
$stmt = $dbh->connect($dsn,$user, $pass);
$stmt = $dbh->getPdo();
//echo"1 ok ";
include 'main.php';

if (isset($_POST['create'])){
    $word = new CrTables($stmt);
    $word->crEngWord();
    $word->crUaWord();
    $word->crExample();
}

/*$post['eng_word'] = 'positive_2';
$post['id_en'] = '7';
$ins = new EngWord($stmt);
if (isset($_POST['insert'])){
    include 'add.php';
    $ins->insert($post);
} */
//
//$ins->update($post);
//$ins->remove($post);

if (isset($_POST['find_all'])) {
    $ins = new EngWord($stmt);
    $response = $ins->findAll();
    include 'showall.php';
}



/*    $stmt = $dbh->getPdo()->prepare('show databases');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach($result as $row) {

        print_r($row);
        echo('<br />');
    }
*/
    $dbh->connectClose($dbh);

