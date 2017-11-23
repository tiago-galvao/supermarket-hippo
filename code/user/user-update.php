<?php
session_start();
include('../../db/bancodedados.php');

$id = $_POST['id'];
$login = $_POST['login'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$perfil = $_POST['tipo'];
$ativo = $_POST['ativo'];


try {
    $instrucaoSQL = "UPDATE Usuario SET loginUsuario = ?, nomeUsuario = ?, senhaUsuario = ?, tipoPerfil = ?, usuarioAtivo = ? WHERE idUsuario = ?";
    $params = array($login, $nome, $senha, $perfil, $ativo, $id);
    $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
    $rows_affected = sqlsrv_rows_affected($consulta);
    if ($rows_affected > 0) {
        $_SESSION['msg'] = 'Usuário alterado com sucesso';
        header('Location: /management-page-structure/user-management.php');
    } else {
        $_SESSION['erro'] = 'Erro ao alterar o usuário';
        header('Location: /management-page-structure/user-management.php');
    }

} catch (Exception $e) {
    die($e);
    header('Location: /management-page-structure/user-management.php');
}
?>