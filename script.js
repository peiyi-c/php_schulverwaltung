const navItems = document.querySelectorAll(".nav-item");
const navLinks = document.querySelectorAll(".nav-link");
const sections = document.querySelectorAll("section");
let show = "dashboard";

// handle nav click
navItems.forEach((navItem) => {
  const navLink = navItem.querySelector(".nav-link");

  navLink.addEventListener("click", handleNavClick);
});

// handle nav click
function handleNavClick() {
  // remove active class not clicked links
  navLinks.forEach((item) => {
    if (item !== this) {
      item.classList.remove("active");
    } else {
      // add active class to clicked link
      this.classList.add("active");
      // set show data type
      show = item.dataset.type;
      console.log("show:", show);
    }
  });
  checkSection();
}

// handle section display
function checkSection() {
  sections.forEach((section) => {
    if (show !== section.id) {
      section.classList.remove("d-block");
      section.classList.add("d-none");
    } else {
      section.classList.add("d-block");
      section.classList.remove("d-none");
    }
  });
}
