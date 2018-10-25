<?php include("class/protect.php"); ?>



<?php 

if(isset($_SESSION['msg'])) 
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);


?>

<br><br>
<div class="center row">
<h5>#ADICIONAR NOVA NOTÍCIA</h5>
<form method="POST" action="processa.php">

<div class="row">
<div class="input-field col s2 offset-s5">
<label>Título: </label>
<input type="text" name="titulo" placeholder=""><br>
</div></div>

<div class="row">
<div class="input-field col s2 offset-s5">
<label>Texto: </label>
<input type="text" name="texto" placeholder=""><br>
</div></div>

<input type="submit" value="Cadastrar">
</form>
</div>