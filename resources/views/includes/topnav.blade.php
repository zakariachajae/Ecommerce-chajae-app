<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">

            <div class="btn shadow-none d-flex align-items-center justify-content-between bg-secondary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                @if(Auth::check()) 
                <h6 class="m-0 p">bienvenue : 
                    <span style="color: rgb(4, 151, 201)">
                  {{Auth::user()->name}}
                    </span>
                </h6>
                  @endif
                <i class="fa fa-user text-dark"></i>
            </div>
           
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-secondary font-weight-bold border px-3 mr-1"></h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Acceuil</a>
                        <a href="{{ url('/boutique') }}" class="nav-item nav-link">Librairie</a>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link">Papetrie</a>
                        <a href="" class="nav-item nav-link">Rentrée scolaire</a>

                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        @if (Auth::check())
                            <a href="{{ url('/logout') }}" class="nav-item nav-link">logout</a>
                        @else
                            <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                            <a href="{{ url('/register') }}" class="nav-item nav-link">Inscription</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
