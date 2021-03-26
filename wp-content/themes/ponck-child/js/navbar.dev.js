/* In dit bestand staat de werking van het navigatiemenu
*  Deze is opgebouwd uit een aantal event listeners die methods in een tweetal classes gebruikt
*  Alle logica zit in de classen verwerkt
*  Hierbij gebruiken we een algemene class voor variabelen en het mobiele menu en een class voor het desktop menu
*/

//Event listener voor het mobiele menu
(function() {
    
    const mainMenuLinkWithSubmenu = document.querySelectorAll('#mainMenu .menu-item-has-children a');

    for(let link of mainMenuLinkWithSubmenu) {

        link.addEventListener('click', (e) => {

            if(window.innerWidth <= 992) {

                if(link.parentElement.classList.contains('menu-item-has-children')) {

                    e.preventDefault();
                    setMenu.activateSubmenu(link);

                } else {

                    setMenu.clearMenu();

                }
                
            }

        });

    }

    //Eventlistener om het mobiele menu terug naar startpositie te zetten
    const menuKnop = document.querySelector('#mobileMenuButton .animated-hamburger-icon');

    menuKnop.addEventListener('click', () => {

        if(menuKnop.classList.contains('open')){

            setMenu.clearMenu();

        }

    })

}());

//Eventlistener het openen en sluiten van het mobiele menu na klikken hamburger icoon
(function() {

    const menuButton = document.querySelector('#mobileMenuButton');
    const menuIcons = document.querySelectorAll('#mobileMenuButton .animated-hamburger-icon');

    menuButton.addEventListener('click', () => {
        const scrollDepth = window.scrollY;
        menuIcons[0].classList.toggle('open');
        document.getElementsByTagName('body')[0].classList.toggle('header-show');
        document.querySelector('#contactButtonTopHeader').classList.toggle('visibility-hidden');
        document.querySelector('#mobileMenuHomeIcon').classList.toggle('visibility-hidden');
        setMenu.footerMenuBrowserFixedBottom(scrollDepth);

    });

}());

//Eventlistener voor desktop menu
(function() {

    const mainMenu = document.querySelector('#mainMenu');
    const level1items = mainMenu.querySelectorAll('li.menu-item-has-children.level_1');
    const pageHeader = document.querySelector('#page-header');
    let mouseOver = false;
    let lastTimeoutId;

    document.addEventListener('mousemove',(e) => {

        if(pageHeader.offsetHeight+setMenu.adminLoggedIn() >= e.clientY) {

            mouseOver = true; 

        } else {

            mouseOver = false;
            mainMenu.classList.remove('megamenu');

            for(let level1item of level1items) {
                setMenu.activatedropdown(level1item,false);
            }

        }
    });
    

    for(let level1item of level1items) {
        
        level1item.addEventListener('mouseenter',() => {

            if(window.innerWidth > 992) {

                //We stellen een korte timeout in om haperen te voorkopen
                clearTimeout(lastTimeoutId);
                lastTimeoutId = setTimeout(() => {

                    mainMenu.classList.add('megamenu');
                    setMenu.activatedropdown(level1item);

                }, 300);
            
            }
        });

    }

    //clears dropdowns wanneer je het scherm verlaat
    pageHeader.addEventListener('mouseleave',()=> {
        setMenu.clearDropdown();
    });
    
    document.addEventListener("mouseleave", function(event){
        if(event.clientY <= 0 || event.clientX <= 0 || (event.clientX >= window.innerWidth || event.clientY >= window.innerHeight)) {
            setMenu.clearDropdown();
        }
    });

}());


/* De werking van het menu staat in deze class
*  Deze class is voor het overzicht opgedeeld in seMenuClass en setMenuClassDesktop
*  In setMenuClass staan alle globale variabelen en methods die geladen moeten worden bij initialiseren
*  Daarnaast bevat het de methods voor de werking van het mobiele menu
*  Voor het desktop menu worden variabelen uit setMenuCVlass gebruikt maar alle methods staan in setMenuClassDesktop
*/
class setMenuClass {

