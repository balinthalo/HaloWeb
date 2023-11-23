const fileInput = document.getElementById('dropzone-file')
const output = document.getElementById('out')
const display = document.getElementById('display')
/*
console.log(display.src) */

if (fileInput) fileInput.addEventListener('change', function() {

    var fr=new FileReader()

    fr.onload=function(){
        display.innerHTML = fr.result

    }

    fr.readAsText(this.files[0])
})

//TODO: drag and drop

