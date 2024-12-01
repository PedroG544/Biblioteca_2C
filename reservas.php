<!DOCTYPE html>
<html>
<head>
  <title>Listar</title>
  <link rel='stylesheet' href='estilos/style.css'>
  <link rel='stylesheet' href='estilos/navbar.css'>
  <link rel="stylesheet" href="estilos/reservas.css">
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
<div id='fundo'>
  <table border='1'>
    <thead>
      <th>ID</th>
      <th>RA</th>
      <th>Nome</th>
      <th>Livro(s)</th>
      <th>Série</th>
      <th>Alterar</th>
    </thead>
    <tbody>
      <?php
        include 'config.php';
        $sql = 'SELECT rowid, * FROM reserva';
        $query = $db->query($sql);
        while($row = $query->fetchArray()){
          echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['ra']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['livro']}</td>
            <td>{$row['serie']}</td>
            <td>
              <a href='editar_reserva.php?id=".$row['id']."' class='botao botao-editar'>Editar</a>
              <a href='excluir_reserva.php?id=".$row['id']."' class='botao botao-excluir'>Excluir</a>
            </td>
          </tr>";
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
