var i = 0;
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
function displayImageP(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        var nodes = document.querySelectorAll('#profileDisplay');
        var target = nodes[nodes.length - 2];
        var target2 = nodes[nodes.length - 1];
        reader.onload = function (e) {
            target.setAttribute('src', e.target.result);
            target.nextElementSibling.setAttribute('name', 'picture' + i++);
            target2.setAttribute('src', "../images/site/image-placeholder.jpg");
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function createImageP(element) {
    var newImageProp = element.parentElement.cloneNode(true);
    var list = document.getElementsByClassName("tab")[3];
    list.append(newImageProp);
    displayImageP(element);
}

// Open the Modal
function openModal() {
    document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}