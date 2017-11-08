<?php

include('/db/bancodedados.php');

$id = $_POST['id'];
$nome = $_POST['nome'];

echo "<script>
    if(confirm('Deseja deletar a categoria  $nome ?')){
        console.log($id);
        console.log('$nome');
    }
</script>";


try {
    $instrucaoDelete = "DELETE FROM Categoria WHERE idCategoria = ?";
    $params = array($id);
    $consulta = sqlsrv_prepare($conn, $instrucaoDelete, array(&$id));
	sqlsrv_execute($consulta);
	var_dump(sqlsrv_errors());
    echo "<script> console.log('Deu tudo certo'); </script>";
} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}

?>