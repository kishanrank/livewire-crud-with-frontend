<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                @if (Auth::check())
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('favorites') }}">Favorites</a></li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
        </div>
        <a class="btn btn-ghost normal-case text-xl" href="{{ route('home') }}">Book App</a>
    </div>
    <div class="navbar-center hidden lg:flex">
    </div>
    <div class="navbar-end">
        <div class="hidden lg:flex">
            <ul class="menu menu-horizontal p-0">
                @if (Auth::check())
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('favorites') }}">Favorites</a></li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
        </div>
        @if (Auth::check())
            <a class="btn btn-sm" href="{{ route('logout') }}">Log Out</a>
        @endif
    </div>
</div>
