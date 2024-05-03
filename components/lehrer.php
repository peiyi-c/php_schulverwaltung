  <section id="lehrer" class="d-none">
    <h4 class="card-title">Lehrer</h4>
    <?php
    $statement = $db->query("SELECT Vorname, Nachname, `E-Mail`, Geburtsdatum FROM lehrer");
    $schueler = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($schueler) {
      echo "<table class='table table-striped'>
            <tr>
              <th>Vorname</th>
              <th>Nachname</th>
              <th>E-Mail</th>
              <th>Geburtsdatum</th>
            
            </tr>";
      foreach ($schueler as $result) {
        echo "<tr><td>" . $result['Vorname'] . "</td><td>" . $result['Nachname'] . "</td><td>" . $result['E-Mail'] . "</td><td>" . $result['Geburtsdatum'] . '</td></tr>';
      }
      echo "</table>";
    } else {
      echo "<span>Keinen Lehrer gefunden</span>";
    } ?>
  </section>