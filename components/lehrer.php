  <section id="lehrer" class="d-none container-fluid">
    <div class="">
      <h4 class="card-title">Lehrer-Liste</h4>
      <?php
      $statement = $db->query("SELECT * FROM lehrer");
      $lehrer = $statement->fetchAll(PDO::FETCH_ASSOC);

      if ($lehrer) {
        echo "<table class='table table-sm table-striped'>
            <tr>
              <th>Lehrer ID</th>  
              <th>Vorname</th>
              <th>Nachname</th>
              <th>E-Mail</th>
              <th>Geburtsdatum</th>
            
            </tr>";
        foreach ($lehrer as $result) {
          echo "<tr><td>"  . $result['Lehrer_ID'] . "</td><td>" . $result['Vorname'] . "</td><td>" . $result['Nachname'] . "</td><td>" . $result['E-Mail'] . "</td><td>" . $result['Geburtsdatum'] . '</td></tr>';
        }
        echo "</table>";
      } else {
        echo "<span>Keinen Lehrer gefunden</span>";
      } ?>
    </div>
    <div class="mt-5">
      <h4 class="card-title">Lehrer & Kurse</h4>
      <?php
      $statement = $db->query("SELECT * FROM lehrer LEFT JOIN kurs ON lehrer.Lehrer_ID = kurs.Lehrer_ID ORDER BY Vorname");
      $lehrer = $statement->fetchAll(PDO::FETCH_ASSOC);

      if ($lehrer) {
        echo "<table class='table table-sm container-sm '>
            <tr>
              <th>Name</th>
              <th>Kurs</th>
              <th>Kategorie</th>
            </tr>";
        foreach ($lehrer as $result) {
          echo "<tr><td>"  . $result['Vorname'] .  ' ' .  $result['Nachname'] . "</td><td>" . $result['Titel'] . "</td><td>" . $result['Kategorie'] . '</td></tr>';
        }
        echo "</table>";
      } else {
        echo "<span>Keinen Lehrer gefunden</span>";
      } ?>
    </div>

  </section>