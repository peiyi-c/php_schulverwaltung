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
          <div class="w-100 d-flex justify-content-start gap-3">
            <div class="d-flex gap-2 mb-3">
              <label for="schueler-vorname justify-content-center" class="form-label">Vorname</label>
              <input type="text" class="form-control form-control-sm " id="schueler-vorname" name="schueler-vorname" required>
            </div>
            <div class="d-flex gap-2 mb-3">
              <label for="schueler-nachname justify-content-center" class="form-label">Nachname</label>
              <input type="text" class="form-control form-control-sm " id="schueler-nachname" name="schueler-nachname" required>
            </div>
          </div>
          <div class="w-75 d-flex gap-2 mb-3">
            <label for="schueler-email justify-content-center" class="form-label text-nowrap ">E-Mail</label>
            <input type="email" class="form-control form-control-sm " id="schueler-email" name="schueler-email">
          </div>
          <div class="w-50 d-flex gap-2 mb-3">
            <label for="schueler-geburtsdatum justify-content-center" class="form-label">Geburtsdatum</label>
            <input type="date" class="form-control form-control-sm" placeholder="YYYY-MM-DD" id="schueler-geburtsdatum" name="schueler-geburtsdatum">
          </div>

          <div class="w-25 d-flex gap-2 mb-3">
            <label for="schueler-klasse justify-content-center" class="form-label">Klasse</label>
            <input type="text" class="form-control form-control-sm" placeholder="A10" id="schueler-klasse" name="schueler-klasse" required>
          </div>
          <div class="w-100 d-flex justify-content-end ">
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
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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