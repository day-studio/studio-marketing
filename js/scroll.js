function initSmoothScroll() {
    // console.log('initSmoothScroll');
    bodyScrollBar = Scrollbar.init(scroller, {
        damping: 0.04,
        thumbMinSize:20,
        continuousScrolling:true,
    });
    bodyScrollBar.track.xAxis.element.remove();
    ScrollTrigger.scrollerProxy(".js-scroll", {
        scrollTop(value) {
            if (arguments.length) {
                bodyScrollBar.scrollTop = value;
            }
            return bodyScrollBar.scrollTop;
        }
    });
    bodyScrollBar.addListener(ScrollTrigger.update);
    ScrollTrigger.defaults({
        scroller: scroller
    });
}
function initCorrectMarkers() {
    // console.log('initCorrectMarkers');
    if (document.querySelector('.gsap-marker-scroller-start')) {
        const gsapMarkers = gsap.utils.toArray('[class *= "gsap-marker"]');
        bodyScrollBar.addListener(({
            offset
        }) => {
            gsap.set(gsapMarkers, {
                marginTop: -offset.y
            })
        });
    }
}
