<nav class="navbar navbar-expand-lg bg-nav-custom fixed-top ">
    <div class="container-fluid">
        <!-- <div class="oa">
    <a class="navbar-brand" href=""></a></div> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nunito-text fs-5" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item nav-hover ">

                    <a class="nav-link nav-hover-text home-text-color " aria-current="page"
                        href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item nav-hover">
                    <a class="nav-link nav-hover-text" href="{{route('chiSiamo')}}">Chi siamo</a>
                </li>
                <li class="nav-item nav-hover">
                    <a class="nav-link nav-hover-text" href="{{route('servizi')}}">Servizi</a>
                </li>
                <li class="nav-item nav-hover">
                    <a class="nav-link nav-hover-text" href="{{route('prodotti')}}">Prodotti</a>
                </li>
                <li class="nav-item dropdown nav-hover">
                    <a class="nav-link dropdown-toggle nav-hover-text" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Altro
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-custom">
                        <li><a class="dropdown-item" href="{{route('promotions')}}">Promozioni</a></li>
                        @can('admin-access')
                        <li><a class="dropdown-item" href="{{route('settings')}}">Aggiungi promozioni</a></li>
                        @endcan
                        <li><a class="dropdown-item" href="{{route('ourBrand')}}">I nostri marchi</a></li>
                        <li><a class="dropdown-item" href="{{route('contattaci')}}">Contattaci</a></li>

                        @guest
                        <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                        <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        @endguest
                        @auth
                        <li><a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">logout</a>
                        </li>
                        <form id="form-logout" action="{{route('logout')}}" method="POST" class="d-none">@csrf</form>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>