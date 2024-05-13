<section id="kurs" class="d-none container-fluid">
  <div class="">
    <h4 class="card-title">Kursübersicht</h4>
    <?php
    $statement = $db->query("SELECT * FROM kurs ORDER BY Kurs_ID");
    $kurs = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($kurs) {
      echo "<table class='table table-sm table-striped'>
            <tr>
              <th>Kurs ID</th>
              <th>Titel</th>
              <th>Semester</th>
              <th>Kategorie</th>
            </tr>";
      foreach ($kurs as $result) {
        echo "<tr><td>" . $result['Kurs_ID'] . "</td><td>" . $result['Titel'] . "</td><td>" . $result['Semester'] . "</td><td>" . $result['Kategorie'] . '</td></tr>';
      }
      echo "</table>";
    } else {
      echo "<span>Keinen Kurs gefunden</span>";
    } ?>
  </div>

  <div class="mt-5">
    <h4 class="card-title">Kurs & Lehrer</h4>
    <?php
    $statement = $db->query("SELECT kurs.Kurs_ID, kurs.Titel, kurs.Semester, lehrer.Vorname, lehrer.Nachname, kurs.Kategorie FROM kurs LEFT JOIN lehrer ON kurs.Lehrer_ID = lehrer.Lehrer_ID ORDER BY Kurs_ID, Titel");
    $kurs = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($kurs) {
      echo "<table class='table table-sm table container-sm '>
            <tr>
              <th>Kurs ID</th>
              <th>Titel</th>
              <th>Semester</th>
              <th>Lehrer</th>
           
            </tr>";
      foreach ($kurs as $result) {
        echo "<tr><td>" . $result['Kurs_ID'] . "</td><td>" . $result['Titel'] . "</td><td>" . $result['Semester'] . "</td><td>" . $result['Vorname'] . " " . $result['Nachname'] . "</td><td>" . '</td></tr>';
      }
      echo "</table>";
    } else {
      echo "<span>Keinen Kurs gefunden</span>";
    } ?>
  </div>

</section>