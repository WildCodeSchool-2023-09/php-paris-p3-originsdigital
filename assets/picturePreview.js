function createThumbnail(sFile) {
  var oReader = new FileReader();
  oReader.addEventListener('load', function () {
    let inputfield = document.querySelector('.file-input-field');
    inputfield.style.backgroundImage = `url(${oReader.result})`;
  }, false);

  oReader.readAsDataURL(sFile);
}

function changeInputFile(oEvent) {
  var oInputFile = oEvent.currentTarget;
  var aFiles = oInputFile.files;
  createThumbnail(aFiles[0]);
}

document.addEventListener('DOMContentLoaded', function () {
  var aFileInput = document.forms['user'].querySelectorAll('[type=file]');
  aFileInput[0].addEventListener('change', changeInputFile, false);
});
