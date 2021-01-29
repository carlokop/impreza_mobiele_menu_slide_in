(function() {
    const menuButton = document.querySelector('#mobileMenuButton');
    const menuIcons = document.querySelectorAll('#mobileMenuButton .animated-hamburger-icon');
    menuButton.addEventListener('click', () => {
        menuIcons[0].classList.toggle('open');
        document.getElementsByTagName('body')[0].classList.toggle('header-show');
        document.querySelector('#contactButtonTopHeader').classList.toggle('visibility-hidden');
    });
}());

class setSubmenuClass {


    /*
    Er zit een fout in hoe this.currentLevel op de site wordt vertoond undefined
    We lijken niet goed terug te kunnen bladeren mogelijk door bovenstaande
    */




    constructor() {
        this.mobileMainMenuParentLink = document.querySelectorAll('#mobileMainMenu .menu-item.level_1');
        this.mobileMainMenuLevel2Link = document.querySelectorAll('#mobileMainMenu .menu-item.level_2');
        this.mobileNav = document.querySelector('#mobileNav');
        this.currentLevel = 1;

        this.setActiveClasses();
        document.getElementById('mobileMainMenu').dataset.currentlevel = this.currentLevel;
    }

    activateSubmenu(link) {

        this.setCurrentLevel(link);
        this.mobileNav.classList.add('animating');

        const that = this;
        setTimeout(function(){ 

            that.mobileNav.classList.add('show-sub');
            that.setActiveClasses(link);
            document.getElementById('mobileMainMenu').dataset.currentlevel = this.currentLevel;

        }, 1000);

        //setTimeout moet hier 2x zo lang zijn als bovenstaande
        setTimeout(function(){ 
            this.mobileNav.classList.remove('animating');
        }, 2000);

    } 

    setActiveClasses(link = false) {

        if(this.clearAllActives()) {
            const allMenuItems = this.mobileNav.getElementsByClassName('menu-item');
            for(let menuItem of allMenuItems) {
                if(menuItem.classList.contains(`level_${this.currentLevel}`)) {
                    if(this.currentLevel === 1) {
                        menuItem.classList.add('active');
                    } else {
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
                            for(let level1link of this.mobileMainMenuParentLink) {
                                if(level1link.classList.contains('opened')) {
                                    level1link.classList.add('active');
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
        const allActives = this.mobileNav.querySelectorAll('.menu-item.active');
        for(let activeLink of allActives) {
            activeLink.classList.remove('active');
        }
        return true;
    }

    //reset menu
    clearMenu() {
        this.currentLevel = 1;
        this.setActiveClasses();
        this.mobileNav.classList.remove('show-sub');
        const openedElements = document.querySelectorAll('#mobileMainMenu .opened');

        for(let level1item of openedElements) {
            level1item.classList.remove('opened');
        }
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


//Link met submenu
const setSubmenu = new setSubmenuClass();
this.mobileMainMenuLinkWithSubmenu = document.querySelectorAll('#mobileMainMenu .menu-item-has-children a');

for(let link of mobileMainMenuLinkWithSubmenu) {
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
