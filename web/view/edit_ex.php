<?php
include 'head.html';
?>
<h4>Edit example</h4>
<form method="post" action="../index.php">
    <textarea disabled rows="3"><?php echo $_GET['example'] ?></textarea><br/>
    <input type="text" name="eng_word">input english word<br/>
    <input type="hidden" value="<?php echo $_GET['example'] ?>" name="example">
    <input type="hidden" value="update_ex" name="action">
    <input type="submit" value="update example"/>
</form>


</body>
</html>
