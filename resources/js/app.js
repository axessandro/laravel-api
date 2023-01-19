import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

const imgInput = document.getElementById("img");
const imgPreview = document.getElementById("img-preview");

if (imgInput && imgPreview) {
    imgInput.addEventListener("change", function () {
        const uploadedFile = this.files[0];
        if (uploadedFile) {
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                imgPreview.src = reader.result;
            });
            reader.readAsDataURL(uploadedFile);
        }
    });
}