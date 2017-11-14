<?php

include('../../db/bancodedados.php');

$email = isset($_POST['email']) ? $_POST['email'] : null;
$login = isset($_POST['login']) ? $_POST['login'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

session_start();
$id = $_SESSION['idUser'];

if ($conn) {

    $instrucaoSQL = "UPDATE Usuario SET loginUsuario = ?, senhaUsuario = ? , nomeUsuario = ? WHERE idUsuario = ?";
    $params = array($email, $senha, $login, $id);
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $consulta = sqlsrv_query($conn, $instrucaoSQL, $params, $options);
    $numRegistros = sqlsrv_num_rows($consulta);

    if ($numRegistros != 0) {

        $instrucaoSQL = "SELECT loginUsuario,nomeUsuario,tipoPerfil,idUsuario FROM Usuario WHERE usuarioAtivo = 1 AND loginUsuario = ? AND senhaUsuario = ?";
        $params = array($email, $senha);
        $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params, $options);
        if ($numRegistros != 0) {
            $dadosUsuario = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC);
            $_SESSION['login'] = $dadosUsuario["loginUsuario"];
            $_SESSION['nomeUsuario'] = $dadosUsuario["nomeUsuario"];
            $_SESSION['tipoUsuario'] = $dadosUsuario["tipoPerfil"];
            $_SESSION['idUser'] = $dadosUsuario["idUsuario"];
            $_SESSION['senhaUser'] = $dadosUsuario["senhaUsuario"];
            header('Location: /management-page-structure/user-management.php');
        }
    }
} else {
    $msg = "Erro inesperado";
    header('Location: /management-page-structure/user-management.php');
}

?>