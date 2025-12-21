<!DOCTYPE html>

<html lang="en" style="overflow-x: hidden;">



<head>
<meta name="description" content="{{ \App\Models\User::first()?->summary ?? 'Portfolio website showcasing web design and development projects.' }}">
    <meta name="keywords" content="portfolio, web design, development, designer, {{ \App\Models\User::first()?->job_name ?? 'designer' }}">
    <meta name="author" content="{{ \App\Models\User::first()?->name ?? 'Portfolio' }}">
    <meta property="og:title" content="{{ \App\Models\User::first()?->name ?? 'Portfolio' }} - {{ \App\Models\User::first()?->job_name ?? 'Designer' }}">
    <meta property="og:description" content="{{ \App\Models\User::first()?->summary ?? 'Portfolio website showcasing web design and development projects.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ \App\Models\User::first() && \App\Models\User::first()->photo ? asset('storage/' . \App\Models\User::first()->photo) : asset('template/images/hero-profile.jpg') }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ \App\Models\User::first()?->name ?? 'Portfolio' }} - {{ \App\Models\User::first()?->job_name ?? 'Designer' }}">
    <meta property="twitter:description" content="{{ \App\Models\User::first()?->summary ?? 'Portfolio website showcasing web design and development projects.' }}">
    <meta property="twitter:image" content="{{ \App\Models\User::first() && \App\Models\User::first()->photo ? asset('storage/' . \App\Models\User::first()->photo) : asset('template/images/hero-profile.jpg') }}">
    <link rel="canonical" href="{{ url('/') }}">
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ \App\Models\User::first()?->name ?? 'Portfolio' }}</title>

    <!-- Favicon with Font Awesome Icon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect fill='%231a1a2e' width='100' height='100'/><path d='M20 35h60v45H20z' fill='%23ff9500' stroke='%231a1a2e' stroke-width='2'/><rect x='30' y='28' width='40' height='8' fill='%23ff9500'/><circle cx='35' cy='52' r='3' fill='%231a1a2e'/><circle cx='65' cy='52' r='3' fill='%231a1a2e'/></svg>">
    <link rel="apple-touch-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 180 180'><rect fill='%231a1a2e' width='180' height='180' rx='40'/><path d='M40 65h100v80H40z' fill='%23ff9500' stroke='%231a1a2e' stroke-width='3'/><rect x='55' y='55' width='70' height='12' fill='%23ff9500'/><circle cx='62' cy='90' r='5' fill='%231a1a2e'/><circle cx='118' cy='90' r='5' fill='%231a1a2e'/></svg>">
    <meta name="theme-color" content="#1a1a2e">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Link Swiper's CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />



    <!--Bootstrap ================================================== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">



    <!--vendor css ================================================== -->

    <link rel="stylesheet" type="text/css" href="{{ asset('template/css/vendor.css') }}">



    <!-- Style Sheet -->

    <link rel="stylesheet" href="{{ asset('template/styles.css') }}">



    <!-- Google fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

        <symbol id="quote-left" viewBox="0 0 24 24">

            <path fill="currentColor"
                d="M3.691 6.292C5.094 4.771 7.217 4 10 4h1v2.819l-.804.161c-1.37.274-2.323.813-2.833 1.604A2.9 2.9 0 0 0 6.925 10H10a1 1 0 0 1 1 1v7c0 1.103-.897 2-2 2H3a1 1 0 0 1-1-1v-5l.003-2.919c-.009-.111-.199-2.741 1.688-4.789M20 20h-6a1 1 0 0 1-1-1v-5l.003-2.919c-.009-.111-.199-2.741 1.688-4.789C16.094 4.771 18.217 4 21 4h1v2.819l-.804.161c-1.37.274-2.323.813-2.833 1.604A2.9 2.9 0 0 0 17.925 10H21a1 1 0 0 1 1 1v7c0 1.103-.897 2-2 2" />

        </symbol>

        <symbol id="arrow-right" viewBox="0 0 24 24">

            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />

        </symbol>

        <symbol id="arrow-left" viewBox="0 0 24 24">

            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />

        </symbol>

        <symbol id="facebook" viewBox="0 0 24 24">

            <path fill="currentColor"
                d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />

        </symbol>

        <symbol id="twitter" viewBox="0 0 16 16">

            <path fill="currentColor"
                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518a3.3 3.3 0 0 0 1.447-1.817a6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429a3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218a3.2 3.2 0 0 1-.865.115a3 3 0 0 1-.614-.057a3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />

        </symbol>

        <symbol id="instagram" viewBox="0 0 24 24">

            <path fill="currentColor"
                d="M13.028 2c1.125.003 1.696.009 2.189.023l.194.007c.224.008.445.018.712.03c1.064.05 1.79.218 2.427.465c.66.254 1.216.598 1.772 1.153a4.9 4.9 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.012.266.022.487.03.712l.006.194c.015.492.021 1.063.023 2.188l.001.746v1.31a79 79 0 0 1-.023 2.188l-.006.194c-.008.225-.018.446-.03.712c-.05 1.065-.22 1.79-.466 2.428a4.9 4.9 0 0 1-1.153 1.772a4.9 4.9 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465l-.712.03l-.194.006c-.493.014-1.064.021-2.189.023l-.746.001h-1.309a78 78 0 0 1-2.189-.023l-.194-.006a63 63 0 0 1-.712-.031c-1.064-.05-1.79-.218-2.428-.465a4.9 4.9 0 0 1-1.771-1.153a4.9 4.9 0 0 1-1.154-1.772c-.247-.637-.415-1.363-.465-2.428l-.03-.712l-.005-.194A79 79 0 0 1 2 13.028v-2.056a79 79 0 0 1 .022-2.188l.007-.194c.008-.225.018-.446.03-.712c.05-1.065.218-1.79.465-2.428A4.9 4.9 0 0 1 3.68 3.678a4.9 4.9 0 0 1 1.77-1.153c.638-.247 1.363-.415 2.428-.465c.266-.012.488-.022.712-.03l.194-.006a79 79 0 0 1 2.188-.023zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10m0 2a3 3 0 1 1 .001 6a3 3 0 0 1 0-6m5.25-3.5a1.25 1.25 0 0 0 0 2.5a1.25 1.25 0 0 0 0-2.5" />

        </symbol>

        <symbol id="pinterest" viewBox="0 0 24 24">

            <g fill="none">

                <path
                    d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />

                <path fill="currentColor"
                    d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12c0 4.006 2.356 7.462 5.758 9.058l2.29-10.766a1 1 0 0 1 1.956.416C11.73 12 11.49 12.5 11.501 13.1c.017.94.273 1.442.521 1.702c.253.265.618.408 1.095.4c.487-.01 1.038-.181 1.526-.489C15.592 14.117 16 13.095 16 12a4 4 0 1 0-7.668 1.6a1 1 0 0 1-1.832.8a6 6 0 1 1 11 0c-.368.848-1.04 1.534-1.792 2.007c-.755.475-1.657.779-2.555.795c-.819.015-1.672-.212-2.359-.808L9.66 21.726c.75.18 1.534.275 2.339.275Z" />

            </g>

        </symbol>

        <symbol id="youtube" viewBox="0 0 24 24">

            <path fill="currentColor"
                d="m10 15l5.19-3L10 9zm11.56-7.83c.13.47.22 1.1.28 1.9c.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83c-.25.9-.83 1.48-1.73 1.73c-.47.13-1.33.22-2.65.28c-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44c-.9-.25-1.48-.83-1.73-1.73c-.13-.47-.22-1.1-.28-1.9c-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83c.25-.9.83-1.48 1.73-1.73c.47-.13 1.33-.22 2.65-.28c1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44c.9.25 1.48.83 1.73 1.73" />

        </symbol>

        <symbol id="paintbrush" viewBox="0 0 16 16">

            <path fill="currentColor"
                d="m5.6 11.6l-1.2-1.2c-.8-.2-2-.1-2.7 1c-.8 1.1-.3 2.8-1.7 4.6c0 0 3.5 0 4.8-1.3c1.2-1.2 1.2-2.2 1-3zm.2-3.5c-.2.3-.5.7-.7 1c0 .2-.1.3-.2.4L6.4 11c.1-.1.3-.2.4-.3c.3-.2.7-.4 1-.7c.4 0 .6-.2.8-.4L6.4 7.4c-.2.2-.4.4-.6.7m10-7.9c-.3-.3-.7-.3-1-.1c0 0-3 2.5-5.9 5.1c-.4.4-.7.7-1.1 1c-.2.2-.4.4-.6.5l2.1 2.1c.2-.2.4-.4.5-.7c.3-.4.6-.7.9-1.1c2.5-3 5.1-5.9 5.1-5.9c.3-.2.3-.6 0-.9" />

        </symbol>

        <symbol id="t-shirt" viewBox="0 0 20 20">

            <g fill="currentColor">

                <path fill-rule="evenodd"
                    d="m2.668 10.009l1.166-.583V16.5a2.5 2.5 0 0 0 2.5 2.5h7.335a2.5 2.5 0 0 0 2.5-2.5V9.425l1.166.581a.5.5 0 0 0 .71-.338l.945-4.236a.5.5 0 0 0-.135-.463l-2.248-2.24A2.5 2.5 0 0 0 14.842 2h-2.007a.5.5 0 0 0-.493.415c-.287 1.658-1.04 2.409-2.342 2.409c-1.3 0-2.054-.751-2.34-2.409A.5.5 0 0 0 7.167 2H5.161a2.5 2.5 0 0 0-1.766.73L1.15 4.97a.5.5 0 0 0-.135.462l.943 4.238a.5.5 0 0 0 .711.338M5.161 3h1.598C7.195 4.84 8.297 5.824 10 5.824S12.806 4.84 13.243 3h1.6a1.5 1.5 0 0 1 1.058.437l2.053 2.046l-.745 3.343l-1.317-.656a.5.5 0 0 0-.723.448V16.5a1.5 1.5 0 0 1-1.5 1.5H6.334a1.5 1.5 0 0 1-1.5-1.5V8.618a.5.5 0 0 0-.724-.448l-1.316.658l-.744-3.345l2.051-2.045A1.5 1.5 0 0 1 5.161 3"
                    clip-rule="evenodd" />

                <path d="M12 10.5a.5.5 0 0 1 0-1h2a.5.5 0 0 1 0 1z" />

            </g>

        </symbol>

        <symbol id="box" viewBox="0 0 24 24">

            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                d="m15.578 3.382l2 1.05c2.151 1.129 3.227 1.693 3.825 2.708C22 8.154 22 9.417 22 11.942v.117c0 2.524 0 3.787-.597 4.801c-.598 1.015-1.674 1.58-3.825 2.709l-2 1.049C13.822 21.539 12.944 22 12 22s-1.822-.46-3.578-1.382l-2-1.05c-2.151-1.129-3.227-1.693-3.825-2.708C2 15.846 2 14.583 2 12.06v-.117c0-2.525 0-3.788.597-4.802c.598-1.015 1.674-1.58 3.825-2.708l2-1.05C10.178 2.461 11.056 2 12 2s1.822.46 3.578 1.382ZM21 7.5l-4 2M12 12L3 7.5m9 4.5v9.5m0-9.5l4.5-2.25l.5-.25m0 0V13m0-3.5l-9.5-5" />

        </symbol>

        <symbol id="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">

            <path fill="currentColor"
                d="M19 3C13.488 3 9 7.488 9 13c0 2.395.84 4.59 2.25 6.313L3.281 27.28l1.439 1.44l7.968-7.969A9.922 9.922 0 0 0 19 23c5.512 0 10-4.488 10-10S24.512 3 19 3zm0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8s-8-3.57-8-8s3.57-8 8-8z" />

        </symbol>

        <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 16 16">

            <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />

        </symbol>

    </svg>



    <div class="preloader">

        <div class="loader"></div>

    </div>



    <nav id="header-nav" class="navbar navbar-expand-lg py-4" data-bs-theme="dark">

        <div class="container-fluid padding-side">

            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header">

                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>

                    <button type="button" class="btn-close text-reset shadow-none" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>

                </div>

                <div class="offcanvas-body">

                    <ul class="navbar-nav text-center align-items-center justify-content-center flex-grow-1 w-100">
                        <li class="nav-item">
                            <a class="nav-link active pe-lg-5" aria-current="page" href="#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-lg-5" href="#achievements">Skills</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-lg-5" href="#portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-lg-5" href="#testimonial">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold border-bottom border-2 border-primary" href="#contact">Contact us</a>
                        </li>
                    </ul>

                </div>

            </div>

        </div>

    </nav>

    <section id="hero" class="padding-medium">

        <div class="container text-white">

            <div class="row align-items-center justify-content-between">

                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">

                    <p class="letter-space text-primary fs-4" data-aos="fade-up" data-aos-duration="1000">

                        Hi, I'm {{ \App\Models\User::first()?->name ?? 'Kimi Lewis' }}

                    </p>

                    <h2 class="banner-size display-1" data-aos="fade-up" data-aos-duration="1200">

                        {{ \App\Models\User::first()?->job_name ?? 'Logo & Web Designer' }}

                    </h2>

                    <p data-aos="fade-up" data-aos-duration="1400">

                        {{ \App\Models\User::first()?->summary ?? 'I help businesses transform their visions into impactful visual identities and stunning online presences.' }}

                    </p>

                    <a href="#portfolio" class="btn button rounded-pill mt-4 position-relative pe-5 z-1">

                        <span>View All Projects</span>

                        <div class="position-absolute top-50 end-0 translate-middle-y me-2">

                            <svg class="arrow-right bg-white text-black rounded-circle p-2" width="35"
                                height="35">

                                <use xlink:href="#arrow-right"></use>

                            </svg>

                        </div>

                    </a>

                </div>

                <div class="col-lg-5" data-aos="fade-left" data-aos-duration="1000">

                    <div class="position-relative d-flex align-items-center justify-content-center"
                        style="height: 600px;">

                        <!-- Animated background gradient circle -->
                        <div
                            style="position: absolute; width: 450px; height: 450px; background: linear-gradient(135deg, rgba(183, 117, 255, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border-radius: 50%; animation: float 6s ease-in-out infinite; filter: blur(40px);">
                        </div>

                        <!-- Hero Image Container -->
                        <div style="position: relative; width: 350px; height: 450px; z-index: 1;">

                            @php
                                $portfolioUser = \App\Models\User::first();
                            @endphp

                            @if ($portfolioUser && $portfolioUser->photo)
                                <img src="{{ asset('storage/' . $portfolioUser->photo) }}"
                                    alt="{{ $portfolioUser->name }}"
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px; box-shadow: 0 20px 60px rgba(183, 117, 255, 0.3); border: 2px solid rgba(183, 117, 255, 0.2);">
                            @else
                                <img src="{{ asset('template/images/hero-profile.jpg') }}" alt="Profile Placeholder"
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px; box-shadow: 0 20px 60px rgba(183, 117, 255, 0.3); border: 2px solid rgba(183, 117, 255, 0.2);">
                            @endif

                        </div>

                        <div style="position: absolute; top: 20px; right: -80px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 15px 20px; border-radius: 15px; border: 1px solid rgba(255, 255, 255, 0.2); z-index: 2; animation: float 4s ease-in-out 1s infinite;"
                            class="d-none d-lg-block">

                            <p style="margin: 0; font-size: 0.85rem; color: #EC4899; font-weight: 600;">❤️ Built with
                                Love</p>

                            <p style="margin: 0; font-size: 0.75rem; color: rgba(255, 255, 255, 0.7);">Passion &
                                Creativity</p>

                        </div>
                        <div style="position: absolute; bottom: 20px; left: -80px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 15px 20px; border-radius: 15px; border: 1px solid rgba(255, 255, 255, 0.2); z-index: 2; animation: float 4s ease-in-out 1s infinite;"
                            class="d-none d-lg-block">

                            <p style="margin: 0; font-size: 0.85rem; color: #A78BFA; font-weight: 600;">Tech Stack</p>

                            <p style="margin: 0; font-size: 0.75rem; color: rgba(255, 255, 255, 0.7);">Laravel • React
                                • Flutter</p>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) translate(-50%, -50%);
                }

                50% {
                    transform: translateY(-20px) translate(-50%, -50%);
                }
            }
        </style>

    </section>



    <div class="container-fluid padding-side position-relative">

        <div class="position-absolute top-0 start-50 translate-middle d-none d-xxl-block" style="pointer-events: none;">

            <img src="{{ asset('template/images/bg-pattern.png') }}" alt="bg-img" class="image-fluid">

        </div>

        <div class="position-absolute top-100 start-50 translate-middle d-none d-xxl-block" style="pointer-events: none;">

            <img src="{{ asset('template/images/bg-pattern.png') }}" alt="bg-img" class="image-fluid">

        </div>

        <div class="border border-light border-opacity-25 rounded-5"
            style="background-color: rgba(255, 255, 255, 0.06); box-shadow: 0px 12px 90px rgba(106, 30, 188, 0.2);">

            <section id="achievements" class="padding-medium">

                <div class="process-content container" data-aos="fade-up">

                    <div id="counter" class="row justify-content-center text-center">

                        <div class="col-lg-3 col-6 text-center">

                            <div class="d-flex justify-content-center align-items-center">

                                <h4 class="counter-value display-1 banner-size" data-count="{{ date('Y') - 2019 }}">{{ date('Y') - 2019 }}</h4><span
                                    class="text-primary display-1 fw-lighter">+</span>

                            </div>

                            <p class="text-capitalize mb-0">years experience</p>

                        </div>

                        <div class="col-lg-3 col-6 text-center">

                            <div class="d-flex justify-content-center align-items-center">

                                <h4 class="counter-value display-1 banner-size" data-count="{{ \App\Models\Review::count() }}">{{ \App\Models\Review::count() }}</h4><span
                                    class="text-primary display-1 fw-lighter">+</span>

                            </div>

                            <p class="text-capitalize mb-0">Satisfied clients</p>

                        </div>

                        <div class="col-lg-3 col-6 text-center">

                            <div class="d-flex justify-content-center align-items-center">

                                <h4 class="counter-value display-1 banner-size" data-count="{{ \App\Models\Project::count() }}">{{ \App\Models\Project::count() }}</h4><span
                                    class="text-primary display-1 fw-lighter">+</span>

                            </div>

                            <p class="text-capitalize mb-0">Projects done</p>

                        </div>

                        <div class="col-lg-3 col-6 text-center">

                            <h4 class="counter-value display-1 banner-size" data-count="{{ \App\Models\Project::where('status', 'in progress')->count() }}">{{ \App\Models\Project::where('status', 'in progress')->count() }}</h4>

                            <p class="text-capitalize mb-0">Projects in progress</p>

                        </div>

                    </div>

                </div>

            </section>



            <section id="experiences" class="padding-medium">

                <div class="container">

                    <div class="row" data-aos="fade-up" data-aos-duration="1500">

                        <div class="col-lg-12">

                            <div class="text-center mb-5">

                                <h3 class="display-3 mb-3">Core Skills<span class="text-primary">.</span></h3>

                                <p class="text-white-50 lead">Master the art of creative design with expertise in
                                    visual storytelling and modern design principles</p>

                            </div>

                            <div class="row g-4">

                                @php
                                    $colorGradients = [
                                        ['bg' => 'rgba(168, 85, 247, 0.15)', 'border' => 'rgba(168, 85, 247, 0.3)', 'hover' => 'rgba(168, 85, 247, 0.25)', 'icon' => 'rgba(168, 85, 247, 0.2)', 'text' => 'text-primary'],
                                        ['bg' => 'rgba(59, 130, 246, 0.15)', 'border' => 'rgba(59, 130, 246, 0.3)', 'hover' => 'rgba(59, 130, 246, 0.25)', 'icon' => 'rgba(59, 130, 246, 0.2)', 'text' => 'text-info'],
                                        ['bg' => 'rgba(34, 197, 94, 0.15)', 'border' => 'rgba(34, 197, 94, 0.3)', 'hover' => 'rgba(34, 197, 94, 0.25)', 'icon' => 'rgba(34, 197, 94, 0.2)', 'text' => 'text-success'],
                                        ['bg' => 'rgba(236, 72, 153, 0.15)', 'border' => 'rgba(236, 72, 153, 0.3)', 'hover' => 'rgba(236, 72, 153, 0.25)', 'icon' => 'rgba(236, 72, 153, 0.2)', 'text' => 'text-danger'],
                                        ['bg' => 'rgba(244, 114, 182, 0.15)', 'border' => 'rgba(244, 114, 182, 0.3)', 'hover' => 'rgba(244, 114, 182, 0.25)', 'icon' => 'rgba(244, 114, 182, 0.2)', 'text' => 'text-warning'],
                                    ];
                                    $skills = \App\Models\Skill::all();
                                @endphp

                                @forelse ($skills as $skill)
                                    @php
                                        $colorIndex = $loop->index % count($colorGradients);
                                        $color = $colorGradients[$colorIndex];
                                        $hoverBg1 = str_replace('0.15', '0.25', $color['bg']);
                                        $hoverBg2 = str_replace('0.15', '0.1', $color['bg']);
                                    @endphp

                                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                                        <div class="skill-card rounded-4 p-4 h-100"
                                            style="background: linear-gradient(135deg, {{ $color['bg'] }} 0%, {{ str_replace('0.15', '0.05', $color['bg']) }} 100%); 
                                                border: 1px solid {{ $color['border'] }}; transition: all 0.3s ease; cursor: pointer;"
                                            onmouseover="this.style.background='linear-gradient(135deg, {{ $color['hover'] }} 0%, {{ str_replace('0.25', '0.1', $color['hover']) }} 100%)'; this.style.transform='translateY(-8px)';"
                                            onmouseout="this.style.background='linear-gradient(135deg, {{ $color['bg'] }} 0%, {{ str_replace('0.15', '0.05', $color['bg']) }} 100%)'; this.style.transform='translateY(0)';">

                                            <div class="d-flex align-items-center mb-3">

                                                <div class="skill-icon rounded-3 p-3"
                                                    style="background: linear-gradient(135deg, {{ $color['icon'] }} 0%, {{ str_replace('0.2', '0.1', $color['icon']) }} 100%);">

                                                    <i class="fas fa-{{ str_replace('fa-', '', $skill->icon) }}" style="font-size: 1.2rem; color: var(--orange);"></i>

                                                </div>

                                            </div>

                                            <h2 class="fw-bold mb-2">{{ $skill->name }}</h2>

                                            <p class="text-white-50 small">{{ $skill->description ?? 'Expertise in this skill' }}</p>

                                        </div>

                                    </div>

                                @empty

                                    <div class="col-12 text-center">

                                        <p class="text-white-50">No skills added yet</p>

                                    </div>

                                @endforelse

                            </div>

                        </div>

                    </div>

                </div>

            </section>



            <section id="portfolio" class="padding-medium container" data-aos="fade-up">

                <div class="row mb-5 justify-content-center">

                    <div class="col-lg-8 text-center">

                        <h2 class="display-5 fw-bold mb-3">Latest projects</h2>

                        <p class="text-white-50 lead">Explore my recent web design and development projects,
                            showcasing modern solutions and creative implementations.</p>

                    </div>

                </div>



                <!-- Category Tabs -->

                <div class="row mb-5 justify-content-center">

                    <div class="col-lg-8">

                        <div class="d-flex flex-wrap gap-2 justify-content-center" id="filter-buttons">

                            <button class="btn btn-sm px-4 active" onclick="updateActiveFilter(this)"
                                data-filter="*" style="background: none; border: none; text-decoration: underline; text-underline-offset: 5px; color: #b775ff;">All</button>

                            @php
                                $skills = \App\Models\Skill::all();
                            @endphp

                            @forelse ($skills as $skill)
                                <button class="btn btn-sm px-4" data-filter=".{{ strtolower(str_replace(' ', '-', $skill->name)) }}" onclick="updateActiveFilter(this)" style="background: none; border: none; color: #fff;">
                                    {{ $skill->name }}
                                </button>
                            @empty
                                <p class="text-white-50">No skills available</p>
                            @endforelse

                        </div>

                    </div>

                </div>

                <div class="row g-4" id="projects-grid">

                    @php
                        $projects = \App\Models\Project::all();
                    @endphp

                    @forelse ($projects as $project)
                        @php
                            // Get the skill name and convert it to filter class format
                            $filterClass = '';
                            if ($project->skills && $project->skills->count() > 0) {
                                $filterClass = strtolower(str_replace(' ', '-', $project->skills->first()->name));
                            }
                        @endphp

                        <div class="col-md-6 col-lg-4 {{ $filterClass }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                            <div class="project-card h-100 rounded-4 overflow-hidden"
                                style="background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.02) 100%); border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s ease;">

                                <div class="position-relative overflow-hidden" style="height: 250px;">

                                    @if ($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                            class="w-100 h-100" style="object-fit: cover; transition: transform 0.4s ease;">
                                    @else
                                        <img src="{{ asset('template/images/project-placeholder.jpg') }}" alt="Project"
                                            class="w-100 h-100" style="object-fit: cover; transition: transform 0.4s ease;">
                                    @endif

                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end p-4"
                                        style="background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 100%);">

                                        @if ($project->skills && $project->skills->count() > 0)
                                            <span class="badge bg-primary px-3 py-2">{{ $project->skills->first()->name }}</span>
                                        @endif

                                    </div>

                                </div>

                                <div class="p-4">

                                    <h2 class="fw-bold mb-2">

                                        <a href="{{ $project->url ? $project->url : ($project->pdf ? asset('storage/' . $project->pdf) : '#') }}" target="_blank" class="text-decoration-none text-white">{{ $project->title }}</a>

                                    </h2>

                                    <p class="text-white-50 mb-3" style="font-size: 0.9rem;">{{ $project->description ?? 'Project description' }}</p>

                                    <a href="{{ $project->url ? $project->url : ($project->pdf ? asset('storage/' . $project->pdf) : '#') }}" target="_blank" class="text-white text-decoration-none fw-semibold"
                                        style="font-size: 0.9rem;">View Project ?</a>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12 text-center">
                            <p class="text-white-50">No projects available yet</p>
                        </div>

                    @endforelse

                </div>



                

            </section>



            <section id="testimonial" class="padding-medium pt-0">

                <div class="container position-relative" data-aos="fade-up" data-aos-duration="1500">

                    <div class="text-center">

                        <h3 class="display-3">Read our clients reviews<span class="text-primary">.</span></h3>

                    </div>



                    <div class="row justify-content-center mt-4">

                        <div class="col-md-7">

                            <div class="swiper testimonial-swiper">

                                <div class="swiper-wrapper">

                                    @php
                                        $reviews = \App\Models\Review::all();
                                    @endphp

                                    @forelse ($reviews as $review)
                                        <div class="swiper-slide text-center">

                                            <div class="testimonial-details">

                                                <svg class="text-primary" width="80" height="80">

                                                    <use xlink:href="#quote-left"></use>

                                                </svg>

                                                <div style="margin-bottom: 1rem; color: #ff9800;">
                                                    @for ($i = 0; $i < $review->rating; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for ($i = $review->rating; $i < 5; $i++)
                                                        <i class="fas fa-star" style="color: #ddd;"></i>
                                                    @endfor
                                                </div>

                                                <p class="fs-2 lh-base fst-italic fw-light">

                                                    {{ $review->message }}

                                                </p>

                                                <div class="text-center mt-4">

                                                    @if ($review->client_image)
                                                        <img src="{{ asset('storage/' . $review->client_image) }}"
                                                            alt="{{ $review->client_name }}" class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('template/images/commentor1.jpg') }}"
                                                            alt="img" class="img-fluid rounded-circle">
                                                    @endif

                                                    <div class="mt-2">

                                                        <p class="m-0 fw-bold">{{ $review->client_name }}</p>

                                                        <p class="m-0 fw-light">
                                                            @if ($review->client_title)
                                                                {{ $review->client_title }}
                                                                @if ($review->client_company)
                                                                    at {{ $review->client_company }}
                                                                @endif
                                                            @elseif ($review->client_company)
                                                                {{ $review->client_company }}
                                                            @else
                                                                Client
                                                            @endif
                                                        </p>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    @empty
                                        <div class="swiper-slide text-center">

                                            <div class="testimonial-details">

                                                <p class="text-white-50">No reviews available yet</p>

                                            </div>

                                        </div>
                                    @endforelse

                                </div>

                                <div class="swiper-pagination position-static mt-4 d-lg-none d-block"></div>

                            </div>

                        </div>

                    </div>

                    <div
                        class="position-absolute top-50 end-0 translate-middle-y me-5 mt-5 pt-5 main-slider-button-next d-lg-block d-none">

                        <svg class="arrow border border-light border-opacity-25 rounded-circle p-3" width="80"
                            height="80">

                            <use xlink:href="#arrow-right"></use>

                        </svg>

                    </div>

                    <div
                        class="position-absolute top-50 start-0 translate-middle-y ms-5 mt-5 pt-5 main-slider-button-prev d-lg-block d-none">

                        <svg class="arrow border border-light border-opacity-25 rounded-circle p-3" width="80"
                            height="80">

                            <use xlink:href="#arrow-left"></use>

                        </svg>

                    </div>

            </section>

        </div>

    </div>



    <!-- Connect Section -->
    <section id="connect" class="padding-medium">

        <div class="container" data-aos="fade-up">

            <div class="row mb-5 justify-content-center">

                <div class="col-lg-8 text-center">

                    <h2 class="display-5 fw-bold mb-3">Connect With Me</h2>

                    <p class="text-white-50 lead">Get in touch through your preferred channel. I'm always happy to discuss new projects and opportunities.</p>

                </div>

            </div>

            @php
                $user = \App\Models\User::first();
            @endphp

            @if ($user)
                <div class="row g-4 justify-content-center">

                    <!-- Email -->
                    @if ($user->contact_email)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">

                            <a href="mailto:{{ $user->contact_email }}" class="text-decoration-none">

                                <div class="connect-card h-100" style="background: linear-gradient(135deg, rgba(183, 117, 255, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border: 1px solid rgba(183, 117, 255, 0.3); border-radius: 12px; padding: 2rem; text-align: center; transition: all 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(183, 117, 255, 0.3)'; this.style.background='linear-gradient(135deg, rgba(183, 117, 255, 0.25) 0%, rgba(59, 130, 246, 0.15) 100%)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.style.background='linear-gradient(135deg, rgba(183, 117, 255, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%)';">

                                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #b775ff, #3b82f6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">

                                        <i class="fas fa-envelope" style="color: white;"></i>

                                    </div>

                                    <h4 style="color: #fff; margin: 0 0 0.5rem 0; font-size: 1.2rem;">Email</h4>

                                    <p style="color: #b775ff; margin: 0; word-break: break-all;">{{ $user->contact_email }}</p>

                                </div>

                            </a>

                        </div>
                    @endif

                    <!-- Phone 1 -->
                    @if ($user->phone1)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">

                            <a href="tel:{{ $user->phone1 }}" class="text-decoration-none">

                                <div class="connect-card h-100" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border: 1px solid rgba(34, 197, 94, 0.3); border-radius: 12px; padding: 2rem; text-align: center; transition: all 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(34, 197, 94, 0.3)'; this.style.background='linear-gradient(135deg, rgba(34, 197, 94, 0.25) 0%, rgba(59, 130, 246, 0.15) 100%)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.style.background='linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%)';">

                                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #22c55e, #3b82f6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">

                                        <i class="fas fa-phone" style="color: white;"></i>

                                    </div>

                                    <h4 style="color: #fff; margin: 0 0 0.5rem 0; font-size: 1.2rem;">Phone</h4>

                                    <p style="color: #22c55e; margin: 0;">{{ $user->phone1 }}</p>

                                </div>

                            </a>

                        </div>
                    @endif

                    <!-- Phone 2 -->
                    @if ($user->phone2)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">

                            <a href="tel:{{ $user->phone2 }}" class="text-decoration-none">

                                <div class="connect-card h-100" style="background: linear-gradient(135deg, rgba(236, 72, 153, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border: 1px solid rgba(236, 72, 153, 0.3); border-radius: 12px; padding: 2rem; text-align: center; transition: all 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(236, 72, 153, 0.3)'; this.style.background='linear-gradient(135deg, rgba(236, 72, 153, 0.25) 0%, rgba(59, 130, 246, 0.15) 100%)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.style.background='linear-gradient(135deg, rgba(236, 72, 153, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%)';">

                                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ec4899, #3b82f6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">

                                        <i class="fas fa-phone" style="color: white;"></i>

                                    </div>

                                    <h4 style="color: #fff; margin: 0 0 0.5rem 0; font-size: 1.2rem;">Phone (Alternate)</h4>

                                    <p style="color: #ec4899; margin: 0;">{{ $user->phone2 }}</p>

                                </div>

                            </a>

                        </div>
                    @endif

                    <!-- WhatsApp -->
                    @if ($user->whatsapp)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">

                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $user->whatsapp) }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">

                                <div class="connect-card h-100" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border: 1px solid rgba(34, 197, 94, 0.3); border-radius: 12px; padding: 2rem; text-align: center; transition: all 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(34, 197, 94, 0.3)'; this.style.background='linear-gradient(135deg, rgba(34, 197, 94, 0.25) 0%, rgba(59, 130, 246, 0.15) 100%)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.style.background='linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%)';">

                                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #22c55e, #3b82f6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">

                                        <i class="fab fa-whatsapp" style="color: white;"></i>

                                    </div>

                                    <h4 style="color: #fff; margin: 0 0 0.5rem 0; font-size: 1.2rem;">WhatsApp</h4>

                                    <p style="color: #22c55e; margin: 0;">{{ $user->whatsapp }}</p>

                                </div>

                            </a>

                        </div>
                    @endif

                    <!-- Telegram -->
                    @if ($user->telegram)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">

                            <a href="https://t.me/{{ ltrim($user->telegram, '@') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">

                                <div class="connect-card h-100" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 12px; padding: 2rem; text-align: center; transition: all 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(59, 130, 246, 0.3)'; this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.25) 0%, rgba(59, 130, 246, 0.15) 100%)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%)';">

                                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #3b82f6, #3b82f6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">

                                        <i class="fab fa-telegram" style="color: white;"></i>

                                    </div>

                                    <h4 style="color: #fff; margin: 0 0 0.5rem 0; font-size: 1.2rem;">Telegram</h4>

                                    <p style="color: #3b82f6; margin: 0;">{{ $user->telegram }}</p>

                                </div>

                            </a>

                        </div>
                    @endif

                    <!-- Skype -->
                    @if ($user->skype)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">

                            <a href="skype:{{ $user->skype }}?call" class="text-decoration-none">

                                <div class="connect-card h-100" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 12px; padding: 2rem; text-align: center; transition: all 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(59, 130, 246, 0.3)'; this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.25) 0%, rgba(59, 130, 246, 0.15) 100%)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%)';">

                                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #3b82f6, #3b82f6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">

                                        <i class="fab fa-skype" style="color: white;"></i>

                                    </div>

                                    <h4 style="color: #fff; margin: 0 0 0.5rem 0; font-size: 1.2rem;">Skype</h4>

                                    <p style="color: #3b82f6; margin: 0;">{{ $user->skype }}</p>

                                </div>

                            </a>

                        </div>
                    @endif

                    <!-- Discord -->
                    @if ($user->discord)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">

                            <a href="https://discordapp.com/users/{{ $user->discord }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">

                                <div class="connect-card h-100" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border: 1px solid rgba(139, 92, 246, 0.3); border-radius: 12px; padding: 2rem; text-align: center; transition: all 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(139, 92, 246, 0.3)'; this.style.background='linear-gradient(135deg, rgba(139, 92, 246, 0.25) 0%, rgba(59, 130, 246, 0.15) 100%)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.style.background='linear-gradient(135deg, rgba(139, 92, 246, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%)';">

                                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #8b5cf6, #3b82f6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">

                                        <i class="fab fa-discord" style="color: white;"></i>

                                    </div>

                                    <h4 style="color: #fff; margin: 0 0 0.5rem 0; font-size: 1.2rem;">Discord</h4>

                                    <p style="color: #8b5cf6; margin: 0;">{{ $user->discord }}</p>

                                </div>

                            </a>

                        </div>
                    @endif

                    <!-- Viber -->
                    @if ($user->viber)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="700">

                            <a href="viber://chat?number={{ urlencode($user->viber) }}" class="text-decoration-none">

                                <div class="connect-card h-100" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%); border: 1px solid rgba(139, 92, 246, 0.3); border-radius: 12px; padding: 2rem; text-align: center; transition: all 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 40px rgba(139, 92, 246, 0.3)'; this.style.background='linear-gradient(135deg, rgba(139, 92, 246, 0.25) 0%, rgba(59, 130, 246, 0.15) 100%)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.style.background='linear-gradient(135deg, rgba(139, 92, 246, 0.15) 0%, rgba(59, 130, 246, 0.1) 100%)';">

                                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #8b5cf6, #3b82f6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">

                                        <i class="fab fa-viber" style="color: white;"></i>

                                    </div>

                                    <h4 style="color: #fff; margin: 0 0 0.5rem 0; font-size: 1.2rem;">Viber</h4>

                                    <p style="color: #8b5cf6; margin: 0;">{{ $user->viber }}</p>

                                </div>

                            </a>

                        </div>
                    @endif

                </div>
            @else
                <div class="text-center" style="color: #999;">
                    <p>No contact information available.</p>
                </div>
            @endif

        </div>

    </section>



    <section id="contact" class="padding-medium">

        <div class="container" data-aos="fade-up">

            <div class="text-center">

                <h3 class="display-3">Let?s collaborate & design<span class="text-primary">.</span></h3>

            </div>

            <form id="contactForm" class="form-group contact-form row mt-5">
                @csrf

                <div class="col-lg-6 mb-3">

                    <label for="name" class="form-label mb-2"
                        style="color: #fff; font-size: 0.95rem; font-weight: 500;">Full Name *</label>

                    <input type="text" id="name" name="name" placeholder="Enter your full name"
                        class="form-control shadow-none w-100 ps-3 py-3" required=""
                        style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); color: #fff; transition: all 0.3s ease;"
                        onmouseover="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(255, 255, 255, 0.25)';"
                        onmouseout="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)';"
                        onfocus="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(183, 117, 255, 0.5)'; this.style.boxShadow='0 0 15px rgba(183, 117, 255, 0.2)';"
                        onblur="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='none';">

                </div>

                <div class="col-lg-6 mb-3">

                    <label for="email" class="form-label mb-2"
                        style="color: #fff; font-size: 0.95rem; font-weight: 500;">Email *</label>

                    <input type="email" id="email" name="email" placeholder="Enter your email address"
                        class="form-control shadow-none w-100 ps-3 py-3" required=""
                        style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); color: #fff; transition: all 0.3s ease;"
                        onmouseover="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(255, 255, 255, 0.25)';"
                        onmouseout="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)';"
                        onfocus="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(183, 117, 255, 0.5)'; this.style.boxShadow='0 0 15px rgba(183, 117, 255, 0.2)';"
                        onblur="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='none';">

                </div>

                <div class="col-lg-6 mb-3">

                    <label for="phone" class="form-label mb-2"
                        style="color: #fff; font-size: 0.95rem; font-weight: 500;">Phone Number</label>

                    <input type="number" id="phone" name="phone" placeholder="Enter your phone number"
                        class="form-control shadow-none w-100 ps-3 py-3"
                        style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); color: #fff; transition: all 0.3s ease;"
                        onmouseover="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(255, 255, 255, 0.25)';"
                        onmouseout="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)';"
                        onfocus="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(183, 117, 255, 0.5)'; this.style.boxShadow='0 0 15px rgba(183, 117, 255, 0.2)';"
                        onblur="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='none';">

                </div>

                <div class="col-lg-6 mb-3">

                    <label for="subject" class="form-label mb-2"
                        style="color: #fff; font-size: 0.95rem; font-weight: 500;">Subject</label>

                    <input type="text" id="subject" name="subject" placeholder="What is this about?"
                        class="form-control shadow-none w-100 ps-3 py-3"
                        style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); color: #fff; transition: all 0.3s ease;"
                        onmouseover="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(255, 255, 255, 0.25)';"
                        onmouseout="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)';"
                        onfocus="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(183, 117, 255, 0.5)'; this.style.boxShadow='0 0 15px rgba(183, 117, 255, 0.2)';"
                        onblur="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='none';">

                </div>

                <div class="col-lg-12 mb-3">

                    <label for="message" class="form-label mb-2"
                        style="color: #fff; font-size: 0.95rem; font-weight: 500;">Message *</label>

                    <textarea id="message" name="message" placeholder="Tell me about your project or inquiry..."
                        class="form-control shadow-none w-100 ps-3 py-3"
                        style="height:150px; background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); color: #fff; transition: all 0.3s ease; resize: vertical;"
                        required=""
                        onmouseover="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(255, 255, 255, 0.25)';"
                        onmouseout="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)';"
                        onfocus="this.style.background='rgba(255, 255, 255, 0.12)'; this.style.borderColor='rgba(183, 117, 255, 0.5)'; this.style.boxShadow='0 0 15px rgba(183, 117, 255, 0.2)';"
                        onblur="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.borderColor='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='none';"></textarea>

                </div>

                <div class="text-center">

                    <button type="submit" id="submitBtn" name="submit"
                        class="btn button rounded-pill mt-4 position-relative pe-5">

                        <span id="submitText">Send Message</span>

                        <div class="position-absolute top-50 end-0 translate-middle-y me-2">

                            <svg class="arrow-right bg-white text-black rounded-circle p-2" width="35"
                                height="35">

                                <use xlink:href="#arrow-right"></use>

                            </svg>

                        </div>

                    </button>

                </div>

            </form>

            <!-- Success Modal -->
            <div id="successModal" style="
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                display: none;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                animation: fadeIn 0.3s ease;
            ">
                <div style="
                    background: white;
                    border-radius: 20px;
                    padding: 3rem 2rem;
                    max-width: 500px;
                    width: 90%;
                    text-align: center;
                    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                    animation: scaleUp 0.3s ease;
                ">
                    <!-- Success Icon -->
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: linear-gradient(135deg, #b775ff, #3b82f6);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 2rem;
                        animation: checkmark 0.6s ease 0.2s both;
                    ">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>

                    <!-- Title -->
                    <h2 style="
                        color: #1a1a1a;
                        margin: 0 0 1rem 0;
                        font-size: 1.8rem;
                        font-weight: bold;
                    ">Message Sent Successfully! ✨</h2>

                    <!-- Description -->
                    <p style="
                        color: #666;
                        margin: 0 0 2rem 0;
                        font-size: 1rem;
                        line-height: 1.6;
                    ">
                        Thank you for reaching out! I've received your message and will get back to you as soon as possible. Looking forward to collaborating with you!
                    </p>

                    <!-- Close Button -->
                    <button onclick="closeSuccessModal()" style="
                        background: linear-gradient(135deg, #b775ff, #3b82f6);
                        color: white;
                        padding: 0.75rem 2.5rem;
                        border: none;
                        border-radius: 30px;
                        font-size: 1rem;
                        font-weight: bold;
                        cursor: pointer;
                        transition: transform 0.3s ease;
                    " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        Close
                    </button>
                </div>
            </div>

            <style>
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                    }
                    to {
                        opacity: 1;
                    }
                }

                @keyframes scaleUp {
                    from {
                        transform: scale(0.8);
                        opacity: 0;
                    }
                    to {
                        transform: scale(1);
                        opacity: 1;
                    }
                }

                @keyframes checkmark {
                    from {
                        transform: scale(0);
                    }
                    to {
                        transform: scale(1);
                    }
                }
            </style>

            <script>
                document.getElementById('contactForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const form = this;
                    const submitBtn = document.getElementById('submitBtn');
                    const submitText = document.getElementById('submitText');
                    const originalText = submitText.textContent;
                    
                    // Disable button and show loading state
                    submitBtn.disabled = true;
                    submitText.textContent = 'Sending...';
                    
                    // Collect form data
                    const formData = new FormData(form);
                    
                    // Send AJAX request
                    fetch('{{ route("contact.store") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        submitBtn.disabled = false;
                        submitText.textContent = originalText;
                        
                        if (data.success) {
                            // Show success modal
                            showSuccessModal();
                            
                            // Reset form
                            form.reset();
                        } else {
                            alert('Error: ' + (data.message || 'Something went wrong'));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        submitBtn.disabled = false;
                        submitText.textContent = originalText;
                        alert('Error sending message. Please try again.');
                    });
                });
                
                function showSuccessModal() {
                    document.getElementById('successModal').style.display = 'flex';
                }
                
                function closeSuccessModal() {
                    document.getElementById('successModal').style.display = 'none';
                }
            </script>

        </div>

    </section>



    <section id="footer">

        <div class="container padding-medium pt-0" data-aos="fade-up">

            <ul class="d-flex gap-5 list-unstyled justify-content-center my-3 mb-5 flex-wrap">
                <li>
                    <a class="nav-link p-0 text-white text-decoration-none" href="#hero">Home</a>
                </li>
                <li>
                    <a class="nav-link p-0 text-white text-decoration-none" href="#achievements">Skills</a>
                </li>
                <li>
                    <a class="nav-link p-0 text-white text-decoration-none" href="#portfolio">Portfolio</a>
                </li>
                <li>
                    <a class="nav-link p-0 text-white text-decoration-none" href="#testimonial">Reviews</a>
                </li>
                <li>
                    <a class="nav-link p-0 text-white text-decoration-none" href="#contact">Contact</a>
                </li>
            </ul>

            <ul class="d-flex gap-5 list-unstyled justify-content-center my-3 mt-5">

                @php
                    $user = \App\Models\User::first();
                @endphp

                @if ($user && $user->facebook)
                    <li>
                        <a class="nav-link p-0" href="{{ $user->facebook }}" target="_blank" rel="noopener noreferrer">
                            <svg class="accent-color" width="24" height="24">
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </a>
                    </li>
                @endif

                @if ($user && $user->instagram)
                    <li>
                        <a class="nav-link p-0" href="{{ $user->instagram }}" target="_blank" rel="noopener noreferrer">
                            <svg class="accent-color" width="24" height="24">
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </a>
                    </li>
                @endif

                @if ($user && $user->twitter)
                    <li>
                        <a class="nav-link p-0" href="{{ $user->twitter }}" target="_blank" rel="noopener noreferrer">
                            <svg class="accent-color" width="24" height="24">
                                <use xlink:href="#twitter"></use>
                            </svg>
                        </a>
                    </li>
                @endif

                @if ($user && $user->dribbble)
                    <li>
                        <a class="nav-link p-0" href="{{ $user->dribbble }}" target="_blank" rel="noopener noreferrer">
                            <svg class="accent-color" width="24" height="24">
                                <use xlink:href="#pinterest"></use>
                            </svg>
                        </a>
                    </li>
                @endif

                @if ($user && $user->youtube)
                    <li>
                        <a class="nav-link p-0" href="{{ $user->youtube }}" target="_blank" rel="noopener noreferrer">
                            <svg class="accent-color" width="24" height="24">
                                <use xlink:href="#youtube"></use>
                            </svg>
                        </a>
                    </li>
                @endif

                @if ($user && $user->linkedin)
                    <li>
                        <a class="nav-link p-0" href="{{ $user->linkedin }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin" style="font-size: 24px; color: var(--orange);"></i>
                        </a>
                    </li>
                @endif

                @if ($user && $user->github)
                    <li>
                        <a class="nav-link p-0" href="{{ $user->github }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-github" style="font-size: 24px; color: var(--orange);"></i>
                        </a>
                    </li>
                @endif

                @if ($user && $user->behance)
                    <li>
                        <a class="nav-link p-0" href="{{ $user->behance }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-behance" style="font-size: 24px; color: var(--orange);"></i>
                        </a>
                    </li>
                @endif

            </ul>



            <div class="text-center mt-5">

                <p class="mb-0">© 2025. Designed with love by <a href="#"
                        class="fw-bold text-decoration-underline">Aymen Leknouche</a></p>

            </div>

        </div>

    </section>



    <!-- script ================================================== -->

    <script src="{{ asset('template/js/jquery-1.11.0.min.js') }}"></div>



    <!-- Bootstarp script ================================================== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>



    <!-- Swiper script ================================================== -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>



    <!--iconify script ================================================== -->

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>





    <script src="{{ asset('template/js/plugins.js') }}"></script>

    <script src="{{ asset('template/js/script.js') }}"></script>

    <!-- Isotope Script for Project Filtering -->
    <script src="https://isotope.metafizzy.co/isotope.pkgd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Isotope
            var iso = new Isotope('#projects-grid', {
                itemSelector: '.col-md-6',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: '.col-md-6'
                }
            });

            window.updateActiveFilter = function(button) {
                // Update button styles
                document.querySelectorAll('#filter-buttons .btn').forEach(btn => {
                    btn.style.textDecoration = 'none';
                    btn.style.color = '#fff';
                });
                button.style.textDecoration = 'underline';
                button.style.textUnderlineOffset = '5px';
                button.style.color = '#b775ff';

                // Filter projects with Isotope
                var filterValue = button.getAttribute('data-filter');
                iso.arrange({
                    filter: filterValue
                });
            };
        });
    </script>

</body>



</html>
