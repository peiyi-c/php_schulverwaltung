<div class="accordion" id="accordion-schueler">
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-schueler-1">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-schueler-1" aria-expanded="false" aria-controls="collapse-schueler-1">
        Suchen
      </button>
    </h2>
    <div id="collapse-schueler-1" class="accordion-collapse collapse" aria-labelledby="heading-schueler-1" data-bs-parent="#accordion-schueler">
      <div class="accordion-body">
        <!-- search schüler -->
        <form class="w-100" method="post" action="./search.php">
          <p class="mb-3 text-start text-secondary">Suchen nach...</p>
          <div class="w-100 d-flex justify-content-start gap-3">
            <div class="d-flex gap-2 mb-3 align-items-center">
              <label for="schueler-vorname-search align-items-center">Vorname</label>
              <input type="text" class="form-control form-control-sm " id="schueler-vorname-search" name="schueler-vorname-search">
            </div>
            <div class="d-flex gap-2 mb-3  align-items-center">
              <label for="schueler-nachname-search">Nachname</label>
              <input type="text" class="form-control form-control-sm " id="schueler-nachname-search" name="schueler-nachname-search">
            </div>
          </div>
          <div class="w-100 d-flex justify-content-start gap-3">
            <div class="w-25 d-flex gap-2 mb-3  align-items-center">
              <label for="schueler-geburtsdatum-search text-nowrap" class="text-nowrap">Ab Alter</label>
              <input type="number" class="form-control form-control-sm" id="schueler-geburtsdatum-search" name="schueler-geburtsdatum-search">
            </div>

            <div class="w-25 d-flex gap-2 mb-3  align-items-center">
              <label for="schueler-klasse-search">Klasse</label>
              <input type="text" class="form-control form-control-sm" id="schueler-klasse-search" name="schueler-klasse-search">
            </div>
          </div>
          <div class="w-100 d-flex justify-content-start ">
            <button type="submit" name="search-schueler" class="btn btn-sm btn-outline-primary me-2">Suchen</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-schueler-2">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-schueler-2" aria-expanded="false" aria-controls="collapse-schueler-2">
        Löschen
      </button>
    </h2>
    <div id="collapse-schueler-2" class="accordion-collapse collapse" aria-labelledby="heading-schueler-2" data-bs-parent="#accordion-schueler">
      <div class="accordion-body row">
        <!-- delete schüler form -->
        <form class="mb-3 col-11 col-md-6" method="post" action="./delete.php">
          <div class="w-100 d-flex justify-content-start align-items-center  gap-3">
            <?php
            $statement = $db->query("SELECT * FROM schueler");
            $schueler = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($schueler) {
              echo "<label for='delete-schueler-namen'>Namen</label> 
              <select class='form-select' name='delete-schueler-namen' id='delete-schueler-namen'> 
              <option value='default'> --- </option>";
              foreach ($schueler as $result) {
                $id = $result['Schüler_ID'];
                echo "<option value='$id'>" . $result['Vorname'] . " " . $result['Nachname'] . '</option>';
              }
              echo "</select>";
            } else {
              echo "<span>Keine Namen gefunden..</span>";
            } ?>
            <div class="me-auto">
              <button type="submit" name='delete-schueler' class="btn btn-sm btn-outline-primary ">Löschen</button>
            </div>
          </div>
        </form>
        <hr />
        <form class="mb-3 col-11 col-md-6" method="post" action="./delete.php">
          <div class="w-100 d-flex justify-content-start align-items-center  gap-3">
            <?php
            if ($schueler) {
              echo "<label for='delete-schueler-email' class='text-nowrap'>E-Mail</label><select class='form-select' name='delete-schueler-email' id='delete-schueler-email'> <option value='default'> --- </option>";
              foreach ($schueler as $result) {
                $id = $result['Schüler_ID'];
                echo "<option value='$id'>" . $result['E-Mail'] . '</option>';
              }
              echo "</select>";
            } else {
              echo "<span>Keine E-Mail gefunden..</span>";
            } ?>
            <div class="me-auto">
              <button type="submit" name='delete-schueler' class="btn btn-sm btn-outline-primary ">Löschen</button>
            </div>
          </div>
        </form>
        <hr />
        <form class="mb-3 col-11 col-md-6" method="post" action="./delete.php">
          <div class="w-100 d-flex justify-content-start align-items-center  gap-3">
            <?php
            $statement = $db->query("SELECT DISTINCT(Klasse) FROM `schueler` ORDER BY Klasse");
            $klasse = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($klasse) {
              echo "<label for='delete-schueler-klasse' class='text-nowrap'>Klasse</label><select class='form-select' name='delete-schueler-klasse' id='delete-schueler-klasse'> <option value='default'> --- </option>";
              foreach ($klasse as $result) {
                $id = $result['Klasse'];
                echo "<option value='$id'>" . $result['Klasse'] . '</option>';
              }
              echo "</select>";
            } else {
              echo "<span>Keine Klasse gefunden..</span>";
            } ?>
            <div class="me-auto">
              <button type="submit" name='delete-schueler' class="btn btn-sm btn-outline-primary ">Löschen</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-schueler-3">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#collapse-schueler-3" aria-controls="collapse-schueler-3">
        Hinzufügen
      </button>
    </h2>
    <div id="collapse-schueler-3" class="accordion-collapse collapse" aria-labelledby="heading-schueler-3" aria-expanded="false" data-bs-parent="#accordion-schueler">
      <div class="accordion-body">
        <!-- add schüler form -->
        <form class="w-100" method="post" action="./insert.php">
          <p class="mb-3 text-start text-secondary">Bitte füllen Sie die folgenden Daten aus</p>
          <div class="w-100 d-flex justify-content-start gap-3">
            <div class="d-flex gap-2 mb-3">
              <label for="schueler-vorname align-items-center">Vorname</label>
              <input type="text" class="form-control form-control-sm " id="schueler-vorname" name="schueler-vorname" required>
            </div>
            <div class="d-flex gap-2 mb-3  align-items-center">
              <label for="schueler-nachname">Nachname</label>
              <input type="text" class="form-control form-control-sm " id="schueler-nachname" name="schueler-nachname" required>
            </div>
          </div>
          <div class="w-75 d-flex gap-2 mb-3 align-items-center">
            <label for="schueler-email " class="text-nowrap  align-items-center">E-Mail</label>
            <input type="email" class="form-control form-control-sm " id="schueler-email" name="schueler-email">
          </div>
          <div class="w-75 d-flex gap-2 mb-3 align-items-center">
            <label for="schueler-geburtsdatum">Geburtsdatum</label>
            <input type="date" class="form-control form-control-sm" placeholder="YYYY-MM-DD" id="schueler-geburtsdatum" name="schueler-geburtsdatum">
          </div>

          <div class="w-25 d-flex gap-2 mb-3 align-items-center">
            <label for="schueler-klasse">Klasse</label>
            <input type="text" class="form-control form-control-sm" placeholder="A10" id="schueler-klasse" name="schueler-klasse" required>
          </div>
          <div class="w-100 d-flex justify-content-start ">
            <button type="submit" name="insert-schueler" class="btn btn-sm btn-outline-primary ">Hinzufügen</button>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>