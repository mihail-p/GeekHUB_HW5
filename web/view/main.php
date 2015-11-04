<?php
include 'head.html';
?>
<ul>
    <li><b><a href="../view/add.php" style="color: #5B5B5B;">Add word</a></b></li>
    <li><b><a href="../view/find.php" style="color: #5B5B5B">Find word</a></b></li>
</ul>
<div id="links">
    <form method="POST" action="../index.php">
        <button name="create" value="create"> Initialize DB</button>
        <button name="find_all" value="find_all">Show all data <b><small style="color: darkgreen">JOIN</small></b></button>
        <button name="find_all_vocab" value="find_all">Show all vocabulary <b><small style="color: green">JOIN</small></b></button>
    </form>
</div>

</body>
</html>
