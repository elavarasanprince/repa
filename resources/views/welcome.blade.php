<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="REPA">

    <!-- ======== Page title ============ -->
    <title>REPA | Home </title>

@include('includes.head')
<style>
    .skill-percentage {
    font-weight: bold;
    font-size: 14px;
    margin-right: 100px;
    z-index: 1;
    transition: transform 1.5s ease-in-out;
    text-align: right; /* Default */
    display: flex;
    align-items: center;
    justify-content: flex-end; /* Adjusts text position based on width */
    padding-right: 5px;
    height: 100%;
    white-space: nowrap;
}

.progress-bar {
    width: 100%;
    background-color: #e0e0e0;
    border-radius: 10px;
    height: 30px;
    position: relative;
    overflow: hidden;
    /*display: flex;*/
    /*align-items: center;*/
}

.progress-fill {
    height: 100%;
    background-color: #4caf50; /* Default Green */
    text-align: right;
    color: white;
    border-radius: 10px;
    transition: width 0.5s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-right: 10px;
}

</style>
</head>

<body>

@include('includes.header')


    <!--<< Hero Section Start >>-->
    <section class="hero-section hero-1">

        <div class="swiper hero-sliders">

            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-image empty-banner bg-cover" style="background-image: url('assets/img/hero/banner-33.png');"></div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <div class="hero-content ">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-image  bg-cover h82" style="background-image: url('assets/img/hero/banner1.jpeg');"></div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="hero-content">
                                    <h6 data-animation="slideInRight" data-duration="2s" data-delay=".3s">WELCOME TO REPA </h6>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Need for REPA

                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".7s">
                                        Addressing the needs of Renewable Energy Sector in the State of Tamil
                                        Nadu
                                    </p>
                                    <div class="hero-button">
                                        <a href="why.php" class="theme-btn theme-color-2" data-animation="slideInRight" data-duration="2s" data-delay=".9s"><span>Learn More <i class="fas fa-chevron-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">

                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-image heroimg bg-cover" style="background-image: url('assets/img/hero/banner-2.png');"></div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="hero-content ">
                                    <h6 data-animation="slideInRight" data-duration="2s" data-delay=".3s"> ENERGY FACTSHEET </h6>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Forecast Vs. Actuals
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".7s">
                                        A detailed factsheet providing daily comparison of Forecast Vs Actuals of Wind & Solar energy generation

                                    </p>
                                    <div class="hero-button">
                                        <a href="index.php#Forecasting" class="theme-btn theme-color-2" data-animation="slideInRight" data-duration="2s" data-delay=".9s"><span>Learn More <i class="fas fa-chevron-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8"></div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="navigation-banner">
                <div class="swiper-pagination">

                </div>
            </div>


        </div>
    </section>
    <!--<< Marque Section Start >>-->
    <div class="marque-section" >
        <div class="marquee-wrapper text-slider">
            <div class="marquee-inner to-left">
                <ul class="marqee-list " >
                      @foreach($latestNews as $news)
                <li class="marquee-item">
                    
  
    
        <a href="{{ $news->link }}" target="_blank" rel="noopener noreferrer">
    <span class="text-slider">{{ $news->title }}</span>
</a>

        <span class="text-slider"><img src="{{ asset('assets/img/star.svg') }}" alt="img"></span>
   
