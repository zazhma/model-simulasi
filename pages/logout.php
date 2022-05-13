<?php

session_start();

unset($_SESSION['username']);

?>
<script>document.location.href="../pages/login.php"
</script>
<?
include"login.php";
?>