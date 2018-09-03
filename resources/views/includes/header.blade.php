<header>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Navbar</a>
     <ul class="navbar-nav navbar-left">
      <li><a href="{{ route('account') }}">Account</a></li>
     </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ route('logout') }}">Logout</a></li>
      </ul>
  </nav>
</header>