</li> @endforeach


                </ul>
            </div>
        </div>
    </div>


    <!-- About Section Start -->
    <section class="about-section section-padding fix bg-cover" id="about-us">
        <div class="container">
            <div class="about-wrapper-2 mb-0">
                <div class="row align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="about-image">
                            <div class="shape-image">
                                <img src="assets/img/about/shape.png" alt="shape-img">
                            </div>
                            <div class="circle-shape">
                                <img src="assets/img/about/circle.png" alt="shape-img">
                            </div>
                            <img src="assets/img/image20.webp" alt="about-img">
                            <div class="video-box">
                                <a href="#" class="video-btn ripple video-popup">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="wow fadeInUp">ABOUT US</span>
                                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                    Welcome to REPA
                                </h2>
                            </div>
                            <p>
                                Renewable Energy Producers Association (REPA), is an Association of Energy Producers, who produce energy through renewable technologies from Wind, Solar etc. Its members are spread over across the State of Tamil Nadu. Its main objective is to promote Renewable Energy in the State and advocate sustainable practices in the changing modern Industrialized Environment & thereby, contributing towards Nation's Green Energy Mission. Further, REPA is a Registered Society under the Tamil Nadu Societies’ Registration Act 1975, with Registration No. SRG/Dindigul/131/2024.

                            </p>
                            <p>The Association with the able Leadership of our President Shri. A.P.Appukutty (Chairman cum Managing Director of Chola Group of Textile Mills) and the Vice President Shri. P.V.Chandran (Chairman cum Managing Director of M/s. Ambika Cotton Mills Limited), is effectively and eminently functioning and serving the members with an objective of addressing all the needs of the Renewable Energy Sector in Tamil Nadu.

                            </p>
                            <p>The Chief Advisor of the Tamil Nadu Spinning Mills Association Dr. K.Venkatachalam, is also the Chief Advisor cum C.E.O. of REPA, who looks after the comprehensive administration of the Association, including financials and all other functional and administrative aspects and he is authorized to look after all the Secretarial functions of the Association.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wind-shapes">
            <div class="shape-panel">

                <div class="shape-1">
                    <svg width="128" height="278" viewBox="0 0 128 278" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g class="turbine-blades" transform-origin="51.5% 25.3%">
                            <path d="M71.8788 70.4397C74.8915 72.4153 127.039 105.425 127.039 105.425C127.039 105.425 127.311 107.132 125.191 106.799C123.07 106.466 70.8014 75.1193 70.8014 75.1193C70.8014 75.1193 69.4495 68.8469 71.8788 70.4397Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M58.589 75.009C57.0364 75.0121 10.6358 92.8568 10.6358 92.8568L58.589 70.6598C58.589 70.6598 60.1911 69.7276 60.5121 71.7154C60.83 73.7064 58.589 75.009 58.589 75.009Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M66.1544 64.3694C65.182 60.2886 65.3981 52.7013 65.2345 51.6981C65.0709 50.6949 73.9453 7.74854 73.9453 7.74854C73.9453 7.74854 61.4995 51.3709 61.3884 53.3711C61.2773 55.3714 64.7314 64.5916 65.2345 64.7305C65.7346 64.8725 66.1544 64.3694 66.1544 64.3694Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M76.0156 0.321025L74.3333 0L60.77 53.2562L60.7113 53.4908L60.7823 53.7223C60.8009 53.7841 62.6838 59.865 63.4308 63.4241C63.7704 65.0508 65.221 66.2331 66.8756 66.2331H67.6504L76.0156 0.321025ZM72.5584 13.9121L66.1565 64.3686C65.6348 64.1371 65.2303 63.6618 65.1068 63.0753C64.4185 59.794 62.8504 54.6175 62.4893 53.4476L72.5584 13.9121Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M127.41 104.907L84.3187 70.4096L84.078 70.3787C81.3431 70.0361 73.8822 68.9804 72.2493 68.2427L71.4684 67.8877L71.1135 68.6687C70.3912 70.2645 70.9684 72.1598 72.4593 73.0766L126.422 106.309L127.41 104.907ZM73.3606 71.6134C72.8358 71.2893 72.5333 70.7244 72.5209 70.141C75.4719 70.9807 82.0622 71.8511 83.6241 72.0487L115.47 97.5455L73.3606 71.6134Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M53.3248 81.3182L53.5563 81.2503L53.7169 81.0713C55.5628 79.0216 60.6869 73.4994 62.2272 72.5826L62.9648 72.1443L62.5265 71.4066C61.6314 69.9033 59.7454 69.2952 58.1402 69.9959L0.0439568 95.3106L0.630413 96.9188L53.3248 81.3182ZM60.514 71.7152C58.1402 73.6568 53.6613 78.571 52.6056 79.7409L13.4868 91.3194L58.8256 71.564C59.054 71.4652 59.2916 71.4158 59.5293 71.4158C59.8781 71.4189 60.2207 71.5239 60.514 71.7152Z" fill="#837f7f" fill-opacity="0.21"></path>
                        </g>
                        <path d="M61.1186 66.2363C62.628 69.0515 65.7889 73.1723 68.3787 74.6818L71.4531 275.804H67.7336L66.0451 75.5893C64.4369 74.6818 57.1336 68.9064 61.1186 66.2363Z" fill="#837f7f" fill-opacity="0.21"></path>
                        <path d="M68.0758 76.3488C65.5415 74.009 62.2634 71.4346 60.8342 68.212C59.5594 65.3413 64.1958 66.4773 65.5262 66.9866C67.2393 67.6441 68.7519 68.7183 70.252 69.7554C71.0886 70.3327 72.4467 68.6781 71.6317 68.1133C69.4401 66.5946 67.1682 65.0357 64.4889 64.5727C62.8159 64.2826 59.9174 64.2579 58.9297 66.0019C57.9357 67.7521 59.3526 70.0548 60.3867 71.4346C62.2141 73.867 64.4705 75.9383 66.6961 77.994C67.4307 78.667 68.8228 77.0371 68.0758 76.3488Z" fill="#837f7f" fill-opacity="0.21"></path>
                        <path d="M78.25 277.027H67.1191L64.9707 75.1298L66.6869 75.1545L68.857 275.311H76.5122L70.0762 69.4533L71.7925 69.4316L78.25 277.027Z" fill="#837f7f" fill-opacity="0.21"></path>
                    </svg>
                </div>
                <div class="shape-2">
                    <svg width="128" height="278" viewBox="0 0 128 278" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g class="turbine-blades" transform-origin="51.5% 25.3%">
                            <path d="M71.8788 70.4397C74.8915 72.4153 127.039 105.425 127.039 105.425C127.039 105.425 127.311 107.132 125.191 106.799C123.07 106.466 70.8014 75.1193 70.8014 75.1193C70.8014 75.1193 69.4495 68.8469 71.8788 70.4397Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M58.589 75.009C57.0364 75.0121 10.6358 92.8568 10.6358 92.8568L58.589 70.6598C58.589 70.6598 60.1911 69.7276 60.5121 71.7154C60.83 73.7064 58.589 75.009 58.589 75.009Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M66.1544 64.3694C65.182 60.2886 65.3981 52.7013 65.2345 51.6981C65.0709 50.6949 73.9453 7.74854 73.9453 7.74854C73.9453 7.74854 61.4995 51.3709 61.3884 53.3711C61.2773 55.3714 64.7314 64.5916 65.2345 64.7305C65.7346 64.8725 66.1544 64.3694 66.1544 64.3694Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M76.0156 0.321025L74.3333 0L60.77 53.2562L60.7113 53.4908L60.7823 53.7223C60.8009 53.7841 62.6838 59.865 63.4308 63.4241C63.7704 65.0508 65.221 66.2331 66.8756 66.2331H67.6504L76.0156 0.321025ZM72.5584 13.9121L66.1565 64.3686C65.6348 64.1371 65.2303 63.6618 65.1068 63.0753C64.4185 59.794 62.8504 54.6175 62.4893 53.4476L72.5584 13.9121Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M127.41 104.907L84.3187 70.4096L84.078 70.3787C81.3431 70.0361 73.8822 68.9804 72.2493 68.2427L71.4684 67.8877L71.1135 68.6687C70.3912 70.2645 70.9684 72.1598 72.4593 73.0766L126.422 106.309L127.41 104.907ZM73.3606 71.6134C72.8358 71.2893 72.5333 70.7244 72.5209 70.141C75.4719 70.9807 82.0622 71.8511 83.6241 72.0487L115.47 97.5455L73.3606 71.6134Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M53.3248 81.3182L53.5563 81.2503L53.7169 81.0713C55.5628 79.0216 60.6869 73.4994 62.2272 72.5826L62.9648 72.1443L62.5265 71.4066C61.6314 69.9033 59.7454 69.2952 58.1402 69.9959L0.0439568 95.3106L0.630413 96.9188L53.3248 81.3182ZM60.514 71.7152C58.1402 73.6568 53.6613 78.571 52.6056 79.7409L13.4868 91.3194L58.8256 71.564C59.054 71.4652 59.2916 71.4158 59.5293 71.4158C59.8781 71.4189 60.2207 71.5239 60.514 71.7152Z" fill="#837f7f" fill-opacity="0.21"></path>
                        </g>
                        <path d="M61.1186 66.2363C62.628 69.0515 65.7889 73.1723 68.3787 74.6818L71.4531 275.804H67.7336L66.0451 75.5893C64.4369 74.6818 57.1336 68.9064 61.1186 66.2363Z" fill="#837f7f" fill-opacity="0.21"></path>
                        <path d="M68.0758 76.3488C65.5415 74.009 62.2634 71.4346 60.8342 68.212C59.5594 65.3413 64.1958 66.4773 65.5262 66.9866C67.2393 67.6441 68.7519 68.7183 70.252 69.7554C71.0886 70.3327 72.4467 68.6781 71.6317 68.1133C69.4401 66.5946 67.1682 65.0357 64.4889 64.5727C62.8159 64.2826 59.9174 64.2579 58.9297 66.0019C57.9357 67.7521 59.3526 70.0548 60.3867 71.4346C62.2141 73.867 64.4705 75.9383 66.6961 77.994C67.4307 78.667 68.8228 77.0371 68.0758 76.3488Z" fill="#837f7f" fill-opacity="0.21"></path>
                        <path d="M78.25 277.027H67.1191L64.9707 75.1298L66.6869 75.1545L68.857 275.311H76.5122L70.0762 69.4533L71.7925 69.4316L78.25 277.027Z" fill="#837f7f" fill-opacity="0.21"></path>
                    </svg>
                </div>
                <div class="shape-3">
                    <svg width="128" height="278" viewBox="0 0 128 278" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g class="turbine-blades" transform-origin="51.5% 25.3%">
                            <path d="M71.8788 70.4397C74.8915 72.4153 127.039 105.425 127.039 105.425C127.039 105.425 127.311 107.132 125.191 106.799C123.07 106.466 70.8014 75.1193 70.8014 75.1193C70.8014 75.1193 69.4495 68.8469 71.8788 70.4397Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M58.589 75.009C57.0364 75.0121 10.6358 92.8568 10.6358 92.8568L58.589 70.6598C58.589 70.6598 60.1911 69.7276 60.5121 71.7154C60.83 73.7064 58.589 75.009 58.589 75.009Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M66.1544 64.3694C65.182 60.2886 65.3981 52.7013 65.2345 51.6981C65.0709 50.6949 73.9453 7.74854 73.9453 7.74854C73.9453 7.74854 61.4995 51.3709 61.3884 53.3711C61.2773 55.3714 64.7314 64.5916 65.2345 64.7305C65.7346 64.8725 66.1544 64.3694 66.1544 64.3694Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M76.0156 0.321025L74.3333 0L60.77 53.2562L60.7113 53.4908L60.7823 53.7223C60.8009 53.7841 62.6838 59.865 63.4308 63.4241C63.7704 65.0508 65.221 66.2331 66.8756 66.2331H67.6504L76.0156 0.321025ZM72.5584 13.9121L66.1565 64.3686C65.6348 64.1371 65.2303 63.6618 65.1068 63.0753C64.4185 59.794 62.8504 54.6175 62.4893 53.4476L72.5584 13.9121Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M127.41 104.907L84.3187 70.4096L84.078 70.3787C81.3431 70.0361 73.8822 68.9804 72.2493 68.2427L71.4684 67.8877L71.1135 68.6687C70.3912 70.2645 70.9684 72.1598 72.4593 73.0766L126.422 106.309L127.41 104.907ZM73.3606 71.6134C72.8358 71.2893 72.5333 70.7244 72.5209 70.141C75.4719 70.9807 82.0622 71.8511 83.6241 72.0487L115.47 97.5455L73.3606 71.6134Z" fill="#837f7f" fill-opacity="0.21"></path>
                            <path d="M53.3248 81.3182L53.5563 81.2503L53.7169 81.0713C55.5628 79.0216 60.6869 73.4994 62.2272 72.5826L62.9648 72.1443L62.5265 71.4066C61.6314 69.9033 59.7454 69.2952 58.1402 69.9959L0.0439568 95.3106L0.630413 96.9188L53.3248 81.3182ZM60.514 71.7152C58.1402 73.6568 53.6613 78.571 52.6056 79.7409L13.4868 91.3194L58.8256 71.564C59.054 71.4652 59.2916 71.4158 59.5293 71.4158C59.8781 71.4189 60.2207 71.5239 60.514 71.7152Z" fill="#837f7f" fill-opacity="0.21"></path>
                        </g>
                        <path d="M61.1186 66.2363C62.628 69.0515 65.7889 73.1723 68.3787 74.6818L71.4531 275.804H67.7336L66.0451 75.5893C64.4369 74.6818 57.1336 68.9064 61.1186 66.2363Z" fill="#837f7f" fill-opacity="0.21"></path>
                        <path d="M68.0758 76.3488C65.5415 74.009 62.2634 71.4346 60.8342 68.212C59.5594 65.3413 64.1958 66.4773 65.5262 66.9866C67.2393 67.6441 68.7519 68.7183 70.252 69.7554C71.0886 70.3327 72.4467 68.6781 71.6317 68.1133C69.4401 66.5946 67.1682 65.0357 64.4889 64.5727C62.8159 64.2826 59.9174 64.2579 58.9297 66.0019C57.9357 67.7521 59.3526 70.0548 60.3867 71.4346C62.2141 73.867 64.4705 75.9383 66.6961 77.994C67.4307 78.667 68.8228 77.0371 68.0758 76.3488Z" fill="#837f7f" fill-opacity="0.21"></path>
                        <path d="M78.25 277.027H67.1191L64.9707 75.1298L66.6869 75.1545L68.857 275.311H76.5122L70.0762 69.4533L71.7925 69.4316L78.25 277.027Z" fill="#837f7f" fill-opacity="0.21"></path>
                    </svg>
                </div>
                <div class="solar-shape">
                    <svg fill="#d6d6d6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 553.216 553.216" xml:space="preserve" stroke="#d6d6d6">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path d="M539.291,423.518l-90-210.151c-1.064-2.471-3.5-4.072-6.198-4.072l-312.389-33.932c-0.035,0-0.062,0.004-0.091,0.004 c-0.497,0.009-1.008,0.072-1.5,0.196c-0.13,0.028-0.264,0.091-0.387,0.128c-0.359,0.112-0.698,0.241-1.048,0.411 c-0.161,0.082-0.311,0.178-0.474,0.269c-0.138,0.086-0.29,0.149-0.434,0.245l-11.546,8.247c-2.613,1.869-3.54,5.321-2.235,8.249 l35.01,83.623L11.794,261.946c-0.019,0-0.042,0-0.056,0c-0.327,0.004-0.656,0.046-0.976,0.128 c-0.077,0.019-0.159,0.056-0.238,0.082c-0.241,0.068-0.46,0.156-0.684,0.268c-0.1,0.047-0.2,0.11-0.301,0.166 c-0.096,0.058-0.191,0.1-0.287,0.159l-7.437,5.318c-1.678,1.204-2.28,3.428-1.438,5.316l63.867,152.535 c0.693,1.562,2.257,2.571,3.967,2.571h87.319l4.25,14.355l-31.925,21.282c-1.127,0.756-1.591,2.184-1.099,3.449 c0.434,1.134,1.515,1.861,2.705,1.861c0.124,0,0.273,0,0.406-0.027l63.647-9.092l47.425-9.744c1.438-0.299,2.413-1.615,2.303-3.071 c-0.114-1.452-1.295-2.6-2.749-2.67l-44.664-2.118v-14.235h15.703l0.583,1.4c1.085,2.432,3.498,3.995,6.161,3.995h18.255h2.744 h114.537l6.595,22.28l-49.56,33.043c-1.745,1.167-2.464,3.389-1.708,5.349c0.672,1.764,2.361,2.894,4.2,2.894 c0.215,0,0.43-0.009,0.644-0.042l98.793-14.113l73.609-15.131c2.222-0.462,3.752-2.496,3.575-4.76 c-0.168-2.264-1.998-4.037-4.271-4.145l-69.325-3.291v-22.084h117.13c0.037,0.005,0.075,0.005,0.094,0 c3.733,0,6.748-3.024,6.748-6.754C540.346,425.8,539.963,424.559,539.291,423.518z M507.125,382.737l-55.127-2.002l-10.025-6.963 l-9.987-23.639l5.335-6.772l54.109,2.726L507.125,382.737z M185.4,366.062l-26.759-1.345l-7.11-4.946l-7.218-17.077l3.484-4.41 l26.701,1.727L185.4,366.062z M199.604,326.886l-18.3-43.413l56.808,3.678l10.438,6.81l12.718,30.032l-5.334,5.731L199.604,326.886 z M253.95,295.178l5.258-6.669l60.88,3.943l10.967,7.159l11.957,28.311l-5.493,5.908l-62.392-3.146l-8.702-6.044L253.95,295.178z M336.403,300.713l5.404-6.86l55.674,3.612l10.16,6.632l11.729,27.745l-5.437,5.834l-55.282-2.781l-11.047-7.673L336.403,300.713z M394.485,292.755l-55.842-3.607l-10.1-7.015l-11.583-27.419l4.634-5.873l57.625,4.506l9.655,6.296l11.374,26.938L394.485,292.755z M323.774,282.404l-5.078,5.456l-62.048-4.027l-10.639-7.388l-11.924-28.168l4.674-5.916l64.247,5.026l8.242,5.376L323.774,282.404 z M241.31,276.874l-5.25,5.629l-56.709-3.673L161.418,236.3l56.414,4.411l11.282,7.372L241.31,276.874z M173.242,337.023 l-27.484-1.773l-6.506-4.522l-7.465-17.665l2.978-3.785l27.771,2.176L173.242,337.023z M136.177,330.9l-3.27,3.515l-39.978-2.591 l-6.849-4.76l-7.685-18.15l3.011-3.813l41.392,3.239l5.304,3.468L136.177,330.9z M94.583,334.839l39.208,2.538l7.068,4.611 l7.708,18.234l-3.547,3.809l-40.186-2.025l-5.612-3.893l-8.027-18.981L94.583,334.839z M107.507,365.049l39.488,1.983l6.151,4.018 l7.498,17.727l-3.029,3.252l-40.188-1.465l-6.322-4.387l-7.078-16.723L107.507,365.049z M156.716,372.036l3.412-4.341l26.519,1.34 l10.223,24.423l-27.23-0.989l-6.07-4.219L156.716,372.036z M201.548,331.488l55.4,2.791l11.99,7.827l11.302,26.687l-5.132,5.512 l-56.383-2.059L201.548,331.488z M273.876,342.241l5.402-6.842l61.283,3.09l9.554,6.235l11.64,27.512l-4.699,5.046l-62.385-2.269 l-9.811-6.814L273.876,342.241z M355.655,346.246l5.307-6.73l54.796,2.759l11.075,7.229l10.296,24.381l-5.676,6.1l-55.743-2.025 l-9.428-6.544L355.655,346.246z M489.465,341.48l-55.575-2.805l-9.54-6.627l-11.48-27.177l4.816-6.1l55.024,3.565L489.465,341.48z M470.718,297.694l-54.731-3.542l-10.837-7.523l-10.827-25.644l4.798-6.083l55.122,4.314L470.718,297.694z M438.654,222.796 l13.596,31.75l-54.134-4.237l-11.752-8.163l-11.047-26.122L438.654,222.796z M370.207,215.479l11.486,27.188l-5.526,5.927 l-54.334-4.25l-13.105-9.105l-11.653-27.578L370.207,215.479z M291.945,207.11l12.367,29.253l-5.74,6.16l-61.797-4.837 l-10.169-7.064l-13.525-31.944L291.945,207.11z M207.963,198.126l13.509,31.89l-5.615,6.032l-56.404-4.417l-17.079-40.522 L207.963,198.126z M151.998,286.273l9.278,22.174l-26.357-2.067l-8.44-5.867l-7.507-17.763L151.998,286.273z M115.674,282.395 l7.967,18.841l-3.694,3.977l-39.815-3.117l-6.548-4.556l-8.718-20.577L115.674,282.395z M19.313,272.092l42.255,4.521l8.7,20.544 l-3.615,3.884l-36.34-2.838L19.313,272.092z M31.585,301.208l36.34,2.842l7.269,4.746l7.861,18.547l-3.388,3.627l-36.536-2.361 L31.585,301.208z M44.394,331.586l36.592,2.37l6.725,4.388l8.191,19.345l-3.435,3.696l-36.289-1.829L44.394,331.586z M57.44,362.524l35.685,1.802l7.724,5.04l7.283,17.194l-3.302,3.547l-36.335-1.316L57.44,362.524z M81.569,419.79l-11.829-28.059 l36.235,1.315l6.768,4.411l9.453,22.327H81.569V419.79z M125.347,419.79l-9.066-21.432l3.78-4.798l38.107,1.387l7.021,4.582 l8.573,20.261H125.347z M141.695,461.868l21.739-14.496l19.212,8.652L141.695,461.868z M190.025,452.996l-11.766-5.312 l11.766,0.565V452.996z M190.025,442.443l-24.659-1.166l-3.785-12.788h28.443V442.443z M217.195,449.537l-21.366,4.396v-5.404 L217.195,449.537z M176.904,419.79l-8.116-19.201l4.035-5.11l25.282,0.92l9.796,23.392H176.904z M239.006,420.382l-18.351-43.554 l56.255,2.049l10.494,6.847l14.678,34.662h-63.076V420.382z M306.964,420.382l-14.085-33.268l5.875-7.443l59.155,2.146 l10.897,7.117l13.302,31.451h-75.145V420.382z M332.343,485.688l33.743-22.49l29.805,13.418L332.343,485.688z M407.371,471.92 l-18.271-8.232l18.271,0.863V471.92z M407.371,455.539l-38.298-1.811l-5.876-19.849h44.164v21.659H407.371z M449.533,466.553 l-33.159,6.818v-8.387L449.533,466.553z M386.994,420.382l-12.601-29.809l6.263-7.935l53.616,1.951l10.202,6.655l12.307,29.132 h-69.787V420.382z M461.668,420.382l-11.91-28.194l5.395-6.833l53.934,1.961l14.15,33.066H461.668z M479.17,85.923 c-26.463,0-48.001,21.534-48.001,48c0,26.472,21.538,48.001,48.001,48.001c26.462,0,47.996-21.534,47.996-48.001 C527.166,107.457,505.632,85.923,479.17,85.923z M479.17,172.926c-21.511,0-38.998-17.497-38.998-39.003 s17.487-39.002,38.998-39.002c21.496,0,38.998,17.497,38.998,39.002C518.168,155.434,500.666,172.926,479.17,172.926z M405.131,110.516c-0.028-0.296,0.01-0.592,0.098-0.889c0.379-1.186,1.657-1.832,2.833-1.449l12.303,3.995 c1.181,0.387,1.829,1.659,1.442,2.835c-0.304,0.955-1.186,1.557-2.133,1.557c0,0,0,0-0.01,0l0,0c-0.224,0-0.467-0.033-0.695-0.11 l-12.298-3.995C405.784,112.177,405.205,111.384,405.131,110.516z M432.854,73.865c-0.729-1.003-0.509-2.415,0.499-3.146l0,0l0,0 c1.004-0.73,2.423-0.511,3.146,0.497l7.604,10.461c0.732,1.003,0.504,2.413-0.495,3.146c-0.401,0.292-0.868,0.429-1.321,0.429 c-0.695,0-1.376-0.32-1.815-0.926l0,0l-0.009-0.005L432.854,73.865z M514.434,84.614c-0.998-0.733-1.223-2.143-0.494-3.146 l7.593-10.461c0.733-1.013,2.147-1.228,3.15-0.497c0.999,0.726,1.219,2.135,0.495,3.141l-7.598,10.466 c-0.439,0.602-1.121,0.926-1.82,0.926C515.293,85.043,514.835,84.903,514.434,84.614z M536.416,114.674 c-0.388-1.186,0.262-2.453,1.442-2.835l12.288-4c1.194-0.388,2.459,0.268,2.847,1.442c0.378,1.186-0.271,2.453-1.456,2.835 l-12.293,4.004c-0.229,0.077-0.467,0.11-0.7,0.11C537.602,116.231,536.724,115.624,536.416,114.674z M553.105,157.294 c-0.309,0.95-1.195,1.557-2.143,1.557c-0.229,0-0.471-0.033-0.695-0.11l-12.303-3.995c-1.185-0.383-1.829-1.654-1.451-2.833 c0.388-1.181,1.676-1.832,2.843-1.444l12.293,3.995C552.844,154.841,553.488,156.113,553.105,157.294z M525.472,193.06 c0.724,0.999,0.509,2.413-0.499,3.139c-0.393,0.292-0.864,0.432-1.316,0.432c-0.7,0-1.382-0.32-1.82-0.929l-7.607-10.457 c-0.729-1.003-0.504-2.413,0.499-3.139c0.999-0.726,2.418-0.516,3.142,0.497L525.472,193.06z M477.093,208.893v-12.928 c0-1.246,1.003-2.252,2.249-2.252c0.304,0,0.607,0.063,0.883,0.178c0.812,0.345,1.372,1.143,1.372,2.074v12.928 c0,1.242-0.999,2.25-2.255,2.25C478.105,211.143,477.093,210.135,477.093,208.893z M432.751,194.948 c-0.042-0.282-0.038-0.579,0.037-0.866c0.065-0.287,0.182-0.564,0.368-0.812l7.594-10.461c0.737-1.008,2.143-1.228,3.146-0.497 c0.495,0.361,0.808,0.898,0.896,1.472c0.093,0.567-0.028,1.176-0.401,1.671l-7.599,10.463c-0.438,0.607-1.12,0.927-1.819,0.927 c-0.463,0-0.915-0.133-1.326-0.427C433.147,196.047,432.835,195.517,432.751,194.948z M421.923,152.251 c0.374,1.185-0.271,2.452-1.456,2.833l0,0v0.007l-12.293,3.995c-0.233,0.075-0.467,0.11-0.695,0.11 c-0.947,0-1.839-0.602-2.143-1.554c-0.103-0.301-0.121-0.597-0.103-0.894c0.075-0.871,0.658-1.664,1.55-1.951l12.293-3.995 C420.271,150.415,421.545,151.07,421.923,152.251z M476.733,70.958v-12.93c0-1.244,1.003-2.251,2.249-2.251l0,0l0,0 c1.251,0,2.25,1.003,2.25,2.251v12.939c0,1.244-0.999,2.252-2.25,2.252c-1.236,0-2.249-1.003-2.249-2.252V70.958z"></path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>

        </div>
    </section>


    <section class="achievement-section-3 fix section-bg-2">
        <div class="container">
            <div class="achievement-wrapper style-2">
                <div class="section-title mb-0">
                    <span class="text-white wow fadeInUp">REPA DASHBOARD </span> <span class="small-ltr">(as on date)</span>

                    <h2 class="text-white wow fadeInUp fs-32" data-wow-delay=".3s">
                        Key insights on <br> REPA capacities
                    </h2>
                </div>
                <div class="counter-area">
                    <div class="counter-items wow fadeInUp" data-wow-delay=".3s">
                        <div class="icon">
                            <img src="assets/img/icons/team.png" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">{{$memberscount}}</span>+</h2>
                            <p> Members
                            </p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".5s">
                        <div class="icon">
                            <img src="assets/img/icons/total-energy.png" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">{{$totalre}} </span>+<span class="mw-text">MW</span> </h2>
                            <p>Total RE capacity</p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".7s">
                        <div class="icon">
                            <img src="assets/img/icons/wind-mill.png" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">{{$wind_energy}}</span>+<span class="mw-text">MW</span></h2>
                            <p> Wind Energy</p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".9s">
                        <div class="icon">
                            <img src="assets/img/icons/solar-panel.png" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">{{$totalsolar}}</span>+<span class="mw-text">MW</span></h2>
                            <p>Solar Energy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ptb-100 news-bg">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="news-updates">
                        <div class="section-title style-1 mb-30">
                            <h2>Recent Circulars</h2>
                        </div>
                        
                        
                        
                        
                        
                        <div class="swiper latest-news">
                            <div class="swiper-wrapper">
                                
                                           @foreach($Circular as $circular)
                                
                                <div class="swiper-slide">
                                    
                                    
                                    @if(auth()->check()) 
            <a href="{{ asset('storage/app/public/' . $circular->pdf) }}" target="_blank">
        @else
           <a href="{{ route('MemberLogin', ['redirect_url' => url()->current()]) }}">
        @endif
                                        <div class="item">
                                            <div class="news-date">
                                             <span class="mydate">
                        {{ date('Y', strtotime($circular->created_at . ' -1 year')) }}-{{ date('Y', strtotime($circular->created_at)) }}
                    </span>
                    <p class="news-month">JAN</p>
                    <span class="date">{{ date('d', strtotime($circular->created_at)) }}</span>
                                            </div>
                                          <div class="news-content news-content-1">
                    <h6>
                        <img src="{{ asset('assets/img/word.png') }}" class="pdf-label" alt="pdf">
                        {{ basename($circular->name) }} 
                        @if($circular->is_new == '1')
                            <span class="new-label">New</span>
                        @endif
                    </h6>
                </div>
                                        </div>

                                    </a>

                                </div>
                                @endforeach
                              

                            </div>
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="news-updates">
                        <div class="section-title style-1 mb-30">
                            <h2>Representations / Comments
                            </h2>
                        </div>
                        <div class="swiper comment-news">
                            <div class="swiper-wrapper">
                                 @foreach($Comments as $comments)
                                 
                                 
    <div class="swiper-slide">
                                     
                                      
                        
                         @if(auth()->check()) 
            <a href="{{ asset('storage/app/public/' . $comments->pdf) }}" target="_blank">
        @else
           <a href="{{ route('MemberLogin', ['redirect_url' => url()->current()]) }}">
        @endif
                               
        <div class="news-item">
            <div class="news-img">
                <img src="{{ asset('assets/img/calendar.png') }}" alt="repa-news">
            </div>
            <div class="news-content">
                <div class="date">
                    <span>{{ \Carbon\Carbon::parse($comments->created_at)->format('d-m-Y') }}</span>
                </div>

                <h6>
                    <img src="{{ asset('assets/img/word.png') }}" class="pdf-label" alt="pdf">
                    {{ basename($comments->name) }} 

                    @if($comments->is_new == '1')
                        <span class="new-label">New</span>
                    @endif
                </h6>

             
               

            </div>
        </div>
        </a>
        
    </div>
