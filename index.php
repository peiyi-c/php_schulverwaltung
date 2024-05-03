<?php
include "./data/connect.php";
$db = connect();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schulverwaltung</title>
  <!-- css -->
  <link rel="stylesheet" href="./style.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="my-5 container-fluid bg-light-subtle ">
  <main class="">
    <div class="card text-center">
      <div class="card-header">
        <!-- navitation -->
        <?php include "./components/navigation.php" ?>

      </div>
      <div class="card-body">
        <section id="dashboard">
          <h4 class="card-title my-5">Willkommen zur Schulverwaltungssystem!</h4>
        </section>
        <!-- sections -->
        <?php include "./components/lehrer.php" ?>
        <?php include "./components/schueler.php" ?>
        <?php include "./components/kurs.php" ?>

      </div>
    </div>

  </main>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- javascript -->
  <script src="./script.js"></script>
</body>

</html>

<?php
// close db connection
$db = null;
?>