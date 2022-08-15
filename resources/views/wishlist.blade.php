<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>






   
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Votre wishlist</span></h2>
    </div>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-20 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            
                            
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if ($wishlists!==null)
                            @foreach ($wishlists as $wishlist )
                                <tr>
                                    <td class="align-middle"><img src="{{asset('assets/img/product.jpg')}}" alt=""
                                            style="width: 50px;"><div>
                                                <a class="text-success" href="{{url('/ajouter-au-panier',[$wishlist->produit_id])}}" >Ajouter au Panier</a>
                                            </div></td>
                                    <td  class="align-middle">
                                         {{$wishlist->nom_produit }}
                                         
                                    </td>
                                    
                                    <td class="align-middle">{{ $wishlist->prix_produit }}<small>MAD</small></td>
                                    
                                       
                                        <td  class="align-middle">
                                            <form action="{{ url('/remove-from-wishlist' , ['id'=>$wishlist->id]   ) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                             <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 10px;">retirer </button>
                                            </form>
                                        </td>
                                       
                                    
                                     </tr>
                            @endforeach
                        @endif


                    </tbody>
                </table>
            </div>
            



</x-app-layout>
