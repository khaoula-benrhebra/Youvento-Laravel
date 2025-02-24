<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .welcome-text {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1 class="welcome-text">Tableau de bord Admin</h1>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">Déconnexion</button>
            </form>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Étudiants</h3>
                <p>{{ \App\Models\Student::count() }}</p>
            </div>
            <div class="stat-card">
                <h3>Nouveaux Inscrits</h3>
                <p>{{ \App\Models\Student::whereDate('created_at', today())->count() }}</p>
            </div>
            <div class="stat-card">
                <h3>Total Membres</h3>
                <p>{{ \App\Models\Member::count() }}</p>
            </div>
        </div>

        <div>
            <h2>Actions rapides</h2>
            <ul>
                <li>Gérer les étudiants</li>
                <li>Voir les statistiques</li>
                <li>Gérer les rôles</li>
            </ul>
        </div>
    </div>
</body>
</html>