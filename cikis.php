<?php
session_start();
ob_start();
session_destroy();
header("Refresh: 0.1; url=giris.php");
ob_end_flush();
?>