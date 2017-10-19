<?php

$login = isset($_POST['login']) ? $_POST['login'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

$msg ='1';
$msgErr = '1';

if(!empty($login) && !empty($senha)){
    include('code/conn-db.php');

    $stmt = odbc_prepare($db, '	SELECT ID
								FROM USUARIO
								WHERE NOME = ?
								AND SENHA = ?');
    odbc_execute($stmt, array($login, $senha));

    $usuario = odbc_fetch_array($stmt);

    if(!$usuario['ID']){

        $msg = 'Login e/ou Senha Incorretos';
		$msgErr = 'erro';
    }else{
        $msg = 'Usuário conectado';
    }
}

include('inicial.php');
?>