    constructor() {
        this.mainMenuParentLink = document.querySelectorAll('#mainMenu .menu-item.level_1');
        this.mainMenuLevel2Link = document.querySelectorAll('#mainMenu .menu-item.level_2');
        this.mainNavContainer = document.querySelector('#mainNavContainer');
        this.currentLevel = 1;

        this.setActiveClasses();
        this.stickyHeader();
        document.getElementById('mainMenu').dataset.currentlevel = this.currentLevel;
        window.addEventListener('load', this.setMenu);
        window.addEventListener('resize', this.setMenu);
    }

    //browser fix voor samsung internet
    footerMenuBrowserFixedBottom(scrollDepth) {

        if(scrollDepth < 30) {
            document.getElementsByTagName('body')[0].dataset.taskbar = true;
        } else {
            document.getElementsByTagName('body')[0].dataset.taskbar = false;
        }
        //document.getElementsByTagName('body')[0].innerHTML = navigator.userAgent;

        if(document.getElementsByTagName('body')[0].classList.contains('header-show')) {
            document.getElementsByTagName('html')[0].dataset.headershow = true;
            
            if(navigator.userAgent.indexOf("SamsungBrowser") > -1) {
                document.getElementsByTagName('body')[0].dataset.browser = "samsung";
            } else if(navigator.userAgent.indexOf("Mac OS") > -1) {
                document.getElementsByTagName('body')[0].dataset.browser = "safari";
            } else if(navigator.userAgent.indexOf("Chrome") > -1) {
                document.getElementsByTagName('body')[0].dataset.browser = "chrome";
            }
        } else {
            document.getElementsByTagName('html')[0].dataset.headershow = false;
        } 
    }

    stickyHeader() {
        window.addEventListener('scroll',() => {
            const pageHeader = document.getElementById('page-header');
            if(window.scrollY >= 62) {
                if(!pageHeader.classList.contains('sticky')) {
                    pageHeader.classList.add('sticky');
                    if(document.getElementById('wpadminbar')) {
                        pageHeader.classList.add('is-admin');
                    } else {
                        pageHeader.classList.remove('is-admin');
                    }
                }
            } else {
                if(pageHeader.classList.contains('sticky')) {
                    pageHeader.classList.remove('sticky');
                }
            }
        })
    }

    //Bepaald of we mobiel of desktop menu tonen
    setMenu(){

        const nav = document.querySelector('#mainNavContainer');
        if(window.innerWidth > 992) {
            
            if(nav.classList.contains('type_mobile')) {
                nav.classList.remove('type_mobile');    
                nav.classList.add('type_desktop'); 
            }   
        } else {
            
            if(nav.classList.contains('type_desktop')) {
                nav.classList.remove('type_desktop');    
                nav.classList.add('type_mobile'); 
            } 
        }
    }

    activateSubmenu(link) {

        const current = this.currentLevel;
        this.setCurrentLevel(link);
        this.mainNavContainer.classList.add('animating');
        link.parentElement.classList.toggle('opened');

        const that = this;
        setTimeout(function(){ 
            that.mainNavContainer.classList.add('show-sub');
            that.setActiveClasses(link,current);
            document.getElementById('mainMenu').dataset.currentlevel = that.currentLevel;

        }, 500);

        //setTimeout moet hier 2x zo lang zijn als bovenstaande
        setTimeout(function(){ 
            this.mainNavContainer.classList.remove('animating');
        }, 1000);

    } 

    setActiveClasses(link = false, previous = false) {

        if(this.clearAllActives()) {

            const allMenuItems = this.mainNavContainer.getElementsByClassName('menu-item');
            for(let menuItem of allMenuItems) {
                if(menuItem.classList.contains(`level_${this.currentLevel}`)) {
                    if(this.currentLevel === 1) {
                        menuItem.classList.add('active');
                    } else {

                        if(previous != false && previous < this.currentLevel) {
                            //We gaan een subniveau verder
                            //Zoek de parent en zet alle children op actief tot 1 niveau
                            const parentEl = link.parentElement;
                            parentEl.classList.add('active');
                            const level = this.getClickLevel(parentEl)+1;
                            
                            const children = parentEl.querySelectorAll(`li.level_${level}`);
                            for(let child of children) {
                                child.classList.add('active');
                            }

                            //voor level 3 moeten we het level 1 item ook op actief zetten
                            if(this.currentLevel === 3) {
                                for(let level1link of this.mainMenuParentLink) {
                                    if(level1link.classList.contains('opened')) {
                                        level1link.classList.add('active');
                                    }
                                }
                            }
                        } else {

                            //We gaan van niveau 3 naar niveau 2
                            for(let level1link of this.mainMenuParentLink) {
                                if(level1link.classList.contains('opened')) {
                                    level1link.classList.add('active');

                                    const activeLevel2Links = level1link.querySelectorAll('li.menu-item.level_2');
                                    for(let level2link of activeLevel2Links) {
                                        level2link.classList.add('active');
                                    }                                
                                    return; 
                                }
                            }
                        }
                    }
                } else {
                    menuItem.classList.remove('active');
                }
            }
        }
    }

