<link rel="stylesheet" href="{{ asset('css/maliste.css') }}">

@extends('index')

@section('content')
    <div class="liste">
        <div class="instructions">
            <h1>bienvenue au service ma liste</h1>
            <div class="instructions-main">
                <p>librairie alfajer vous propose son nouveau service "ma liste" acheter votre fourniture scolaire au confort de votre maison : </p>
                <ul>
                    <li>Déposer votre liste dans la zone*</li>
                    <li>Remplisser le formulaire en saisissant les information nécessaire**</li>
                    <li>C'est bon! un de nos concessionnaire vas vous contacter pour récupérer votre fourniture de votre librairie</li>
                </ul>
                <div class="alert">
                    <p>(*):Vérifier que la liste est lisible, clair et nette pour éviter le retard</p>
                    <p>(**):Vérifier que les information saisie sont correct et exacte</p>
                </div>
            </div>
            <h2>veuillez récupérer votre fourniture au délais de 48h</h2>
        </div>

        <div class="maliste-container">
            <h1>ma liste</h1>
            <form method="POST" action="{{ route('maliste.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="top">
                    <div class="top-left">
                        <div class="form-field">
                            <input type="text" name="nom" placeholder="Nom"
                            value="{{old('nom')}}"
                            required >
                            @error('nom')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-field">
                            <input type="text" name="prenom" placeholder="Prenom"
                            value="{{old('prenom')}}"
                            required >
                            @error('prenom')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-field">
                            <input type="text" name="email" placeholder="Email"
                            value="{{old('email')}}"
                            required >
                            @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-field">
                            <input type="text" name="tele" placeholder="Telephone"
                            value="{{old('tele')}}"
                            required >
                            @error('tele')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-field">
                            <input type="text" name="etablissement" placeholder="Etablissement"
                            value="{{old('etablissement')}}"
                            required >
                            @error('etablissement')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-field">
                            <input type="text" name="niveau" placeholder="Niveau"
                            value="{{old('niveau')}}"
                            required >
                            @error('niveau')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-field">
                        <input type="file" name="doc" id="doc"
                        accept=".jpg, .png, .pdf, .doc, .docx"
                        value="{{old('doc')}}"
                        required
                        >
                        @error('doc')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <input type="submit" value="déposer">
            </form>
        </div>
    </div>
@endsection