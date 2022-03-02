<?php

require_once "../config.php";
require_once "functions.php";

// Built-in PHP function to delete file
$id = $_GET["id"];

delete($id);
unlink("../uploads/$id.png");



 
// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);


?>