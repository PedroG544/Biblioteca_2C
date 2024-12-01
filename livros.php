<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="estilos\livros.css">
    <link rel='stylesheet' href='estilos\navbar.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">

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
    <div class="azul">
        <div class="vermelha">
            <div class="amarelo1">
              <p>Desenvolvimento de Sistemas</p>  
            </div>
            <div class="amarelo2">
              <?php
                include 'config.php';
                $sql = 'SELECT rowid, * FROM livros WHERE categoria = "Desenvolvimento de Sistemas"';
                $query = $db->query($sql);
                while($row = $query->fetchArray()){
                  echo "
                    <a href='livro.php?id=".$row['isbn']."' class='roxo'>
                      <img src='{$row["imagem"]}' alt='Capa do livro'>
                    </a>
                    
                    ";
                }
              ?>
              
            </div>
        </div>
        <div class="vermelha">
          <div class="amarelo1">
              <p>Ciência de Dados</p>

          </div>
            <div class="amarelo2">
                <?php
                  include 'config.php';
                  $sql = 'SELECT rowid, * FROM livros WHERE categoria = "Ciência de Dados"';
                  $query = $db->query($sql);
                  while($row = $query->fetchArray()){
                    echo "
                      <a href='livro.php?id=".$row['isbn']."' class='roxo'>
                        <img src='{$row["imagem"]}' alt='Capa do livro'>
                      </a>
                      ";
                  }
                ?>
            </div>
            <div class="amarelo1">
                <p>Carreiras</p>
                
            </div>
              <div class="amarelo2">
                  <?php
                    include 'config.php';
                    $sql = 'SELECT rowid, * FROM livros WHERE categoria = "Carreiras"';
                    $query = $db->query($sql);
                    while($row = $query->fetchArray()){
                      echo "
                        <a href='livro.php?id=".$row['isbn']."' class='roxo'>
                          <img src='{$row["imagem"]}' alt='Capa do livro'>
                        </a>
                        ";
                    }
                  ?>
                
              </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
      <script type="text/javascript">
        $('.amarelo2').slick({
          infinite: false,
          slidesToShow: 5,
          slidesToScroll: 3,
          variableWidth: true,
          infinite: true,
          nextArrow: '<img src="imagens/next_btn.png" class="next">',
          prevArrow: '<img src="imagens/prev_btn.png" class="prev">'
        });


      </script>
</body>
</html>