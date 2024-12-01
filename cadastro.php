<html>
  <head>
    <title>Listar</title>
    <link rel='stylesheet' href='estilos\style.css'>
    <link rel='stylesheet' href='estilos\navbar.css'>
    <link rel='stylesheet' href='estilos\cadastro.css'>
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
      <li style="float: right;"><a href="add_livro.php">Adicionar</a></li>
    </ul>
  </header>
   
  <div class="fundo-maior">

  <div id='fundo'>
      <table border='1'>
        <thead>
          <th>ISBN</th>
          <th>QUANTIDADE</th>
          <th>TÍTULO</th>
          <th>DESCRIÇÃO</th>
          <th>CATEGORIA</th>
          <th>AUTOR</th>
          <th>EDITORA</th>
          <th>IMAGEM</th>
          <th>Alterar</th>
        </thead>
        <tbody class='desc'>
          <?php
            include 'config.php';
            $sql = 'SELECT rowid, * FROM livros';
            $livros = $db->query($sql);
            while($row = $livros->fetchArray()){
              echo "<tr class='table-row'>
                <td>{$row['isbn']}</td>
                <td>{$row['quantidade']}</td>
                <td>{$row['titulo']}</td>
                <td class= 'table-scroll'>{$row['descricao']}</td>
                <td>{$row['categoria']}</td>
                <td>{$row['autor']}</td>
                <td>{$row['editora']}</td>
                <td class= 'table-scroll'>{$row['imagem']}</td>
                <td class='botoes-alterar'>
                  <a class='botao botao-editar' href='editar_cadastro.php?id=".$row['isbn']."'>Editar</a>
                  <a class='botao botao-excluir' href='excluir_cadastro.php?id={$row['isbn']}'>Excluir</a>
                </td>
              </tr>";
            }
          ?>
        </tbody>
      </table>
    </div>



  </div>
   
  </body>
</html>