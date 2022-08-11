<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

     <!-- Shop Detail Start -->
     <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="img-fluid w-100" src="{{$produit->image_file}}" alt="">
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$produit->nom}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{$produit->prix}} <small>MAD</small></h3>
                <p class="mb-4">{{$produit->description}}</p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">genre : {{$produit->genre}}</p>
                </div>   
                <div class="d-flex align-items-center mb-4 pt-2">
                   
                    <a href="{{url('/ajouter-au-panier',[$produit->id])}}" class="btn btn-success btn-sm ">Ajouter au Panier</a>
                    
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                   
                  
                    <a href="{{url('/ajouter-wishlist',[$produit->id])}}" class="btn btn-warning btn-sm ">Ajouter au favoris</a>
                </div>
               
            </div>
        </div>
        <div class="row px-xl-auto">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    
                    
                </div>
                <div class="tab-content">
                    
                    
                    <div class="tab-pane fade show active" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">{{count($commentaires)}} avis pour " {{$produit->nom}} "</h4>
                                @foreach ($commentaires as $commentaire)
                                <div class="media mb-4">
                                    <img src={{asset('/assets/img/user.png')}} alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>{{$commentaire->nom_proprietaire}}<small> - <i>01 Jan 2045</i></small></h6>
                                        <p>{{$commentaire->contenu_commentaire}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Laisser un commentaire </h4>
                                
                                <div class="d-flex my-3">
                                    
                                </div>
                                <form action="{{url('/ajouter-commentaire', [$produit->id])}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="message">Votre commentaire / avis </label>
                                        <textarea name="commentaire" id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                   
                                    
                                    <div class="form-group mb-0">
                                        <input type="submit" value="soumettre" class="btn btn-secondary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
    
    <!-- Shop Detail End -->

</x-app-layout>