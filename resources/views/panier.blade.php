<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Votre panier</span></h2>
    </div>
    <form action="/checkout" method="GET">
        @csrf


        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    

                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                               <th>Produit</th>
                               <th>Prix</th>
                               <th>Quantité</th>
                              

                            </tr>
                        </thead>

                        <tbody class="align-middle">

                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <tr>
                                        <td class="align-middle"><img src="img/product-1.jpg" alt=""
                                                style="width: 50px;"> {{ $details['name'] }}<div>
                                                    <a class="text-danger" href="{{url('/remove-from-cart',['id' => $id])}}" >retirer</a>
                                                </div>
                                            </td>
                                        <td class="align-middle">{{ $details['price'] }}<small>MAD</small></td>
                                        <td class="align-middle">

                                            <input type="number"
                                                class="form-control form-control-sm bg-secondary text-center"
                                                value="{{ $details['quantity'] }}" name={{$id}}>
                                          


                                        </td>
                                        
                                        

                                        
                                    </tr>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">sommaire de la commande</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">articles :</h5>
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <div class="d-flex justify-content-between">
                                        <p> <i class="fa fa-shopping-cart"> </i> {{ $details['name'] }}</p>
                                        <p>{{ $details['price'] }} <small>MAD</small></p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">

                            </div>
                        </div>
                    </div>
                    @if (count(session('cart')) > 0)
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Paiement</h4>
                        </div>
                       
                        <div class="card-body">


                            <div class="form-group">
                                <div>
                                    <input type="radio" name="payment" value="paiement en comptoire">
                                    <label> paiement en comptoire </label>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif



                        </div>
                        
                            <div class="card-footer border-secondary bg-transparent">
                                <input type="submit"
                                    class="btn btn-lg btn-block btn-warning font-weight-bold my-3 py-3"
                                    value="passer la commande">
                            </div>
                        @endif

    </form>

    </div>
    </div>




</x-app-layout>
