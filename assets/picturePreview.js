function createThumbnail(sFile) {
  var oReader = new FileReader();
  oReader.addEventListener('load', function () {
    var oImgElement = document.createElement('img');
    oImgElement.classList.add('imgPreview')
    oImgElement.src = this.result;
    document.getElementById('preview_pictures_field').appendChild(oImgElement);
  }, false);

  oReader.readAsDataURL(sFile);

}

function changeInputFile(oEvent) {
  var oInputFile = oEvent.currentTarget,
    aFiles = oInputFile.files;
  document.getElementById('preview_pictures_field').innerHTML = '';
  for (var i = 0; i < aFiles.length; i++) {
    createThumbnail(aFiles[i]);
  }
}

document.addEventListener('DOMContentLoaded', function () {
  var aFileInput = document.forms['user'].querySelectorAll('[type=file]');
  for (var k = 0; k < aFileInput.length; k++) {
    aFileInput[k].addEventListener('change', changeInputFile, false);
  }
});
