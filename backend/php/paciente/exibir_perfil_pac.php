<?php
session_start();
if (isset($_SESSION['tipo'])) {
  if ($_SESSION['tipo'] != "PAC") {
    header("location: login_pac.php");
  }
} else {
  header("location: login_pac.php");
}
include "../planos/pacientes.php";
$pacientes = mostraPerfil($_SESSION['CPF']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Consultas-Paciente</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="../../../frontend/css/index.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>

  <nav class="nav-extended">
    <div></div>
    <div class="nav-wrapper">
      <a href="./starter_pac.php" class="brand-logo"><img src="../../../frontend/img/logo.png" /></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./starter_pac.php">Inicio</a></li>
        <li><a href="./exibir_perfil_pac.php">Perfil</a></li>

        <li><a class="dropdown-trigger" href="#!" data-target="dropdown">Consultas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li>
          <a style="display: flex; flex-direction: row" href="../../../home.html">
            <i class="material-icons">exit_to_app</i>Logout</a>
        </li>
      </ul>
    </div>
    <ul id="dropdown" class="dropdown-content">
      <li><a href="./exibir_consultas_pac.php">Ver consulta</a></li>
      <li><a href="./exibir_exames_pac.php">Ver exame</a></li>
    </ul>
    <div class="nav-content">
      <span class="nav-title"></span>

    </div>
  </nav>
  <div class="content-wrapper ">
    <!-- Main content -->
    <section class="center ">

      <div class="box">
        <div class="box-header">
          <h5 class="center">Meus dados</h5>
        </div>
        <div class=" table-responsive">
          <table class="table-responsive striped highlight">
            <tr style="background-color: grey;">
              <th>Nome</th>
              <th>Idade</th>
              <th>Gênero</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>Endereço</th>
              <th>CEP</th>


            </tr>
            <?php
            foreach ($pacientes as $paciente) {
              echo
                "<tr>
    <td>" . $paciente['nome'] . "</td>
    <td>" . $paciente['idade'] . " anos" . "</td>
    <td>" . $paciente['genero'] . "</td>
    <td>" . $paciente['email'] . "</td>
    <td>" . $paciente['telefone'] . "</td>
    <td>" . $paciente['endNum'] . "</td>
    <td>" . $paciente['CEP'] . "</td>
    </tr>";
            }
            ?>

          </table>
        </div>
        <!-- /.box-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="../../js/buttonsEffect.js"></script>

</body>

</html>