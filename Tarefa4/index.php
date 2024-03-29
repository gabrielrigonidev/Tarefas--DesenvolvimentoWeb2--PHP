<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Sistema de Cadastro PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous">
    <link rel="stylesheet" href="index-style.css">
  </head>
  <body class="text-center">

  <?php
    session_start();

    if ($_POST) {
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      if ($email === 'usuario@email.com' && $senha === 'senha123') {
          $_SESSION['email'] = $email;
          $_SESSION['hora'] = time();
          if (ISSET($_POST['lembre-me'])) {
              setcookie('email', $email, time() + (86400), "/");
          }
          header('Location: cadastro.php');
          exit();
      }
  }    
    $email = '';
    if (ISSET($_COOKIE['email'])) {
        $email = $_COOKIE['email'];
    }
?>
    
    <main class="form-signin w-100 m-auto">
      <form method="POST">
        <img class="mb-4" src="img/caderno.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Faça o Login: </h1>

        <div class="form-floating">
          <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Digite o E-mail" value="<?php echo $email; ?>" required>
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder="Digite a Senha" required>
          <label for="floatingPassword">Senha</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input name="lembre-me" type="checkbox" value="remember-me"> Lembre-me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">
          &copy; Gabriel Rigoni Matins + José Carlos | Desenvolvimento de Software Multiplataforma - DSM 2 (2024)</p>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>