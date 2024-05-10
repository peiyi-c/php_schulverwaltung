<?php
// connect to database
include "./data/connect.php";
$db = connect();

// message alert status
$alert = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schulverwaltung - Operationzentum</title>
  <!-- css -->
  <link rel="stylesheet" href="./style.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="my-5 container-fluid bg-light-subtle ">
  <main class="">
    <h1 class="my-5 text-center ">Schulverwaltung - Hinzufügen</h1>
    <div class="card text-center">
      <div class="card-header">
        <div class="d-flex w-100 justify-content-start">
          <!-- back to index.php -->
          <button class="btn btn-primary "> <a href="./index.php" class=" text-decoration-none text-light">Zurück</a></button>
        </div>
      </div>
      <div class="card-body">
        <?php
        // add schueler 
        if (isset($_POST["insert-schueler"])) {
          $vorname = $_POST["schueler-vorname"];
          $nachname = $_POST["schueler-nachname"];
          $email = $_POST["schueler-email"];
          $geburtsdatum = $_POST["schueler-geburtsdatum"];
          $klasse = $_POST["schueler-klasse"];

          if (!$vorname || !$nachname || !$geburtsdatum || !$klasse) {
            echo '<div class="alert alert-info w-75 mx-auto" role="alert">Bitte alle Pflichtfelder eingeben!</div>';
            return;
          }
          try {
            $query = "INSERT INTO schueler VALUES (?,?,?,?,?,?)";
            $statement = $db->prepare($query);
            $statement->execute([0, $vorname, $nachname, $email, $geburtsdatum, $klasse]);
            $alert = 'success';
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
            $alert = 'warning';
          };
        }

        // alert message
        switch ($alert) {
          case 'success':
            echo '<div class="alert alert-success w-75 mx-auto" role="alert">' .
              $vorname . ' ' . $nachname . ' in die Klasse ' . $klasse  . ' Hinzugefügt!</div>';
            break;
          case 'warning':
            echo '<div class="alert alert-warning w-75 mx-auto" role="alert">Fehlgeschlagen...</div>';
            break;
          default:
            echo '<div class="alert alert-info w-75 mx-auto" role="alert">Nichts zu bearbeiten</div>';
        }
        ?>

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
$db = null; ?>