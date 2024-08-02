<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <a href=""><img src="/images/main.png" alt="Logo"></a>
            <!-- Inicio -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('view.toca.index') }}" class="nav-link">INICIO</a>
                </li>
                <!-- Tocas -->
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                       class="nav-link dropdown-toggle">TOCAS</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="{{ route('view.toca.create') }}" class="dropdown-item">Registrar toca </a></li>
                    </ul>
                </li>
                <!-- Mesas -->
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                       class="nav-link dropdown-toggle">MESAS</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">MESA 1 </a></li>
                        <li><a href="#" class="dropdown-item">MESA 2 </a></li>
                        <li><a href="#" class="dropdown-item">MESA 3 </a></li>
                        <li><a href="#" class="dropdown-item">MESA 4 </a></li>
                        <li><a href="#" class="dropdown-item">MESA 5 </a></li>
                        <li><a href="#" class="dropdown-item">MESA 6 </a></li>
                        <li><a href="#" class="dropdown-item">MESA 7 </a></li>
                        <li><a href="#" class="dropdown-item">MESA 8 </a></li>
                        <li><a href="#" class="dropdown-item">MESA 9 </a></li>
                    </ul>
                </li>
                <!-- Amparos -->
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                       class="nav-link dropdown-toggle">AMPAROS</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="{{ route('view.amparos.directo') }}" class="dropdown-item">Directo </a></li>
                        <li><a href="{{ route('view.amparos.indirecto') }}" class="dropdown-item">Indirecto </a></li>
                    </ul>
                </li>
                <!-- Usuarios -->
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                       class="nav-link dropdown-toggle">USUARIOS</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="{{ route('register') }}" class="dropdown-item">Registrar usuario </a></li>
                    </ul>
                </li>      
            </ul>
        </div>
        <!-- Botón cerrar sesión -->
        <div class="order-6 ml-auto">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-success custom-btn-color">CERRAR SESIÓN</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </div>
     
    </div>
</nav>
