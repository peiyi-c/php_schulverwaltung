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
      <div class="accordion-body">
        <!-- delete lehrer form -->

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
        <!-- hünzufügen lehrer form -->

      </div>
    </div>
  </div>



</div>