<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- boostrap cdn --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Succés</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh;  background-color: #f5f5f5;">
        <div style="text-align: center; padding: 30px; background-color: #ffffff; border-radius: 10px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="font-size: 32px; color: #333333; margin-bottom: 20px;">Liste envoyée avec succés</h1>
            <div style="display: flex; align-items: center; justify-content: center;">
                <label for="ref" style="font-size: 18px; color: #666666; margin-right: 10px;">Référence de votre liste :</label>
                <input type="text" id="ref" value="{{ $ref }}" readonly style="font-size: 18px; color: #666666; padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; flex: 1 0 auto; margin-right: 10px;">
                <button onclick="copyToClipboard()" style="background-color: #3366cc; color: #ffffff; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Copier</button>
            </div>
            <a href="{{ route('home') }}" class="btn btn-primary" style="font-size: 16px; padding: 10px 20px; background-color: #3366cc; color: #ffffff; text-decoration: none; border-radius: 5px; margin-top: 20px;">Retour à la page d'accueil</a>
        </div>

    <script>
        function copyToClipboard() {
            const refElement = document.getElementById('ref');
            const refText = refElement.value;

            const tempInput = document.createElement('input');
            tempInput.setAttribute('value', refText);
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            alert('Référence copiée dans le presse-papiers : ' + refText);
        }
    </script>
</body>
</html>