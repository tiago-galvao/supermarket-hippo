<?php
$dbhost = "hippo-pi.database.windows.net";
$db = "hippo";
$user = "TSI";
$password = "SistemasInternet123";
$conninfo = array("Database" => $db, "UID" => $user, "PWD" => $password);

if (!$conn = sqlsrv_connect($dbhost, $conninfo)) {
	die("Erro ao conectar ao banco de dados");
}
?>