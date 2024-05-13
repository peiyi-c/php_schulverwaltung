 <section id="schueler" class="d-none container-fluid">
   <h4 class="card-title">Schüler-Liste</h4>
   <?php
    $statement = $db->query("SELECT `Schüler_ID`, Vorname, Nachname, `E-Mail`, Geburtsdatum, Klasse FROM schueler");
    $schueler = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($schueler) {
      echo "<table class='table table-sm table-striped '>
            <tr>
              <th>Schüler ID</th>
              <th>Vorname</th>
              <th>Nachname</th>
              <th>E-Mail</th>
              <th>Geburtsdatum</th>
              <th>Klasse</th>
            </tr>";
      foreach ($schueler as $result) {
        echo "<tr><td>" . $result['Schüler_ID'] . "</td><td>" . $result['Vorname'] . "</td><td>" . $result['Nachname'] . "</td><td>" . $result['E-Mail'] . "</td><td>" . $result['Geburtsdatum'] . "</td><td>" . $result['Klasse'] . '</td></tr>';
      }
      echo "</table>";
    } else {
      echo "<span>Keinen Schüler gefunden</span>";
    } ?>
 </section>