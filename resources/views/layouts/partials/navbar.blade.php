<nav class="navbar">
    <div class="navbar-left">
        <button class="navbar-menu-btn" id="mobileMenuToggle" title="Toggle Menu" aria-label="Toggle navigation menu">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="navbar-user">
        <div class="navbar-user-avatar">
            <i class="fas fa-user"></i>
        </div>
        <div class="navbar-user-info">
            <span class="name">{{ Auth::user()->name }}</span>
            <span class="email">{{ Auth::user()->email }}</span>
        </div>
    </div>
</nav>
