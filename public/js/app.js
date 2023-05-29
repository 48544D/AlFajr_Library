let navbarHeigth = document.querySelector('header').offsetHeight;

// convert navbarheight to vw 
navbarHeigth = (navbarHeigth / window.innerWidth) * 100;

// setting variable --navbar-height to navbarheight
document.documentElement.style.setProperty('--navbar-height', `${navbarHeigth}vw`);