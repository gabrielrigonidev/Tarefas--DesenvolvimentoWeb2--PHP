<?php
include "Funcionario.php";

if(isset($_POST['btEnviar'])){
  $codigo = $_POST['txtCodigo'];
  $nome = $_POST['txtNome'];
  $valorHora = $_POST['vlHora'];
  $horasTrabalhadas = $_POST['qtHoras'];

  $f1 = new Funcionario($codigo, $nome, $valorHora, $horasTrabalhadas);
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Folha de Pagamento | Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
  </head>

  <body>

  <style>
    header{
      background-color: #F9AB4C;
      color: white;
    }
    form{
      background-color: #CDF2D1;
    }
    body{
      font-family: "Rubik", sans-serif;
      font-weight: 500;
      font-style: normal;
      background-image: url("bg.jpg");
      background-size: cover;
    }
  </style>

  <header class="p-3 ">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
  
        <ul class="nav col-lg-auto me-lg-auto justify-content-center mb-md-0">
          <li><h1>Folha de Pagamento | Funcionário</h1></li>
        </ul>

        <div class="text-end">
          <a href="index.php">
            <button type="button" name="sair" class="btn btn-danger">Sair</button>
          </a>
        </div>
      </div>
    </div>
  </header>

    <div class="container">
      <div class="row">
      
          <div class="col-md-8 justify-content-end">
            <form method="post" action="#" class=" container p-4 mt-5 rounded-2 " >
              <div class="mb-2 ">
                <label class="form-label">Código</label>
                <input type="text" class="form-control" name="txtCodigo" required>
              </div>
              <div class="mb-2 ">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="txtNome" required>
              </div>
              <div class="mb-2 ">
                <label class="form-label">Valor da Hora</label>
                <input type="number" step=".01" class="form-control" name="vlHora" required>
              </div>
              <div class="mb-2 ">
                <label class="form-label">Horas Trabalhadas</label>
                <input type="number"  class="form-control" name="qtHoras" required>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="mt-2 btn btn-primary" name="btEnviar">Calcular Salário</button>
              </div>
            </form>
          </div>

        <div class="col-md-4">
          <div class="container p-3 mt-5 rounded-2" style="background-color: #F9AB4C;" >
          <h3 class="text-center">Folha de Pagamento</h3>
          
          <?php if($_POST){  ?>
          <div class="container p-2 rounded-2"style="background-color: white;">
            <table class="table">
              <tbody>
                <tr>
                <th scope="row"><?php echo $f1->getCodigo();  ?></th>
                  <td><?php echo $f1->getNome();  ?></td>
                </tr>
                <tr>
                  <th scope="row">Valor da Hora</th>
                  <td>R$ <?php echo number_format($f1->getValorHora(), 2, ',', '.') ; ?></td>
                </tr>
                <tr>
                  <th scope="row">Horas Trabalhadas: </th>
                  <td><?php echo $f1->getHorasTrabalhadas()." horas"; ?></td>
                </tr>
                <tr>
                  <th scope="row">Salário Liquido: </th>
                  <td>R$ <?php echo number_format($f1->calcularSalario(), 2, ',', '.'); ?></td>
                </tr>
              </tbody>
            </table>
            <?php } ?>
          </div>
          </div>
        </div>
      
      </div>
      <div class="container">
          <br>
            <h6>Desenvolvido por: Gabriel Rigoni Martins + José Carlos</h6>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  </body>
</html>