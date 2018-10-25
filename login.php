<?php
if(!isset($_SESSION))
    session_start();

//Login de Usários
if(isset($_POST['login'])){

  include('class/conexao.php');
  
  $erro = array();

  // Captação de dados
    $senha = $_POST['password'];
    $_SESSION['email'] = $mysqli->escape_string($_POST['email']);

    // Validação de dados
    if(!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL))
        $erro[] = "Preencha seu <strong>e-mail</strong> corretamente.";

    if(strlen($senha) < 6 || strlen($senha) > 16)
        $erro[] = "Preencha sua <strong>senha</strong> corretamente.";

    if(count($erro) == 0){

        $sql = "SELECT senha as senha, codigo as valor 
        FROM usuario 
        WHERE email = '$_SESSION[email]'";
        $que = $mysqli->query($sql) or die($mysqli->error);
        $dado = $que->fetch_assoc();
        
        if($que->num_rows == 0)
            $erro[] = "Nenhum usuário possui o <strong>e-mail</strong> informado.";

        elseif(strcmp($dado['senha'], ($senha)) == 0){
            $_SESSION['usuario_logado'] = $dado['valor'];
        }else
            $erro[] = "<strong>Senha</strong> incorreta.";

        if(count($erro) == 0){
            echo "<script>location.href='private.php';</script>";
            exit();
            unset($_SESSION['email']);
        }

    }


}

?>
<?php include("head.html"); ?>
<body>

    
                        <?php 
                        if(isset($erro)) 
                            if(count($erro) > 0){ ?>
                                <div class="alert alert-danger">
                                    <?php foreach($erro as $msg) echo "$msg <br>"; ?>
                                </div>
                            <?php 
                            }
                            ?>

                            
                            <div class="center row">
                            <h5>#Login</h5>
                        <form method="post" action="" role="form" class="row col s12">
                                <div class="row">
                                <div class="input-field col s2 offset-s5">
                                <input value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div></div>
                                
                                <div class="row">
                                <div class="input-field col s2 offset-s5">
                                <input class="form-control" required placeholder="Senha" name="password" type="password" value="">
                                </div></div>
                                
                                <button type="submit" name="login" value="true">Login</button>
                            
                        </form>
                        <p> usuario: a@a.com / senha: 123456789 </p>
                        </div>

         


</body>

</html>

