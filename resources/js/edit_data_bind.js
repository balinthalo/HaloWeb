const input = document.getElementById('input')
const div = document.getElementById('output')

event();

function event() {
    input.addEventListener('keyup', (keyup) => change(keyup))
    if(e.target.value){
        div.style.background = "#64748b"
    }
    else {
        div.style.background = "#E2E8F0"
    }
}
function change(e){
    if(e.target.value){
        div.style.background = "#64748b"
    }
    else{
        div.style.background = "#E2E8F0"
    }
    div.innerText=e.target.value
}
function publish(){
    input.removeEventListener('keyup', change)
}
