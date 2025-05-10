<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Annonce</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            line-height: 1.6;
        }

        .form-container55 {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title55 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group55 {
            margin-bottom: 20px;
        }

        .form-label55 {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 16px;
        }

        .form-input55,
        .form-textarea55,
        .form-select55 {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-input55:focus,
        .form-textarea55:focus,
        .form-select55:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .form-textarea55 {
            resize: vertical;
            min-height: 120px;
        }

        .form-row55 {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-row55 .form-group55 {
            flex: 1;
            min-width: 250px;
        }

        .image-section55 {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .image-grid55 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .image-upload55 {
            position: relative;
        }

        .image-upload-label55 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border: 2px dashed #ccc;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: white;
            min-height: 150px;
            overflow: hidden;
            position: relative;
        }

        .image-upload-label55:hover {
            border-color: #4CAF50;
            background-color: #f8fdf8;
        }

        .upload-text55 {
            color: #666;
            font-size: 14px;
            text-align: center;
            z-index: 1;
        }

        .file-input55 {
            display: none;
        }

        .image-preview55 {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 6px;
            z-index: 0;
        }

        .image-upload55.has-image .upload-text55 {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            z-index: 2;
        }

        .remove-image55 {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background-color: rgba(231, 76, 60, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            z-index: 3;
            transition: background-color 0.3s ease;
        }

        .remove-image55:hover {
            background-color: rgba(231, 76, 60, 1);
        }

        .image-upload55.has-image .remove-image55 {
            display: flex;
        }

        .required55 {
            color: #e74c3c;
        }

        .submit-button55 {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .submit-button55:hover {
            background-color: #45a049;
        }

        .submit-button55:active {
            transform: translateY(1px);
        }

        @media (max-width: 600px) {
            .form-container55 {
                padding: 20px;
            }

            .form-row55 {
                flex-direction: column;
            }

            .form-row55 .form-group55 {
                min-width: 100%;
            }

            .image-grid55 {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="form-container55">
        <h1 class="form-title55">Déposer une annonce</h1>
        
        <form action="/annonces" method="POST" enctype="multipart/form-data">
            <div class="form-group55">
                <label for="titre" class="form-label55">
                    Titre <span class="required55">*</span>
                </label>
                <input type="text" id="titre" name="titre" class="form-input55" required maxlength="255">
            </div>

            <div class="form-group55">
                <label for="description" class="form-label55">
                    Description <span class="required55">*</span>
                </label>
                <textarea id="description" name="description" class="form-textarea55" required></textarea>
            </div>

            <div class="form-row55">
                <div class="form-group55">
                    <label for="prix" class="form-label55">
                        Prix (MAD) <span class="required55">*</span>
                    </label>
                    <input type="number" id="prix" name="prix" class="form-input55" 
                           step="0.01" min="0" required>
                </div>

                <div class="form-group55">
                    <label for="id_ville" class="form-label55">
                        Ville <span class="required55">*</span>
                    </label>
                    <select id="id_ville" name="id_ville" class="form-select55" required>
                        <option value="">Sélectionnez une ville</option>
                        <option value="1">Casablanca</option>
                        <option value="2">Rabat</option>
                        <option value="3">Marrakech</option>
                        <option value="4">Fès</option>
                        <option value="5">Tanger</option>
                    </select>
                </div>
            </div>

            <div class="form-row55">
                <div class="form-group55">
                    <label for="id_categorie" class="form-label55">
                        Catégorie <span class="required55">*</span>
                    </label>
                    <select id="id_categorie" name="id_categorie" class="form-select55" required>
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="1">Véhicules</option>
                        <option value="2">Immobilier</option>
                        <option value="3">Électronique</option>
                        <option value="4">Maison et Jardin</option>
                        <option value="5">Mode et Beauté</option>
                    </select>
                </div>

                <div class="form-group55">
                    <label for="id_sous_categorie" class="form-label55">
                        Sous-catégorie
                    </label>
                    <select id="id_sous_categorie" name="id_sous_categorie" class="form-select55">
                        <option value="">Sélectionnez une sous-catégorie</option>
                        <option value="1">Voitures</option>
                        <option value="2">Motos</option>
                        <option value="3">Appartements</option>
                        <option value="4">Maisons</option>
                    </select>
                </div>
            </div>

            <div class="image-section55">
                <h3 class="form-label55" style="margin-bottom: 15px;">Photos de l'annonce</h3>
                <div class="image-grid55">
                    <div class="image-upload55" id="imageUpload1">
                        <label for="image1" class="image-upload-label55">
                            <img class="image-preview55" id="preview1" style="display: none;">
                            <span class="upload-text55">Cliquez pour ajouter<br>Photo 1</span>
                        </label>
                        <input type="file" id="image1" name="images[]" class="file-input55" accept="image/*">
                        <button type="button" class="remove-image55" aria-label="Supprimer l'image">×</button>
                    </div>

                    <div class="image-upload55" id="imageUpload2">
                        <label for="image2" class="image-upload-label55">
                            <img class="image-preview55" id="preview2" style="display: none;">
                            <span class="upload-text55">Cliquez pour ajouter<br>Photo 2</span>
                        </label>
                        <input type="file" id="image2" name="images[]" class="file-input55" accept="image/*">
                        <button type="button" class="remove-image55" aria-label="Supprimer l'image">×</button>
                    </div>

                    <div class="image-upload55" id="imageUpload3">
                        <label for="image3" class="image-upload-label55">
                            <img class="image-preview55" id="preview3" style="display: none;">
                            <span class="upload-text55">Cliquez pour ajouter<br>Photo 3</span>
                        </label>
                        <input type="file" id="image3" name="images[]" class="file-input55" accept="image/*">
                        <button type="button" class="remove-image55" aria-label="Supprimer l'image">×</button>
                    </div>

                    <div class="image-upload55" id="imageUpload4">
                        <label for="image4" class="image-upload-label55">
                            <img class="image-preview55" id="preview4" style="display: none;">
                            <span class="upload-text55">Cliquez pour ajouter<br>Photo 4</span>
                        </label>
                        <input type="file" id="image4" name="images[]" class="file-input55" accept="image/*">
                        <button type="button" class="remove-image55" aria-label="Supprimer l'image">×</button>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button55">Publier l'annonce</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle image uploads
            const imageUploads = document.querySelectorAll('.image-upload55');
            
            imageUploads.forEach(function(upload) {
                const fileInput = upload.querySelector('.file-input55');
                const preview = upload.querySelector('.image-preview55');
                const uploadText = upload.querySelector('.upload-text55');
                const removeButton = upload.querySelector('.remove-image55');
                
                // Handle file selection
                fileInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                            upload.classList.add('has-image');
                            uploadText.textContent = file.name;
                        };
                        
                        reader.readAsDataURL(file);
                    }
                });
                
                // Handle image removal
                removeButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    fileInput.value = '';
                    preview.src = '';
                    preview.style.display = 'none';
                    upload.classList.remove('has-image');
                    uploadText.innerHTML = 'Cliquez pour ajouter<br>Photo ' + upload.id.replace('imageUpload', '');
                });
            });
        });
    </script>
</body>
</html>