﻿<?php
include('../sidebar/sidebar.php');
?>

<div class="col-sm-9 col-sm-offset-1">
		<br> 
    <form method="post" action="?categorias">
		
			Nome: <input type="text" name="nomeCategoria" value="<?php echo $dados_categoria['nomeCategoria']; ?>"><br><br>
			Descrição: <input type="text"	name="descCategoria" value="<?php echo $dados_categoria['descCategoria']; ?>"><br><br>
			<input type="submit" value="Atualizar" name="btnAttC"/>
		
		</form>
		<?php
				if(isset($msg)) {
					echo "	<br><center><b><font color='green'>
							$msg</font></b></center><br>";
				}
				if(isset($erro)) {
					echo "	<br><center><b><font color='red'>
							$erro</font></b></center><br>";
				}
		?>		
                </div>
 </div>
 
 
</body>

</html>