function createThumbnail(sFile) {
    var oReader = new FileReader();
    oReader.addEventListener('load', function () {
        var oImgElement = document.createElement('img');
        const inputfield = document.getElementById('user_profilepictureFile_file')
        oImgElement.classList.add('imgPreview')
        oImgElement.src = this.result;
        document.getElementById('preview_pictures_field').appendChild(oImgElement);
        inputfield.style.display = "none";
    }, false);

    oReader.readAsDataURL(sFile);
}

function changeInputFile(oEvent) {
    var oInputFile = oEvent.currentTarget;
    var aFiles = oInputFile.files;

    document.getElementById('preview_pictures_field').innerHTML = '';

    for (var i = 0; i < aFiles.length; i++) {
        createThumbnail(aFiles[i]);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var aFileInput = document.forms['user'].getElementById('user_profilepictureFile_file');

    for (var k = 0; k < aFileInput.length; k++) {
        aFileInput[k].addEventListener('change', changeInputFile, false);
    }
});
