/*-----------------------------------------------------------------



-------------------------------------------------------------------
Js TABLE OF CONTENTS
-------------------------------------------------------------------

01. header
02. animated text with swiper slider
03. magnificPopup
04. counter up 
05. wow animation
06. nice select
07. swiper slider
08. team hover effect
09. search popup
10. mouse cursor
11. preloader

------------------------------------------------------------------*/

(function($) {
    "use strict";

    $(document).ready(function() {

        //>> Mobile Menu Js Start <<//
        $('#mobile-menu').meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: "991",
            meanExpand: ['<i class="far fa-plus"></i>'],
        });

        //>> Sidebar Toggle Js Start <<//
        $(".offcanvas__close,.offcanvas__overlay").on("click", function() {
            $(".offcanvas__info").removeClass("info-open");
            $(".offcanvas__overlay").removeClass("overlay-open");
        });
        $(".sidebar__toggle").on("click", function() {
            $(".offcanvas__info").addClass("info-open");
            $(".offcanvas__overlay").addClass("overlay-open");
        });

        //>> Body Overlay Js Start <<//
        $(".body-overlay").on("click", function() {
            $(".offcanvas__area").removeClass("offcanvas-opened");
            $(".df-search-area").removeClass("opened");;
            $(".body-overlay").removeClass("opened");
        });

        //>> Sticky Header Js Start <<//

        $(window).scroll(function() {
            if ($(this).scrollTop() > 250) {
                $("#header-sticky").addClass("sticky");
            } else {
                $("#header-sticky").removeClass("sticky");
            }
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 250) {
                $("#pt-header").addClass("pt-header-sticky");
            } else {
                $("#pt-header").removeClass("pt-header-sticky");
            }
        });



        


   

        const sliderswiper = new Swiper('.hero-slider-2', {
        // Optional parameters
        speed: 1500,
        loop: true,
        slidesPerView: 1,
        autoplay: true,
        effect: 'fade',
        breakpoints: {
            '1600': {
                slidesPerView: 1,
            },
            '1400': {
                slidesPerView: 1,
            },
            '1200': {
                slidesPerView: 1,
            },
            '992': {
                slidesPerView: 1,
            },
            '768': {
                slidesPerView: 1,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },

            a11y: false,
        },

        navigation: {
            prevEl: ".array-next",
            nextEl: ".array-prev",
        },

        });
    
  
        //>> Video Popup Start <<//
        $(".img-popup").magnificPopup({
            type: "image",
            gallery: {
                enabled: true,
            },
        });

        $('.video-popup').magnificPopup({
            type: 'iframe',
            callbacks: {
            }
        });
        
        //>> Counterup Start <<//
        $(".count").counterUp({
            delay: 15,
            time: 4000,
        });

        //>> Wow Animation Start <<//
        new WOW().init();

        //>> Nice Select Start <<//
        $('select').niceSelect();

        //>> Hero Slider Start <<//
        if ($('.hero-slider-22').length > 0) {
            const heroSlider22 = new Swiper(".hero-slider-22", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                navigation: {
                    prevEl: ".array-prev",
                    nextEl: ".array-next",
                },
                breakpoints: {
                    1399: {
                        slidesPerView: 2,
                    },
                    1199: {
                        slidesPerView: 1,
                    },
                    991: {
                        slidesPerView: 2,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //>> Brand Slider Start <<//
        const brandSlider = new Swiper(".brand-slider", {
            spaceBetween: 30,
            speed: 1300,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },

            breakpoints: {
                1199: {
                    slidesPerView: 5,
                },
                991: {
                    slidesPerView: 4,
                },
                767: {
                    slidesPerView: 3,
                },
                575: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        });

        const brandSlider2 = new Swiper(".brand-slider-2", {
            spaceBetween: 30,
            speed: 1300,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },

            breakpoints: {
                1199: {
                    slidesPerView: 5,
                },
                991: {
                    slidesPerView: 4,
                },
                767: {
                    slidesPerView: 3,
                },
                575: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        });

        //>> repa mart Slider Start <<//
        const serviceSlider = new Swiper(".inner-buyer-slider", {
            spaceBetween: 30,
            speed: 2000,
            loop: true,
            nav:true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
          
            pagination: {
                el: ".dot-2",
                clickable: true,
            },
            navigation: {
                prevEl: ".array-next",
                nextEl: ".array-prev",
            },
            breakpoints: {
                1199: {
                    slidesPerView: 3,
                },
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 2,
                },
                575: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        });
        const serviceSliders = new Swiper(".inner-seller-slider", {
            spaceBetween: 30,
            speed: 2000,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".dot-2",
                clickable: true,
            },
            navigation: {
                prevEl: ".array-next",
                nextEl: ".array-prev",
            },
            breakpoints: {
                1199: {
                    slidesPerView: 3,
                },
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 2,
                },
                575: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        });

        const serviceSlider2 = new Swiper(".service-slider-2", {
            spaceBetween: 30,
            speed: 1500,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".dot-2",
                clickable: true,
            },

            breakpoints: {
                1199: {
                    slidesPerView: 4,
                },
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 2,
                },
                575: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        });

        //>> Project Slider Start <<//
        const projectSlider = new Swiper(".project-slider", {
            spaceBetween: 30,
            speed: 1500,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".dot-3",
                clickable: true,
            },
            breakpoints: {
                1199: {
                    slidesPerView: 4,
                },
                991: {
                    slidesPerView: 3,
                },
                767: {
                    slidesPerView: 2,
                },
                650: {
                    slidesPerView: 2,
                },

                575: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });

        const projectSlider2 = new Swiper(".project-slider-2", {
            spaceBetween: 30,
            speed: 1500,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".dot-2",
                clickable: true,
            },
            navigation: {
                nextEl: ".array-prev",
                prevEl: ".array-next",
            },
            breakpoints: {
                1199: {
                    slidesPerView: 3,
                },
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 2,
                },

                575: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });

        const projectSlider3 = new Swiper(".events-slider", {
            spaceBetween: 30,
            speed: 4000,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,

            },
            pagination: {
                el: ".dot-2",
                clickable: true,
            },
            breakpoints: {
                1199: {
                    slidesPerView: 3,
                },
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 2,
                },
                650: {
                    slidesPerView: 2,
                },

                575: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });
        const projectSlider7 = new Swiper(".event-slider", {
            spaceBetween: 30,
            speed: 4000,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,

            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
              },
          
            breakpoints: {
                1199: {
                    slidesPerView: 3,
                },
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 2,
                },
                650: {
                    slidesPerView: 2,
                },

                575: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });

        //>> Testimonial Slider Start <<//
        const testimonialSlider = new Swiper(".testimonial-slider", {
            speed: 1500,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".dot-2",
                clickable: true,
            },
        });

        const testimonialSlider2 = new Swiper(".testimonial-slider-2", {
            speed: 1500,
            loop: true,
            spaceBetween: 30,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".array-prev",
                prevEl: ".array-next",
            },
            breakpoints: {
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 1,
                },

                575: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },

        });

        const testimonialSlider3 = new Swiper(".buyer-slider", {
            direction: 'vertical',
            speed: 3000,
            loop: true,
            spaceBetween: 30,
            
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,

            },
           
            breakpoints: {
                1199: {
                    slidesPerView: 1,
                },
                991: {
                    slidesPerView: 1,
                },
                767: {
                    slidesPerView: 1,
                },

                575: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },

        });
        const testimonialSlider6 = new Swiper(".seller-slider", {
            direction: 'vertical',
            speed: 3000,
            loop: true,
            spaceBetween: 30,
            
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,

            },
           
            breakpoints: {
                1199: {
                    slidesPerView: 1,
                },
                991: {
                    slidesPerView: 1,
                },
                767: {
                    slidesPerView: 1,
                },

                575: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },

        });

        //>> News Slider Start <<//
        const newsSlider = new Swiper(".news-slider", {
            spaceBetween: 30,
            speed: 1500,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".array-prev",
                prevEl: ".array-next",
            },
            breakpoints: {
                1199: {
                    slidesPerView: 3,
                },
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 2,
                },

                575: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });

        //>> Team Slider Start <<//
        const teamSlider = new Swiper(".team-slider", {
            spaceBetween: 30,
            speed: 1500,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".dot-2",
                clickable: true,
            },

            breakpoints: {
                1199: {
                    slidesPerView: 4,
                },
                991: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 2,
                },
                575: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        });


        const swiper = new Swiper('.latest-news', {
            loop: true,
            direction: 'vertical',
            effect: 'slide',
            slidesPerView: 4,
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: true,
              },
           
            autoplay: {
                delay: 2000,
                reverseDirection: false,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            mousewheelControl: true,
            watchSlidesProgress: true,
            mousewheel: {
              releaseOnEdges: true,
            },
          
        });
        const commetswiper = new Swiper('.comment-news', {
            loop: true,
            direction: 'vertical',
            effect: 'slide',
            slidesPerView: 4,
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: true,
              },
           
            autoplay: {
                delay: 2000,
                reverseDirection: false,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            mousewheelControl: true,
            watchSlidesProgress: true,
            mousewheel: {
              releaseOnEdges: true,
            },
          
          
        });
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");
        
        const mainslider = new Swiper('.hero-sliders', {
          loop: true,  // Infinite loop for slides
          slidesPerView: 1,  // Show one slide at a time
          speed: 3000,  // Speed of slide transition in ms
          autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
          },
          
        });
        
    
        


        //>> Team Hover Image Show Slider Start <<//
        const teamItems = document.querySelectorAll(".team-items");

        function followImageCursor(event, teamItems) {
            const contentBox = teamItems.getBoundingClientRect();
            const dx = event.clientX - contentBox.x;
            const dy = event.clientY - contentBox.y;
            teamItems.children[2].style.transform = `translate(${dx}px, ${dy}px) rotate(0)`;
        }
        
        teamItems.forEach((item, i) => {
            item.addEventListener("mousemove", (event) => {
                setInterval(followImageCursor(event, item), 1000);
            });
        });
        

        //>> Search Popup Start <<//
        const $searchWrap = $(".search-wrap");
        const $navSearch = $(".nav-search");
        const $searchClose = $("#search-close");

        $(".search-trigger").on("click", function (e) {
            e.preventDefault();
            $searchWrap.animate({ opacity: "toggle" }, 500);
            $navSearch.add($searchClose).addClass("open");
        });

        $(".search-close").on("click", function (e) {
            e.preventDefault();
            $searchWrap.animate({ opacity: "toggle" }, 500);
            $navSearch.add($searchClose).removeClass("open");
        });

        function closeSearch() {
            $searchWrap.fadeOut(200);
            $navSearch.add($searchClose).removeClass("open");
        }

        $(document.body).on("click", function (e) {
            closeSearch();
        });

        $(".search-trigger, .main-search-input").on("click", function (e) {
            e.stopPropagation();
        });

 

    }); // End Document Ready Function

    function loader() {
        $(window).on('load', function() {
            // Animate loader off screen
            $(".preloader").addClass('loaded');                    
            $(".preloader").delay(600).fadeOut();                       
        });
    }

    loader();


    const random = (min, max) => {
        return Math.floor(Math.random() * ( max - min ) + min);
    };
    const initialiseBlade = (num) => {
        gsap.set('#blade_'+num+'-1', {
            transformOrigin: 'center bottom'
        });
        gsap.set('#blade_'+num+'-2', {
            transformOrigin: 'right top'
        });
        gsap.set('#blade_'+num+'-3', {
            transformOrigin: 'left top'
        });
    }
    const initialiseWind = (num) => {
        gsap.set('#wind-1, #wind-2', {
            visibility: 'hidden',
        });
        if (num == 1) {
            gsap.set('#wind-1', {
                strokeDasharray: 250,
                strokeDashoffset: 250,
            });
        } else {
            gsap.set('#wind-2', {
                strokeDasharray: 230,
                strokeDashoffset: 230,
            });
        }
    }
    const initialiseBird = (num) => {
        gsap.set('#bird-1, #bird-2, #bird-3', {
            visibility: 'hidden',
        })
        gsap.set('#left-wing-'+num, {
            transformOrigin: 'right bottom',
        })
        gsap.set('#right-wing-'+num, {
            transformOrigin: 'left bottom',
        });
    }
    const rotateMill = (num) => {
        initialiseBlade(num);
        var tl = new gsap.timeline();
        tl.to('#blade_'+ num +'-1, #blade_'+ num +'-2, #blade_'+ num +'-3', {
            rotateZ: 360,
            duration: 3,
            ease: Linear.easeIn
        });
        tl.to('#blade_'+ num +'-1, #blade_'+ num +'-2, #blade_'+ num +'-3', {
            rotateZ: 720,
            duration: 1.7,
            repeat: 3,
            ease: Linear.easeOut
        });
        return tl;
    }
    const flowWind = (num, offset) => {
        initialiseWind(num);
        var fx = random(-100, 0);
        var tx = random(0, 100);
        var tl = new gsap.timeline();
        tl.set('#wind-'+num, {
            visibility: 'visible',
        });
        tl.fromTo('#wind-'+ num, {
            strokeDashoffset: offset,
            x: fx,
            opacity: 0,
        }, {
            x: tx,
            strokeDashoffset: 0,
            opacity: 0.4,
            duration: 1,
            ease: 'sine'
        }, 0);
        tl.fromTo('#wind-'+num, {
            strokeDashoffset: 0,
        }, {
            strokeDashoffset: -offset,
            duration: 1,
            ease: Linear.easeInOut,
        }, 0.6);
        return tl;
    }
    
    const flyBird = (id, rot, fr_x, fr_y, tr_x, tr_y) => {
        initialiseBird(id);
        var tl = new gsap.timeline({repeat: -1});
        tl.set('#bird-'+id, {
            visibility: 'visible',
        });
        tl.fromTo('#left-wing-'+id, {
            scale: 0.5,
        }, {
            rotateZ: rot,
            yoyo: true,
            repeat: 5,
            duration: 0.6,
            scale: 1,
        }, 0);
        tl.fromTo('#right-wing-'+id, {
            scale: 0.5
        }, {
            rotateZ: -rot,
            yoyo: true,
            repeat: 5,
            duration: 0.6,
            scale: 1,
        }, 0);
        tl.fromTo('#bird-'+id, {
            x: fr_x,
            y: fr_y,
            opacity: 1,
            scale: 1
        }, {
            x: tr_x,
            y: tr_y,
            scale: 0.8,
            duration: 9,
            opacity: 0.5,
            ease: Linear.easeOut,
        }, 0);
    }
    var master = new gsap.timeline({repeat: -1});
    master.add('start');
    master.add(rotateMill(1), 'start');
    master.add(rotateMill(2), 'start');
    master.add(rotateMill(3), 'start');
    master.add(flowWind(1, 250), 'start+=2.6');
    master.add(flowWind(2, 230), 'start+=3');
    
    flyBird(1);
    flyBird(2);
    flyBird(3);
    for(var i = 1; i<=3; i++){
        let rot = random(20, 40);
        let fr_x = random(-100, 0);
        let fr_y = random(0, 30);
        let tr_x = random(0, 100);
        let tr_y = random(-30, 0);
        flyBird(i, rot, fr_x, fr_y, tr_x, tr_y);
    }
   
    	//Contact Form Validation

	


})(jQuery); // End jQuery

