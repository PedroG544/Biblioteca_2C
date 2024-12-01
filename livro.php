<?php
  include 'config.php';

  $sql = "SELECT rowid, * FROM livros WHERE rowid = '".$_GET['id']."'";
  $query = $db->query($sql);
  $row = $query->fetchArray();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <link rel="stylesheet" href="estilos\livro.css">
    <link rel='stylesheet' href='estilos\navbar.css'>
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
    <div class="fundo">
        <div class="vermelho">
            
            <?php
                include 'config.php';
                $sql = 'SELECT rowid, *, 
                       CASE WHEN quantidade > 0 THEN "Disponível" ELSE "Indisponível" END AS disponibilidade 
                FROM livros 
                WHERE rowid = "' . $_GET["id"] . '"';
                $query = $db->query($sql);
                while($row = $query->fetchArray()){
                    echo "
                        <div class='azul'>
                                <img src='{$row["imagem"]}'>
                        </div>
                        <div class='roxo'>
                            <div class='verde'>
                                <h1 class='titulo-descricao'>{$row['titulo']}</h1>
                                <p class='titulo-descricao'>{$row['descricao']}</p>
                            </div>
                        
                            <div class='rosa'>
                                <div class='amarelo'>
                                    <p>{$row['disponibilidade']}</p>
                                </div>
                                <div class='ciano'>
                                    <a class='botao' href='criar.php?id=".$row['isbn']."'>RESERVAR</a>
                                </div>
                            </div>       
                        </div>

                    ";
                  }
            ?>
        

        </div>
    </div>
    <script>
        function criar() {
            window.location.href = 'criar.php';
        }
    </script>
</body>
</html>