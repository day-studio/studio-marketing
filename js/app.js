gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

const burger = document.querySelector('.burger');
const panel = document.querySelector('.hamburger-panel');
const body = document.querySelector('body');
const container = document.querySelector('#container');
const scroller = document.querySelector('.js-scroll');


jQuery(function($) {
    init(); 
    /***************************************/
    function init() {
        embedFont();
        initHamburgerPanel();
        // initCursor();
        barba.hooks.beforeEnter((data) => {
            initSmoothScroll();
            document.querySelector('body').classList.remove('is-loading');
        });

        barba.hooks.afterEnter((data) => {
            initCorrectMarkers();     
        });

        barba.hooks.after(() => {
            document.querySelector('html').classList.remove('is-transitioning');
            document.querySelector('body').classList.remove('is-loading');
        });

        barba.hooks.enter((data) => {
            document.querySelector('html').classList.add('is-transitioning');
            // console.log('hook-enter');
            wpNavClass(data); // Live
            wpBodyClass(data);
            disableCurrentLink();
            // bodyScrollBar.setPosition(0, 0);

        });
        barba.init({
            views:[{
                namespace: 'home',
                beforeEnter({next}){
                    // console.log('before-enter-home');  
                    fadeItem(0.25);
                    miscHorizontalLine(0.25);
                    // svgTextStagger(0.5);
                    maskText(0.75);
                    // maskFrameImage(next.container, 1); // current/next 중 이벤트 일어날 대상 지정

                    // parallaxFrame();
                },
                async beforeLeave({current}){
                    await gsap.timeline()
                        .to(current.container,{autoAlpha:0})
                }
            },{
                namespace: 'about',
                beforeEnter({next}){
                    // console.log('before-enter-about');  
                    miscHorizontalLine(0.25);  
                    fadeItem(0.25);
                    maskText(0.75);
                    maskFrameImage(next.container,0.5);

                },
                async beforeLeave({current}){
                    await gsap.timeline()
                        .to(current.container,{autoAlpha:0})
                }
            },{
                namespace: 'contact',
                beforeEnter({next}){
                    // console.log('before-enter-contact');  
                    miscHorizontalLine(0.25);  
                    fadeItem(0.25);
                    maskText(0.75);
                },
                async beforeLeave({current}){
                    await gsap.timeline()
                        .to(current.container,{autoAlpha:0})
                }
            },{
                namespace: 'archive-project',
                beforeEnter({next}){
                    // console.log('before-enter-project');
                    miscHorizontalLine(0.25);  
                    maskText(0.75);
                    fadeItem(0.25);
                    // marqueeText();
                },
                async beforeLeave({current}){
                    await gsap.timeline()
                        .to(current.container,{autoAlpha:0})
                }
            }],
            transitions: [{
                once(data) { 
                    // console.log('default-once');
                    var header = document.querySelector('.site-header');
                    gsap.timeline()
                        .fromTo(header,{autoAlpha:0,yPercent:-100},{autoAlpha:1,  delay:0.25, yPercent:0}, '0')
                },
                enter({next}) {
                    // console.log('default-enter');
                    bodyScrollBar.setPosition(0, 0);
                },
                async leave({current}) {
                    await navClose();
                }
            }]
        });
    }
}); // End jQuery
