<?php

require __DIR__ . '/../config/autoload.php';

use Layer\Connector\ConnectBase;
use Models\Word\CrTables;
use Models\Word\Vocabulary;
use Models\Word\UaWord;

$user=$config['db_user'];
$pass=$config['db_password'];
$dsn='mysql:host='.$config['host'].';dbname='.$config['db_name'];

$dbh = new ConnectBase();
$stmt = $dbh->connect($dsn,$user, $pass);
$stmt = $dbh->getPdo();
include 'main.php';

if (isset($_POST['create'])){
    $word = new CrTables($stmt);
    $word->crEngWord();
    $word->crUaWord();
    $word->crExample();
}

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
if (isset($_POST['update'])) {
    $ins = new UaWord($stmt);
    $ins->update($_POST);
}


    $dbh->connectClose($dbh);

