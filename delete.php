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
  <title>Schulverwaltung - Löschung</title>
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
        <!-- delete lehrer -->
        <?php
        if (isset($_POST["delete-lehrer"])) {
          if (($_POST['delete-lehrer-id'] == 'default')) {
            echo '<div class="alert alert-info w-75 mx-auto" role="alert">Kein Lehrer wurde gelöscht.</div>';
            return;
          } else {
            $lehrerId = $_POST["delete-lehrer-id"];
            try {
              $query1 = "DELETE FROM kurs WHERE Lehrer_ID = :lehrerId";
              $query2 = "DELETE FROM lehrer WHERE Lehrer_ID = :lehrerId";
              $statement = $db->prepare($query1);
              $statement->execute(['lehrerId' => $lehrerId]);
              $statement = $db->prepare($query2);
              $statement->execute(['lehrerId' => $lehrerId]);
              $alert = 'success';
            } catch (PDOException $e) {
              die("Operation fehlgeschlagen: " . $e->getMessage());
              $alert = 'warning';
            }
          }
        }

        ?>
        <!-- delete schüler -->
        <?php
        // if no data entered at all
        if (isset($_POST["delete-schueler"]) && ($_POST['delete-schueler-namen'] == 'default' || $_POST['delete-schueler-email'] == 'default' || $_POST['delete-schueler-klasse'] == 'default')) {
          echo '<div class="alert alert-info w-75 mx-auto" role="alert">Kein Schüler wurde gelöscht.</div>';
          return;
        }

        // delete schueler by names
        if (isset($_POST["delete-schueler"]) && $_POST['delete-schueler-namen'] !== 'default') {
          $schuelerIdByName = $_POST["delete-schueler-namen"];

          try {
            $query = "DELETE FROM schueler WHERE Schüler_ID = :id";
            $statement = $db->prepare($query);
            $statement->execute(['id' => $schuelerIdByName]);
            $alert = 'success';
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
            $alert = 'warning';
          };
        }

        // delete schueler by email
        if (isset($_POST["delete-schueler"]) && $_POST['delete-schueler-email'] !== 'default') {
          $schuelerIdByEmail = $_POST["delete-schueler-email"];

          try {
            $query = "DELETE FROM schueler WHERE Schüler_ID = :id";
            $statement = $db->prepare($query);
            $statement->execute(['id' => $schuelerIdByEmail]);
            $alert = 'success';
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
            $alert = 'warning';
          };
        }

        // delete schueler by klasse
        if (isset($_POST["delete-schueler"]) && $_POST['delete-schueler-klasse'] !== 'default') {
          $klasse = $_POST["delete-schueler-klasse"];
          try {
            $query = "DELETE FROM schueler WHERE Klasse = :klasse";
            $statement = $db->prepare($query);
            $statement->execute(['klasse' => $klasse]);
            $alert = 'success';
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
            $alert = 'warning';
          };
        }

        // ========================== alert message ============================ //

        if (isset($_POST["delete-schueler"])) {
          switch ($alert) {
            case 'success':
              echo '<div class="alert alert-success w-75 mx-auto" role="alert">';
              if ($klasse) {
                echo 'Klasse ' . $klasse;
              } elseif ($schuelerIdByEmail) {
                echo 'Schueler ID ' . $schuelerIdByEmail;
              } elseif ($schuelerIdByName) {
                echo 'Schueler ID ' . $schuelerIdByName;
              }
              echo ' wurde gelöscht!</div>';
              break;
            case 'warning':
              echo '<div class="alert alert-warning w-75 mx-auto" role="alert">Fehlgeschlagen...</div>';
              break;
            default:
              echo '<div class="alert alert-info w-75 mx-auto" role="alert">Nichts zu bearbeiten</div>';
          }
        }

        if (isset($_POST["delete-lehrer"])) {
          switch ($alert) {
            case 'success':
              echo '<div class="alert alert-success w-75 mx-auto" role="alert">';
              echo 'Lehrer ID ' . $lehrerId . ' wurde gelöscht!</div>';
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