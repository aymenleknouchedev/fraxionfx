<aside class="sidebar" id="sidebar">
    <div class="sidebar-user">
        <div class="avatar"><i class="fas fa-user"></i></div>
        <div class="name">{{ Auth::user()->name }}</div>
        <div class="email">{{ Auth::user()->email }}</div>
    </div>
    
    <ul class="sidebar-menu">
        <li>
            <a href="/dashboard" class="{{ request()->path() === 'dashboard' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-home"></i></span>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/profil" class="{{ request()->path() === 'profil' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-user-circle"></i></span>
                <span>Profile</span>
            </a>
        </li>
        <li>
            <a href="/network" class="{{ request()->path() === 'network' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-users"></i></span>
                <span>Network</span>
            </a>
        </li>
        <li>
            <a href="/connect" class="{{ request()->path() === 'connect' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-heart"></i></span>
                <span>Connect</span>
            </a>
        </li>
        <li>
            <a href="/skills" class="{{ request()->path() === 'skills' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-tag"></i></span>
                <span>Skills</span>
            </a>
        </li>
        <li>
            <a href="/projects" class="{{ request()->path() === 'projects' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-rocket"></i></span>
                <span>Portfolio</span>
            </a>
        </li>
        <li>
            <a href="/reviews" class="{{ request()->path() === 'reviews' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-star"></i></span>
                <span>Reviews</span>
            </a>
        </li>
        <li>
            <a href="/articles" class="{{ request()->path() === 'articles' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span>Articles</span>
            </a>
        </li>
        <li>
            <a href="/contacts" class="{{ request()->path() === 'contacts' ? 'active' : '' }}">
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <span>Contacts</span>
            </a>
        </li>
    </ul>
    
    <div class="sidebar-footer">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>
</aside>