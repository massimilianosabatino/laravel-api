import './bootstrap';
import Alpine from 'alpinejs';
import '~resources/scss/app.scss';
import.meta.glob([
    '../img/**'
]);

import * as bootstrap from 'bootstrap';

window.Alpine = Alpine;

Alpine.start();

//Get element from dom
const inputFile = document.getElementById('cover-upload');
const urlCover = document.getElementById('cover');

//Preview for uploaded file
function imagePreview(event) {
    if (event.target.files.length > 0) {
        const src = URL.createObjectURL(event.target.files[0]);
        const preview = document.getElementById("file-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}

//Preview for url 
function urlPreview() {
    if (isImage(urlCover.value)) {
        const src = urlCover.value;
        const preview = document.getElementById("file-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}

//Check if url end is image
function isImage(url) {
    return /\.(jpg|jpeg|png|webp|avif|gif|svg)$/.test(url);
}

//Event listener for preview
inputFile.addEventListener('change', imagePreview);
urlCover.addEventListener('keyup', urlPreview);