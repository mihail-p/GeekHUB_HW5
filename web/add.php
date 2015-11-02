<?php

require __DIR__ . '/../config/autoload.php';

use Layer\Connector\ConnectBase;

use Models\Word\EngWord;
use Models\Word\UaWord;

include 'head.html';

$user=$config['db_user'];
$pass=$config['db_password'];
$dsn='mysql:host='.$config['host'].';dbname='.$config['db_name'];

$dbh = new ConnectBase();
$stmt = $dbh->connect($dsn,$user, $pass);
$stmt = $dbh->getPdo();
?>
Add word to <b><i>vocabulary</i></b><br />
    <hr />
        <form method="post" action="add.php">
            Input <i>english</i> word<br />
            <input type="text" name="eng_word"><br />
            Input <i>ua/ru</i> translation<br />
            <input type="text" name="ua_word"><br />
            example<br />
            <input type="text" name="example"><br />
            <input type="hidden" name="inp_check">
            <input type="submit" value="add data"/>
        </form>

<?php
// $post['eng_word'] = 'positive_2';
// $post['id_en'] = '7';
$ins = new EngWord($stmt);
if (isset($_POST['inp_check'])){
    if (isset($_POST['eng_word']) && ($_POST['eng_word']!="")) {
        $ins->insert($_POST);
    } else {
        echo "Input <b>correct</b> <i>english</i> word";
    }
}

if (isset($_POST['ua_word']) && ($_POST['eng_word']!="")) {
    //echo' ua_word<br />';
    $response = $ins->findName($_POST);
    $_POST['id_en'] = $response['id_en'];
    $ins = new UaWord($stmt);
    $ins->insert($_POST);
}

$dbh->connectClose($dbh);
?>
</body>
</html>
