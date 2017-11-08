<?php
include('/categoria-select.php');

echo '

<section class="container">
    <div class="box-container">
        <form method="post">
			<div class="propreties-itens">
				<span>Nome</span>
				<input type="text" value="HSAIUHSI UAHSIUH" name="nome" />
            </div>
			<div class="propreties-itens">
				<span>Descrição</span>
				<input type="text" value="HSAIUHSI UAHSIUH" name="nome" />
            </div>
			<button class="btn btn-outline-danger" type="submit" formaction="tste.php">Deletar</button>
            <button class="btn btn-outline-secondary" type="submit" formaction="ts.php">Editar</button>
        </form>
    </div>
</section>
';
?>
