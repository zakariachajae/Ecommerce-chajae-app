<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    

    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <br>
                <br>
                <h5 class="font-weight-bold mb-4">Catégories</h5>
                <div>
                    <a  href="{{url('/categorie/litterature')}}">litterature</a>
                    
                    <hr>
                </div>
                <div>
                    <a href="{{url('/categorie/jeunesse')}}">jeunesse</a>
                    
                    <hr>
                </div>
                <div>
                    <a href="{{url('/categorie/manuels scolaires')}}">manuels scolaires</a>
                    
                    <hr>
                </div>
                <div>
                    <a href="{{url('/categorie/fournitures scolaires')}}">fournitures scolaires</a>
                    
                    <hr>
                </div>
                <div>
                    <a href="{{url('/categorie/trousse')}}">trousse</a>
                    
                    <hr>
                </div>
                <div>
                    <a href="{{url('/categorie/accessoires')}}">accessoires</a>
                    
                    <hr>
                </div>
                <div>
                    <a href="{{url('/categorie/ecriture')}}">ecriture</a>
                    
                    <hr>
                </div>
                <div>
                    <a href="{{url('/categorie/cartable')}}">cartables et sacs a dos</a>
                    
                    <hr>
                </div>
                <div>
                    <a href="{{url('/categorie/soutien scolaire')}}">soutien scolaires</a>
                    
                    <hr>
                </div>
               
                

            </div>
        </div>
           
            <div class="col-lg-9 col-md-12">
                @if (count($rechercheProduits) ===0 ) 
                    <div class="alert alert-warning" role="alert">
                        cet article n'existe pas 
                      </div>
                @else
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            
                            
                        </div>
                    </div>
                   
                   
                    @foreach($rechercheProduits as $rechercheProduit)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{$rechercheProduit->image_file}}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$rechercheProduit->nom}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{$rechercheProduit->prix}}<small>MAD</small></h6>
                                    
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{url('/detail',['id'=>$rechercheProduit->id])}}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-warning mr-1"></i>Details</a>
                                <a href="{{url('/ajouter-wishlist',[$rechercheProduit->id])}}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-heart text-danger mr-1"></i>Favoris</a>
                                        <a href="{{url('/ajouter-au-panier',[$rechercheProduit->id])}}" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-success mr-1"></i>Panier</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                   
                </div>
                    
                  
                <div style="text-align: center">
                    {{$rechercheProduits->links()}}
                    </div>


</x-app-layout>
