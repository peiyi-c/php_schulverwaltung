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
            <p class="col-12 col-sm-2 col-md-1 mb-0 text-start text-secondary d-flexalign-items-center">Lehrer</p>
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
    <h2 class="accordion-header" id="heading-kurs-2">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-kurs-2" aria-expanded="false" aria-controls="collapse-kurs-2">
        Löschen
      </button>
    </h2>
    <div id="collapse-kurs-2" class="accordion-collapse collapse" aria-labelledby="heading-kurs-2" data-bs-parent="#accordion-kurs">
      <div class="accordion-body">
        <!-- delete kurs form -->

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



</div>