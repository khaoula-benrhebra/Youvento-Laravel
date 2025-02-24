<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue</h1>
    <div>
        <a href="{{ route('login') }}" class="btn">Se connecter</a>
        <a href="{{ route('register') }}" class="btn">S'inscrire</a>
    </div>
</body>
</html>