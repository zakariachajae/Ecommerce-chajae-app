<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">impression</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="votre nom et prénom"
                                required="required" data-validation-required-message="veuillez renseigner votre nom " />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Votre Email"
                                required="required" data-validation-required-message="veuillez renseigner votre email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="veuillez renseigner votre messsage"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="file" class="form-control" id="file" 
                                required="required" multiple />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-success py-2 px-4" type="submit" id="sendMessageButton">Envoyer la demande</button>
                        </div>
                    
                </div>
                </form>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">demande d'impression</h5>
                <p>envoyer nous vos demandes d'impression et ils seront traités immediatemment </p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">LIBRAIRIE PAPETRIE CHAJAE</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-secondary mr-3"></i>MAGASIN N3 – ANGLE MANSOUR DAHBI RES MYRAMAR KENITRA, GHARB CHERARDA BENI HSSEN 14000 MOROCCO</p>
                    <p class="mb-2"><i class="fa fa-envelope text-secondary mr-3"></i>plchajae@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-secondary mr-3"></i>+212 0 537 394 246</p>
                
                </div> 
            </div>
        
    
    <!-- Contact End -->
</x-app-layout>