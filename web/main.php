<?php
include'head.html';
?>
<ul>
    <li><a href="add.php">Add word</a></li>
    <li><a href="remove.php">Remove word</a></li>
    <li><a href="showall.php">Show vocabulary</a></li>
</ul>
<div id="links">
    <form method="POST" action="index.php">
        <button name="create" value="create"> Create tables </button>
        <button name="find_all" value="find_all">Show all data <b><small style="color: darkgreen">JOIN</small></b></button>
        <button name="find_all_vocab" value="find_all">Show all vocabulary <b><small style="color: green">JOIN</small></b></button>
    </form>
</div>

</body>
</html>
