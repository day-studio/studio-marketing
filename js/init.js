gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);


/**
 * 1) image loaded > on progress > page transitions
 * 2) page transition
 *      - once  : > onComplete > initContent
 *      - leave : await PageTransitionIn > async > enter > onComplete 
 * 3) page content
 *      -  smooth scroll
 *      -  gsap animation
 * 4) > correct gsap markers
 ***/


jQuery(function ($) {

	let bodyScrollBar;
	const loader = document.querySelector('.loader');

	// init(); 
	initContent();

	function init() {
		const progressBar = document.querySelector('.loader .progress_bar');
		//DEV///
		gsap.set(loader, {
			autoAlpha: 1
		});

		const progressTween = gsap.from(progressBar, {
			paused: true,
			scaleX: 0,
			ease: 'none',
			transformOrigin: 'left'
		});

		let loadedImageCount = 0,
			imageCount;
		const container = document.querySelector('main');

		const imgLoad = imagesLoaded(container);
		imageCount = imgLoad.images.length;

		updateProgress(0);

		imgLoad.on('progress', function () {
			loadedImageCount++;
			updateProgress(loadedImageCount);
		});

		function updateProgress(loadedImageCount) {
			gsap.to(progressTween, {
				progress: loadedImageCount / imageCount,
				duration: 3
			})
		}

		imgLoad.on('done', function (instance) {
			console.log('imgLoad done')
			gsap.set(progressBar, {
				autoAlpha: 0,
				onComplete: initPageTransitions
			})
		})
	}



	function initPageTransitions() {

		barba.hooks.before(() => {
			document.querySelector('html').classList.add('is-transitioning');
		});
		barba.hooks.after(() => {
			document.querySelector('html').classList.remove('is-transitioning');
		});
		barba.hooks.enter((data) => {
			//update BodyClass
			var response = data.next.html.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', data.next.html);
			var bodyClasses = $(response).filter('notbody').attr('class');
			console.log(bodyClasses);
			$('body').attr('class', bodyClasses);

			// Update admin bar
			if ($('body').hasClass('admin-bar')) {
				$("#wpadminbar").replaceWith($(response).find('#wpadminbar'));
				$("#wpadminbar a").each(function () {
					$(this).attr('data-barba-prevent', true);
				});
			}
			bodyScrollBar.setPosition(0, 0);
		});

		barba.init({
			transitions: [{
				once() {
					initLoader();
				},
				async leave({
					current
				}) {
					await pageTransitionIn(current);
				},
				enter({
					next
				}) {
					pageTransitionOut(next);
				}
			}]
		});

		function initLoader() {
			console.log('Loader');
			const loaderTitle = document.querySelector('.loader_title');
			// initContent();
			const tl = gsap.timeline({
				onComplete: () => initContent()
			});
			tl
				.to(loaderTitle, {
					y: "-50vh"
				})
				.to(loader, {
					yPercent: -100
				})
			return tl;
		}

		function pageTransitionIn({
			container
		}) {
			console.log('pageTransitionIn');
			const tl = gsap.timeline({});
			tl
				.set(loader, {
					yPercent: 100
				})
				.to(loader, {
					yPercent: 0
				})
				.to(container, {
					y: 150
				}, 0);
			return tl;
		}

		function pageTransitionOut({
			container
		}) {
			console.log('pageTransitionOut');
			const tl = gsap.timeline({
				onComplete: () => initContent()
			});

			tl
				.set(loader, {
					yPercent: 0
				})
				.to(loader, {
					yPercent: -100
				})
				.from(container, {
					y: -150
				}, 0);

			return tl;
		}
	}




	function initContent() {
		console.log('initContent');

		document.querySelector('body').classList.remove('is-loading');

		//Smooth Scroll
		initSmoothScroll();
		// initHeaderAni();
		//Animations
		// initMenu();
		initHamburger();
		// initScrollTo();
		// initImageParallax();
		// initImageMask();
		// initImageOverlay();
		// initImageZindex();
		// initImageDataset();
		// slideInHorizontal();
		// slideInLayer();
		// multipleSection();
		// pinSection();
		// scrubSection();
		// initTextMarquee();
		// initTextMask();

		//Correct Smooth Scroll After GSAP 
		initCorrectMarkers();
	}

	function initSmoothScroll() {
		const scroller = document.querySelector('.js-scroll');
		
		bodyScrollBar = Scrollbar.init(scroller, {
			damping: 0.1
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
		if (document.querySelector('.gsap-marker-scroller-start')) {
			const markers = gsap.utils.toArray('[class *= "gsap-marker"]');
			bodyScrollBar.addListener(({
				offset
			}) => {
				gsap.set(markers, {
					marginTop: -offset.y
				})
			});
		}
	}



}); // End jQuery