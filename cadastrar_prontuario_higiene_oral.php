<?php
  include_once('connection.php');

  $paciente = $_POST['paciente'];
  $bochecho = $_POST['bochecho'];
  $creme_dental = $_POST['creme_dental'];
  $palito = $_POST['palito'];
  $higiene_lingua = $_POST['higiene_lingua'];
  $fio_dental = $_POST['fio_dental'];
  $observacao = $_POST['observacao'];

  $query = "insert into prontuario_higiene_oral (bochecho, creme_dental, palito, higiene_lingua, fio_dental, observacao)
  values
  ('{$bochecho}', '{$creme_dental}', '{$palito}', '{$higiene_lingua}', '{$fio_dental}', '{$observacao}')";

  $salvar_prontuario = mysqli_query($conn, $query);

  $inserted_id = mysqli_insert_id($conn);

  if (empty($inserted_id)) {
    ?>
      <script>
        alert('Houve um erro ao cadastrar!');
      </script>
    <?php
    header('Refresh: 0; prontuario_higiene_oral.php');
    return;
  }

  $query = "insert into paciente_prontuario_higiene_oral (fk_idUsuario, fk_idPaciente, fk_idHigieneOral)
  values
  (1, {$paciente}, {$inserted_id});";

  $salvar_relacao = mysqli_query($conn, $query);

  $inserted_id = mysqli_insert_id($conn);

  if (empty($inserted_id)) {
    ?>
      <script>
        alert('Houve um erro ao cadastrar!');
      </script>
    <?php
    header('Refresh: 0; prontuario_higiene_oral.php');
    return;
  }

  mysqli_close($conn);
?>

<script>
  alert('Prontuario de Higiene Oral Cadastrado!');
</script>

<?PHP
  header('Refresh: 0; prontuario_higiene_oral.php');
?>
