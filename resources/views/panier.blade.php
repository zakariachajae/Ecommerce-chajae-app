<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   
     
  


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if(session('cart'))
                            @foreach(session('cart') as $id =>$details)
                            
                           
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> {{$details['name']}}</td>
                            <td class="align-middle">{{$details['price']}}</td>
                            <td class="align-middle">
                                    
                                    <input type="number" class="form-control form-control-sm bg-secondary text-center" value="{{$details['quantity']}}">
                                    
                            
                            </td>
                            <td class="align-middle">{{ $details['price'] * $details['quantity'];}}<small>MAD</small></td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                        </tr>
                        @endforeach
                        @endif
                  
                        
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Sommaire Panier</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Sous-total</h6>
                            <h6 class="font-weight-medium">@foreach( session('cart') as $id =>$details) {{ $details['price']*$details['quantity'];}} @endforeach</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">livraison</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                        <button class="btn btn-block btn-success my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        
   

</x-app-layout>