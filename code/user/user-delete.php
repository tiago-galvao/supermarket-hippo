<?php

include('../../db/bancodedados.php');

$login = $_POST['loginUsuario'];
$nome = $_POST['nomeUsuario'];
$senha = $_POST['senhaUsuario'];
$ativo = $_POST['usuarioAtivo'];
$perfil = $_POST['perfilUsuario'];

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
            $msg = 'Usuário deletado com sucesso';
            header('Location: /management-page-structure/category-user-management.php');
        }else{
            $erro = 'Erro ao deletar o usuário';
            die( print_r( sqlsrv_errors(), true));
        }
    }

} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}
?>