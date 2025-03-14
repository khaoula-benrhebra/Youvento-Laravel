<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        /* Styles existants */
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
        /* Nouveaux styles */
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .action-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }
        .action-btn {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .stats-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
        }
        .nav-menu {
            background: #333;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin-right: 10px;
        }
        .nav-menu a:hover {
            background: #555;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Tableau de bord Admin</h1>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">Déconnexion</button>
            </form>
        </div>

        <nav class="nav-menu">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('categories.list') }}">Catégories</a>
            <a href="{{ route('clubs.list') }}">Clubs</a>
        </nav>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Étudiants</h3>
                <p>{{ \App\Models\Student::count() }}</p>
            </div>
            <div class="stat-card">
                <h3>Total Clubs</h3>
                <p>{{ \App\Models\Club::count() }}</p>
            </div>
            <div class="stat-card">
                <h3>Total Catégories</h3>
                <p>{{ \App\Models\Category::count() }}</p>
            </div>
            <div class="stat-card">
                <h3>Total Membres</h3>
                <p>{{ \App\Models\Member::count() }}</p>
            </div>
        </div>

        <div class="actions-grid">
            <div class="action-card">
                <h3>Gestion des Catégories</h3>
                <p>Gérez les catégories de clubs</p>
                <a href="{{ route('categories.list') }}" class="action-btn">Voir les catégories</a>
                <a href="{{ route('categories.add') }}" class="action-btn">Ajouter une catégorie</a>
            </div>
            <div class="action-card">
                <h3>Gestion des Clubs</h3>
                <p>Gérez les clubs étudiants</p>
                <a href="{{ route('clubs.list') }}" class="action-btn">Voir les clubs</a>
                <a href="{{ route('clubs.add') }}" class="action-btn">Ajouter un club</a>
            </div>
        </div>
    </div>
</body>
</html>