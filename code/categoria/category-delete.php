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
			header('Location: /management-page-structure/category-user-management.php');	
            
        }else{
            $_SESSION['erro'] = 'Erro ao deletar a categoria';
			header('Location: /management-page-structure/category-user-management.php');
        }

    }else{
		header('Location: /management-page-structure/category-user-management.php');
	}

} catch (Exception $e) {
    die($e);
    $_SESSION['erro'] = 'Erro ao deletar a categoria';
	header('Location: /management-page-structure/category-user-management.php');
}
?>
