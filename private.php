<?php session_start(); include("class/protect.php"); ?>

<?php include("head.html"); ?>

<body>


<nav class="light-blue lighten-1" role="navigation">
<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Olá <?php echo $_SESSION['email']; ?></a>
  <ul class="right hide-on-med-and-down">
    <li><a href="class/logout.php">Logout</a></li>
  </ul>

  <ul id="nav-mobile" class="sidenav">
    <li><a href="class/logout.php">Logout</a></li>
  </ul>
  <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</div>
</nav>


<?php include("head.html"); ?>


<?php include ("adicionar.php"); ?>



<br><br>



<div class="center row">
<h5>#NOTICIAS</h5>
<br>
<?php

include_once("class/conexao.php");

$sql =  mysqli_query($mysqli,"SELECT * FROM post order by id");


while ($exibe = mysqli_fetch_assoc($sql)):

 //   echo "<a href='#'>Editar</a>";
 //   echo $exibe["id"]." / ";
 //   echo $exibe["created"]." / ";

    echo "<b>Título: </b>";
    echo $exibe["titulo"]." <br><br> ";
    echo $exibe["texto"]." <br><br> ";
 //   echo "<a href='#'>Remover</a> <br>";


endwhile;
?>

</div>

</body>
</html>