const navbarHeigth = document.querySelector('header').offsetHeight;

// console.log(navbarHeigth);


document.documentElement.style.setProperty('--navbar-height', `${navbarHeigth + 1}px`);