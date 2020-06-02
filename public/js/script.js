function showName() {
    var fileName = document.getElementById('terms'),
        label = document.getElementById('input-label'),
        submit = document.getElementById('submit-button'),
        labelVal = label.innerText;

    fileName = fileName.files.item(0).name;
    if( fileName ){
        label.innerHTML = fileName;
        label.classList.add('input-upload-blue');
        label.classList.remove('btn-primary');

        submit.removeAttribute("disabled");
        submit.classList.add('btn-success');
        submit.classList.remove('btn-secondary', 'upload-text');
    }
};

document.getElementById('terms').addEventListener("change", showName, false);

document.querySelector("#date").valueAsDate = new Date();