@endforeach

                              
                            </div>
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

<section id="Forecasting" class="live-section">
    <div class="container my-5">
        <div class="section-title text-center mb-5">
            <span class="wow fadeInUp">Energy Factsheet</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">Forecast Vs. Actuals</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row text-center mb-5">
                    <div class="col-md-5">
                        <b>Forecasted Energy (in MU) </b>
                    </div>
                    <div class="col-md-2">
                        <h2 class="Dateshow date-show"> {{ @$forecastData->date ? \Carbon\Carbon::parse(@$forecastData->date)->format('d-M-Y') : 'N/A' }}</h2>
                    </div>
                    <div class="col-md-5">
                        <b>Actual Energy Evacuated (in MU) </b>
                    </div>
                </div>

                <!-- Wind Data -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-5">
                        <div class="skill">
                            <div class="skill-title"><span>Wind</span></div>
                            <div class="progress-bar">
                                <div class="progress-fill blue" style="--percentage: {{ $forecastData ? ($forecastData->forecasted_wind / 100 * 100) : 0 }}%;">
                                    <span class="skill-percentage">{{ @$forecastData->forecasted_wind ?? 0 }} MU</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="live-icon">
                            <img src="assets/img/turbine.gif" alt="">
                        </div>
                        <p class="feature-text">Wind</p>
                    </div>
                    <div class="col-md-5">
                        <div class="skill">
                            <div class="skill-title"><span>Wind</span></div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="--percentage: {{ $forecastData ? ($forecastData->actual_wind / 100 * 100) : 0 }}%;">
                                    <span class="skill-percentage">{{ @$forecastData->actual_wind ?? 0 }} MU</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solar Data -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-5">
                        <div class="skill">
                            <div class="skill-title"><span>Solar</span></div>
                            <div class="progress-bar">
                                <div class="progress-fill blue" style="--percentage: {{ $forecastData ? ($forecastData->forecasted_solar / 100 * 100) : 0 }}%;">
                                    <span class="skill-percentage">{{ $forecastData->forecasted_solar ?? 0 }} MU</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="live-icon">
                            <img src="assets/img/solar-panel.gif" alt="">
                        </div>
                        <p class="feature-text">Solar</p>
                    </div>
                    <div class="col-md-5">
                        <div class="skill">
                            <div class="skill-title"><span>Solar</span></div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="--percentage: {{ $forecastData ? ($forecastData->actual_solar / 100 * 100) : 0 }}%;">
                                    <span class="skill-percentage">{{ $forecastData->actual_solar ?? 0 }} MU</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="commen-btn text-center">
    @if(Auth::check())
        <a href="{{ route('forcastvsactuals') }}" class="them-btn">
    @else
    
   
              <a href="{{ route('MemberLogin', ['redirect_url' => route('forcastvsactuals')]) }}" class="them-btn">

    @endif
            <span>
                Read More
                <i class="fa-solid fa-arrow-right-long"></i>
            </span>
        </a>
