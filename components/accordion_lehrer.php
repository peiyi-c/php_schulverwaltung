<div class="accordion" id="accordion-lehrer">

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-lehrer-1">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-lehrer-1" aria-expanded="false" aria-controls="collapse-lehrer-1">
        Suchen
      </button>
    </h2>
    <div id="collapse-lehrer-1" class="accordion-collapse collapse" aria-labelledby="heading-lehrer-1" data-bs-parent="#accordion-lehrer">
      <div class="accordion-body">
        <!-- search lehrer -->
        <form class="w-100" method="post" action="./search.php">
          <p class="mb-3 text-start text-secondary">Suchen nach...</p>
          <div class="w-100 row">
            <div class="col-12 col-md-6 col-lg-5 d-flex gap-2 mb-3 align-items-center">
              <label for="lehrer-vorname-search align-items-center">Vorname</label>
              <input type="text" class="form-control form-control-sm " id="lehrer-vorname-search" name="lehrer-vorname-search">
            </div>
            <div class="col-12 col-md-6 col-lg-5 d-flex gap-2 mb-3  align-items-center">
              <label for="lehrer-nachname-search">Nachname</label>
              <input type="text" class="form-control form-control-sm " id="lehrer-nachname-search" name="lehrer-nachname-search">
            </div>
          </div>
          <div class="w-100 d-flex justify-content-start ">
            <button type="submit" name="search-lehrer" class="btn btn-sm btn-outline-primary me-2">Suchen</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-lehrer-2">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-lehrer-2" aria-expanded="false" aria-controls="collapse-lehrer-2">
        Löschen
      </button>
    </h2>
    <div id="collapse-lehrer-2" class="accordion-collapse collapse" aria-labelledby="heading-lehrer-2" data-bs-parent="#accordion-lehrer">
      <div class="accordion-body row">
        <!-- delete lehrer form -->
        <form class="mb-3 col-11 col-md-" method="post" action="./delete.php">
          <div class="w-50 d-flex justify-content-start align-items-center gap-3">
            <?php
            $statement = $db->query("SELECT * FROM lehrer");
            $lehrer = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($lehrer) {
              echo "<label for='delete-lehrer-id'>Namen</label> 
              <select class='form-select' name='delete-lehrer-id' id='delete-lehrer-id'> 
              <option value='default'> --- </option>";
              foreach ($lehrer as $result) {
                $id = $result['Lehrer_ID'];
                echo "<option value='$id'>" . $result['Vorname'] . " " . $result['Nachname'] . '</option>';
              }
              echo "</select>";
            } else {
              echo "<span>Keine Namen gefunden..</span>";
            } ?>
          </div>
          <p class="w-100 mt-3 text-start text-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill mb-1" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
            </svg>
            Achtung: Wenn vorhanden, werden die Kurse von diesem Lehrer auch gelöscht!
          </p>
          <div class="w-100 mt-3 d-flex justify-content-start align-items-center ">
            <button type="submit" name='delete-lehrer' class="btn btn-sm btn-outline-primary">Löschen</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-lehrer-3">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-lehrer-3" aria-expanded="false" aria-controls="collapse-lehrer-3">
        Hinzufügen
      </button>
    </h2>
    <div id="collapse-lehrer-3" class="accordion-collapse collapse" aria-labelledby="heading-lehrer-3" data-bs-parent="#accordion-lehrer">
      <div class="accordion-body">
        <!-- add lehrer form -->
        <form class="w-100" method="post" action="./insert.php">
          <p class="mb-3 text-start text-secondary">Bitte füllen Sie die folgenden Daten aus</p>
          <div class="w-100 d-flex justify-content-start gap-3">
            <div class="d-flex gap-2 mb-3">
              <label for="lehrer-vorname align-items-center">Vorname</label>
              <input type="text" class="form-control form-control-sm " id="lehrer-vorname" name="lehrer-vorname" required>
            </div>
            <div class="d-flex gap-2 mb-3  align-items-center">
              <label for="lehrer-nachname">Nachname</label>
              <input type="text" class="form-control form-control-sm " id="lehrer-nachname" name="lehrer-nachname" required>
            </div>
            <div class="d-flex gap-2 mb-3 align-items-center">
              <label for="lehrer-geburtsdatum">Geburtsdatum</label>
              <input type="date" class="form-control form-control-sm" id="lehrer-geburtsdatum" name="lehrer-geburtsdatum">
            </div>
          </div>
          <div class="w-100 d-flex justify-content-start ">
            <button type="submit" name="insert-lehrer" class="btn btn-sm btn-outline-primary ">Hinzufügen</button>
          </div>

        </form>
      </div>
    </div>
  </div>



</div>