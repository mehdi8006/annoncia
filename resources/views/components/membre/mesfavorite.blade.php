<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Annonces Favorites</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        
        .favorite-count {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .favorite-count-icon {
            color: #ff4a4a;
            margin-right: 10px;
            font-size: 24px;
        }
        
        .favorite-count-number {
            font-size: 20px;
            font-weight: bold;
        }
        
        /* Table styles */
        .ads-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .ads-table th {
            background-color: #f8f8f8;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #555;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .ads-table td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: middle;
        }
        
        .ads-table tr:last-child td {
            border-bottom: none;
        }
        
        .ads-table tr:hover {
            background-color: #f9f9f9;
        }
        
        /* Ad image */
        .ad-image {
            width: 120px;
            height: 90px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        /* Ad title */
        .ad-title {
            font-weight: 600;
            color: #333;
        }
        
        /* Category badge */
        .category-badge {
            display: inline-block;
            padding: 5px 10px;
            background-color: #e8f4fd;
            color: #0078d7;
            border-radius: 4px;
            font-size: 14px;
        }
        
        /* View button */
        .view-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            background-color: #0078d7;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        
        .view-btn:hover {
            background-color: #0062b1;
        }
        
        .view-icon {
            margin-right: 6px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .ads-table thead {
                display: none;
            }
            
            .ads-table, .ads-table tbody, .ads-table tr, .ads-table td {
                display: block;
                width: 100%;
            }
            
            .ads-table tr {
                margin-bottom: 15px;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                overflow: hidden;
            }
            
            .ads-table td {
                display: flex;
                justify-content: space-between;
                text-align: right;
                padding: 10px 15px;
                position: relative;
            }
            
            .ads-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                font-weight: 600;
                color: #555;
            }
            
            .ad-image {
                width: 100%;
                height: 150px;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1 class="page-title">Mes Annonces Favorites</h1>
            <div class="favorite-count">
                <span class="favorite-count-icon">❤️</span>
                <span class="favorite-count-number">4 Annonces</span>
            </div>
        </div>
        
        <!-- Table Section -->
        <table class="ads-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ad Item 1 -->
                <tr>
                    <td data-label="Image">
                        <img src="/api/placeholder/200/150" alt="Appartement Moderne" class="ad-image">
                    </td>
                    <td data-label="Titre" class="ad-title">Appartement Moderne au Centre-Ville</td>
                    <td data-label="Catégorie">
                        <span class="category-badge">Immobilier</span>
                    </td>
                    <td data-label="Action">
                        <a href="#" class="view-btn">
                            <span class="view-icon"></span> Voir
                        </a>
                    </td>
                </tr>
                
              
            </tbody>
        </table>
    </div>
</body>
</html>