</div>

    </div>
</section>




    <section id="tn-power-supply" class="tn-energy ptb-50 bg-cover" style="background-image: url('assets/img/service-bg-3.jpg');">
        <div class="container">
            <div class="section-title text-center mb-5">
                <!-- <span class="wow fadeInUp">TN Energy Status</span> -->
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Tamil Nadu Power Supply Position
                </h2>
                <div class="pt-5">
                   
                    <h2 class="Dateshow date-show"> {{ @@$energySources->date ? \Carbon\Carbon::parse(@@$energySources->date)->format('d-M-Y') : 'N/A' }}</h2>
                
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div id="chart">
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">

                    <div id="piechart"></div>

                </div>
            </div>
            <div class="row">
            <div class="col-lg-7">
        <div class="live-items d-flex flex-row-reverse">
            @php
                $categories = [
                    'THERMAL' => ['value' => @$energySources->thermal ?? 0, 'icon' => 'power.png', 'class' => 'litblu'],
                    'HYDRO' => ['value' => @$energySources->hydro ?? 0, 'icon' => 'dam.png', 'class' => 'litpnk'],
                    'GAS NAPTHA' => ['value' => @$energySources->gas_naptha ?? 0, 'icon' => 'gas.png', 'class' => 'litorg'],
                    'WIND' => ['value' => @$energySources->wind ?? 0, 'icon' => 'wind-turbine.png', 'class' => 'litcrn'],
                    'SOLAR' => ['value' => @$energySources->solar ?? 0, 'icon' => 'solar-energy.png', 'class' => 'litrd'],
                    'BIO & CO-GEN' => ['value' => @$energySources->bio_co_gen ?? 0, 'icon' => 'bio-gas.png', 'class' => 'litgrn'],
                    'CENTRAL GRID' => ['value' => @$energySources->central_grid ?? 0, 'icon' => 'renewable-energy.png', 'class' => 'litylw']
                ];
            @endphp

            @foreach ($categories as $name => $data)
                <div class="live-item">
                    <div class="tnlive-icon">
                        <img src="{{ asset('assets/img/icons/' . $data['icon']) }}" alt="">
                    </div>
                    <div class="live-content {{ $data['class'] }}">
                        <div class="data">
                            <span>{{ number_format($data['value'], 2) }}</span> <span class="mu-text">MU</span>
                        </div>
                        <h6>{{ $name }}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
                <div class="col-lg-5 pt-5">
                <div class="live-items d-flex">
    <div class="live-item">
        <div class="live-content litcyen">
            <div class="data">
                <span>{{ $availabilityDemandmet->availability ?? 0 }}</span> <span class="mu-text"> MU </span>
            </div>
            <h6>Availability</h6>
        </div>
    </div>
    <div class="live-item">
        <img src="assets/img/icons/unbalanced.png" width="68px" height="68px" alt="">
    </div>
    <div class="live-item">
        <div class="live-content litwhite">
            <div class="data">
                <span>{{ $availabilityDemandmet->demand_met ?? 0 }}</span> <span class="mu-text"> MU </span>
            </div>
            <h6>Demand Met</h6>
        </div>
    </div>
