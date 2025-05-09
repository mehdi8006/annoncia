<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Annonces</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
   
        
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

        /* Modal styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            transform: translateY(-20px);
            transition: transform 0.3s;
        }

        .modal-overlay.active .modal {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #2d3748;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 22px;
            color: #a0aec0;
            cursor: pointer;
            transition: color 0.3s;
        }

        .modal-close:hover {
            color: #e53e3e;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        /* View Announcement Modal Styles */
        .view-announcement-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .view-image-gallery {
            display: flex;
            overflow-x: auto;
            gap: 10px;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .view-main-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .view-gallery-image {
            width: 80px;
            height: 80px;
            border-radius: 4px;
            object-fit: cover;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        .view-gallery-image:hover {
            opacity: 0.8;
        }

        .view-gallery-image.active {
            border: 2px solid #4299e1;
        }

        .view-details {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .view-title {
            font-size: 24px;
            font-weight: 600;
            color: #2d3748;
        }

        .view-price {
            font-size: 22px;
            font-weight: 600;
            color: #4299e1;
        }

        .view-metadata {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 10px;
        }

        .view-metadata-item {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #718096;
            font-size: 14px;
        }

        .view-description {
            color: #4a5568;
            line-height: 1.6;
            margin-top: 15px;
        }

        /* Confirmation Dialog Styles */
        .confirm-dialog {
            max-width: 400px;
            text-align: center;
        }

        .confirm-icon {
            font-size: 50px;
            color: #e53e3e;
            margin-bottom: 20px;
        }

        .confirm-message {
            font-size: 18px;
            margin-bottom: 20px;
            color: #2d3748;
        }

        .confirm-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .confirm-cancel {
            background-color: #e2e8f0;
            color: #4a5568;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .confirm-cancel:hover {
            background-color: #cbd5e0;
        }

        .confirm-delete {
            background-color: #e53e3e;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .confirm-delete:hover {
            background-color: #c53030;
        }

        /* Edit Announcement Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.25);
            outline: none;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-col {
            flex: 1;
            min-width: 250px;
        }

        .image-upload-container {
            margin-bottom: 20px;
        }

        .image-upload-container h3 {
            margin-bottom: 10px;
            color: #2c3e50;
            font-size: 16px;
            font-weight: 600;
        }

        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .image-preview {
            width: 100px;
            height: 100px;
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid #ddd;
            position: relative;
            overflow: hidden;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .delete-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(231, 76, 60, 0.8);
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .delete-image:hover {
            background-color: rgba(231, 76, 60, 1);
        }

        .add-image-btn {
            background-color: #f8f9fa;
            border: 2px dashed #ddd;
            border-radius: 6px;
            height: 100px;
            width: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .add-image-btn:hover {
            border-color: #3498db;
            background-color: #f0f7fc;
        }

        .add-image-btn i {
            font-size: 24px;
            color: #7f8c8d;
            margin-bottom: 8px;
        }

        .add-image-btn span {
            font-size: 14px;
            color: #7f8c8d;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .cancel-btn {
            background-color: white;
            color: #e74c3c;
            border: 1px solid #e74c3c;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cancel-btn:hover {
            background-color: #fde5e5;
        }

        .submit-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        /* Toast Notification Styles */
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast {
            background-color: #fff;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            padding: 15px;
            min-width: 300px;
            transform: translateX(110%);
            animation: slide-in 0.3s forwards;
        }

        .toast-icon {
            margin-right: 15px;
            font-size: 20px;
        }

        .toast-success {
            border-left: 4px solid #48bb78;
        }

        .toast-success .toast-icon {
            color: #48bb78;
        }

        .toast-error {
            border-left: 4px solid #e53e3e;
        }

        .toast-error .toast-icon {
            color: #e53e3e;
        }

        .toast-message {
            flex: 1;
            color: #2d3748;
        }

        .toast-close {
            background: none;
            border: none;
            color: #a0aec0;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s;
        }

        .toast-close:hover {
            color: #718096;
        }

        @keyframes slide-in {
            to {
                transform: translateX(0);
            }
        }

        @keyframes slide-out {
            to {
                transform: translateX(110%);
            }
        }

        .toast.hide {
            animation: slide-out 0.3s forwards;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 10px;
            }

            .form-col {
                width: 100%;
            }

            .modal {
                width: 95%;
            }

            .view-main-image {
                height: 200px;
            }
        }
    </style>

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
                    <tr data-id="1">
                        <td><img src="/api/placeholder/60/60" alt="Annonce 1" class="announcement-image"></td>
                        <td>Appartement à louer à Casablanca</td>
                        <td><span class="status status-accepted">Acceptée</span></td>
                        <td>05/05/2025</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-view" title="Voir" onclick="viewAnnouncement(1)"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-edit" title="Modifier" onclick="editAnnouncement(1)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete" title="Supprimer" onclick="confirmDeleteAnnouncement(1)"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="2">
                        <td><img src="/api/placeholder/60/60" alt="Annonce 2" class="announcement-image"></td>
                        <td>Voiture à vendre, excellente condition</td>
                        <td><span class="status status-pending">En attente</span></td>
                        <td>06/05/2025</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-view" title="Voir" onclick="viewAnnouncement(2)"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-edit" title="Modifier" onclick="editAnnouncement(2)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete" title="Supprimer" onclick="confirmDeleteAnnouncement(2)"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="3">
                        <td><img src="/api/placeholder/60/60" alt="Annonce 3" class="announcement-image"></td>
                        <td>Ordinateur portable ASUS - Neuf</td>
                        <td><span class="status status-accepted">Acceptée</span></td>
                        <td>02/05/2025</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-view" title="Voir" onclick="viewAnnouncement(3)"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-edit" title="Modifier" onclick="editAnnouncement(3)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete" title="Supprimer" onclick="confirmDeleteAnnouncement(3)"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4">
                        <td><img src="/api/placeholder/60/60" alt="Annonce 4" class="announcement-image"></td>
                        <td>Cours particuliers de mathématiques</td>
                        <td><span class="status status-pending">En attente</span></td>
                        <td>07/05/2025</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-view" title="Voir" onclick="viewAnnouncement(4)"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-edit" title="Modifier" onclick="editAnnouncement(4)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete" title="Supprimer" onclick="confirmDeleteAnnouncement(4)"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="5">
                        <td><img src="/api/placeholder/60/60" alt="Annonce 5" class="announcement-image"></td>
                        <td>Téléphone Samsung Galaxy S22</td>
                        <td><span class="status status-accepted">Acceptée</span></td>
                        <td>04/05/2025</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-view" title="Voir" onclick="viewAnnouncement(5)"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-edit" title="Modifier" onclick="editAnnouncement(5)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete" title="Supprimer" onclick="confirmDeleteAnnouncement(5)"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Announcement Modal -->
    <div class="modal-overlay" id="viewAnnouncementModal">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Détails de l'annonce</h2>
                <button class="modal-close" onclick="closeModal('viewAnnouncementModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="view-announcement-container">
                    <div class="view-image-container">
                        <img src="/api/placeholder/800/400" alt="Annonce" class="view-main-image" id="viewMainImage">
                        <div class="view-image-gallery" id="viewImageGallery">
                            <img src="/api/placeholder/800/400" alt="Image 1" class="view-gallery-image active" onclick="changeMainImage(this.src)">
                            <img src="/api/placeholder/800/400" alt="Image 2" class="view-gallery-image" onclick="changeMainImage(this.src)">
                            <img src="/api/placeholder/800/400" alt="Image 3" class="view-gallery-image" onclick="changeMainImage(this.src)">
                            <img src="/api/placeholder/800/400" alt="Image 4" class="view-gallery-image" onclick="changeMainImage(this.src)">

                        </div>
                    </div>
                    <div class="view-details">
                        <h1 class="view-title" id="viewTitle">Titre de l'annonce</h1>
                        <div class="view-price" id="viewPrice">1500 DH</div>
                        <div class="view-metadata">
                            <div class="view-metadata-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span id="viewLocation">Casablanca</span>
                            </div>
                            <div class="view-metadata-item">
                                <i class="fas fa-calendar"></i>
                                <span id="viewDate">05/05/2025</span>
                            </div>
                            <div class="view-metadata-item">
                                <i class="fas fa-tag"></i>
                                <span id="viewCategory">Mobilier</span>
                            </div>
                            <div class="view-metadata-item">
                                <i class="fas fa-check-circle"></i>
                                <span id="viewSousCategorie">telephone</span>
                            </div>
                        </div>
                        <div class="view-description" id="viewDescription">
                            Description de l'annonce...
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-edit" onclick="closeModal('viewAnnouncementModal'); editAnnouncement(currentAnnouncementId);">
                    <i class="fas fa-edit"></i> Modifier
                </button>
                <button class="cancel-btn" onclick="closeModal('viewAnnouncementModal')">Fermer</button>
            </div>
        </div>
    </div>

    <!-- Edit Announcement Modal -->
    <div class="modal-overlay" id="editAnnouncementModal">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Modifier l'annonce</h2>
                <button class="modal-close" onclick="closeModal('editAnnouncementModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editAnnouncementForm">
                    <div class="form-group">
                        <label for="editTitle">Titre de l'annonce <span style="color: #e74c3c;">*</span></label>
                        <input type="text" id="editTitle" name="titre" class="form-control" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="editPrice">Prix (DH) <span style="color: #e74c3c;">*</span></label>
                                <input type="number" id="editPrice" name="prix" class="form-control" min="0" step="0.01" required>
                            </div>
                        </div>
                        
                       
                    </div>
                    
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="editCategory">Catégorie <span style="color: #e74c3c;">*</span></label>
                                <select id="editCategory" name="id_categorie" class="form-control" required>
                                    <option value="1">Mobilier</option>
                                    <option value="2">Électronique</option>
                                    <option value="3">Vêtements</option>
                                    <option value="4">Immobilier</option>
                                    <option value="5">Véhicules</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-col">
                            <div class="form-group">
                                <label for="editSubCategory">Sous-catégorie</label>
                                <select id="editSubCategory" name="id_sous_categorie" class="form-control">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="1">Canapés et fauteuils</option>
                                    <option value="2">Tables et chaises</option>
                                    <option value="3">Armoires</option>
                                    <option value="4">Lits</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="editCity">Ville <span style="color: #e74c3c;">*</span></label>
                                <select id="editCity" name="id_ville" class="form-control" required>
                                    <option value="1">Casablanca</option>
                                    <option value="2">Rabat</option>
                                    <option value="3">Marrakech</option>
                                    <option value="4">Fès</option>
                                    <option value="5">Tanger</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-col">
                            <div class="form-group">
                                <label for="editDate">Date de publication</label>
                                <input type="date" id="editDate" name="date_publication" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="editDescription">Description <span style="color: #e74c3c;">*</span></label>
                        <textarea id="editDescription" name="description" class="form-control" required></textarea>
                    </div>
                    
                    <div class="image-upload-container">
                        <h3>Images de l'annonce</h3>
                        <p style="margin-bottom: 15px; color: #7f8c8d;">Vous pouvez ajouter jusqu'à 5 images (La première image sera l'image principale)</p>
                        
                        <div class="image-preview-container" id="editImageContainer">
                            <div class="image-preview">
                                <img src="/api/placeholder/400/320" alt="Image 1">
                                <div class="delete-image">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            
                            <div class="image-preview">
                                <img src="/api/placeholder/400/320" alt="Image 2">
                                <div class="delete-image">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            
                            <div class="image-preview">
                                <img src="/api/placeholder/400/320" alt="Image 3">
                                <div class="delete-image">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            
                            <div class="add-image-btn">
                                <i class="fas fa-plus"></i>
                                <span>Ajouter</span>
                                <input type="file" id="add-image" style="display: none;" accept="image/*">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="cancel-btn" onclick="closeModal('editAnnouncementModal')">Annuler</button>
                <button class="submit-btn" onclick="saveAnnouncement()">Enregistrer les modifications</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal-overlay" id="deleteConfirmationModal">
        <div class="modal confirm-dialog">
            <div class="modal-body">
                <div class="confirm-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="confirm-message">
                    Êtes-vous sûr de vouloir supprimer cette annonce?
                </div>
                <div class="confirm-buttons">
                    <button class="confirm-cancel" onclick="closeModal('deleteConfirmationModal')">Annuler</button>
                    <button class="confirm-delete" onclick="deleteAnnouncement()">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <script>
     // Global variable to keep track of the current announcement 
let currentAnnouncementId = null;

// View announcement modal functions
function viewAnnouncement(id) {
   currentAnnouncementId = id;
   
   // Open modal
   openModal('viewAnnouncementModal');
}

// Change main image in view announcement modal
function changeMainImage(src) {
   document.getElementById('viewMainImage').src = src;
   
   // Update active class
   document.querySelectorAll('.view-gallery-image').forEach(img => {
       img.classList.remove('active');
   });
   
   // Find the image with the matching src and add active class
   document.querySelectorAll('.view-gallery-image').forEach(img => {
       if (img.src === src) {
           img.classList.add('active');
       }
   });
}

// Edit announcement modal
function editAnnouncement(id) {
   currentAnnouncementId = id;
   
   // Open modal
   openModal('editAnnouncementModal');
}

// Delete confirmation
function confirmDeleteAnnouncement(id) {
   currentAnnouncementId = id;
   openModal('deleteConfirmationModal');
}

// Open modal
function openModal(modalId) {
   document.getElementById(modalId).classList.add('active');
   document.body.style.overflow = 'hidden'; // Prevent scrolling
}

// Close modal
function closeModal(modalId) {
   document.getElementById(modalId).classList.remove('active');
   document.body.style.overflow = ''; // Restore scrolling
}

// Event listeners for modal interactions
document.addEventListener('DOMContentLoaded', function() {
   // Close modals when clicking outside
   document.querySelectorAll('.modal-overlay').forEach(overlay => {
       overlay.addEventListener('click', function(e) {
           if (e.target === this) {
               this.classList.remove('active');
               document.body.style.overflow = ''; // Restore scrolling
           }
       });
   });

   // Close modals with Escape key
   document.addEventListener('keydown', function(e) {
       if (e.key === 'Escape') {
           document.querySelectorAll('.modal-overlay.active').forEach(modal => {
               modal.classList.remove('active');
               document.body.style.overflow = ''; // Restore scrolling
           });
       }
   });
   
   // Setup image gallery interactions if they exist
   const galleryImages = document.querySelectorAll('.view-gallery-image');
   if (galleryImages.length > 0) {
       galleryImages.forEach(img => {
           img.addEventListener('click', function() {
               changeMainImage(this.src);
           });
       });
   }
});
    </script>
