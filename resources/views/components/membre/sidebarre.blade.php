
    <style>
      
        
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            height: 100%;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
            display: flex;
            flex-direction: column;
        }
        
        .profile {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eaeaea;
            margin-bottom: 20px;
        }
        
        .profile-icon {
            width: 40px;
            height: 40px;
            background-color: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 12px;
        }
        
        .profile-name {
            font-weight: 600;
            color: #333;
        }
        
        .nav-links {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        
        .nav-link {
            padding: 12px 20px;
            color: #555;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: background-color 0.2s, color 0.2s;
        }
        
        .nav-link:hover {
            background-color: #f0f7ff;
            color: #3498db;
        }
        
        .nav-link.active {
            background-color: #e6f2ff;
            color: #3498db;
            border-left: 3px solid #3498db;
        }
        
        .nav-link i {
            margin-right: 10px;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }
        
        .logout {
            margin-top: auto;
            border-top: 1px solid #eaeaea;
            padding-top: 10px;
        }
        
        .main-content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #777;
        }
    </style>
    <!-- Using Font Awesome from CDN for icons -->

    <div class="sidebar">
        <div class="profile">
            <div class="profile-icon">U</div>
            <div class="profile-name">Username</div>
        </div>
        
        <div class="nav-links">
            <a href="#" class="nav-link active">
                <i class="fas fa-list"></i>
                Mes annonces
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-heart"></i>
                Mes favoris
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-cog"></i>
                Paramètres
            </a>
            
            <a href="#" class="nav-link logout">
                <i class="fas fa-sign-out-alt"></i>
                Se déconnecter
            </a>
        </div>
    </div>
    
 
