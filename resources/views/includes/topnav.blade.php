<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-secondary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Catégories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position- absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <div class="nav-item dropdown">
                      
                        
                    </div>
                    <a href="" class="nav-item nav-link">Tous les produits</a>
                    <a href="" class="nav-item nav-link">Litterature </a>
                    <a href="" class="nav-item nav-link">Livres etudiants </a>
                    <a href="" class="nav-item nav-link">Art & loisirs creatifs</a>
                    <a href="" class="nav-item nav-link">Fourniture & Papetrie</a>
                    <a href="" class="nav-item nav-link">Informatique & Bureautique</a>
                    <a href="" class="nav-item nav-link">accessoires </a>
                   
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1"></h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{url('/')}}" class="nav-item nav-link">Acceuil</a>
                        <a href="{{url('/boutique')}}" class="nav-item nav-link">Boutique</a>
                        <a href="detail.html" class="nav-item nav-link">Librairie</a>
                        <a href="detail.html" class="nav-item nav-link">Papeterie</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        @if (Auth::check())
                        
                        <a href="{{url('/logout')}}" class="nav-item nav-link">logout</a>
                        @else
                        <a href="{{url('/login')}}" class="nav-item nav-link">Login</a>
                        <a href="{{url('/register')}}" class="nav-item nav-link">Register</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
        
        
        
            
