
const img = document.querySelector('#imgForm');

const text = document.querySelector('#txtImg')

text.addEventListener('change',()=>{
  img.src=text.value;
});
