<?php
include 'head.html';
?>
<h4>Edit translation</h4>
<form method="post" action="../index.php">
    <input type="text" disabled value="<?php echo $_GET['eng_word'] ?>">eng_word<br/>
    <input type="text" disabled value="<?php echo $_GET['id_1'] ?>">id_1<br/>
    <input type="text" value="<?php echo $_GET['ua_word'] ?>" name="ua_word">ua_word<br/>
    <textarea disabled rows="3"><?php echo $_GET['example'] ?></textarea>
    <input type="hidden" value="<?php echo $_GET['id_1'] ?>" name="id_1">
    <input type="hidden" value="<?php echo $_GET['id_ua'] ?>" name="id_ua"><br/>
    <input type="hidden" value="<?php echo $_GET['update'] ?>" name="update">
    <input type="submit" value="update"/>
</form>
<?php
echo '<a href="edit_ex.php?update_ex=1&example='.urlencode($_GET['example']).'" style=\'color: #5B5B5B\' title=\'add this example to other word\'>edit example</a>';
?>

</body>
</html>
