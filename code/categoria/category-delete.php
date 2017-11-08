<?php

include('/db/bancodedadosOdbc.php');

$id = $_POST['id'];
$nome = $_POST['nome'];

echo "<script>
    if(confirm('Deseja deletar a categoria  $nome ?')){
        console.log($id);
        console.log('$nome');
    }
</script>";


try {	
	if(odbc_exec($db, "DELETE FROM Categoria WHERE idCategoria = {$id}")){
		echo "<script> console.log('EXECUTOU ');</script>";
			$msg = 'Usuário removido com sucesso';						
		}else{
			echo "<script> console.log('NAO EXECUTOU ');</script>";
			$erro = 'Erro ao excluir o usuário';
		}
		var_dump(odbc_error());
} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}

?>