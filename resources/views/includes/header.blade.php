<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Librairie papetrie chajae </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    
                    
                </div>
            </div>

            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="https://web.facebook.com/LIBRAIRIECHAJAE">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="https://www.linkedin.com/in/papeterie-librairie-chajae-a8b591169/">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="https://www.instagram.com/librairie_chajae/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    

                </div>

            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ url('/') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold text-center"><img class="img-fluid"
                            src="{{ asset('assets/img/5.png') }}" alt=Icon style="height: 150px; "> </h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{ url('/search') }}" method="POST">
                    @csrf
                    <div class="input-group">

                        <input type="text" class="form-control" name="name" placeholder="chercher un produit">

                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-secondary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">

                @if (Auth::check() && session('nbr_wishlist') !== null && session('nbr_wishlist') > 0)
                    <a href="{{ url('/wishlist') }}" class="btn border">
                        <i class="fas fa-heart text-warning"></i>
                        <span class="badge">
                            {{ session('nbr_wishlist') }}
                            @else
                                <a href="{{ url('/wishlist') }}" class="btn border">
                                    <i class="fas fa-heart text-secondary"></i>
                                    <span class="badge">
                                       
                                        0
                            @endif
                        </span>
                    </a>
                    @if (Auth::check() && session('cart') !== null && session('cart') > 0 )
                    <a href="{{ url('/panier') }}" class="btn border">
                        <i class="fas fa-shopping-cart text-success"></i>
                        <span class="badge">
                           
                                {{ count(session('cart')) }}
                            @else
                            <a href="{{ url('/panier') }}" class="btn border">
                                <i class="fas fa-shopping-cart text-secondary"></i>
                                <span class="badge">
                                0
                            @endif
                        </span>
                    </a>
            </div>
        </div>
    </div>
</body>
