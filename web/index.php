<?php

require __DIR__ . '/../config/autoload.php';

use Layer\Connector\ConnectBase;
use Models\Word\CrTables;
use Models\Word\Vocabulary;
use Models\Word\UaWord;
use Models\Word\EngWord;

$user = $config['db_user'];
$pass = $config['db_password'];
$dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'];

$dbh = new ConnectBase();
$stmt = $dbh->connect($dsn, $user, $pass);
$stmt = $dbh->getPdo();
include './view/main.php';

if (isset($_POST['create'])) {
    $word = new CrTables($stmt);
    $word->crEngWord();
    $word->crUaWord();
    $word->crExample();
    $word->crConnectExample();
}

if (isset($_POST['find_all'])) {
    $ins = new Vocabulary($stmt);
    $response = $ins->findAll();
    include './view/showall.php';
}
if (isset($_POST['find_all_vocab'])) {
    $ins = new Vocabulary($stmt);
    $response = $ins->findAllVocab();
    include './view/showall.php';
}
if (isset($_POST['find_by_name'])) {
    if (isset($_POST['eng_word']) && $_POST['eng_word'] != ""){
        $ins = new Vocabulary($stmt);
        $response = $ins->findByName($_POST);
        //var_dump($_POST);
        include './view/showWord.php';
    } else {
        echo '<p>word <b>not set!</b></p>';
    }

}
if (isset($_POST['more_trans'])) {
    $ins = new UaWord($stmt);
    $ins->insert($_POST);
}
if (isset($_POST['update'])) {
    $ins = new UaWord($stmt);
    $ins->update($_POST);
}
if (isset($_POST['remove'])) {
    $ins = new EngWord($stmt);
    $ins->remove($_POST);
}

$dbh->connectClose($dbh);

