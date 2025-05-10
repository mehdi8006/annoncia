<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Annonces</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-text h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .header-text p {
            color: #666;
        }
        
        .publish-btn {
            background-color: #4299e1;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
        }
        
        .publish-btn:hover {
            background-color: #3182ce;
        }
        
        .stats-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            flex: 1;
            min-width: 200px;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 20px;
            color: white;
        }
        
        .pending {
            background-color: #f6ad55;
        }
        
        .accepted {
            background-color: #48bb78;
        }
        
        .deleted {
            background-color: #e53e3e;
        }
        
        .total {
            background-color: #4299e1;
        }
        
        .stat-info h3 {
            font-size: 14px;
            color: #718096;
            margin-bottom: 5px;
        }
        
        .stat-info p {
            font-size: 24px;
            font-weight: 600;
            color: #2d3748;
        }
        
        .announcements-table {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background-color: #f8fafc;
            color: #4a5568;
            font-weight: 600;
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #4a5568;
        }
        
        tr:hover {
            background-color: #f7fafc;
        }
        
        .announcement-image {
            width: 60px;
            height: 60px;
            border-radius: 4px;
            object-fit: cover;
        }
        
        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-pending {
            background-color: #feebc8;
            color: #c05621;
        }
        
        .status-accepted {
            background-color: #c6f6d5;
            color: #2f855a;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-size: 16px;
        }
        
        .btn:hover {
            background-color: #edf2f7;
        }
        
        .btn-view {
            color: #4299e1;
        }
        
        .btn-edit {
            color: #ecc94b;
        }
        
        .btn-delete {
            color: #e53e3e;
        }
        
        
        .page-btn {
            border: 1px solid #e2e8f0;
            background-color: #fff;
            padding: 5px 10px;
            margin: 0 3px;
            cursor: pointer;
            border-radius: 4px;
            color: #4a5568;
        }
        
        .page-btn.active {
            background-color: #4299e1;
            color: #fff;
            border-color: #4299e1;
        }
        
        .page-btn:hover:not(.active) {
            background-color: #edf2f7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-text">
                <h1>Tableau de Bord des Annonces</h1>
                <p>Gérez toutes vos annonces en un seul endroit</p>
            </div>
            <button class="publish-btn">
                <i class="fas fa-plus"></i>
                Publier une annonce
            </button>
        </div>
        
        <!-- Cartes de statistiques -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="fas fa-list"></i>
                </div>
                <div class="stat-info">
                    <h3>Total</h3>
                    <p>198</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3>En Attente</h3>
                    <p>24</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon accepted">
                    <i class="fas fa-check"></i>
                </div>
                <div class="stat-info">
                    <h3>Acceptées</h3>
                    <p>156</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon deleted">
                    <i class="fas fa-trash"></i>
                </div>
                <div class="stat-info">
                    <h3>Supprimées</h3>
                    <p>18</p>
                </div>
            </div>
        </div>
        
        <!-- Tableau des annonces -->
        <div class="announcements-table">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="/api/placeholder/60/60" alt="Annonce 1" class="announcement-image"></td>
                        <td>Appartement à louer à Casablanca</td>
                        <td><span class="status status-accepted">Acceptée</span></td>
                        <td>05/05/2025</td>
                        <td>
                            <div class="action-buttons">
                                <a><button class="btn btn-view" title="Voir"><i class="fas fa-eye"></i></button></a>
                               <a> <button class="btn btn-edit" title="Modifier"><i class="fas fa-edit"></i></button></a>
                               <a> <button class="btn btn-delete" title="Supprimer"><i class="fas fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                 
                </tbody>
            </table>
            
          
        </div>
    </div>
</body>
</html>