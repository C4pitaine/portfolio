const menu = document.querySelector('.menu')
const header = document.querySelector('header')
const menuA = document.querySelectorAll('.menu #menu a')

/* Menu burger */

document.querySelector('header nav #burger').addEventListener('click',() =>{
    menu.classList.toggle('menuOpened')
    header.classList.toggle('menuOpened')
})

menuA.forEach(elem=>{
    elem.addEventListener('click',()=>{
        menu.classList.toggle('menuOpened')
        header.classList.toggle('menuOpened')
    })
})