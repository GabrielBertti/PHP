<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
  <title>Admin - Cadastro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
    <body>
         <div class="container">
        <nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Cadastrar</a>
    </li>
   
  </ul>
</nav>
<br>
        <div class="row">
        <div class="card-header">
                <h3 class="well">Cadastrar Produto</h3>
            
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        
       
        <form method="POST" action="proc_cad_img.php" enctype="multipart/form-data">
           <div class="form-row">
         <div class="form-group col-md-6">
            <label class="control-label">Nome:<span class="required"></span></label>
            <div class="controls">
            <input type="text" class="form-control" name="nome" placeholder="Digitar o nome">
        </div>
    </div>
            <div class="control-group col-md-2">
             <label class="control-label">Valor:</label>
             <div class="controls">
            <input type="number" class="form-control" name="valor" placeholder="Digitar o Valor">
        </div>
    </div>
     <div class="control-group col-md-2">
             <label class="control-label">Largura:</label>
             <div class="controls">
            <input type="text" class="form-control" name="largura" placeholder="Digitar a largura">
        </div>
    </div>
             <div class="control-group col-md-6">
             <label class="control-label">Descrição:</label>
             <div class="controls">
            <input type="text" class="form-control" name="descricao" placeholder="Descrição">
        </div>
    </div>

          

             <div class="control-group col-md-2">
             <label class="control-label">Peso:</label>
             <div class="controls">
            <input type="text" class="form-control" name="peso" placeholder="Digitar o peso">
        </div>
    </div>

             <div class="control-group col-md-2">
             <label class="control-label">Quantidade:</label>
             <div class="controls">
            <input type="number" class="form-control" name="quantidade" placeholder="quantidade"><br><br>
        </div>
    </div>
             <div class="control-group col-md-5">
             <label class="control-label">Altura:</label>
             <div class="controls">
            <input type="text" class="form-control" name="altura" placeholder="Digitar a altura">
        </div>
    </div>
             <div class="control-group col-md-4">
             <label class="control-label">Profundidade:</label>
             <div class="controls">
            <input type="text" class="form-control" name="profundidade" placeholder="Digitar o peso">
        </div>
    </div>
            
            <div class="control-group col">
                <label class="control-label">Imagem:</label>
            <input type="file" name="imagem"><br><br>
            </div>
            <div class="control-group col-md-6"><br><br>
            <input class="btn btn-primary" name="SendCadImg" type="submit" value="Cadastrar">
            </div>
        </form>
    </div> 
    </div> 
    </body>
</html>
