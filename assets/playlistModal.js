document.addEventListener('DOMContentLoaded', function () {
    var playlistButton = document.getElementById('playlist-button');

    playlistButton.addEventListener('click', function () {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
    });
});
