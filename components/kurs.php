<section id="kurs" class="d-none container-fluid">
  <h4 class="card-title">Kursübersicht</h4>
  <?php
  $statement = $db->query("SELECT kurs.Kurs_ID, kurs.Titel, kurs.Semester, lehrer.Vorname, lehrer.Nachname, kurs.Kategorie FROM kurs RIGHT JOIN lehrer ON kurs.Lehrer_ID = lehrer.Lehrer_ID ORDER BY kurs.Titel");
  $kurs = $statement->fetchAll(PDO::FETCH_ASSOC);

  if ($kurs) {
    echo "<table class='table table-sm table-striped'>
            <tr>
              <th>Kurs ID</th>
              <th>Titel</th>
              <th>Semester</th>
              <th>Lehrer</th>
              <th>Kategorie</th>
            </tr>";
    foreach ($kurs as $result) {
      echo "<tr><td>" . $result['Kurs_ID'] . "</td><td>" . $result['Titel'] . "</td><td>" . $result['Semester'] . "</td><td>" . $result['Vorname'] . " " . $result['Nachname'] . "</td><td>" . $result['Kategorie'] . '</td></tr>';
    }
    echo "</table>";
  } else {
    echo "<span>Keinen Kurs gefunden</span>";
  } ?>
</section>