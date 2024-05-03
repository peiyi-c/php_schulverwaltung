 <section id="schueler" class="d-none">
   <h4 class="card-title">Schüler</h5>
     <?php
      $statement = $db->query("SELECT Vorname, Nachname, `E-Mail`, Geburtsdatum, Klasse FROM schueler");
      $schueler = $statement->fetchAll(PDO::FETCH_ASSOC);

      if ($schueler) {
        echo "<table class='table table-striped'>
            <tr>
              <th>Vorname</th>
              <th>Nachname</th>
              <th>E-Mail</th>
              <th>Geburtsdatum</th>
              <th>Klasse</th>
            </tr>";
        foreach ($schueler as $result) {
          echo "<tr><td>" . $result['Vorname'] . "</td><td>" . $result['Nachname'] . "</td><td>" . $result['E-Mail'] . "</td><td>" . $result['Geburtsdatum'] . "</td><td>" . $result['Klasse'] . '</td></tr>';
        }
        echo "</table>";
      } else {
        echo "<span>Keinen Schüler gefunden</span>";
      } ?>
 </section>