function initHeaderAni(){
    var $header = $('.site-header');
    $(window).scroll(function () {
        $(window).scrollTop() > 50 ? $header.addClass("sticky") : $header.removeClass("sticky");
    
    });
}


function initMenu(){
    if (!document.querySelector('.main-navigation')) {
        return;
    }
    console.log('main nav')

    gsap.timeline()
        .from('.main-navigation .nav-menu li a',{yPercent:-100, autoAlpha:0, stagger:0.1, })

}



function initHamburger() {
    if (!document.querySelector('.hamburger-panel')) {
        return;
    }
    const burger = document.querySelector('.hamburger-menu');
    const menuContainer = document.querySelector('.hamburger-panel');
    const menu = menuContainer.querySelectorAll('a');

    burger.addEventListener('click', toggleMenu)
    
    gsap.set(menu, {yPercent: 100})

    function toggleMenu(e) {
        if (!menuContainer.classList.contains('open')) {
            menuContainer.classList.add('open');
            gsap.timeline()
                .to(menuContainer, {
                    xPercent: -100
                })
                .to(menu, {
                    yPercent: 0
                })
        } else {
            menuContainer.classList.remove('open');
            gsap.timeline()
                .to(menu, {
                    yPercent: 100
                })
                .to(menuContainer, {
                    xPercent: 0
                })
        }
    }
}


