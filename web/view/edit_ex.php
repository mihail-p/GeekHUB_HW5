<?php
include 'head.html';
?>
<h4>Edit example</h4>
<form method="post" action="../index.php">
    <input type="text" value="<?php echo $_GET['example'] ?>" name="example">example<br/>
    <input type="text" name="eng_word">input english word<br/>
    <input type="hidden" value="update_ex" name="update_ex">
    <input type="submit" value="update example"/>
</form>


</body>
</html>
