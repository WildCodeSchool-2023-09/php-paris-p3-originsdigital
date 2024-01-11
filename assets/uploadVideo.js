// Prévisualisation des fichiers Uploads
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
                    if (input.files[0].type.startsWith('image')) {
                        preview.innerHTML = '<img src="' + e.target.result + '" alt="Thumbnail">';
                    } else if (input.files[0].type.startsWith('video')) {
                        preview.innerHTML = '<video width="320" height="240" controls><source src="' + e.target.result + '" type="video/mp4"></video>';
                    } else {
                        console.log('Type de fichier non pris en charge');
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
});


// Category_Select et Language_Select
window.addEventListener('DOMContentLoaded', function () {
    var languageSelect = document.getElementById('language_select');
    var categorySelect = document.getElementById('upload_video_category');
    let categoriesContainer = document.getElementById("category_select");
    const allCategories = Array.from(categorySelect.children);

        if (languageSelect) {
            languageSelect.addEventListener('change', function(e) {
                const categories = allCategories.filter((category) => category.getAttribute("data-category-id") == e.target.value)
                let select = document.createElement("select");
                select.setAttribute("id", "upload_video_category");
                select.setAttribute("name", "upload_video[category]")
                for (key in categories) {
                    select.appendChild(categories[key]);
                }
                categoriesContainer.innerHTML = null;
                categoriesContainer.appendChild(select);
            })
        }
});