</div>



                </div>

            </div>

            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
               <div class="commen-btn text-center pt-5">
    @if(Auth::check())
        <a href="{{ route('showenergy') }}" class="them-btn">
    @else
        <a href="{{ route('MemberLogin', ['redirect_url' => route('showenergy')]) }}" class="them-btn">
    @endif
        <span>
            Read More
            <i class="fa-solid fa-arrow-right-long"></i>
        </span>
    </a>
</div>
                </div>
                <div class="col-lg-4">
                <div class="notes text-end pt-5">
                <em>Data Source: <b>SRLDC</b></em> <br>
                <em><b>ALL THE VALUES IN MILLION UNITS</b></em>
            </div>
                </div>
            </div>



        </div>
    </section>
    

    <section class="buyer-seller pt-5">

        <div class="container">

            <div class="section-title text-center">
                <span class="wow fadeInUp">REPA Mart</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Buyer / Seller Offers
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="swiper buyer-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">

                                <div class="single-job">
                                    <div class="job-logo">
                                        <img src="https://themelooks.org/demo/docland/html/assets/img/feature/job1.png" alt="">
                                    </div>
                                    <div class="job-content">
                                        <span class="job-cat">
                                            <a href="#">Buyer</a>
                                        </span>
                                        <h5>Best Green Energy Stocks Needed</h5>

                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-bolt"></i> <span>1000 watts.
                                                </span>
                                            </p>
                                            <p>
                                                ₹ <span>30-50K</span>
                                            </p>
                                        </div>
                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-phone"></i> <span>Contacts
                                                </span>
                                            </p>
                                            <p>
                                                <i class="fa-regular fa-user"></i> <span>Person Name</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="swiper-slide">

                                <div class="single-job">
                                    <div class="job-logo">
                                        <img src="https://themelooks.org/demo/docland/html/assets/img/feature/job2.png" alt="">
                                    </div>
                                    <div class="job-content">
                                        <span class="job-cat">
                                            <a href="#">Buyer</a>
                                        </span>
                                        <h5>Best Green Energy Stocks Needed</h5>

                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-bolt"></i> <span>1000 watts.
                                                </span>
                                            </p>
                                            <p>
                                                ₹ <span>30-50K</span>
                                            </p>
                                        </div>
                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-phone"></i> <span>Contacts
                                                </span>
                                            </p>
                                            <p>
                                                <i class="fa-regular fa-user"></i> <span>Person Name</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="swiper-slide">


                                <div class="single-job">
                                    <div class="job-logo">
                                        <img src="	https://themelooks.org/demo/docland/html/assets/img/feature/job3.png" alt="">
                                    </div>
                                    <div class="job-content">
                                        <span class="job-cat">
                                            <a href="#">Buyer</a>
                                        </span>
                                        <h5>Best Green Energy Stocks Needed</h5>

                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-bolt"></i> <span>1000 watts.
                                                </span>
                                            </p>
                                            <p>
                                                ₹ <span>30-50K</span>
                                            </p>
                                        </div>
                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-phone"></i> <span>Contacts
                                                </span>
                                            </p>
                                            <p>
                                                <i class="fa-regular fa-user"></i> <span>Person Name</span>
                                            </p>
                                        </div>

                                        <!-- <button id="blinking-button">Click Me!</button> -->

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="swiper seller-slider green">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">

                                <div class="single-job">
                                    <div class="job-logo">
                                        <img src="https://themelooks.org/demo/docland/html/assets/img/feature/job1.png" alt="">
                                    </div>
                                    <div class="job-content">
                                        <span class="job-cat">
                                            <a href="#">Seller</a>
                                        </span>
                                        <h5>Best Green Energy Stocks Needed</h5>

                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-bolt"></i> <span>1000 watts.
                                                </span>
                                            </p>
                                            <p>
                                                ₹ <span>30-50K</span>
                                            </p>
                                        </div>
                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-phone"></i> <span>Contacts
                                                </span>
                                            </p>
                                            <p>
                                                <i class="fa-regular fa-user"></i> <span>Person Name</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="swiper-slide">

                                <div class="single-job">
                                    <div class="job-logo">
                                        <img src="https://themelooks.org/demo/docland/html/assets/img/feature/job2.png" alt="">
                                    </div>
                                    <div class="job-content">
                                        <span class="job-cat">
                                            <a href="#">Seller</a>
                                        </span>
                                        <h5>Best Green Energy Stocks Needed</h5>

                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-bolt"></i> <span>1000 watts.
                                                </span>
                                            </p>
                                            <p>
                                                ₹ <span>30-50K</span>
                                            </p>
                                        </div>
                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-phone"></i> <span>Contacts
                                                </span>
                                            </p>
                                            <p>
                                                <i class="fa-regular fa-user"></i> <span>Person Name</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="swiper-slide">


                                <div class="single-job">
                                    <div class="job-logo">
                                        <img src="	https://themelooks.org/demo/docland/html/assets/img/feature/job3.png" alt="">
                                    </div>
                                    <div class="job-content">
                                        <span class="job-cat">
                                            <a href="#">Seller</a>
                                        </span>
                                        <h5>Best Green Energy Stocks Needed</h5>

                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-bolt"></i> <span>1000 watts.
                                                </span>
                                            </p>
                                            <p>
                                                ₹ <span>30-50K</span>
                                            </p>
                                        </div>
                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-phone"></i> <span>Contacts
                                                </span>
                                            </p>
                                            <p>
                                                <i class="fa-regular fa-user"></i> <span>Person Name</span>
                                            </p>
                                        </div>

                                        <!-- <button id="blinking-button">Click Me!</button> -->

                                    </div>
                                </div>

                            </div>
                            <div class="swiper-slide">


                                <div class="single-job">
                                    <div class="job-logo">
                                        <img src="	https://themelooks.org/demo/docland/html/assets/img/feature/job3.png" alt="">
                                    </div>
                                    <div class="job-content">
                                        <span class="job-cat">
                                            <a href="#">Seller</a>
                                        </span>
                                        <h5>Best Green Energy Stocks Needed</h5>

                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-bolt"></i> <span>1000 watts.
                                                </span>
                                            </p>
                                            <p>
                                                ₹ <span>30-50K</span>
                                            </p>
                                        </div>
                                        <div class="meta-box">
                                            <p>
                                                <i class="fa-solid fa-phone"></i> <span>Contacts
                                                </span>
                                            </p>
                                            <p>
                                                <i class="fa-regular fa-user"></i> <span>Person Name</span>
                                            </p>
                                        </div>

                                        <!-- <button id="blinking-button">Click Me!</button> -->

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>




    <!-- News Section Start -->
    <section class="news-section fix ptb-50">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="wow fadeInUp">Latest Events</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Our Latest Event
                    </h2>
                </div>
                <a href="{{route('Events')}}" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
                    All Events
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
            <div class="swiper events-slider">
                <div class="swiper-wrapper">
                    
                    @foreach ($Events as $event)
    <div class="swiper-slide">
        <div class="news-card-items">
            <div class="news-image">
                <img src="{{ asset('storage/app/public/' . $event->cover_image) }}" alt="COVER IMAGE">
                <div class="post-date">
                    <h3>
                        {{ \Carbon\Carbon::parse($event->date)->format('d') }} <br>
                        <span>{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                    </h3>
                </div>
            </div>
            <div class="news-content">
            <ul>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        By Admin
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-tag"></i>
                                        REPA Launch
                                    </li>
                                </ul>
                <h3>
                    <a href="#">
                        {{ $event->title }}
                    </a>
                </h3>
                <a href="{{ route('event_details', ['id' => $event->id]) }}"
 class="theme-btn-2 mt-3">
                        Read More
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
            </div>
        </div>
    </div>
@endforeach

                    
                </div>
            </div>
        </div>
    </section>

@include('includes.footer')



@include('includes.script')

<script>
   
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
            series: [{
                name: "Energy (MU)",
                data: @json($chartData['values']), // Dynamically pass PHP array
            }],
            chart: {
                type: 'bar',
                height: 430,
                dropShadow: {
                    enabled: true,
                },
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 0,
                    horizontal: true,
                    distributed: true,
                    barHeight: '80%',
                    isFunnel: true,
                },
            },
            colors: [
                '#E55A89',
                '#D863B1',
                '#CA6CD8',
                '#B57BED',
                '#8D95EB',
                '#62ACEA',
                '#4BC3E6',
            ],
            dataLabels: {
                enabled: true,
                formatter: function(val, opt) {
                    const category = opt.w.globals.labels[opt.dataPointIndex]; 
                    return `${category}: ${val.toFixed(2)} MU`;
                },
                dropShadow: {
                    enabled: true,
                },
            },
            title: {
                text: 'Energy Sources',
                align: 'middle',
            },
            xaxis: {
                categories: @json($chartData['categories']), // Dynamically pass categories
                labels: {
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold',
                        colors: '#000',
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return `${val.toFixed(2)} MU`;
                    }
                }
            },
            legend: {
                show: false,
            },
        };

        // Render the chart
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
<script>
    var availability = @json($availabilityDemandmet->availability ?? 0);
    var demandMet = @json($availabilityDemandmet->demand_met ?? 0);

    var piechart = {
        series: [demandMet, availability],
        chart: {
            width: 500,
            type: 'donut',
        },
        dataLabels: {
            enabled: true,
            dropShadow: {
                enabled: true,
            },
            formatter: function(val, opts) {
                return `${opts.w.config.series[opts.seriesIndex].toFixed(2)} MU`;
            },
        },
        fill: {
            type: 'gradient',
        },
        legend: {
            show: false,
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return `${val.toFixed(2)} MU`;
                },
            },
        },
        title: {
            text: 'Availability Vs. Demand Met',
            align: 'middle',
        },
        labels: ['Demand Met', 'Availability'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200,
                },
                legend: {
                    position: 'bottom',
                },
            },
        }],
    };

    var piechart = new ApexCharts(document.querySelector("#piechart"), piechart);
    piechart.render();
