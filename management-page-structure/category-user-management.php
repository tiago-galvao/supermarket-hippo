<?php
include('/categoria-select.php');

echo '

<section class="container">
    <div class="box-container">
        <form method="post">
            <span id="NomeSpan">Nome</span>
            <span id="DescSpan">Descrição</span>
            <input type="text" value=$categorias[""] name="nome" />
            <input type="text" value="HSAIUHSI UAHSIUH" name="nome" />
            <button class="btn btn-outline-danger" type="submit" formaction="tste.php">Deletar</button>
            <button class="btn btn-outline-secondary" type="submit" formaction="ts.php">Editar</button>
        </form>
    </div>
</section>
';
?>
