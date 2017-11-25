<?php

include('../../db/bancodedados.php');

$login = isset($_POST['login']) ? $_POST['login'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

if ($conn) {
    $instrucaoSQL = "SELECT idUsuario,loginUsuario,nomeUsuario,tipoPerfil,senhaUsuario FROM Usuario WHERE usuarioAtivo = 1 AND loginUsuario = ? AND senhaUsuario = ?";
    $params = array($login,$senha);
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $consulta = sqlsrv_query($conn, $instrucaoSQL, $params, $options);
    $numRegistros = sqlsrv_num_rows($consulta);

    if ($numRegistros != 0) {
        session_start();
        $dadosUsuario = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC);
        $_SESSION['login'] = $dadosUsuario["loginUsuario"];
        $_SESSION['nomeUsuario'] = $dadosUsuario["nomeUsuario"];
        $_SESSION['tipoUsuario'] = $dadosUsuario["tipoPerfil"];
        $_SESSION['idUser'] = $dadosUsuario["idUsuario"];
        $_SESSION['senhaUser'] = $dadosUsuario["senhaUsuario"];
        header('Location: http://servidor-php-nla.azurewebsites.net');
    } else {
        $msg = "Usuário ou senha inválidos";
        header('Location: http://servidor-php-nla.azurewebsites.net');
    }
}else{
    $msg = "Erro inesperado";
    header('Location: http://servidor-php-nla.azurewebsites.net');
}

?>