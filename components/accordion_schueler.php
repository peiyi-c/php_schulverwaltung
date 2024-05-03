<div class="accordion" id="accordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-1">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
        Hinzufügen
      </button>
    </h2>
    <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordion">
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
          <div class="w-75 d-flex gap-2 mb-3  align-items-center">
            <label for="schueler-email " class="text-nowrap  align-items-center">E-Mail</label>
            <input type="email" class="form-control form-control-sm " id="schueler-email" name="schueler-email">
          </div>
          <div class="w-50 d-flex gap-2 mb-3  align-items-center">
            <label for="schueler-geburtsdatum">Geburtsdatum</label>
            <input type="date" class="form-control form-control-sm" placeholder="YYYY-MM-DD" id="schueler-geburtsdatum" name="schueler-geburtsdatum">
          </div>

          <div class="w-25 d-flex gap-2 mb-3  align-items-center">
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
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-2">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
        Löschen
      </button>
    </h2>
    <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordion">
      <div class="accordion-body">
        <!-- delete schüler form -->
        <form class="w-75 mb-3 " method="post" action="./delete.php">
          <div class="w-100 d-flex justify-content-start align-items-center  gap-3">
            <?php
            $statement = $db->query("SELECT * FROM schueler");
            $schueler = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($schueler) {
              echo "<label for='delete-schueler-namen'>Namen</label> <select class='form-select' name='delete-schueler-namen' id='delete-schueler-namen'> <option value='default'> --- </option>";
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
        <form class="w-75 mb-3 " method="post" action="./delete.php">
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
        <form class="w-50 mb-3 " method="post" action="./delete.php">
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
              echo "<span>Keine E-Mail gefunden..</span>";
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
    <h2 class="accordion-header" id="heading-3">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
        Suchen
      </button>
    </h2>
    <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordion">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>