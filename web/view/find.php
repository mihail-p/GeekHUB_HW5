<?php
include "head.html";
?>
Find word <br/>
<hr/>
<form method="post" action="../index.php">
    Input <i>english</i> word<br/>
    <input type="text" name="eng_word"><br/>
    <input type="hidden" name="action" value="find_by_name">
    <input type="submit" value="find"/>
</form>

</body>
</html>
