<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>






    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-20 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th></th>
                            <th>nom produit</th>
                            <th>genre</th>
                            <th>prix</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if ($wishlists!==null)
                            @foreach ($wishlists as $wishlist )
                                <tr>
                                    <td class="align-middle"><img src="{{asset('assets/img/product.jpg')}}" alt=""
                                            style="width: 50px;"></td>
                                    <td> {{$wishlist->nom_produit }}</td>
                                    <td class="align-middle">{{ $wishlist->genre_produit }}</td>
                                    <td class="align-middle">{{ $wishlist->prix_produit }}<small>MAD</small></td>
                                    
                                        <td>
                                            <a href="{{url('/ajouter-au-panier',[$wishlist->produit_id])}}" class="btn btn-success btn-sm ">Ajouter au Panier</a>
                                        </td>
                                        <td>
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
