 <?php
  include 'config.php';

  $sql = "SELECT rowid, * FROM livros WHERE rowid = '".$_GET['id']."'";
  $query = $db->query($sql);
  $row = $query->fetchArray();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Editar</title>
     <link rel='stylesheet' href='estilos\style.css'>
     <link rel="stylesheet" href="estilos\navbar.css">
     <link rel='stylesheet' href='estilos\editar.css'>
  </head>
  <body>
  <header class="header">
    <div class="fundo-header"></div>
  <div class="titulo"><h1>BIBLIOTECA R.A.P</h1></div>
    <ul class='navbar'>
      <li><a href='livros.php'>Início</a></li>
      <li><a href='cadastro.php'>Cadastros</a></li>
      <li><a href='reservas.php'>Reservas</a></li>
      <li style="float: right;"><a href="sobre.php">Sobre</a></li>
    </ul>
  </header>
    <div id="fundo">
      <form method="POST">
      <H1>EDITAR</H1>
        <p>
          <label for="isbn">ISBN:</label>
          <input type="text" id="isbn" name="isbn" value="<?php echo $row['isbn']; ?>">
        </p>
        <p>
          <label for="quantidade">Quantidade:</label>
          <input type="text" id="quantidade" name="quantidade" value="<?php echo $row['quantidade']; ?>">
        </p>
        <p>
          <label for="titulo">Título:</label>
          <input type="text" id="titulo" name="titulo" value="<?php echo $row['titulo']; ?>">
        </p>
        <p>
          <label for="descricao">Descrição:</label>
          <input type="text" id="descricao" name="descricao" value="<?php echo $row['descricao']; ?>">
        </p>
        <p>
          <label for="categoria">Categoria:</label>
          <input type="text" id="categoria" name="categoria" value="<?php echo $row['categoria']; ?>">
        </p>
        <p>
          <label for="autor">Autor:</label>
          <input type="text" id="autor" name="autor" value="<?php echo $row['autor']; ?>">
        </p>
        <p>
          <label for="editora">Editora:</label>
          <input type="text" id="editora" name="editora" value="<?php echo $row['editora']; ?>">
        </p>
        <p>
          <label for="imagem">Imagem:</label>
          <input type="text" id="imagem" name="imagem" value="<?php echo $row['imagem']; ?>">
        </p>
        <input type="submit" name="salvar" value="SALVAR" class='btn'>
       
      </form>
      <?php
        if(isset($_POST['salvar'])){
          $isbn = $_POST['isbn'];
          $quantidade = $_POST['quantidade'];
          $titulo = $_POST['titulo'];
          $descricao = $_POST['descricao'];
          $categoria = $_POST['categoria'];
          $autor = $_POST['autor'];
          $editora = $_POST['editora'];
          $imagem = $_POST['imagem'];

          # Verifica se as informações não estão vazias
          if($_POST['titulo'] != '' or $_POST['isbn'] != '' or $_POST['quantidade'] != '' or $_POST['descricao'] != '' or $_POST['categoria'] != '' or $_POST['autor'] != '' or $_POST['editora'] != '' or $_POST['imagem'] != '') {

            // Atualizar o registro no banco de dados
            $sql = "UPDATE livros SET isbn = '$isbn', quantidade = '$quantidade', titulo = '$titulo', descricao = '$descricao', categoria = '$categoria', autor = '$autor', editora = '$editora', imagem = '$imagem' WHERE rowid = '".$_GET['id']."'";
            $db->exec($sql);
    
            echo '<h4>Está pronto e melhor do que nunca!<h4>';
          } else {
            echo '<p>Preencha todos os espaços</p>';
          
          }
        }
      ?>
    </div>
  </body>
</html>