(function() {
    const menuButton = document.querySelector('#mobileMenuButton');
    const menuIcons = document.querySelectorAll('#mobileMenuButton .animated-hamburger-icon');
    menuButton.addEventListener('click', () => {
        menuIcons[0].classList.toggle('open');
        document.getElementsByTagName('body')[0].classList.toggle('header-show');
    });
}());
