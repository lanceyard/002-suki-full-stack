// hamburger
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');
const navClose = document.getElementById('close');

hamburger.addEventListener('click', function(){
    navMenu.classList.add('active-navbar');
});

navClose.addEventListener('click', function(){
    navMenu.classList.remove('active-navbar');
});

// active menu
const title = document.getElementById('title').innerText;
const list = document.getElementsByClassName('a-menu');

if(title == "Beranda"){
    list[0].classList.add('active-menu');
}else if(title == "Produk"){
    list[1].classList.add('active-menu');
}else if(title == "Tentang Kami"){
    list[2].classList.add('active-menu');
}else if(title == "Kontak"){
    list[3].classList.add('active-menu');
}