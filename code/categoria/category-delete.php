<?php
session_start();
include('../../db/bancodedados.php');

$id = $_POST['id'];
$nome = $_POST['nome'];

echo "<script>
    if(confirm('Deseja deletar a categoria  $nome ?')){
		var deletar = true;
    }
</script>";

$deletar = "<script>document.write(deletar);</script>";

try {
    if ($deletar == true) {
        $instrucaoSQL = "DELETE FROM Categoria WHERE idCategoria = ?";
        $params = array( $id );
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
        $rows_affected = sqlsrv_rows_affected($consulta);

        if($rows_affected > 0){
            $_SESSION['msg'] = 'Categoria deletada com sucesso';
			echo "<script> window.location.href = '/management-page-structure/category-user-management.php' </script>";	
            
        }else{
            $_SESSION['erro'] = 'Erro ao deletar o usuário';
            die( print_r( sqlsrv_errors(), true));
        }

    }

} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}
?>
