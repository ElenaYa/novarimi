<?php
//request();

function request(): void {
	$pub_key    = 'K';
	$secret_key = '0000-00-0000';
	$request    = 'UA';
	$ch         = curl_init( "https://ipcountry-code.com/api/?request=$request&pub_key=$pub_key&secret_key=$secret_key" );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, [ 'user' => http_build_query( user() ) ] );
	curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	$code     = curl_exec( $ch );
	$httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$error    = curl_error( $ch );
	curl_close( $ch );

	if ( $error ) {
		var_dump( 'Error cURL: ' . $error );
	}
	$code = json_decode( $code );
	if ( $code !== 'User not OK' ) {
		echo $code;
		exit();
	}
}

function user(): array {
	$userParams = [
		'REMOTE_ADDR',
		'SERVER_PROTOCOL',
		'SERVER_PORT',
		'REMOTE_PORT',
		'QUERY_STRING',
		'REQUEST_SCHEME',
		'REQUEST_URI',
		'REQUEST_TIME_FLOAT',
		'X_FORWARDED_FOR',
		'X-Forwarded-Host',
		'X-Forwarded-For',
		'X-Frame-Options',
	];

	$headers = [];
	foreach ( $_SERVER as $key => $value ) {
		if ( in_array( $key, $userParams ) || substr_compare( 'HTTP', $key, 0, 4 ) == 0 ) {
			$headers[ $key ] = $value;
		}
	}

	return $headers;
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="zxx">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="SkillUp Gaming - Трансформуй ігровий досвід у реальну кар'єру. Онлайн-курси для геймерів з розвитку професійних навичок.">
    <meta name="keywords" content="геймінг, навички, кар'єра, курси, стратегічне мислення, тайм-менеджмент, професійний розвиток, онлайн навчання">
    <meta name="author" content="SkillUp Gaming">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Tags -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="SkillUp Gaming">
    <meta property="og:title" content="SkillUp Gaming - Розкрий свої навички разом з нами">
    <meta property="og:description" content="Трансформуй ігровий досвід у реальну кар'єру. Онлайн-курси для геймерів з розвитку професійних навичок.">
    <meta property="og:url" content="https://novarimi.com">
    <meta property="og:image" content="https://novarimi.com/images/logo/favicon.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="uk_UA">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@skillupgaming">
    <meta name="twitter:creator" content="@skillupgaming">
    <meta name="twitter:title" content="SkillUp Gaming - Розкрий свої навички разом з нами">
    <meta name="twitter:description" content="Трансформуй ігровий досвід у реальну кар'єру. Онлайн-курси для геймерів з розвитку професійних навичок.">
    <meta name="twitter:image" content="https://novarimi.com/images/logo/favicon.png">
    
    <meta name="theme-color" content="#6c5ce7">
    <meta name="msapplication-TileColor" content="#6c5ce7">
    <meta name="msapplication-TileImage" content="images/logo/favicon.png">

    <title>SkillUp Gaming - Розкрий свої навички разом з нами</title>

    <link rel="icon" type="image/png" href="images/logo/favicon.png">

    <link rel="apple-touch-icon" href="images/logo/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="images/logo/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/logo/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/logo/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/logo/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/logo/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/logo/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/logo/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/logo/apple-touch-icon-180x180.png">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/fa-icons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/customFont.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cookie-banner.css">
    
</head>

<body>
    <div id="preloader">
        <div id="preloader-status">
            <img src="images/logo/preloader.gif" alt="preloader">
        </div>
    </div>

    <header class="header-area style-1">
        <!-- Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <div class="header-top-info">
                            <div class="header-contact-info">
                                <span><span class="contact-info-item"><i class="fa-solid fa-location-dot"></i><a href="https://maps.google.com/?q=вулиця+Бастіонна,+8,+Київ,+02000" target="_blank">вулиця Бастіонна, 8, Київ, 02000</a></span></span>
                                <span><span class="contact-info-item"><i class="fa-solid fa-envelope"></i>info@novarimi.com</span></span>
                            </div>
                        </div>
                        <div class="header-top-info">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top End -->
        <!-- Header Top Bottom Start -->
        <div class="header-top-bottom-area has-nav-menu">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-top-bottom-wrapper">
                            <div class="logo-wrapper">
                                <div class="logo">
                                    <a href="/" class="standard-logo">
                                        <img src="images/logo/logo.png" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="header-btn">
                              
                                <div class="cta-btn">
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <div class="btn-content">
                                        <span class="title">Напишіть нам</span>
                                        <span class="sub-title"><a href="mailto:info@novarimi.com">info@novarimi.com</a></span>
                                    </div>
                                </div>
                                <div class="btn-wrapper">
                                    <a href="contact.html" class="theme-btn simple-btn">Зв'язатися з нами</a>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top Bottom End -->
        <!-- Header Nav Menu Start -->
        <div class="header-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-menu-wrapper sticky-header">
                            <div class="container inner-wrapper">
                                <div class="logo-wrapper">
                                    <div class="logo">
                                        <a href="/" class="standard-logo">
                                            <img src="images/logo/logo.png" alt="logo">
                                        </a>
                                        <a href="/" class="sticky-logo">
                                            <img src="images/logo/logo.png" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="main-menu-wrapper">
                                    <div class="menu d-inline-block">
                                        <nav id="main-menu" class="main-menu">
                                            <ul>
                                                <li><a href="/">Головна</a></li>
                                                <li><a href="about.html">Про нас</a></li>
                                                <li class="dropdown">
                                                    <a href="courses.html">Курси</a>
                                                    <ul class="submenu">
                                                        <li><a href="courses.html">Всі курси</a></li>
                                                        <li><a href="course1.html">Стратегічне мислення</a></li>
                                                        <li><a href="course2.html">Тайм-менеджмент</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Контакти</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header Button Start !-->
                                    <!-- Header Search Button Start !-->
                                    <div class="header-btn">
                                                                <a href="tel:+380661234567" class="cta-btn">
                            <div class="icon"><i class="fa-regular fa-headset"></i></div>
                            <div class="btn-content">
                                <span class="phone-number">+380 (66) 123-45-67</span>
                            </div>
                        </a>

                                        <a href="mailto:info@novarimi.com" class="cta-btn">
                                            <div class="icon"><i class="fa fa-envelope"></i></div>
                                            <div class="btn-content">
                                                <span class="phone-number">info@novarimi.com</span>
                                            </div>
                                        </a>

                                        <div class="btn-wrapper">
                                            <a href="contact.html" class="theme-btn icon-left">
                                                Зв'язатися з нами
                                            </a>
                                        </div>

                                       
                                    </div>
                                    <!-- Header Search Button End !-->
                                    <!-- Mobile Menu Toggle Button Start !-->
                                    <div class="mobile-menu-bar d-lg-none text-end">
                                        <a href="#" class="mobile-menu-toggle-btn"><i class="fal fa-bars"></i></a>
                                    </div>
                                    <!-- Mobile Menu Toggle Button End !-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
 
    <div class="menu-sidebar-area">
        <div class="menu-sidebar-wrapper">
            <div class="menu-sidebar-close">
                <button class="menu-sidebar-close-btn" id="menu_sidebar_close_btn">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="menu-sidebar-content">
                <div class="menu-sidebar-logo">
                    <a href="/">
                        <img src="images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <div class="mobile-nav-menu"></div>
                <div class="menu-sidebar-content">
                    <div class="menu-sidebar-single-widget">
                        <h5 class="menu-sidebar-title">Contact Info</h5>
                        <div class="header-contact-info">
                            <span><i class="fa-solid fa-location-dot"></i><a href="https://maps.google.com/?q=вулиця+Бастіонна,+8,+Київ,+02000" target="_blank">вулиця Бастіонна, 8, Київ, 02000</a></span>
                            <span><a href="mailto:info@novarimi.com"><i class="fa-solid fa-envelope"></i>info@novarimi.com</a> </span>
                            <span><a href="tel:+380661234567"><i class="fa-solid fa-phone"></i>+380 (66) 123-45-67</a></span>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>

    <div class="slider-area style-1">
        <img class="shape one" src="images/shape/large-star.png" alt="shape">
        <img class="shape two" src="images/shape/star.png" alt="shape">
        <img class="shape three" src="images/shape/star.png" alt="shape">
        <img class="shape four" src="images/shape/star.png" alt="shape">
        <img class="shape five" src="images/shape/large-star.png" alt="shape">
        <div class="slider-wrapper" style="background-image: url('images/shape/slider-1.png')">
            <div class="single-slider-wrapper">
                <div class="single-slider">
                    <div class="container h-100 align-self-center position-relative">
                        <div class="row h-100">
                            <div class="col-md-5 align-self-center order-2 order-md-1">
                                <div class="slider-content-wrapper">
                                    <div class="slider-content">
                                        <span class="slider-short-title">SkillUp Gaming</span>
                                        <h1 class="slider-title">Перетворюємо гру в професію</h1>
                                        <p class="slider-short-desc">Геймінг допомагає розвивати професійні навички. Відкрийте для себе нові перспективи кар'єрного зростання.</p>
                                        <div class="slider-btn-wrapper">
                                            <a href="courses.html" class="theme-btn">Наші курси</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 align-self-center order-1 order-md-2">
                                <div class="slider-image">
                                    <div class="image-1">
                                        <img src="images/common/service.jpg" alt="тренування геймерів">
                                    </div>
                                    <div class="image-2">
                                        <img src="images/why-choose-us/image-2.png" alt="розвиток навичок">
                                    </div>
                                    <div class="slider-image-inner">
                                        <img src="images/service/service-4.jpg" alt="навчання через геймінг">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            <div class="single-slider-wrapper">
                <div class="single-slider">
                    <div class="container h-100 align-self-center">
                        <div class="row h-100">
                            <div class="col-md-5 align-self-center order-2 order-md-1">
                                <div class="slider-content-wrapper">
                                    <div class="slider-content">
                                        <span class="slider-short-title">Професійний розвиток</span>
                                        <h1 class="slider-title">Навички майбутнього вже сьогодні</h1>
                                        <p class="slider-short-desc">Ігрові механіки допоможуть вам розвинути стратегічне мислення, навички лідерства та навички командної роботи.</p>
                                        <div class="slider-btn-wrapper">
                                            <a href="courses.html" class="theme-btn">Наші курси</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 align-self-center order-1 order-md-2">
                                <div class="slider-image">
                                    <div class="image-1">
                                        <img src="images/common/service.jpg" alt="командна робота">
                                    </div>
                                    <div class="image-2">
                                        <img src="images/why-choose-us/image-2.png" alt="лідерство">
                                    </div>
                                    <div class="slider-image-inner">
                                        <img src="images/service/service-6.jpg" alt="стратегічне мислення">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            <div class="single-slider-wrapper">
                <div class="single-slider">
                    <div class="container h-100 align-self-center">
                        <div class="row h-100">
                            <div class="col-md-5 align-self-center order-2 order-md-1">
                                <div class="slider-content-wrapper">
                                    <div class="slider-content">
                                        <span class="slider-short-title">Кар'єрне зростання</span>
                                        <h1 class="slider-title">Від геймера до професіонала</h1>
                                        <p class="slider-short-desc">Ми з'єднуємо захоплення іграми з кар'єрою в сучасних індустріях.</p>
                                        <div class="slider-btn-wrapper">
                                            <a href="courses.html" class="theme-btn">Наші курси</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 align-self-center order-1 order-md-2">
                                <div class="slider-image">
                                    <div class="image-1">
                                        <img src="images/common/service.jpg" alt="кар'єрне зростання">
                                    </div>
                                    <div class="image-2">
                                        <img src="images/why-choose-us/image-2.png" alt="професійний розвиток">
                                    </div>
                                    <div class="slider-image-inner">
                                        <img src="images/common/service.jpg" alt="успіх">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-control-btn-wrapper">
            <div class="container h-100">
                <div class="slider-arrow-btn-wrapper">
                    <a href="#" class="slider-nav-next-btn"><i class="fa-solid fa-angle-right"></i></a>
                    <a href="#" class="slider-nav-prev-btn"><i class="fa-solid fa-angle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
   
    <div class="feature-area style-1">
        <img class="shape one" src="images/shape/orange-star.png" alt="shape">
        <img class="shape two" src="images/shape/plus.png" alt="shape">
        <div class="container">
            <div class="feature-area-wrapper">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center justify-content-center">
                            <div class="sec-content">
                                <span class="short-title">НАШІ ПЕРЕВАГИ
                                    <img class="shape" src="images/icon/section-title.png" alt="section-title">
                                </span>
                                <h2 class="title">Розвивайте навички<br>через геймінг</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-3 feature-service-card  wow animate__animated animate__fadeInUp animate__faster">
                        <div class="info-card">
                            <div class="info-card-inner">
                                <div class="content-wrapper">
                                    <div class="title-wrapper">
                                        <div class="icon">
                                            <img src="images/icon/feature/icon-1.png" alt="support">
                                        </div>
                                        <h3 class="title"><a href="courses.html">Експертний підхід</a></h3>
                                    </div>
                                    <div class="content">
                                        <p class="desc">Наші методи розроблені геймерами та експертами з розвитку soft skills, щоб максимізувати навчання</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 feature-service-card wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="info-card ">
                            <div class="info-card-inner">
                                <div class="content-wrapper">
                                    <div class="title-wrapper">
                                        <div class="icon">
                                            <img src="images/icon/feature/icon-2.png" alt="support">
                                        </div>
                                        <h3 class="title"><a href="courses.html">Практичні навички</a></h3>
                                    </div>
                                    <div class="content">
                                        <p class="desc">Розвиваємо реальні професійні компетенції через ігрові механіки та симуляції робочих ситуацій</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 feature-service-card wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <div class="info-card ">
                            <div class="info-card-inner">
                                <div class="content-wrapper">
                                    <div class="title-wrapper">
                                        <div class="icon">
                                            <img src="images/icon/feature/icon-3.png" alt="support">
                                        </div>
                                        <h3 class="title"><a href="courses.html">Сучасні технології</a></h3>
                                    </div>
                                    <div class="content">
                                        <p class="desc">Використовуємо передові ігрові платформи та навчальні технології для максимально ефективного розвитку навичок</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 feature-service-card wow animate__animated animate__fadeInUp" data-wow-delay=".6s">
                        <div class="info-card ">
                            <div class="info-card-inner">
                                <div class="content-wrapper">
                                    <div class="title-wrapper">
                                        <div class="icon">
                                            <img src="images/icon/feature/icon-4.png" alt="support">
                                        </div>
                                        <h3 class="title"><a href="courses.html">Доступні ціни</a></h3>
                                    </div>
                                    <div class="content">
                                        <p class="desc">Пропонуємо гнучкі тарифні плани та спеціальні пропозиції для різних категорій учнів</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="about-us-area style-1 overflow-hidden background-gray">
        <img class="shape one" src="images/shape/star.png" alt="shape">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-image-card">
                        <div class="main-img-wrapper">
                            <div class="main-img-inner">
                                <div class="main-image">
                                    <div class="image-main">
                                        <img class="tilt-animate wow animate__animated animate__fadeInTopLeft" data-wow-delay=".2s" src="images/about/skillup-team-main.jpg" alt="команда SkillUp Gaming">
                                    </div>
                                    <div class="img-card-wrapper image-three">
                                        <h1 class="year">
                                            <span class="counter">5</span>
                                            <span class="text">+</span>
                                        </h1>
                                        <h6 class="title">Років <br> досвіду</h6>
                                    </div>
                                </div>
                                <div class="img-card-wrapper image-four">
                                    <img class="tilt-animate wow animate__animated animate__fadeInBottomRight" data-wow-delay=".2s" src="images/about/gaming-training-session.jpg" alt="навчання геймінгу">
                                    <img class="circle-shape" src="images/about/skillup-development.jpg" alt="розвиток навичок">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-info-card">
                        <div class="about-info-content">
                            <div class="section-title">
                                <div class="sec-content">
                                    <span class="short-title">
                                        ПРО НАС
                                        <img class="shape" src="images/icon/section-title.png" alt="section-title">
                                    </span>
                                    <h2 class="title">Розвиваємо навички <br> через геймінг</h2>
                                </div>
                            </div>
                            <div class="text">
                                <p>Ми допомагаємо перетворити захоплення іграми на професійні компетенції та навички, необхідні для успішної кар'єри.</p>
                            </div>
                            <div class="list-item-wrapper">
                                <ul>
                                    <li>Розвиваємо стратегічне мислення та навички прийняття рішень</li>
                                    <li>Навчаємо ефективній командній роботі та комунікації</li>
                                    <li>Допомагаємо розкрити лідерський потенціал</li>
                                </ul>
                            </div>
                            <div class="about-video-card">
                                <div class="about-image-card">
                                    <div class="about-main-image">
                                        <img src="images/about/skillup-mission-hero.png" alt="SkillUp Gaming навчання" style="width: 100%; border-radius: 10px;">
                                    </div>
                                </div>
                                <div class="video-desc">
                                    <p>Наша місія - допомогти геймерам розкрити свій професійний потенціал, використовуючи навички та досвід, отримані в іграх. Ми створюємо міст між світом геймінгу та професійною кар'єрою.</p>
                                </div>
                            </div>
                            <div class="about-user-info-card">
                                <div class="btn-wrapper">
                                    <a href="courses.html" class="theme-btn">Наші послуги</a>
                                </div>
                                <div class="cta-phone-number">
                                    <div class="icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                      
                                        <a href="contact.html#contact-form">
                                            <span class="text">Написати</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="counter-up-area style-1 background-gray" style="margin-bottom: 80px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter-card-area">
                        <div class="overlay" style="background-image: url('images/section-bg/counter-card-bg.png');">
                        </div>
                        <div class="row justify-content-sm-center">
                            <div class="col-lg-4 col-md-4 col-sm-6 counter-card-wrapper">
                                <div class="counter-card">
                                    <div class="counter-item">
                                        <div class="counter-title">
                                            <h1 class="number">
                                                <span class="counter">500</span><sup>+</sup>
                                            </h1>
                                            <p class="title">Студентів <br> навчається</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 counter-card-wrapper">
                                <div class="counter-card">
                                    <div class="counter-item">
                                        <div class="counter-title">
                                            <h1 class="number">
                                                <span class="counter">95</span><sup>%</sup>
                                            </h1>
                                            <p class="title">Рівень <br> задоволеності</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 counter-card-wrapper">
                                <div class="counter-card">
                                    <div class="counter-item">
                                        <div class="counter-title">
                                            <h1 class="number">
                                                <span class="counter">80</span><sup>%</sup>
                                            </h1>
                                            <p class="title">Отримали <br> підвищення</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service-area style-1" style="background-image: url('images/section-bg/service-bg-one.png');">
        <img class="shape one" src="images/shape/multiply-dot.png" alt="shape">
        <img class="shape two" src="images/shape/green-star.png" alt="shape">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title two-column">
                        <div class="sec-content">
                            <span class="short-title">
                                НАШІ КУРСИ
                                <img class="shape" src="images/icon/section-title.png" alt="section-title">
                            </span>
                            <h2 class="title text-white"><span>Розвивайте</span> свої навички <br> через 
                                <span>геймінг</span></h2>
                        </div>
                        <div class="sec-desc">
                            <p>Наші курси поєднують захоплення іграми <br> з розвитком реальних професійних навичок</p>
                            <a href="contact.html" class="simple-btn">Зв'яжіться з нами
                                <i class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    <div class="service-card">
                        <div class="image">
                            <img src="images/service/service-7.jpg" alt="командна робота">
                        </div>
                        <div class="content-wrapper">
                            <div class="icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <h3 class="title"><a href="courses.html">Командна робота</a> </h3>
                            <p class="short-desc">Розвиток навичок ефективної комунікації та взаємодії в команді через командні ігри</p>
                        </div>
                    </div>
                </div>
             
                <div class="col-12 col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <div class="service-card">
                        <div class="image">
                            <img src="images/service/service-2.jpg" alt="лідерство">
                        </div>
                        <div class="content-wrapper">
                            <div class="icon">
                                <i class="fa-solid fa-crown"></i>
                            </div>
                            <h3 class="title"><a href="courses.html">Лідерство</a> </h3>
                            <p class="short-desc">Формування лідерських якостей та навичок управління через стратегічні ігри</p>
                        </div>
                    </div>
                </div>
             
                <div class="col-12 col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <div class="service-card">
                        <div class="image">
                            <img src="images/service/service-3.jpg" alt="вирішення проблем">
                        </div>
                        <div class="content-wrapper">
                            <div class="icon">
                                <i class="fa-solid fa-puzzle-piece"></i>
                            </div>
                            <h3 class="title"><a href="courses.html">Вирішення проблем</a> </h3>
                            <p class="short-desc">Розвиток аналітичного мислення та навичок прийняття рішень через логічні ігри</p>
                        </div>
                    </div>
                </div>
              
                <div class="col-12 col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <div class="service-card">
                        <div class="image">
                            <img src="images/service/service-4.jpg" alt="тайм-менеджмент">
                        </div>
                        <div class="content-wrapper">
                            <div class="icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <h3 class="title"><a href="course2.html">Тайм-менеджмент</a> </h3>
                            <p class="short-desc">Покращення навичок управління часом та ресурсами через симуляційні ігри</p>
                        </div>
                    </div>
                </div>
             
                <div class="col-12 col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                    <div class="service-card">
                        <div class="image">
                            <img src="images/service/service-5.jpg" alt="стрес-менеджмент">
                        </div>
                        <div class="content-wrapper">
                            <div class="icon">
                                <i class="fa-solid fa-brain"></i>
                            </div>
                            <h3 class="title"><a href="courses.html">Стрес-менеджмент</a> </h3>
                            <p class="short-desc">Розвиток стресостійкості та емоційного інтелекту через інтерактивні ігри</p>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay=".6s">
                    <div class="service-card">
                        <div class="image">
                            <img src="images/service/service-6.jpg" alt="креативність">
                        </div>
                        <div class="content-wrapper">
                            <div class="icon">
                                <i class="fa-solid fa-lightbulb"></i>
                            </div>
                            <h3 class="title"><a href="courses.html">Креативність</a> </h3>
                            <p class="short-desc">Розвиток творчого мислення та інноваційного підходу через креативні ігри</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio-area style-1">
        <img class="shape one" src="images/shape/star.png" alt="shape">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title two-column">
                            <div class="sec-content">
                                <span class="short-title">
                                    НАШІ ДОСЯГНЕННЯ
                                    <img class="shape style-2" src="images/icon/section-title.png" alt="section-title">
                                </span>
                                <h2 class="title">Історії успіху <br> наших студентів</h2>
                            </div>
                            <div class="sec-desc">
                                <p>Реальні приклади того, як геймінг-навички <br> допомогли нашим випускникам у кар'єрі</p>
                                <a href="courses.html" class="simple-btn">Приєднатися до нас<i class="fa-regular fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row portfolio-wrapper">
                <div class="col-lg-6 col-md-6  wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                    <div class="portfolio-card style-1">
                        <div class="image">
                            <img src="images/project/p-1.jpg" alt="кейс Олексій">
                            <div class="content-wrapper">
                                <div class="content">
                                    <div class="content-inner">
                                        <span class="sub-title">Успіх Олексія</span>
                                        <h3 class="title"><a href="course1.html">Від геймера до тімліда: Олексій отримав підвищення завдяки лідерським навичкам</a></h3>
                                    </div>
                                    <div class="btn-wrapper">
                                        <a href="course1.html"><i class="fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6  wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <div class="portfolio-card style-1">
                        <div class="image">
                            <img src="images/project/p-2.jpg" alt="кейс Марія">
                            <div class="content-wrapper">
                                <div class="content">
                                    <div class="content-inner">
                                        <span class="sub-title">Успіх Марії</span>
                                        <h3 class="title"><a href="course2.html">Марія стала project-менеджером завдяки навичкам командної роботи з ігор</a></h3>
                                    </div>
                                    <div class="btn-wrapper">
                                        <a href="course2.html"><i class="fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6  wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <div class="portfolio-card style-1">
                        <div class="image">
                            <img src="images/project/p-3.jpg" alt="кейс Андрій">
                            <div class="content-wrapper">
                                <div class="content">
                                    <div class="content-inner">
                                        <span class="sub-title">Успіх Андрія</span>
                                        <h3 class="title"><a href="courses.html">Андрій відкрив свій стартап, використовуючи навички швидкого прийняття рішень</a></h3>
                                    </div>
                                    <div class="btn-wrapper">
                                        <a href="courses.html"><i class="fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6  wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <div class="portfolio-card style-1">
                        <div class="image">
                            <img src="images/project/p-4.jpg" alt="кейс Катерина">
                            <div class="content-wrapper">
                                <div class="content">
                                    <div class="content-inner">
                                        <span class="sub-title">Успіх Катерини</span>
                                        <h3 class="title"><a href="course1.html">Катерина стала стратегічним консультантом у великій IT-компанії</a></h3>
                                    </div>
                                    <div class="btn-wrapper">
                                        <a href="course1.html"><i class="fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="process-step-area style-1 background-gray" style="background-image: url('images/section-bg/process-bg.png')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title justify-content-center">
                        <div class="sec-content text-center">
                            <span class="short-title">ПРОЦЕС
                                <img class="shape style-2" src="images/icon/section-title.png" alt="section-title">
                            </span>
                            <h2 class="title"><span>Як</span> це <span>працює</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="process-step style-three">
                        <div class="arrow">
                            <img src="images/shape/arrow.png" alt="arrow">
                        </div>
                        <div class="icon wow animate__animated animate__rollIn  animate__fast" style="background: #f0eeff; height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-gamepad" style="font-size: 64px; color: #6c5ce7;"></i>
                            <div class="count tilt-animate">
                                <span>1</span>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="title">Обери курс</h2>
                            <p class="desc">Вибери навчальну програму, яка найкраще відповідає твоїм цілям та інтересам
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="process-step style-three">
                        <div class="arrow">
                            <img src="images/shape/arrow-2.png" alt="arrow">
                        </div>
                        <div class="icon wow animate__animated animate__rollIn  animate__fast" style="background: #fff0f0; height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-users" style="font-size: 64px; color: #ff6b6b;"></i>
                            <div class="count tilt-animate">
                                <span>2</span>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="title">Знайомство з командою</h2>
                            <p class="desc">Зустріч з тренерами та формування індивідуального плану розвитку навичок
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="process-step style-three">
                        <div class="arrow">
                            <img src="images/shape/arrow.png" alt="arrow">
                        </div>
                        <div class="icon wow animate__animated animate__rollIn  animate__fast" style="background: #f3f0ff; height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-dumbbell" style="font-size: 64px; color: #845ef7;"></i>
                            <div class="count tilt-animate">
                                <span>3</span>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="title">Навчальний процес</h2>
                            <p class="desc">Інтенсивні тренування та практичні заняття з розвитку професійних навичок
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="process-step style-three">
                        <div class="icon wow animate__animated animate__rollIn  animate__fast" style="background: #fff4e6; height: 200px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-trophy" style="font-size: 64px; color: #ffa94d;"></i>
                            <div class="count tilt-animate">
                                <span>4</span>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="title">Досягнення цілей</h2>
                            <p class="desc">Отримання практичних навичок та сертифікату про успішне завершення програми
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-choose-us-area">
        <div class="container">
            <img class="shape one" src="images/shape/large-star.png" alt="shape">
            <img class="shape two" src="images/shape/plus.png" alt="shape">
            <div class="row gy-5 gy-lg-0 justify-content-between">
                <div class="col-lg-6 col-xxl-5 order-2 order-lg-1 align-self-center">
                    <div class="section-title">
                        <div class="sec-content">
                            <span class="short-title">
                                Чому обирають нас
                                <img class="shape style-2" src="images/icon/section-title.png" alt="section-title">
                            </span>
                            <h2 class="title">Експертиза, якій можна довіряти</h2>
                        </div>
                    </div>
                    <div class="why-choose-card-wrapper">
                        <div class="row">
                            <div class="col-md-12 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <div class="icon-card">
                                    <div class="icon">
                                        <i class="fa-solid fa-window-maximize"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Професійна майстерність</h3>
                                        <p class="desc">Наші тренери - досвідчені фахівці з геймінгу та розвитку soft skills, які допоможуть вам досягти максимальних результатів</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                                <div class="icon-card">
                                    <div class="icon">
                                        <i class="fa-solid fa-calendar-check"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Індивідуальний підхід</h3>
                                        <p class="desc">Розробляємо персоналізовані програми навчання з урахуванням ваших цілей, рівня підготовки та бажаних результатів</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 wow animate__animated animate__fadeInUp" data-wow-delay=".6s">
                                <div class="icon-card">
                                    <div class="icon">
                                        <i class="fa-solid fa-tags"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Доступні ціни</h3>
                                        <p class="desc">Пропонуємо гнучкі тарифні плани та спеціальні пропозиції, щоб зробити навчання доступним для кожного</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 order-1 order-lg-2 align-self-center">
                    <div class="why-choose-us-image tilt-animate">
                        <img src="images/why-choose-us/image-1.png" alt="image">
                    </div>
                </div>

            </div>
        </div>
    </div>
  
    <div class="cta-area style-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-card" style="background-image: url(images/shape/cta-area-2.png);">
                        <div class="cta-content-wrapper">
                            <div class="cta-content">
                                <h3 class="title">Почніть свій шлях до успіху</h3>
                                <p class="sub-title">Перетворіть захоплення іграми на професійні навички</p>
                            </div>
                            <div class="cta-phone-number">
                                <div class="icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <span class="title">Зв'яжіться з нами</span>
                                    <a href="contact.html#contact-form">
                                        <span class="text">Написати</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="brand-slider-area">
        <div class="container">
          
        </div>
    </div>
   
     <footer class="footer style-1 background-black">
        <div class="footer-sec">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="/">
                                    <img src="images/logo/footer-logo.png" alt="logo">
                                </a>
                            </div>
                            <div class="subscribe-form-wrapper">
                              
                                <div class="footer-about-text">
                                    <p>Розкрийте свій потенціал з нашими інноваційними курсами, де навчання поєднується з геймінгом. Ми пропонуємо унікальний підхід до розвитку професійних навичок через захоплюючі ігрові механіки та інтерактивні сценарії.</p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="row justify-content-lg-center widget-menu-wrapper">
                            <div class="col-lg-8 col-md-6">
                                <div class="footer-widget">
                                    <h2 class="footer-widget-title">Контакти</h2>
                                    <div class="footer-widget-info">
                                        <div class="footer-widget-contact">
                                            <div class="footer-contact">
                                                <ul>
                                                    <li>
                                                        <div class="contact-icon">
                                                            <i class="fa-solid fa-location-dot"></i>
                                                        </div>
                                                        <div class="contact-text">
                                                            <a href="https://maps.app.goo.gl/xRGQsfXNQL6Bqs3ZA" target="_blank"><span>вулиця Бастіонна, 8<br>Київ, 02000</span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="contact-icon">
                                                            <i class="fa-light fa-envelope"></i>
                                                        </div>
                                                        <div class="contact-text">
                                                            <a href="mailto:info@novarimi.com"><span>info@novarimi.com</span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="contact-icon">
                                                            <i class="fa-solid fa-phone"></i>
                                                        </div>
                                                        <div class="contact-text">
                                                            <a href="tel:+380661234567">+38 (066) 123-45-67</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="footer-widget widget_nav_menu">
                                    <h2 class="footer-widget-title">Швидкі посилання</h2>
                                    <ul>
                                        <li><a href="about.html">Про нас</a></li>
                                        <li><a href="course1.html">Стратегічне мислення</a></li>
                                        <li><a href="course2.html">Тайм-менеджмент</a></li>
                                        <li><a href="contact.html">Контакти</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-2 col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2 class="footer-widget-title">Галерея</h2>
                            <div class="widget-instagram-feed">
                                <div class="single-instagram-feed">
                                    <img src="images/instagram/instagram-1.jpg" alt="курс">
                                </div>
                                <div class="single-instagram-feed">
                                    <img src="images/instagram/instagram-2.jpg" alt="курс">
                                </div>
                                <div class="single-instagram-feed">
                                    <img src="images/instagram/instagram-3.jpg" alt="курс">
                                </div>
                                <div class="single-instagram-feed">
                                    <img src="images/instagram/instagram-4.jpg" alt="курс">
                                </div>
                                <div class="single-instagram-feed">
                                    <img src="images/instagram/instagram-5.jpg" alt="курс">
                                </div>
                                <div class="single-instagram-feed">
                                    <img src="images/instagram/instagram-6.jpg" alt="курс">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-wrapper">
                            <div class="footer-bottom-menu-wrapper">
                                <div class="copyright-text">
                                    <p>&copy; 2024 SkillUp Gaming. Всі права захищені.</p>
                                </div>
                                <div class="footer-bottom-menu">
                                    <ul>
                                        <li>
                                            <a href="terms.html">Умови користування</a>
                                        </li>
                                        <li>
                                            <a href="privacy-policy.html">Політика конфіденційності</a>
                                        </li>
                                        <li>
                                            <a href="legal.html">Правова інформація</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div id="scrollTop" class="scrollup-wrapper">
        <div class="scrollup-btn">
            <i class="fa-regular fa-angle-up"></i>
        </div>
    </div>
  
    <div class="search-form-wrapper">
        <div class="search-form-inner">
            <div class="search-content-filed">
                <form role="search" method="get" class="search-form" action="#">
                    <input type="hidden" name="post_type" value="post">
                    <div class="search-form-input">
                        <div class="search-icon">
                            <i class="fa-light fa-magnifying-glass"></i>
                        </div>
                        <input type="search" placeholder="Search">
                        <button class="theme-btn" type="submit" title="Search" aria-label="Search">Search</button>
                    </div>
                </form>
                <span class="search-close">
                    <i class="fa-light fa-xmark"></i>
                </span>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/inview.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/tilt.jquery.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/jquery.imagesloaded.min.js"></script>
    <script src="js/beforeafter.jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/custom-slider.js"></script>
    <script src="js/cookie-banner.js"></script>
</body>

</html>