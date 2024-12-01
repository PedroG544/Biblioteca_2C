<?php
  include 'config.php';

  $sql = "SELECT rowid, * FROM livros WHERE rowid = '".$_GET['id']."'";
  $query = $db->query($sql);
  $row = $query->fetchArray();

?>

<html>
  <head>
    <title>PHP Test</title>
    <link rel='stylesheet' href='estilos\style.css'>
    <link rel='stylesheet' href='estilos\navbar.css'>
    <link rel='stylesheet' href='estilos\criar.css'>
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
    <div class="pai-fundo">
    <div id='fundo'>
    <div class="imagem">
            <img src='<?php echo $row['imagem']; ?>'>
        </div>
      <form method='POST'>

        <div class="conteudo">
          <p><?php echo $row['titulo']; ?></p>
          <p>
            <label for='ra'>RA: </label>
            <input type='text' name='ra' id='ra'>
          </p>
          <p>
            <label for='nome'>Nome:</label>
            <input type='text' name='nome' id='nome'>
          </p>
          <p>
            <label for='serie'>Série:</label>
            <input type='text' name='serie' id='serie'>
          </p>
          <input type='submit' name='salvar' value='salvar' class='btn'>
        </form>
    
      <?php
        # Espera o botão 'salvar' ser clicado
        if(isset($_POST['salvar'])){
          $ra = $_POST['ra'];
          $nome = $_POST['nome'];
          $livro = $row['titulo'];
          $serie = $_POST['serie'];
  
          # Importa a variável do banco de dados
          include 'config.php';
  
          # Verifica se as informações não estão vazias
          if($_POST['nome'] != '' or $_POST['livro'] != '' or $_POST['serie'] != '' or $_POST['ra'] != ''){
  
            # Verifica se já existe um registro com o mesmo nome
            $verificar = $db->query("SELECT * FROM reserva WHERE nome = '{$_POST['nome']}'");
            $verificar = $verificar->fetchArray();
            
            if($verificar){
              echo '<p class aviso1>Nome já cadastrado</p>';
            } else {
    
              # Insere as variáveis obtidas do formulário no banco de dados
              $query = "INSERT INTO reserva (ra, nome, livro, serie) VALUES ('$ra', '$nome', '$livro', '$serie')";
              $db->exec($query);
    
              echo '<p class="aviso2">Adicionado com sucesso!</p>';
            }
          } else {
            echo '<p class="aviso3">Preencha todos os campos</p>';
          }
        }
      
      ?>
      </div>
    </div>
    </div>
  </body>
</html>