<?php
// connect to database
include "./data/connect.php";
$db = connect();

function addWildSearch(&$field)
{
  if ($field) {
    $field = $field . "%";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schulverwaltung - Suchen</title>
  <!-- css -->
  <link rel="stylesheet" href="./style.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="my-5 container-fluid bg-light-subtle ">
  <main class="">
    <h1 class="my-5 text-center ">Schulverwaltung - Suchergebnis</h1>
    <div class="card text-center">
      <div class="card-header">
        <div class="d-flex w-100 justify-content-start">
          <!-- back to index.php -->
          <button class="btn btn-primary"> <a href="./index.php" class=" text-decoration-none text-white-50">Zurück</a></button>
        </div>
      </div>
      <div class="card-body w-75 mx-auto">
        <!-- search schüler result -->
        <?php
        if (isset($_POST["search-schueler"])) {

          $vorname = $_POST["schueler-vorname-search"];
          $nachname = $_POST["schueler-nachname-search"];
          $age = $_POST["schueler-geburtsdatum-search"];
          $klasse = $_POST["schueler-klasse-search"];

          // if no data entered at all
          if (!$vorname && !$nachname && !$age && !$klasse) {
            echo '<div class="alert alert-info w-75 mx-auto" role="alert">Bitte mindestens ein Feld ausfüllen!</div>';
            return;
          } else {
            addWildSearch($vorname);
            addWildSearch($nachname);
          }

          try {
            $searchIdx = ['vorname', 'nachname', 'age', 'klasse'];
            $searchInfo = array($vorname, $nachname, $age, $klasse);
            $searchQuery = ['(Vorname LIKE :vorname)', '(Nachname LIKE :nachname)', '(ADDDATE(Geburtsdatum, INTERVAL :age YEAR) < CURRENT_DATE())', '(Klasse LIKE :klasse)'];

            $searchExe = [];
            $query = "SELECT * FROM schueler WHERE ";

            foreach (array_values($searchInfo) as $i => $search) {
              if ($search) {
                $query .= $searchQuery[$i] . ' OR ';
                $searchExe[$searchIdx[$i]] = $searchInfo[$i];
              }
            }
            // remove redundant 'OR '
            $query = substr($query, 0, -3);

            $statement = $db->prepare($query);
            $statement->execute($searchExe);
            $schuelers = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($schuelers) {
              echo
              "<h3>Schüler</h3><table class='table mb-5'>
            <tr>
              <th>Vorname</th>
              <th>Nachname</th>
              <th>E-Mail</th>
              <th>Geburtsdatum</th>
              <th>Klasse</th>
            </tr>";
              foreach ($schuelers as $result) {
                echo "<tr><td>" . $result['Vorname'] . "</td><td>" . $result['Nachname'] . "</td><td>" . $result['E-Mail'] . "</td><td>" . $result['Geburtsdatum'] . "</td><td>" . $result['Klasse'] . '</td></tr>';
              }
              echo "</table>";
            } else {
              echo "<span>Keinen Schüler gefunden</span>";
            }
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
          };
        }
        ?>
        <!-- search lehrer result -->
        <?php
        if (isset($_POST["search-lehrer"])) {
          $vorname = $_POST["lehrer-vorname-search"];
          $nachname = $_POST["lehrer-nachname-search"];
          // if no data entered at all
          if (!$vorname && !$nachname) {
            echo '<div class="alert alert-info w-75 mx-auto" role="alert">Bitte mindestens ein Feld ausfüllen!</div>';
            return;
          } else {
            addWildSearch($vorname);
            addWildSearch($nachname);
          }

          try {
            $searchIdx = ['vorname', 'nachname'];
            $searchInfo = array($vorname, $nachname);
            $searchQuery = ['(Vorname LIKE :vorname)', '(Nachname LIKE :nachname)'];

            $searchExe = [];
            $query = "SELECT * FROM lehrer LEFT JOIN kurs ON kurs.Lehrer_ID = lehrer.Lehrer_ID WHERE ";

            foreach (array_values($searchInfo) as $i => $search) {
              if ($search) {
                $query .= $searchQuery[$i] . ' OR ';
                $searchExe[$searchIdx[$i]] = $searchInfo[$i];
              }
            }
            // remove redundant 'OR '
            $query = substr($query, 0, -3);

            $statement = $db->prepare($query);
            $statement->execute($searchExe);
            $lehrers = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($lehrers) {
              echo
              "<h3>Lehrer</h3><table class='table mb-5'>
            <tr>
              <th>Vorname</th>
              <th>Nachname</th>
              <th>E-Mail</th>
              <th>Kurstitel</th>
            </tr>";
              foreach ($lehrers as $result) {
                echo "<tr><td>" . $result['Vorname'] . "</td><td>" . $result['Nachname'] . "</td><td>" . $result['E-Mail'] . "</td><td>" . $result['Titel'] . '</td></tr>';
              }
              echo "</table>";
            } else {
              echo "<span>Keinen Lehrer gefunden</span>";
            }
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
          };
        }
        ?>
        <!-- search kurs result -->
        <?php
        if (isset($_POST["search-kurs"])) {

          $kurstitle = $_POST["kurs-title-search"];
          $kurssemester = $_POST["kurs-semester-search"];
          $kurslehrervorname = $_POST["kurs-lehrervorname-search"];
          $kurslehrernachname = $_POST["kurs-lehrernachname-search"];

          // if no data entered at all
          if (!$kurstitle && !$kurssemester && !$kurslehrervorname && !$kurslehrernachname) {
            echo '<div class="alert alert-info w-75 mx-auto" role="alert">Bitte mindestens ein Feld ausfüllen!</div>';
            return;
          } else {
            addWildSearch($kurstitle);
            addWildSearch($kurssemester);
            addWildSearch($kurslehrervorname);
            addWildSearch($kurslehrernachname);
          }

          try {
            $searchIdx = ['kurstitle', 'kurslehrervorname', 'kurslehrernachname', 'kurssemester'];
            $searchInfo = array($kurstitle, $kurslehrervorname, $kurslehrernachname, $kurssemester);
            $searchQuery = ['(Titel LIKE :kurstitle)', '(Vorname LIKE :kurslehrervorname)', '(Nachname LIKE :kurslehrernachname)', '(Semester LIKE :kurssemester)'];

            $searchExe = [];
            $query = "SELECT Titel, Vorname, Nachname, Semester, Kategorie FROM kurs LEFT JOIN lehrer ON kurs.Lehrer_ID = lehrer.Lehrer_ID WHERE ";

            foreach (array_values($searchInfo) as $i => $search) {
              if ($search) {
                $query .= $searchQuery[$i] . ' OR ';
                $searchExe[$searchIdx[$i]] = $searchInfo[$i];
              }
            }
            // remove redundant 'OR '
            $query = substr($query, 0, -3);

            $statement = $db->prepare($query);
            $statement->execute($searchExe);
            $kurs = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($kurs) {
              echo
              "<h3>Kurs</h3><table class='table mb-5'>
            <tr>
              <th>Titel</th>
              <th>Lehrer</th>
              <th>Semester</th>
              <th>Kategorie</th>
            </tr>";
              foreach ($kurs as $result) {
                echo "<tr><td>" . $result['Titel'] . "</td><td>" . $result['Vorname'] . ' ' . $result['Nachname'] . "</td><td>" . $result['Semester'] . "</td><td>" . $result['Kategorie'] . '</td></tr>';
              }
              echo "</table>";
            } else {
              echo "<span>Keinen Kurs gefunden</span>";
            }
          } catch (PDOException $e) {
            die("Operation fehlgeschlagen: " . $e->getMessage());
          };
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