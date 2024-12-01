<html>
  <head>
    <title>PHP Test</title>
    <link rel='stylesheet' href='estilos\style.css'>
    <link rel='stylesheet' href='estilos\navbar.css'>
    <link rel='stylesheet' href='estilos\add_livro.css'>
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
  <div class="pai-fundo">
    <div class="fundo">
      <h1>Adicionar</h1>
      <form method='POST'>
        <p>
          <label for='titulo'>Título:</label>
          <input type='text' name='titulo' id='titulo'>
        </p>
        <p>
          <label for='isbn'>ISBN:</label>
          <input type='text' name='isbn' id='isbn'>
        </p>
        <p>
          <label for='quantidade'>Quantidade:</label>
          <input type='text' name='quantidade' id='quantidade'>
        </p>
        <p>
          <label for='descricao'>Descrição:</label>
          <input type='text' name='descricao' id='descricao'>
        </p>
        <p>
          <label for='categoria'>Categoria:</label>
          <input type='text' name='categoria' id='categoria'>
        </p>
        <p>
          <label for='autor'>Autor:</label>
          <input type='text' name='autor' id='autor'>
        </p>
        <p>
          <label for='ediora'>Editora:</label>
          <input type='text' name='editora' id='editora'>
        </p>
        <p>
          <label for='imagem'>Imagem:</label>
          <input type='text' name='imagem' id='imagem'>
        </p>
        <div class="btn-salvar">
        <input type='submit' name='salvar' value='salvar' class='btn'>
        </div>
      </form>
      <?php
        # Espera o botão 'salvar' ser clicado
        if(isset($_POST['salvar'])){
          $titulo = $_POST['titulo'];
          $isbn = $_POST['isbn'];
          $quantidade = $_POST['quantidade'];
          $descricao = $_POST['descricao'];
          $categoria = $_POST['categoria'];
          $autor = $_POST['autor'];
          $editora = $_POST['editora'];
          $imagem = $_POST['imagem'];

          # Importa a variável do banco de dados
          include 'config.php';

          # Verifica se as informações não estão vazias
          if($_POST['titulo'] != '' or $_POST['isbn'] != '' or $_POST['quantidade'] != '' or $_POST['descricao'] != '' or $_POST['categoria'] != '' or $_POST['autor'] != '' or $_POST['editora'] != '' or $_POST['imagem'] != ''){

            # Verifica se já existe um registro com o mesmo isbn
            $verificar = $db->query("SELECT * FROM livros WHERE isbn = '{$_POST['isbn']}'");
            $verificar = $verificar->fetchArray();

            if($verificar){
              echo 'Nome já cadastrado';
            } else {

              # Insere as variáveis obtidas do formulário no banco de dados
              $livros = "INSERT INTO livros (isbn, quantidade, titulo, descricao, categoria, autor, editora, imagem) VALUES ('$isbn', '$quantidade', '$titulo', '$descricao', '$categoria', '$autor', '$editora', '$imagem')";
              $db->exec($livros);

              echo 'Adicionado com sucesso!';
            }
          } else {
            echo '<p>Preencha todos os campos</p>';
          }
        }
      ?>
    </div>
  </div>
  </body>
</html>