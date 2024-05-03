<section id="kurs" class="d-none">
  <h4 class="card-title">Kursübersicht</h4>
  <?php
  $statement = $db->query("SELECT kurs.Titel, kurs.Semester, lehrer.Vorname, lehrer.Nachname, kurs.Kategorie FROM kurs INNER JOIN lehrer ON kurs.Lehrer_ID = lehrer.Lehrer_ID");
  $schueler = $statement->fetchAll(PDO::FETCH_ASSOC);

  if ($schueler) {
    echo "<table class='table table-sm table-striped'>
            <tr>
              <th>Titel</th>
              <th>Semester</th>
              <th>Lehrer</th>
              <th>Kategorie</th>
            </tr>";
    foreach ($schueler as $result) {
      echo "<tr><td>" . $result['Titel'] . "</td><td>" . $result['Semester'] . "</td><td>" . $result['Vorname'] . " " . $result['Nachname'] . "</td><td>" . $result['Kategorie'] . '</td></tr>';
    }
    echo "</table>";
  } else {
    echo "<span>Keinen Kurs gefunden</span>";
  } ?>
</section>