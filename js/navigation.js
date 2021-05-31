function disableCurrentLink(){
	document.querySelector('a').addEventListener('click', function(e){
		if(e.currentTarget.href === window.location.href) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
}

function initCursor(){
	let mouseCursor = document.querySelector('.cursor');
	let navLinks = document.querySelectorAll('.menu li a');
	
	document.addEventListener('mousemove', cursor);

	function cursor(e){
		mouseCursor.style.top = e.pageY + 'px';
		mouseCursor.style.left = e.pageX + 'px';
	}

	burger.addEventListener('mouseover',()=>{
		mouseCursor.classList.add('link-grow');
	
	})
	burger.addEventListener('mouseleave',()=>{
		mouseCursor.classList.remove('link-grow');
	})
	
	
	navLinks.forEach(link => {
		link.addEventListener('mouseover',()=>{
			mouseCursor.classList.add('link-grow');
			link.classList.add('hovered-link');
		})
		link.addEventListener('mouseleave',()=>{
			mouseCursor.classList.remove('link-grow');
			link.classList.remove('hovered-link');
		})
	});
}

function initHeader() {
	if (!document.querySelector('header')) {
		return;
    }
	var header = document.querySelector('header');
	var logo = header.querySelector('.logo');
	var nav = header.querySelector('.main-nav');
	gsap.timeline({
		scrollTrigger : {
			trigger:header,
			// markers:true,
			start : '50px top',
			toggleActions: 'play none none reverse',
		},
	})
		.to(logo,{autoAlpha:0})
		.to(nav,{autoAlpha:0},0)
}



function initHamburgerPanel() {
	if (!document.querySelector('.hamburger-panel')) {
		return;
	}
	var navItems = panel.querySelectorAll('a');
	navItems.forEach(link =>{
		link.addEventListener('click',function(e){
			if(e.currentTarget.href === window.location.href) {
				e.preventDefault();
				e.stopPropagation();
				burger.querySelector('button').classList.remove('open');
				panel.classList.remove('open');
				gsap.timeline()
				.to(panel, {
					xPercent:0,
				});
			}
		})
	})
	burger.addEventListener('click', navToggle);
	function navToggle(e) {
		// console.log('click burger')
		e.preventDefault();
		e.stopPropagation();
		if(!burger.classList.contains('open')){
			navOpen()
		}else{
			navClose();
		}
	}
}

function navOpen(){
	burger.classList.add('open');
	body.classList.add('has-nav-open');
	gsap.to(".line1", 0.5, { rotate: "45", y: 3, background: "white" });
	gsap.to(".line2", 0.5, { rotate: "-45", y: -3, background: "white" });
	panel.classList.add('open');
	gsap.timeline()
		.to(panel, {yPercent:100,})
}

function navClose(){
	burger.classList.remove('open');
	body.classList.remove('has-nav-open');
	gsap.to(".line1", 0.5, { rotate: "0", y: 0, background: "black" });
	gsap.to(".line2", 0.5, { rotate: "0", y: 0, background: "black" });
	panel.classList.remove('open');
	gsap.timeline()
		.to(panel, {yPercent:-100,ease:Power4.easeInOut,});
}