</script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const skills = document.querySelectorAll(".skill");

            // Intersection Observer to detect when the skills section enters the viewport
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const skill = entry.target;

                            // Animate the progress fill
                            skill.setAttribute("data-animated", "true");
                            observer.unobserve(skill); // Stop observing once animated
                        }
                    });
                }, {
                    threshold: 0.2
                } // Trigger when 20% of the element is visible
            );

            // Observe each skill element
            skills.forEach((skill) => {
                observer.observe(skill);
            });
        });

       

       

     
        const apiUrl = "/latest-forecast"; // Laravel API endpoint

async function fetchForecastData() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        console.log("Latest Forecast Data:", data);

        if (data && data.date) {
            updateDateElements(formatDate(data.date)); // Use API date
        } else {
            updateDateElements(getFormattedDate()); // Use current date as fallback
        }
    } catch (error) {
        console.error("Error fetching forecast data:", error);
        updateDateElements(getFormattedDate()); // Show fallback date on error
    }
}

// ✅ Convert "YYYY-MM-DD" to "DD-MM-YYYY"
function formatDate(dateString) {
    const [year, month, day] = dateString.split('-'); // Split the string manually
    return `${day}-${month}-${year}`; // Output format "DD-MM-YYYY"
}

// ✅ Get current date as fallback in "DD-MM-YYYY"
function getFormattedDate() {
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0');
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    const year = today.getFullYear();
    return `${day}-${month}-${year}`;
}

// ✅ Update all elements with class "Dateshow"
function updateDateElements(dateText) {
    document.querySelectorAll('.Dateshow').forEach(element => {
        element.textContent = dateText;
    });
}





        var progressPath = document.querySelector(".progress-wrap path");
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "none";
        progressPath.style.strokeDasharray = pathLength + " " + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "stroke-dashoffset 10ms linear";
        var updateProgress = function() {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength) / height;
            progressPath.style.strokeDashoffset = progress;
        };
        updateProgress();
        $(window).scroll(updateProgress);
        var offset = 650;
        var duration = 550;
        jQuery(window).on("scroll", function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery(".progress-wrap").addClass("active-progress");
            } else {
                jQuery(".progress-wrap").removeClass("active-progress");
            }
        });
        jQuery(".progress-wrap").on("click", function(event) {
            event.preventDefault();
            jQuery("html, body").animate({
                scrollTop: 0
            }, duration);
            return false;
        });
    </script>

</body>

</html>
