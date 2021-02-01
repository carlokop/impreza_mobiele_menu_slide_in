//Bepaald of we mobiel of desktop menu tonen
const setMenu = () => {

    const nav = document.querySelector('#mainNavContainer');
    if(screen.width > 992) {
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

window.addEventListener('load', setMenu);
window.addEventListener('resize', setMenu);

//Deze class is voor het mobiele menu. 
class setSubmenuClass {

    constructor() {
        this.mainMenuParentLink = document.querySelectorAll('#mainMenu .menu-item.level_1');
        this.mainMenuLevel2Link = document.querySelectorAll('#mainMenu .menu-item.level_2');
        this.mainNavContainer = document.querySelector('#mainNavContainer');
        this.currentLevel = 1;

        this.setActiveClasses();
        document.getElementById('mainMenu').dataset.currentlevel = this.currentLevel;
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

    clearAllActives() {
        const allActives = this.mainNavContainer.querySelectorAll('.menu-item.active');
        for(let activeLink of allActives) {
            activeLink.classList.remove('active');
        }
        return true;
    }

    //reset menu
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

    //return het niveau van submenu's
    getClickLevel(link) {
        if(link.classList.contains('level_1')) return 1;
        else if(link.classList.contains('level_2')) return 2;
        else if(link.classList.contains('level_3')) return 3;
        else {
            console.error('Meer dan 3 niveau\'s in het menu gebruikt. Hier is geen rekening mee gehouden bij het bouwen van het mobiele menu');
            return false;
        }
    }

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
class setSubmenuClassDesktop extends setSubmenuClass {
    constructor() {
        super();
    }

    
}

//Regelt het openen en sluiten van het mobiele menu
(function() {
    const menuButton = document.querySelector('#mobileMenuButton');
    const menuIcons = document.querySelectorAll('#mobileMenuButton .animated-hamburger-icon');
    menuButton.addEventListener('click', () => {
        menuIcons[0].classList.toggle('open');
        document.getElementsByTagName('body')[0].classList.toggle('header-show');
        document.querySelector('#contactButtonTopHeader').classList.toggle('visibility-hidden');
        document.querySelector('#mobileMenuHomeIcon').classList.toggle('visibility-hidden');
    });
}());

//Event listener voor het mobile menu
(function() {
    //Link met submenu
    const setSubmenu = new setSubmenuClass();
    this.mainMenuLinkWithSubmenu = document.querySelectorAll('#mainMenu .menu-item-has-children a');

    for(let link of mainMenuLinkWithSubmenu) {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            setSubmenu.activateSubmenu(link);
        });
    }

    //clear menu
    const menuKnop = document.querySelector('#mobileMenuButton .animated-hamburger-icon');
    menuKnop.addEventListener('click', () => {
        if(menuKnop.classList.contains('open')){
            setSubmenu.clearMenu();
        }
    })
}());

//Sticky header
(function() {
    window.addEventListener('scroll',() => {
        const pageHeader = document.getElementById('page-header');
        if(window.scrollY >= 100) {
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
}());

/*
Voor het dropdown menu hebben we nu een cookie geplaatst die na 10 seconden verwijderd
We plaatsen de class megamenu wanneer we het megamenu willen tonen. Dit doet nog niets
*/

//Eventlistener voor desktop menu
const mainMenu = document.querySelector('#mainMenu');
mainMenu.addEventListener('mouseenter',() => {
    mainMenu.classList.add('megamenu');
    setCookie("megamenu",true,9); 
    setTimeout(() => {
        if(!getCookie('megamenu')) {
            mainMenu.classList.remove('megamenu');
        }
    }, 10000);
});

const setCookie = (cookieName,cookieValue,seconds,cookiePath = "/") => {
    var expirationTime = (1000 * seconds);                        
    var date = new Date();  
    var dateTimeNow = date.getTime(); 

    date.setTime(dateTimeNow + expirationTime);  
    var expirationTime = date.toUTCString();

    document.cookie = cookieName+"="+cookieValue+"; expires="+expirationTime+"; path="+cookiePath; 
}

const getCookie = (cookieName) => {
  var name = cookieName + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}








//submenu
const setSubmenu = new setSubmenuClassDesktop();
//setSubmenu.test();



