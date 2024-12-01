 <?php
  include 'config.php';

  $sql = "SELECT rowid, * FROM reserva WHERE rowid = '".$_GET['id']."'";
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
  <div class="fundo-pai">
    <div id="fundo">
      <form method="POST">
      <H1>EDITAR</H1>
        <p>
          <label for="ra">RA:</label>
          <input type="text" id="ra" name="ra" value="<?php echo $row['ra']; ?>">
        </p>
        <p>
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>">
        </p>
        <p>
          <label for="livro">Livro:</label>
          <input type="text" id="livro" name="livro" value="<?php echo $row['livro']; ?>">
        </p>
        <p>
          <label for="serie">Série:</label>
          <input type="text" id="serie" name="serie" value="<?php echo $row['serie']; ?>">
        </p>
        <input type="submit" name="salvar" value="SALVAR" class='btn'>
       
      </form>
      <?php
        if(isset($_POST['salvar'])){
          $ra = $_POST['ra'];
          $nome = $_POST['nome'];
          $livro = $_POST['livro'];
          $serie = $_POST['serie'];

          # Verifica se as informações não estão vazias
          if($_POST['ra'] != '' or $_POST['nome'] != '' or $_POST['livro'] != '' or $_POST['serie'] != '') {

            // Atualizar o registro no banco de dados
            $sql = "UPDATE reserva SET ra = '$ra', nome = '$nome', livro = '$livro', serie = '$serie' WHERE rowid = '".$_GET['id']."'";
            $db->exec($sql);
    
            echo '<h4>Está pronto e melhor do que nunca!<h4>';
          } else {
            echo '<p>Preencha todos os espaços</p>';
          
          }
        }
      ?>
    </div>
    </div>
  </body>
</html>