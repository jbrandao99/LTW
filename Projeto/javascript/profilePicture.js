function pictureClick() {
    document.querySelector('#profilePicture').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function createImage(element) {
    var newImageProp = element.parentElement.cloneNode(true);
    document.getElementsByClassName("tab")[3].appendChild(newImageProp);
}