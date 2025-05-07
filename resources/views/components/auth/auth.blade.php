<style>
    /* Container et Wrapper */
    .auth-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
        padding: 20px;
    }
 
    .auth-container {
        display: flex;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
    }
 
    /* Section gauche (branding) */
    .auth-left {
        background-color: #f5f9ff;
        padding: 60px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
 
    .brand-logo {
        font-size: 72px;
        color: #3b82f6;
        margin-bottom: 40px;
    }
 
    .brand-title {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 16px;
    }
 
    .brand-subtitle {
        font-size: 18px;
        color: #666;
        margin-bottom: 8px;
    }
 
    .brand-caption {
        font-size: 16px;
        color: #888;
    }
 
    .brand-link {
        color: #3b82f6;
        text-decoration: none;
        font-weight: 500;
    }
 
    /* Section droite (formulaires) */
    .auth-right {
        flex: 1;
        padding: 60px;
        background-color: white;
    }
 
    .auth-header {
        text-align: center;
        margin-bottom: 40px;
    }
 
    .auth-title {
        font-size: 32px;
        font-weight: bold;
        color: #333;
        margin-bottom: 12px;
    }
 
    .auth-subtitle {
        font-size: 16px;
        color: #666;
    }
 
    /* Navigation entre formulaires */
    .auth-tabs {
        display: flex;
        margin-bottom: 40px;
        border-bottom: 1px solid #e5e7eb;
    }
 
    .auth-tab {
        flex: 1;
        padding: 16px 24px;
        text-align: center;
        cursor: pointer;
        font-weight: 600;
        color: #6b7280;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
        background: none;
        border: none;
    }
 
    .auth-tab.active {
        color: #3b82f6;
        border-bottom-color: #3b82f6;
    }
 
    /* Formulaires */
    .form-group {
        margin-bottom: 24px;
    }
 
    .form-label {
        display: block;
        font-weight: 500;
        color: #374151;
        margin-bottom: 8px;
        font-size: 14px;
    }
 
    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        background-color: #f9fafb;
        transition: all 0.3s ease;
    }
 
    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        background-color: white;
    }
 
    .phone-input-wrapper {
        display: flex;
        gap: 8px;
    }
 
    .country-code {
        width: 120px;
        padding: 12px 16px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background-color: #f9fafb;
        font-size: 14px;
        cursor: pointer;
    }
 
    .phone-input {
        flex: 1;
        padding: 12px 16px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        background-color: #f9fafb;
    }
 
    /* Boutons */
    .submit-btn {
        width: 100%;
        padding: 14px 24px;
        background-color: #3b82f6;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 24px;
    }
 
    .submit-btn:hover {
        background-color: #2563eb;
    }
 
    .forgot-password {
        text-align: right;
        margin-top: 8px;
    }
 
    .forgot-password-link {
        color: #3b82f6;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }
 
    .forgot-password-link:hover {
        text-decoration: underline;
    }
 
    /* Animations */
    .auth-form {
        display: none;
        animation: fadeIn 0.3s ease-in-out;
    }
 
    .auth-form.active {
        display: block;
    }
 
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
 
    /* Alert messages */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
    }
    
    .alert-success {
        background-color: #d1fae5;
        color: #064e3b;
        border: 1px solid #a7f3d0;
    }
    
    .alert-danger {
        background-color: #fee2e2;
        color: #b91c1c;
        border: 1px solid #fecaca;
    }
    
    .error-message {
        color: #b91c1c;
        font-size: 12px;
        margin-top: 5px;
    }
 
    /* Responsive design */
    @media (max-width: 750px) {
        .auth-left {
            display: none;
        }
    }
    
    @media (max-width: 640px) {
        .auth-wrapper {
            padding: 10px;
        }
 
        .auth-right {
            padding: 30px 20px;
        }
 
        .brand-title {
            font-size: 24px;
        }
 
        .auth-title {
            font-size: 28px;
        }
    }
</style>

<div class="auth-wrapper">
    <div class="auth-container">
        <!-- Section gauche (Branding) -->
        <div class="auth-left">
            <i class="fa-solid fa-bag-shopping brand-logo"></i>
            <h2 class="brand-title">Achetez et vendez facilement</h2>
            <p class="brand-subtitle">Annoncia, votre <a href="#" class="brand-link">plateforme de confiance</a> pour les</p>
            <p class="brand-caption">transactions en ligne sécurisées.</p>
        </div>
 
        <!-- Section droite (Formulaires) -->
        <div class="auth-right">
            <div class="auth-header">
                <h1 class="auth-title">Connectez-vous à Annoncia</h1>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
 
            <!-- Navigation entre connexion et inscription -->
            <div class="auth-tabs">
                <button class="auth-tab {{ !$errors->any() || $errors->has('email') && !$errors->has('name') ? 'active' : '' }}" onclick="switchTab('login')">Connexion</button>
                <button class="auth-tab {{ $errors->has('name') ? 'active' : '' }}" onclick="switchTab('register')">Inscription</button>
            </div>
 
            <!-- Formulaire de connexion -->
            <form id="loginForm" class="auth-form {{ !$errors->any() || $errors->has('email') && !$errors->has('name') ? 'active' : '' }}" action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="Entrez votre email" required value="{{ old('email') }}">
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
 
                <div class="form-group">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-input" placeholder="Entrez votre mot de passe" required>
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                    <div class="forgot-password">
                        <a href="#" class="forgot-password-link">Mot de passe oublié ?</a>
                    </div>
                </div>
 
                <button type="submit" class="submit-btn">Connexion</button>
            </form>
 
            <!-- Formulaire d'inscription -->
            <form id="registerForm" class="auth-form {{ $errors->has('name') ? 'active' : '' }}" action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Nom complet</label>
                    <input type="text" name="name" class="form-input" placeholder="Entrez votre nom complet" required value="{{ old('name') }}">
                    @error('name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="Entrez votre email" required value="{{ old('email') }}">
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="form-label">Numéro de téléphone</label>
                    <div class="phone-input-wrapper">
                        <input type="tel" name="phone" class="phone-input" placeholder="Ex: 623332123" required value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-input" placeholder="Créez un mot de passe" required>
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="form-label">Confirmez le mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Confirmez le mot de passe" required>
                </div>
            
                <button type="submit" class="submit-btn">S'inscrire</button>
            </form>
        </div>
    </div>
</div>
 
<script>
    // Fonction pour basculer entre connexion et inscription
    function switchTab(tab) {
        // Désactiver tous les onglets et formulaires
        document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.auth-form').forEach(f => f.classList.remove('active'));
        
        // Activer l'onglet cliqué
        document.querySelectorAll('.auth-tab').forEach(t => {
            if (tab === 'login' && t.textContent.trim() === 'Connexion') {
                t.classList.add('active');
            } else if (tab === 'register' && t.textContent.trim() === 'Inscription') {
                t.classList.add('active');
            }
        });
        
        // Activer le formulaire correspondant
        if (tab === 'login') {
            document.getElementById('loginForm').classList.add('active');
        } else {
            document.getElementById('registerForm').classList.add('active');
        }
    }
    
    // Initialiser le bon onglet au chargement (basé sur les erreurs)
    document.addEventListener('DOMContentLoaded', function() {
        @if($errors->has('name'))
        switchTab('register');
        @else
        switchTab('login');
        @endif
    });
</script>