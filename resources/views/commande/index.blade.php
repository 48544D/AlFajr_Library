<link rel="stylesheet" href="{{ asset('css/commande.css') }}">

@extends('index')

@section('content')
    <div class="container">
        <div class="right">
            <form action="{{ route('commande.store') }}">
                <h1>INFORMATIONS PERSONNELLES</h1>
                <div class="form">
                    <div class="form-field">
                        <label for="nom">Nom*</label>
                        <input type="text" name="nom" placeholder="(obligatoire)" required>
                    </div>
                    <div class="form-field">
                        <label for="tele">Prenom*</label>
                        <input type="phone" name="tele" placeholder="(obligatoire)" required>
                    </div>
                    <div class="form-field">
                        <label for="tele">Telephone*</label>
                        <input type="text" name="tele" placeholder="(obligatoire)" required>
                    </div>
                    <div class="form-field">
                        <label for="email">Email*</label>
                        <input type="text" name="niveau" placeholder="(obligatoire)" required>
                    </div>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="checkbox" id="checkbox" required>
                    <label for="checkbox">Jaccepte que je vais récupére ma commande au délais de 48h</label>
                </div>
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