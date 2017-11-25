<?php
session_start();
include('../../db/bancodedados.php');

$idProduto = $_POST['idProduto'];
$nomeProduto = $_POST['nomeProduto'];
$descontoPromocao = $_POST['descontoPromocao'];
$precProduto = $_POST['precProduto'];
$descProduto = $_POST['descProduto'];
$idCategoria = $_POST['idCategoria'];
$idUsuario = $_POST['idUsuario'];
$qtdMinEstoque = $_POST['qtdMinEstoque'];
$ativoProduto = $_POST['ativoProduto'];

//Cadastrar Nova Categoria
try {
    if (isset($_FILES['imagem'])) {


        $foto = $_FILES['imagem'];
        $nome = $foto['name'];
        $tipo = $foto['type'];
        $tamanho = $foto['size'];

        $arquivo = $foto['tmp_name'];
        $imagem = fopen($arquivo, "r");
        $fileParaDB = fread($imagem, filesize($arquivo));

        if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipo)) {
            $_SESSION['erro'] = 'Imagem com o formato inválido';
            header('Location: /management-page-structure/product-management.php');
        }

        $instrucaoSQL = "UPDATE Produto SET nomeProduto = ?, descontoPromocao = ?,precProduto = ?,descProduto = ?,idCategoria = ?,idUsuario = ?,ativoProduto = ?,qtdMinEstoque = ?, imagem = ? WHERE idProduto = ?";

        $nomeProduto = utf8_decode($nomeProduto);
        $descProduto = utf8_decode($descProduto);
        $precProduto = number_format($precProduto,2, '.', '');
        $descProduto = number_format($descProduto,2, '.', '');
        $ativoProduto = ($ativo=='Sim') ? true : false;

        $params = array($nomeProduto, $descontoPromocao, $precProduto, $descProduto, $idCategoria, $idUsuario, $ativoProduto, $qtdMinEstoque,$fileParaDB,$idProduto);
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);

        $rows_affected = sqlsrv_rows_affected($consulta);

        if($rows_affected > 0){
            $_SESSION['msg'] = 'Produto adicionado com sucesso';
            header('Location: /management-page-structure/product-management.php');
        }else{
            $_SESSION['erro'] = 'Erro ao adicionar o produto';
            header('Location: /management-page-structure/product-management.php');
        }

    }else{
        $instrucaoSQL = "UPDATE Produto SET nomeProduto = ?, descontoPromocao = ?,precProduto = ?,descProduto = ?,idCategoria = ?,idUsuario = ?,ativoProduto = ?,qtdMinEstoque = ? WHERE idProduto = ?";

        $nomeProduto = utf8_decode($nomeProduto);
        $descProduto = utf8_decode($descProduto);
        $precProduto = number_format($precProduto,2, '.', '');
        $descProduto = number_format($descProduto,2, '.', '');
        $ativoProduto = ($ativo=='Sim') ? true : false;

        $params = array($nomeProduto, $descontoPromocao, $precProduto, $descProduto, $idCategoria, $idUsuario, $ativoProduto, $qtdMinEstoque,$idProduto);
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);

        $rows_affected = sqlsrv_rows_affected($consulta);

        if($rows_affected > 0){
            $_SESSION['msg'] = 'Produto editar com sucesso';
            header('Location: /management-page-structure/product-management.php');
        }else{
            $_SESSION['erro'] = 'Erro ao editar o produto';
            header('Location: /management-page-structure/product-management.php');
        }
    }

} catch (Exception $e) {
    $_SESSION['erro'] = 'Erro ao editar um produto';
    header('Location: /management-page-structure/category-user-management.php');
}


?>
