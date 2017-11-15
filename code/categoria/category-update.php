<?php

include('../../db/bancodedados.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$desc = $_POST['desc'];

echo "<script>
    if(confirm('Deseja alterar a categoria  $nome ?')){
		var alterar = true;
    }
</script>";

$alterar = "<script>document.write(alterar);</script>";

try {
	if ($alterar == true) {
        $instrucaoSQL = "UPDATE Categoria SET nomeCategoria = ?, descCategoria = ? WHERE idCategoria = ?";
        $params = array( $nome, $desc, $id );
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
        $rows_affected = sqlsrv_rows_affected($consulta);

		if($rows_affected > 0){
				$msg = 'Categoria alterado com sucesso';
				echo "<script> window.location.href = '/management-page-structure/category-user-management.php' </script>";	
			}else{
				echo "<script> console.log('NAO EXECUTOU ');</script>";
				$erro = 'Erro ao alterar a categoria';
                die( print_r( sqlsrv_errors(), true));
			}
	}

} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}
?>