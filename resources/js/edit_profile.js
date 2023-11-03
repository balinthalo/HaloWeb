const inputImg = document.getElementById('imgInput')
const profile = document.getElementById('profile')

function getImg(event){

     const file = event.target.files[0]; // 0 = get the first file

     // console.log(file);

     let url = window.URL.createObjectURL(file);

     // console.log(url)

     profile.src = url
}

inputImg?.addEventListener('change', getImg)
