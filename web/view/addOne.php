<?php
include 'head.html';
?>
Add translation to <b><i>vocabulary</i></b><br/>
<hr/>
<form method="post" action="../index.php">
    Input <i>ua/ru</i> translation<br/>
    <input type="text" name="ua_word"><br/>
    <input type="hidden" name="more_trans">
    <input type="hidden" name="id_en" value="<?php echo $_POST['id_1']; ?>">
    <input type="submit" value="add word"/>
</form>

</body>
</html>
