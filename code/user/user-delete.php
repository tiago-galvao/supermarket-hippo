<?php

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
            $msg = 'Usuário deletado com sucesso';
            echo "<script> window.location.href = '/management-page-structure/user-management.php' </script>";	
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