document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});

window.onscroll = function() {
  fixHeader();
};

var navbar = document.getElementById("transparent-navbar");
var sticky = navbar.offsetTop;

function fixHeader() {
  if (window.scrollY > 0) {
    navbar.classList.add("sticky-header");
  } else {
    navbar.classList.remove("sticky-header");
  }
}

const $navbarDropdown = Array.prototype.slice.call(document.querySelectorAll('.navbar-item.has-dropdown .navbar-link'), 0);
if ($navbarDropdown.length > 0){
  $navbarDropdown.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('dropdown-open');
      $target.classList.toggle('dropdown-open');

    });
  });
}

lozad(".lozad", {
  load: function(el) {
    el.src = el.dataset.src;
    el.onload = function() {
      el.classList.add("fade");
    };
  }
}).observe();