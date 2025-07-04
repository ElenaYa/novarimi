(function ($) {
    "use strict";
    $(document).ready(function () {

   
        $('#main-menu').meanmenu({
            meanMenuContainer: '.mobile-nav-menu',
            meanScreenWidth: "991",
            meanExpand: ['<i class="fal fa-plus"></i>'],
        });

        $('.search-btn').on('click', function (e) {
            e.preventDefault();
            $('body').css('overflow', 'hidden');

            $('.search-form-wrapper').addClass('active');
        });
        $('.search-close').on('click', function (e) {
            e.preventDefault();
            $('body').css('overflow', 'auto');
            $('.search-form-wrapper').removeClass('active');
        });

        $(window).on('click', function(e) {
            if ($(e.target).is('.search-form-wrapper')) {
                $('.search-form-wrapper').removeClass('active');
            }
        });



        $(".mobile-menu-toggle-btn").on("click", function () {
            $(".menu-sidebar-area").addClass("active");
            $(".body-overlay").addClass("active");
        });
        $(".menu-sidebar-close-btn").on("click", function () {
            $(".menu-sidebar-area").removeClass("active");
            $(".body-overlay").removeClass("active");
        });

      
        $(".body-overlay").on("click", function () {
            $(".menu-sidebar-area").removeClass("active");
            $(".body-overlay").removeClass("active");
        });

      
        const body = document.body;
        const html = document.documentElement;
        const height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);

        if (160 < $(window).scrollTop()) {
            $(".header-menu-wrapper.sticky-header").addClass("sticky_menu");
        }
        if( height  > 1400 ) {
            const nav = $(".header-menu-wrapper.sticky-header");
            let scrolled = false;
            $(window).scroll(function () {
                if (100 < $(window).scrollTop() && !scrolled) {
                    nav
                        .addClass("sticky_menu animated fadeIn")
                    scrolled = true;
                }
                if (100 > $(window).scrollTop() && scrolled) {
                    nav.removeClass("sticky_menu animated fadeIn");
                    scrolled = false;
                }
            });
        }

        $('.blog-area .post-content p').filter(function() {
            return /\u00A0/.test($(this).text());
        }).hide();


        $('.skill-progressbar').one('inview', function(event, isInView) {
            if (isInView) {
                $('.progress-inner').each(function() {
                    $(this).find('.progress-content').animate({
                        width:$(this).attr('data-percentage')
                    },2000);

                    $(this).find('.progress-number-count').animate(
                        {left:$(this).attr('data-percentage')},
                        {
                            duration: 2000,
                            step: function(now) {
                                let data = Math.round(now);
                                $(this).find('.progress-percent').html(data + '%');
                            }
                        });
                });

            }
        });

        $(".circle_percent").each(function() {
            var $this = $(this),
                $dataV = $this.data("percent"),
                $dataDeg = $dataV * 3.6,
                $round = $this.find(".round_per");
            $round.css("transform", "rotate(" + parseInt($dataDeg + 180, 10) + "deg)");
            $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
            $this.prop('Counter', 0).animate({Counter: $dataV},
                {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $this.find(".percent_text").text(Math.ceil(now)+"%");
                    }
                });
            if($dataV >= 51){
                $round.css("transform", "rotate(" + 360 + "deg)");
                setTimeout(function(){
                    $this.addClass("percent_more");
                },2000);
                setTimeout(function(){
                    $round.css("transform", "rotate(" + parseInt($dataDeg + 180, 10) + "deg)");
                },2000);
            }
        });

     
        $(".counter").counterUp({
            delay: 10,
            time: 1000,
        });

    
        $(".video-play").magnificPopup({
            disableOn: 700,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });

      
        new WOW().init();

     
        $('select.select_option, select.wpcf7-select').niceSelect();

      
        $('.tilt-animate').tilt({
            maxTilt: 12,
            perspective: 1500,
        })

        $('.portfolio-filter').on('click', 'li', function() {
            $("li").removeClass("active");
            $(this).addClass("active");
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        var $grid = $('.isotope-grid').isotope({
            itemSelector: '.isotop-portfolio-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.isotop-portfolio-item'
            }
        })
        $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });

        $('.after-before-image-inner').beforeAfter({
            movable: true,
            clickMove: true,
            position: 50,
            separatorColor: '#fafafa',
            bulletColor: '#fafafa',
            onMoveStart: function(e) {
                console.log(event.target);
            },
            onMoving: function() {
                console.log(event.target);
            },
            onMoveEnd: function() {
                console.log(event.target);
            },
        });
       
        $(function () {
            $("#scrollTop").hide();
            var position = $(window).scrollTop();
            var timer;
            $(window).on('scroll', function () {
                var scrollTop = $(window).scrollTop();
                clearTimeout(timer);
                if (scrollTop > 100) {
                    if (scrollTop > position) {
                        $('#scrollTop').fadeOut();
                    } else {
                        $('#scrollTop').fadeIn();
                        timer = window.setTimeout(function() {
                            $("#scrollTop").fadeOut();
                        }, 3000);
                    }
                    position = scrollTop;
                } else {
                    $('#scrollTop').fadeOut();
                }
            });
            $(".scrollup-btn").on('click', function() {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
        });
       
        $('.switch').on('click', function() {

            $(".switch").toggleClass("active");
            $("#custom-switch").toggleClass("active");
            $('.first-price').toggleClass("active");
            $('.second-price').toggleClass("active");
        });
       
        $(window).on("load", function () {
            $("#preloader").fadeOut();
            $("#preloader-status").delay(200).fadeOut("slow");
            $("body").delay(200).css({"overflow-x": "hidden"});
        });

    });
})(jQuery);
