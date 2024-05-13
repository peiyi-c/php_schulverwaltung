<div class="accordion" id="accordion-kurs">

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-kurs-1">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-kurs-1" aria-expanded="false" aria-controls="collapse-kurs-1">
        Suchen
      </button>
    </h2>
    <div id="collapse-kurs-1" class="accordion-collapse collapse" aria-labelledby="heading-kurs-1" data-bs-parent="#accordion-kurs">
      <div class="accordion-body">
        <!-- search kurs -->
        <form class="w-100 row" method="post" action="./search.php">
          <p class="mb-3 text-start text-secondary">Suchen nach...</p>

          <div class="col-12 mb-3 row gap-2 align-items-center ">
            <p class="col-12 col-sm-2 col-md-1 mb-0 text-start text-secondary d-flexalign-items-center">Kurs</p>
            <div class="col-12 col-md-5 d-flex gap-2 align-items-center">
              <label for="kurs-title-search align-items-center">Titel</label>
              <input type="text" class="form-control form-control-sm " id="kurs-title-search" name="kurs-title-search">
            </div>
            <div class="col-12 col-md-5 d-flex gap-2 align-items-center">
              <label for="kurs-semester-search">Semester</label>
              <input type="text" class="form-control form-control-sm" id="kurs-semester-search" name="kurs-semester-search">
            </div>
          </div>


          <div class="col-12 mb-3 row gap-2 align-items-center ">
            <p class="col-12 col-sm-2 col-md-1 mb-0 text-start text-secondary d-flexalign-items-center text-nowrap ">Lehrer</p>
            <div class="col-12 col-md-5 d-flex gap-2 align-items-center">
              <label for="kurs-lehrervorname-search">Vorname</label>
              <input type="text" class="form-control form-control-sm" id="kurs-lehrervorname-search" name="kurs-lehrervorname-search">
            </div>
            <div class="col-12 col-md-5 d-flex gap-2  align-items-center">
              <label for="kurs-lehrernachname-search">Nachname</label>
              <input type="text" class="form-control form-control-sm" id="kurs-lehrernachname-search" name="kurs-lehrernachname-search">
            </div>
          </div>


          <div class="w-100 d-flex justify-content-start ">
            <button type="submit" name="search-kurs" class="btn btn-sm btn-outline-primary me-2">Suchen</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-kurs-3">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-kurs-3" aria-expanded="false" aria-controls="collapse-kurs-3">
        Hinzufügen
      </button>
    </h2>
    <div id="collapse-kurs-3" class="accordion-collapse collapse" aria-labelledby="heading-kurs-3" data-bs-parent="#accordion-kurs">
      <div class="accordion-body">
        <!-- hünzufügen kurs form -->

      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-kurs-4">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-kurs-4" aria-expanded="false" aria-controls="collapse-kurs-4">
        Aktualisieren
      </button>
    </h2>
    <div id="collapse-kurs-4" class="accordion-collapse collapse" aria-labelledby="heading-kurs-4" data-bs-parent="#accordion-kurs">
      <div class="accordion-body">
        <!-- aktualisieren kurs form -->
        <form action="./update.php" method="post">
          <div class="row">
            <!-- Kurs -->
            <div class="col-8 col-lg-6 d-flex justify-content-start align-items-center gap-3">
              <?php
              $statement = $db->query("SELECT Kurs_ID ,Titel, kurs.Lehrer_ID, Vorname, Nachname FROM kurs LEFT JOIN lehrer ON kurs.Lehrer_ID = lehrer.Lehrer_ID ORDER BY Titel");
              $kurs = $statement->fetchAll(PDO::FETCH_ASSOC);
              if ($kurs) {
                echo "<label for='update-kurs-title' class='text-nowrap'>Kurs</label> 
                <select class='form-select' name='update-kurs-title' id='update-kurs-title'> 
                <option value='default'> --- </option>";
                foreach ($kurs as $result) {
                  $idKurs = $result['Kurs_ID'];
                  echo "<option value='$idKurs'>" . $result['Titel'] .  ' betreut von ' . $result['Vorname'] . ' ' . $result['Nachname'] . '</option>';
                }
                echo "</select>";
              } else {
                echo "<span>Kein Kurs vorhanden.</span>";
              } ?>
            </div>
            <!-- Lehrer -->
            <div class="col-8 col-lg-6 d-flex justify-content-start align-items-center gap-3 mt-2">
              <?php
              $statement = $db->query("SELECT * FROM lehrer");
              $lehrer = $statement->fetchAll(PDO::FETCH_ASSOC);
              if ($lehrer) {
                echo "<label for='update-kurs-lehrer' class='text-nowrap'>auf Lehrer</label> 
                <select class='form-select' name='update-kurs-lehrer' id='update-kurs-lehrer'> 
                <option value='default'> --- </option>";
                foreach ($lehrer as $result) {
                  $idLehrer = $result['Lehrer_ID'];
                  echo "<option value='$idLehrer'>" . $result['Vorname'] . ' ' . $result['Nachname'] . '</option>';
                }
                echo "</select>";
              } else {
                echo "<span>Kein Lehrer verfügbar.</span>";
              } ?>
            </div>
          </div>

          <div class="w-100 d-flex justify-content-start mt-2">
            <button type="submit" name="update-kurs" class="btn btn-sm btn-outline-primary me-2">Ändern</button>
          </div>

        </form>

      </div>
    </div>
  </div>


</div>