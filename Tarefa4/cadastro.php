<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Sistema de Cadastro PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous">
    <link rel="stylesheet" href="cadastro-style.css">
  </head>
  <body>

  <?php
      session_start();
      //Destruir sessão após o tempo passar
      if (!ISSET($_SESSION['email']) || time() - $_SESSION['hora'] > 1800) {
          session_unset();
          session_destroy();
          header('Location: index.php');
          exit();
      }
      $_SESSION['hora'] = time();

      $path = 'anotacoes/';
      if ($_POST && ISSET($_POST['titulo'], $_POST['anotacao'])) {
        //          anotacoes/teste.txt
          $arquivo = $path . $_POST['titulo'].'.txt';
          $arquivo_aberto = fopen($arquivo, 'w');
          if (fwrite($arquivo_aberto, $_POST['anotacao']) === false) {
              die('Não foi possível escrever no arquivo');
          }
          fclose($arquivo_aberto);

      } else if (ISSET($_POST['delete'])) {
          $arquivo = $path.$_POST['delete'];
          if (file_exists($arquivo)) {
              unlink($arquivo);
          } else {
              echo "O arquivo $arquivo não existe.";
          }
      }
      $diretorio = dir($path);
  ?>
    
  <main>
    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Anotações</a>
        <p class="navbar-brand">Usuário logado: <?php echo $_SESSION['email']; ?></p>       
          <a href="logout.php">
              <button class="form-control" type="button">Sair</button>
          </a>
      </div>
    </nav>

    <div class="container py-4">
      <div class="row align-items-md-stretch">
        <div class="col-md-8">
          <div class="h-100 p-5 text-bg-light rounded-3">

          <?php 
          while ($arquivo = $diretorio->read()) {
              if (str_contains($arquivo, '.txt')) {
                $arquivo_aberto = fopen($path.$arquivo, 'r');       
                $anotacao = fread($arquivo_aberto, filesize($path . $arquivo)); 
                fclose($arquivo_aberto);

                echo '<div class="card-body">';
                echo '<h1 class="card-title pricing-card-title">'. $arquivo .'</h1>';
                echo '<p>'. $anotacao.'</p>';
                echo '<form method="post">';
                //anotacoes/delete
                echo '<input type="hidden" name="delete" value = "'. $arquivo .'">';
                echo '<button type="submit" class="w-100 btn btn-lg btn-outline-warning">Excluir</button>';
                echo '</form>';
                echo '<br>';
                echo '</div>';
              }
          } 
          $diretorio->close();
          ?>

        </div>
      </div>
      
      <div class="col-md-4">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Adicione suas anotações!</h2>
            <form method="post">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="titulo" placeholder="Digite o título" required>
                <label for="floatingInput">Título</label>
              </div>
              <br>
              <div class="form-floating">
                <textarea class="form-control" rows="4" cols="36" id="exampleFormControlTextarea1" name="anotacao" required></textarea>
                <label for="floatingInput">Anotação</label>
              </div>
              <br>
                <button name="botao" class="btn btn-outline-secondary" type="submit">Criar Anotação</button>
            </form>
        </div>
      </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; Gabriel Rigoni Matins + José Carlos | Desenvolvimento de Software Multiplataforma - DSM 2 (2024)
    </footer>
  </div>
</main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>    
</body>
</html>