<?php

include('../../db/bancodedados.php');

$email = isset($_POST['email']) ? $_POST['email'] : null;
$login = isset($_POST['login']) ? $_POST['login'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

if ($conn) {

    $instrucaoSQL = "INSERT INTO Usuario (loginUsuario, senhaUsuario, nomeUsuario, tipoPerfil, usuarioAtivo) VALUES(?,?,?,'C',1)";
    $params = array($email, $senha, $login);
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $consulta = sqlsrv_query($conn, $instrucaoSQL, $params, $options);
    $numRegistros = sqlsrv_num_rows($consulta);

    if ($numRegistros != 0) {

        $instrucaoSQL = "SELECT idUsuario,loginUsuario,nomeUsuario,tipoPerfil,idUsuario FROM Usuario WHERE usuarioAtivo = 1 AND loginUsuario = ? AND senhaUsuario = ?";
        $params = array($email, $senha);
        $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params, $options);
        if ($numRegistros != 0) {
            session_start();
            $dadosUsuario = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC);
            $_SESSION['login'] = $dadosUsuario["loginUsuario"];
            $_SESSION['nomeUsuario'] = $dadosUsuario["nomeUsuario"];
            $_SESSION['tipoUsuario'] = $dadosUsuario["tipoPerfil"];
            $_SESSION['idUser'] = $dadosUsuario["idUsuario"];
            $_SESSION['senhaUser'] = $dadosUsuario["senhaUsuario"];
            header('Location: http://servidor-php-nla.azurewebsites.net');
        }
    }
} else {
    $msg = "Erro inesperado";
    header('Location: http://servidor-php-nla.azurewebsites.net');
}

?>