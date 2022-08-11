
@include('includes.header')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height:50vh">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('nom')" placeholder="nom" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="mot de passe"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required  placeholder="confirmer mot de passe"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('deja inscris?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('sinscrire') }}
                </x-button>
            </div>
        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </x-auth-card>

