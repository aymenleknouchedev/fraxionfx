// Dashboard layout interactions (sidebar + navbar)
document.addEventListener('DOMContentLoaded', () => {
  const mobileMenuToggle = document.getElementById('mobileMenuToggle');
  const closeMenuBtn = document.getElementById('closeMenuBtn');
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.querySelector('.main-content');

  // Guard: only run on pages that have the dashboard layout
  if (!mobileMenuToggle || !sidebar || !mainContent) return;

  const sidebarLinks = document.querySelectorAll('.sidebar-menu a, .sidebar-footer button');
  let sidebarCollapsed = false;

  // Load sidebar state from localStorage
  const savedState = localStorage.getItem('sidebarCollapsed');
  if (savedState !== null) {
    sidebarCollapsed = JSON.parse(savedState);
    applyCollapsedState(sidebarCollapsed);
  }

  // Toggle menu
  mobileMenuToggle.addEventListener('click', function (e) {
    e.stopPropagation();
    const isMobile = window.innerWidth <= 640;

    if (isMobile) {
      // Mobile: slide in/out
      sidebar.classList.toggle('active');
      mobileMenuToggle.classList.toggle('active');
      // Ensure desktop collapsed state does not interfere on mobile
      sidebar.classList.remove('collapsed');
      mainContent.classList.remove('collapsed');
    } else {
      // Desktop: collapse/expand
      sidebarCollapsed = !sidebarCollapsed;
      applyCollapsedState(sidebarCollapsed);
      localStorage.setItem('sidebarCollapsed', JSON.stringify(sidebarCollapsed));
    }
  });

  // Close menu with button (mobile only)
  if (closeMenuBtn) {
    closeMenuBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      closeSidebar();
    });
  }

  // Close menu when a link is clicked (mobile only)
  sidebarLinks.forEach((link) => {
    link.addEventListener('click', function () {
      if (window.innerWidth <= 640) {
        closeSidebar();
      }
    });
  });

  // Close menu with escape key (mobile)
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && sidebar.classList.contains('active')) {
      closeSidebar();
    }
  });

  // Function to close sidebar (mobile)
  function closeSidebar() {
    sidebar.classList.remove('active');
    mobileMenuToggle.classList.remove('active');
  }

  // Function to apply collapsed state
  function applyCollapsedState(collapsed) {
    if (collapsed) {
      sidebar.classList.add('collapsed');
      mainContent.classList.add('collapsed');
      mobileMenuToggle.classList.add('active');
    } else {
      sidebar.classList.remove('collapsed');
      mainContent.classList.remove('collapsed');
      mobileMenuToggle.classList.remove('active');
    }
  }

  // Prevent scrolling when menu is open (mobile)
  const html = document.documentElement;
  sidebar.addEventListener('transitionend', function () {
    if (window.innerWidth <= 640) {
      if (sidebar.classList.contains('active')) {
        html.style.overflow = 'hidden';
      } else {
        html.style.overflow = 'auto';
      }
    }
  });

  // Close menu when clicking outside (mobile)
  document.addEventListener('click', function (e) {
    if (window.innerWidth <= 640 && sidebar.classList.contains('active')) {
      if (!sidebar.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
        closeSidebar();
      }
    }
  });

  // Handle responsive behavior on window resize
  let resizeTimeout;
  window.addEventListener('resize', function () {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(function () {
      if (window.innerWidth > 640) {
        // Switch to desktop mode
        sidebar.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
        html.style.overflow = 'auto';
      } else {
        // On mobile, clear desktop collapsed state to avoid layout conflicts
        sidebar.classList.remove('collapsed');
        mainContent.classList.remove('collapsed');
      }
    }, 250);
  });
});
