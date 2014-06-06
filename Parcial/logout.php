<?php
session_start();
// Borramos toda la sesion
session_destroy();
echo '<p><a href="index.php">index</a></p>';
?>
<SCRIPT LANGUAGE="javascript">
location.href = "index.php";
</SCRIPT>