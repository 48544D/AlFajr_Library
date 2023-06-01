@extends('index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/commande.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="right">
            <form  method="POST" action="{{ route('commande.store') }}">
                @csrf
                <h1>INFORMATIONS PERSONNELLES</h1>
                <div class="form">
                    <div class="form-field">
                        <label for="nom">Nom*</label>
                        <input type="text" name="nom" placeholder="(obligatoire)" required>
                        @error('nom')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-field">
                        <label for="tele">Prenom*</label>
                        <input type="text" name="prenom" placeholder="(obligatoire)" required>
                        @error('prenom')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-field">
                        <label for="tele">Telephone*</label>
                        <input type="tel" name="tele" placeholder="06XXXXXXXX" pattern="0[5-7][0-9]{8}" required>
                        @error('tele')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-field">
                        <label for="email">Email*</label>
                        <input type="email" name="email" placeholder="(obligatoire)" required>
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="checkbox" id="checkbox" required>
                    <label for="checkbox">Jaccepte que je vais récupére ma commande au délais de 48h</label>
                </div>
                @error('checkbox')
                    <span class="text-danger align-self-end" role="alert">
                        <strong>vous devez accepter ces termes</strong>
                    </span>
                @enderror
                <input type="submit" value="valider">
            </form>
        </div>
        <div class="left">
            <div class="cart-checkout">
                <h3>Panier</h3>
                <div class="cart-summary">
                    <p>Quantité Totale: <span> {{ $totalQuantity }} </span></p>
                    <p>Prix Total: <span>{{ $totalPrice }} DH</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection