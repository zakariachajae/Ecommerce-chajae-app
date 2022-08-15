<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @php
  
@endphp

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Veuillez saisir vos informations personnelles</h4>
                    <form action="{{ url('/finaliser-commande') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>nom</label>
                                <input class="form-control" type="text" placeholder="votre nom" name="nom">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Prenom</label>
                                <input class="form-control" type="text" placeholder="votre prenom" name="prenom">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="exemple@email.com"
                                    name="email">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>numéro de telephone</label>
                                <input class="form-control" type="text" placeholder="+212" name="telephone">
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
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">sommaire de la commande</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">articles</h5>
                       
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                           
                                <div class="d-flex justify-content-between">
                                    <p>{{$quantities[$id]}}x {{ $details['name'] }}</p>
                                    <p>{{ $details['price'] }} <small>MAD</small></p>
                                </div>
                            @endforeach
                            <h5 class="font-weight-medium mb-3">methode de paiement </h5>
                            <div class="d-flex justify-content-between">
                                <p>{{ Session::get('paiement')['methode_de_paiement'] }}</p>

                            </div>
                        @endif
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ $total }}<small>MAD</small></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">

                    <div class="card-footer border-secondary bg-transparent">
                        <input type="submit" class="btn btn-lg btn-block btn-success font-weight-bold my-3 py-3"
                            value="finaliser la commande">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
