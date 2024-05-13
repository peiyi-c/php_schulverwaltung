<?php
// connect to database
include "./data/connect.php";
$db = connect();

// message alert status
$alert = '';

function replaceUmlaut($string)
{
  if ($string) {
    $string = strtolower($string);
    $string = str_replace('ü', "ue", $string);
    $string = str_replace('ä', "ae", $string);
    $string = str_replace('ö', "oe", $string);
    $string = str_replace('ß', "ss", $string);
  }
  return $string;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schulverwaltung - Aktualisieren</title>
  <!-- css -->
  <link rel="stylesheet" href="./style.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="my-5 container-fluid bg-light-subtle ">
  <main class="">
    <h1 class="my-5 text-center ">Schulverwaltung - Ergebnis</h1>
    <div class="card text-center">
      <div class="card-header">
        <div class="d-flex w-100 justify-content-start">
          <!-- back to index.php -->
          <button class="btn btn-primary "> <a href="./index.php" class=" text-decoration-none text-light">Zurück</a></button>
        </div>
      </div>
      <div class="card-body">
        <!-- update kurs -->
        <?php
        if (isset($_POST["update-kurs"])) {

          $kursId = $_POST["update-kurs-title"];
          $lehrerId = $_POST["update-kurs-lehrer"];

          if ($kursId == 'default' || $lehrerId == 'default' || !$kursId || !$lehrerId) {
            echo '<div class="alert alert-info w-75 mx-auto" role="alert">Bitte beide Felder auswählen!</div>';
            return;
          }

          try {
            $query = "UPDATE kurs SET Lehrer_ID = :lehrerId WHERE Kurs_ID = :kursId";
            $statement = $db->prepare($query);
            $statement->execute(['lehrerId' => $lehrerId, 'kursId' => $kursId]);
            $alert = 'success';
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
            $alert = 'warning';
          };

          // alert message
          switch ($alert) {
            case 'success':
              echo '<div class="alert alert-success w-75 mx-auto" role="alert">' .
                'Lehrer ID ' . $lehrerId . ' betreut nun' . ' Kurs ID ' . $kursId . '!</div>';
              break;
            case 'warning':
              echo '<div class="alert alert-warning w-75 mx-auto" role="alert">Fehlgeschlagen...</div>';
              break;
            default:
              echo '<div class="alert alert-info w-75 mx-auto" role="alert">Nichts zu bearbeiten</div>';
          }
        }
        ?>

        <!-- update schueler email -->
        <?php
        if (isset($_POST["update-schueler"])) {

          $schuelerId = $_POST["update-schueler-id"];
          $newEmail = filter_var(replaceUmlaut($_POST["update-schueler-email"]), FILTER_SANITIZE_EMAIL);

          if ($schuelerId == 'default' || !$newEmail) {
            echo '<div class="alert alert-info w-75 mx-auto" role="alert">Bitte beide Felder ausfüllen!</div>';
            return;
          }

          try {
            $query = "UPDATE schueler SET `E-Mail` = :email WHERE Schüler_ID = :id";
            $statement = $db->prepare($query);
            $statement->execute(['email' => $newEmail, 'id' => $schuelerId]);
            $alert = 'success';
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
            $alert = 'warning';
          };

          // alert message
          switch ($alert) {
            case 'success':
              echo '<div class="alert alert-success w-75 mx-auto" role="alert">' .
                'Schüler ID ' . $schuelerId . ' hat nun die E-Mail ' . $newEmail . '!</div>';
              break;
            case 'warning':
              echo '<div class="alert alert-warning w-75 mx-auto" role="alert">Fehlgeschlagen...</div>';
              break;
            default:
              echo '<div class="alert alert-info w-75 mx-auto" role="alert">Nichts zu bearbeiten</div>';
          }
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