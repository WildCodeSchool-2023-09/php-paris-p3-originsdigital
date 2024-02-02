// Prévisualisation des fichiers Uploads
window.addEventListener('DOMContentLoaded', function () {
  var thumbnailFileInput = document.getElementById('upload_video_thumbnailFile_file');
  var videoFileInput = document.getElementById('upload_video_videoFile_file');

  if (thumbnailFileInput && videoFileInput) {
    thumbnailFileInput.addEventListener('change', function () {
      readURL(this, thumbnailFileInput);
    });

    videoFileInput.addEventListener('change', function () {
      readURL(this, videoFileInput);
    });

    function readURL(input, preview) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          if (input.files[0].type.startsWith('image')) {
            thumbnailFileInput.style.backgroundImage = `url(${reader.result})`;
          } else if (input.files[0].type.startsWith('video')) {
            preview.style.display = 'none';
            let parentPreview = preview.parentNode;

            let video = document.createElement('video');
            video.setAttribute('id', 'upload_video_videoFile_file');
            video.setAttribute('width', '300');
            video.setAttribute('height', '169');
            video.setAttribute('controls', 'controls');

            let source = document.createElement('source');
            source.setAttribute('src', e.target.result);
            source.setAttribute('type', 'video/mp4');

            video.appendChild(source);

            parentPreview.appendChild(video);
          } else {
            console.log('Type de fichier non pris en charge');
          }
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  }
});
