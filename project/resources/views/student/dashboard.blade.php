<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Étudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .profile-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .info-card {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Tableau de bord Étudiant</h1>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">Déconnexion</button>
            </form>
        </div>

        <div class="profile-section">
            <h2>Profil de l'étudiant</h2>
            <p>Nom d'utilisateur : {{ Auth::user()->username }}</p>
            <p>Email : {{ Auth::user()->email }}</p>
            <p>Numéro étudiant : {{ Auth::user()->student->student_nbr }}</p>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <h3>Informations personnelles</h3>
                <ul>
                    <li>Voir mon profil</li>
                    <li>Modifier mes informations</li>
                    <li>Changer mon mot de passe</li>
                </ul>
            </div>
            <div class="info-card">
                <h3>Mes activités</h3>
                <ul>
                    <li>Voir mes cours</li>
                    <li>Consulter mon emploi du temps</li>
                    <li>Voir mes notes</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>