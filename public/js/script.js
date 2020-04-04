function showname () {
    var fileName = document.getElementById('terms'),
        label = document.getElementById('input-label'),
        labelVal = label.innerText;

    fileName = fileName.files.item(0).name;
    if( fileName ){
        label.innerHTML = fileName;
        label.classList.add('btn-success');
        label.classList.remove('btn-primary');
    }else {
        label.innerHTML = labelVal;
    }
};
