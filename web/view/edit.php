<?php
include 'head.html';
?>
<form method="post" action="../index.php">
    <input type="text" disabled value="<?php echo $_GET['eng_word'] ?>" name="id_1">eng_word<br/>
    <input type="text" value="<?php echo $_GET['id_1'] ?>" name="id_1">id_1<br/>
    <input type="text" value="<?php echo $_GET['ua_word'] ?>" name="ua_word">ua_word<br/>
    <!-- <input type="text" value="example" name="example">example<br/> -->
    <input type="hidden" value="<?php echo $_GET['id_ua'] ?>" name="id_ua"><br/>
    <input type="hidden" value="<?php echo $_GET['update'] ?>" name="update"><br/>
    <input type="submit" value="update"/>
</form>

</body>
</html>
