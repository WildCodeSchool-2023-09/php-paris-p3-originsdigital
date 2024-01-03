
    // Utilisez JavaScript pour détecter les changements dans le champ d'upload d'image
    document.getElementById('preview_pictures_field').addEventListener('change', function () {
        var input = this;

        // Vérifiez si un fichier a été sélectionné
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            // Configurez la fonction de rappel pour charger l'image en tant que source de données
            reader.onload = function (e) {
                var preview = document.getElementById('image-preview');

                // Affichez l'image en tant que miniature
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            // Chargez le fichier en tant que données URL
            reader.readAsDataURL(input.files[0]);
        }
    });
