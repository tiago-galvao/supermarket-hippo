<?php
include('/db/bancodedados.php');

    try {
        $instrucaoSQL = "SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria";
        $consulta = sqlsrv_query($conn, $instrucaoSQL);
        $numRegistros = sqlsrv_num_rows($consulta);

    } catch (Exception $e) {
        die($e);
    }

    while ($categorias = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_NUMERIC)) {

        $categorias[1] = utf8_encode((empty($categorias[1])) ? "Sem dados" : $categorias[1]);
        $categorias[2] = utf8_encode((empty($categorias[2])) ? "Sem dados" : $categorias[2]);
        ?>
        <div class='row'>
            <div class='box-container'>
                <form method='post'>
                    <div class='propreties-itens'>
                        <span>Id</span>
                        <input type='text' value='<?=$categorias[0];?>' name='id'/>
                    </div>
                    <div class='propreties-itens'>
                        <span>Nome</span>
                        <input type='text' value='<?=$categorias[1];?>' name='nome'/>
                    </div>
                    <div class='propreties-itens'>
                        <span>Descrição</span>
                        <input type='text' value='<?=$categorias[2];?>' name='desc'/>
                    </div>
                    <? $jsonCategoria = htmlspecialchars(json_encode($categorias, JSON_FORCE_OBJECT)); ?>
                    <button class='btn btn-outline-danger' type='submit' formaction='/code/categoria/category-delete.php'>Deletar</button>
                    <button class='btn btn-outline-secondary' type='button' onClick='acaoEditar()'>Editar</button>
                </form>
            </div>
        </div>
      <?php
    }
?>
