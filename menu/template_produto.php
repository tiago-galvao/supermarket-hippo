<?php
include('../sidebar/sidebar.php');
?>

<div class="col-sm-9 col-sm-offset-1">
                                        <br>
		<table class="table table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Descrição</td>
				<td>Preço</td>
				<td>Editar</td>
				<td>Excluir</td>
			</tr>
        </thead>
        <tbody>
			<?php
			foreach($produtos as $idProduto => $dadosProdutos){

				if ($dadosProdutos['idCategoria'] == $_GET['categoria']) {
					echo "	<tr>
							<td>$idProduto</td>
							<td>{$dadosProdutos['nomeProduto']}</td>
							<td>{$dadosProdutos['descProduto']}</td>
							<td>{$dadosProdutos['precProduto']}</td>
							<td>{$dadosProdutos['idCategoria']}</td>
						</tr>";
				}				
			}
			?>
       </tbody>
		</table>
                </div>
            </div>
</body>

</html>
