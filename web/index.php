<?php

require __DIR__ . '/../config/autoload.php';

use Layer\Connector\ConnectBase;
use Layer\Manager\CrTables;
use Models\Word\Vocabulary;

echo "<H1>HW 4</H1>";

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
    $ins = new Vocabulary($stmt);
    $response = $ins->findAll();
    include 'showall.php';
}
if (isset($_POST['find_all_vocab'])) {
    $ins = new Vocabulary($stmt);
    $response = $ins->findAllVocab();
    var_dump($response);
    include 'showall.php';
}

    $dbh->connectClose($dbh);

