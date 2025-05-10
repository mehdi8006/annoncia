<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        h2 {
            color: #444;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-top: 30px;
        }
        .form-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 40px;
        }
        .form-section {
            flex: 1;
            min-width: 300px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[readonly] {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .password-requirements {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }
        @media (max-width: 700px) {
            .form-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <h1>Mon Profil</h1>
    
    <!-- Messages de succès ou d'erreur (à afficher conditionnellement) -->
    <!-- <div class="message success">Vos informations ont été mises à jour avec succès.</div> -->
    <!-- <div class="message error">Une erreur s'est produite. Veuillez réessayer.</div> -->
    
    <div class="form-container">
        <!-- Formulaire pour mettre à jour les informations personnelles -->
        <div class="form-section">
            <h2>Informations personnelles</h2>
            <form action="update-profile.php" method="POST">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="Nom actuel" required maxlength="100">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="email@exemple.com" readonly>
                    <small>L'email ne peut pas être modifié.</small>
                </div>
                
                <div class="form-group">
                    <label for="telephon">Téléphone</label>
                    <input type="tel" id="telephon" name="telephon" value="0612345678" required maxlength="20" pattern="[0-9]{10}">
                </div>
                
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville" value="Paris" required maxlength="100">
                </div>
                
                <button type="submit" class="btn-submit">Mettre à jour mes informations</button>
            </form>
        </div>
        
        <!-- Formulaire pour changer le mot de passe -->
        <div class="form-section">
            <h2>Changer le mot de passe</h2>
            <form action="change-password.php" method="POST">
                <div class="form-group">
                    <label for="current_password">Mot de passe actuel</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>
                
                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe</label>
                    <input type="password" id="new_password" name="new_password" required minlength="8">
                    
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirmer le nouveau mot de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
                </div>
                
                <button type="submit" class="btn-submit">Changer mon mot de passe</button>
            </form>
        </div>
    </div>
</body>
</html>