    //verwijderd alle active classen
    //alleen elementen met active class worden getoond
    clearAllActives() {
        const allActives = this.mainNavContainer.querySelectorAll('.menu-item.active');
        for(let activeLink of allActives) {
            activeLink.classList.remove('active');
        }
        return true;
    }

    //reset menu naar start positie
    clearMenu() {
        this.currentLevel = 1;
        this.setActiveClasses();
        this.mainNavContainer.classList.remove('show-sub');
        const openedElements = document.querySelectorAll('#mainMenu .opened');

        for(let level1item of openedElements) {
            level1item.classList.remove('opened');
        }

        document.getElementById('mainMenu').dataset.currentlevel = this.currentLevel;
    }

    //return het niveau van submenu's (level 1, 2 3)
    getClickLevel(link) {
        if(link.classList.contains('level_1')) return 1;
        else if(link.classList.contains('level_2')) return 2;
        else if(link.classList.contains('level_3')) return 3;
        else {
            console.error('Meer dan 3 niveau\'s in het menu gebruikt. Hier is geen rekening mee gehouden bij het bouwen van het mobiele menu');
            return false;
        }
    }

    //stelt het huidige niveau van het submenu in
    setCurrentLevel(link) {

        let linkLevel = this.getClickLevel(link);
        if(this.getClickLevel(link) != false) {
            if(linkLevel === this.currentLevel) this.currentLevel++;
            else this.currentLevel--;
        } 

        return this.currentLevel;
    }

} //class

//Deze class is voor het desktop menu
class setMenuClassDesktop  extends setMenuClass {
    constructor() {
        super();
        this.adminbar = 0;
        this.slideInNavbar();
    }

    //slides in mnain menu bij laden pagina
    slideInNavbar() {
        setTimeout(function(){ 
            document.getElementById('page-header').classList.add('slide-in');
        }, 500);
    }

    //Als admin is ingelogd ontstaat er een probleem bij het megamenu gezien die rekening houd met de scrollpositie
    //In deze method voegen we 32px extra speling toe
    adminLoggedIn() {
        if(document.querySelector('#wpadminbar')) {
            this.adminbar = 32;
        }
        return this.adminbar;
    }

    activatedropdown(el, show = true) {

        if(this.hasDropdown(el)) {
            
            this.clearDropdown();
            if(show) {
                el.classList.add('show-dropdown');  
                this.mainNavContainer.style.paddingBottom = this.getHeightSubmenu(el) + 'px';
            } else {
                el.classList.remove('show-dropdown');
                this.mainNavContainer.style.paddingBottom = '0px';
            }

        } else {
            console.error('element heeft geen dropdown');
        }
    }

    hasDropdown(el) {
        if(el.querySelectorAll('ul')) return true;
        else return false;
    }

    //returns de hoogte in px van het megamenu
    //Dit wordt gebruikt om texta padding toe te voegen aan de #mainNavContainer
    getHeightSubmenu(el,level = 2) {

        if(el.querySelectorAll(`ul.level_${level}`)) {

            const childDropdown = el.querySelectorAll('ul.level_2');
            if(childDropdown.length === 1) {

                return childDropdown[0].offsetHeight;

            } else {
                console.error('Meer of minder dan een dropdownmenu gevonden');
            }
        } else {
            console.error('Geen submenu gevonden in element: '+el);
        }
        return 0;
    }

    clearDropdown() {

        const dropdownLists = this.mainNavContainer.querySelectorAll('.show-dropdown');
        if(dropdownLists.length > 0) {

            for(let dropdownList of dropdownLists) {
                dropdownList.classList.remove('show-dropdown');
            }
            
        } else {
            return false;
        }
    }

} //class

const setMenu = new setMenuClassDesktop(); //Init class zowel desktop als mobiel













