window.addEventListener('DOMContentLoaded', function () {
    var thumbnailFileInput = document.getElementById('upload_video_thumbnailFile_file');
    var videoFileInput = document.getElementById('upload_video_videoFile_file');
    var thumbnailPreview = document.getElementById('thumbnailPreview');
    var videoPreview = document.getElementById('videoPreview');

    if (thumbnailFileInput && videoFileInput) {
        thumbnailFileInput.addEventListener('change', function () {
            readURL(this, thumbnailPreview);
        });

        videoFileInput.addEventListener('change', function () {
            readURL(this, videoPreview);
        });

        function readURL(input, preview) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Vérifiez le type MIME du fichier
                    if (input.files[0].type.startsWith('image')) {
                        // Afficher l'aperçu en tant qu'image
                        preview.innerHTML = '<img src="' + e.target.result + '" alt="Thumbnail">';
                    } else if (input.files[0].type.startsWith('video')) {
                        // Afficher l'aperçu en tant que vidéo
                        preview.innerHTML = '<video width="320" height="240" controls><source src="' + e.target.result + '" type="video/mp4"></video>';
                    } else {
                        // Type de fichier non pris en charge
                        console.log('Type de fichier non pris en charge');
                    }
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    }
});