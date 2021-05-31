function miscHorizontalLine(delayTime){
	if (!document.querySelector('.horizontal-line')) {
        return;
    }
	let line = document.querySelectorAll('.horizontal-line');
	gsap.timeline({delay:delayTime})
		.fromTo(line,{scaleX:0}, {scaleX:1, duration:0.5,transformOrigin:'left center', ease:Power4.inOut})
}

function svgTextStagger(delayTime){

	if (!document.querySelector('.svg-text ')) {
        return;
    }

	let text = document.querySelectorAll('.svg-text path');
	gsap.timeline({delay:delayTime})
		.fromTo(text,{autoAlpha:0,yPercent:110},{autoAlpha:1,yPercent:0,stagger:0.05,ease:Power4.inOut,})
}
function fadeItem(delayTime){
	if (!document.querySelector('.fade-item')) {
        return;
    }
	let items= document.querySelectorAll('.fade-item');
	items.forEach(item =>{
		let tl = gsap.timeline({
			delay:delayTime,
		});
		tl
			.fromTo(item,{autoAlpha:'0', y:'20'},{autoAlpha:'1', y:'0',duration:'0.5', ease:Power4.inOut})
	})
}

function parallaxItem(){
	if (!document.querySelector('.parallax-item')) {
        return;
    }	
	let items = document.querySelectorAll('.parallax-item');
	items.forEach(item =>{
		let tl = gsap.timeline({
			scrollTrigger:{
				trigger:item,
				markers:true,
				start : 'top bottom',
				scrub:true,

			}
		});
		tl
			.to(item,{y:-20,ease:Power4.inOut})
	})
}

function parallaxFrame(){
	if (!document.querySelector('.parallax-frame')) {
        return;
    }	

	let frames = document.querySelectorAll('.parallax-frame');
	frames.forEach(frame =>{
		let image = frame.querySelector('img');
		let tl = gsap.timeline({
			scrollTrigger:{
				trigger:image,
				// markers:true,
				start : 'top bottom',
				scrub:true,
			}
		});
		tl
			.to(image,{yPercent:20, ease:Power4.inOut})
	})
}


function maskText(delayTime){
	if (!document.querySelector('.mask-text')) {
        return;
    }	
	
	let masks= document.querySelectorAll('.mask-text');
	masks.forEach(mask =>{
		
		let text = mask.querySelector('span');
		let tl = gsap.timeline({
			delay:delayTime,
		});
		tl
			.fromTo(text,{yPercent:'100', autoAlpha:0},{yPercent:0,autoAlpha:1, ease:Power4.inOut})
	})
}

function maskFrame(delayTime){
	if (!document.querySelector('.mask-frame')) {
        return;
    }	

	// console.log('maskFrame');
	let masks= document.querySelectorAll('.mask-frame');
	masks.forEach(mask =>{
		let overlay = mask.querySelector('.mask__overlay');
		let target = mask.querySelector('.mask__target');
		let tl = gsap.timeline({
			delay:delayTime,
			// scrollTrigger:{
			// 	trigger:mask,
			// 	// markers:true,
			// 	start : 'top bottom',

			// }
		});
		tl
			
			.fromTo(overlay,{scaleX:0},{scaleX:1, transformOrigin:"left center", duration:0.5, ease:Power1.inOut})
			.fromTo(target,{autoAlpha:0},{autoAlpha:1, duration:2, ease:Power1.inOut})
			.to(overlay,{scaleX:0, transformOrigin:"left center", ease:Power1.inOut})
			

	})
}


function maskFrameImage(container, delayTime){
	if (!document.querySelector('.mask-image')) {
        return;
    }	
	
	let mask= container.querySelector('.mask-image')
	let outer = mask.querySelector('.mask-image__outer');
	let inner = mask.querySelector('.mask-image__inner');


	gsap.timeline({
		delay:delayTime,
	}) 
		.fromTo(outer,{yPercent:'-101', autoAlpha:0},{yPercent:0, duration:1, autoAlpha:1, ease:Power1.inOut})
		.fromTo(inner,{yPercent:'100'},{yPercent:0, duration:1, ease:Power4.inOut},0)
	// console.log('maskframeimage');
}



function marqueeText(){
    if (!document.querySelector('.marquee-text')) {
        return;
    }
    gsap.set('.marquee-text .to-left',{xPercent:-25})
    gsap.timeline({
        scrollTrigger:{
            trigger:'.marquee-text',
            markers:true,
            start:'top bottom',
            end:'bottom top',
            toggleActions:'play reverse play reverse',
            scrub:1,
            pinSpacing:false,

        }
    })
        .to('.marquee-text .to-right',{xPercent:-25},0)
        .to('.marquee-text .to-left',{xPercent:0},0)
 
}

function bgColorToggle(){
	var sectionPhil = document.querySelector('section.change-bgcolor');

	gsap.timeline({
		scrollTrigger :{
			trigger:sectionPhil,
			// markers:true,
			start : 'top 50%',
			end : 'bottom 50%',
			onEnter : () => updateBodyColor('#000', '#f5efe1'),
			onLeaveBack : () => updateBodyColor('#f5efe1', '#000'),
		},
	})
}




const updateBodyColor = function(bgColor, textColor){
	document.documentElement.style.setProperty('--bg-color', bgColor);
	document.documentElement.style.setProperty('--text-color', textColor);
}