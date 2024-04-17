
import './bootstrap';



document.addEventListener("DOMContentLoaded", function() {
    const navbarMenuBtn = document.querySelector('.navbar-menu-btn');
    const navbarMenuList = document.querySelector('.navbar-menu-list');

    navbarMenuBtn.addEventListener('click', function() {
      if (window.innerWidth >= 320 && window.innerWidth <= 767) {
        navbarMenuList.classList.toggle('active');
      }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
      const target = event.target;
      if (!target.closest('.navbar-menu')) {
        navbarMenuList.classList.remove('active');
      }
    });
  });

