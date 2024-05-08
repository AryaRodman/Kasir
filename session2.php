<?php
session_start();
session_destroy();  
header("Location: http://localhost/kasir/index.php", true, 301);
exit();
?>