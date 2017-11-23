<?php
session_start();
include('../../db/bancodedados.php');

$id = $_POST['id'];
$login = $_POST['login'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$perfil = $_POST['tipo'];
$ativo = $_POST['ativo'];

echo "<script>
    if(confirm('Deseja deletar o usuário  $nome ?')){
		var deletar = true;
    }
</script>";

$deletar = "<script>document.write(deletar);</script>";

try {
    if ($deletar == true) {
        $instrucaoSQL = "DELETE FROM Usuario WHERE idUsuario = ?";
        $params = array( $id );
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
        $rows_affected = sqlsrv_rows_affected($consulta);

        if($rows_affected > 0){
            $_SESSION['msg'] = 'Usuário deletado com sucesso';
            header('Location: /management-page-structure/user-management.php');
        }else{
            $_SESSION['erro'] = 'Erro ao deletar o usuário';
            header('Location: /management-page-structure/user-management.php');
        }
    }

} catch (Exception $e) {
    die($e);
    header('Location: /management-page-structure/user-management.php');
}
?>