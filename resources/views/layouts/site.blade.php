<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>

</head>

<body class="overflow-x-hidden">

    <div id="sb-loading-container" class="relative w-full h-screen">
        <div class="center-progress-container w-full h-screen flex flex-col justify-center items-center">
            <div id="center-progress-bar" class="w-4/5 md:w-1/2 p-1 mb-5 bg-gray-100">
                <div class="bar h-2 bg-red-400 rounded"></div>
            </div>
            <samp id="percentage" class="text-2xl">100%</samp>
        </div>
        <div class="after-content">
            <div id="top-progress-bar" class="absolute top-0 h-3 bg-red-400"></div>
            <div id="top-door" class="w-full bg-gray-200"></div>
            <div id="bottom-door" class="w-full bg-gray-200"></div>
        </div>
    </div>
    {{-- learg screen nav --}}
    <div id="section-container" class="absolute inset-0 overflow-hidden">
        <nav id="lg-nav"
            class="fixed top-0 w-full flex items-center justify-between flex-wrap text-white bg-gray-700 lg:bg-transparent px-8 lg:px-15 transition-all duration-150 ease-in z-40">
            <div class="block lg:hidden">
                <button id="menu-toggle" class="flex items-center px-3 py-2 border rounded focus:outline-none">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <a class="logo w-28 h-20 flex-1 lg:flex-none bg-center flex items-center flex-shrink-0 object-cover"
                style="background-repeat: no-repeat; background-image: url({{asset('storage/sab_logo.svg')}})" href="#hero">
            </a>
            <div id="collaps-menu"
                class="w-full hidden flex-grow mb-3 lg:mb-0 lg:flex-grow-0 lg:flex lg:justify-end lg:items-center lg:w-auto">
                <div class="section-ancor text-sm lg:flex-grow">
                    <a href="#hero" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                        Home
                    </a>
                    <a href="#service" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                        Service
                    </a>
                    <a href="#whatWeDo" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                        What we do
                    </a>
                    <a href="#about" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                        About Us
                    </a>
                    <a href="#contuct" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                        Contact
                    </a>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    {{-- Animation js --}}
    {{-- <script src="{{mix('js/waypoints.min.js')}}"></script> --}}
    <script src="{{mix('js/counter.js')}}"></script>
    <script src="{{asset('storage/qrcode.min.js')}}"></script>
    <script>
        // import 'jquery-smooth-scroll';
    $('.hero-image').css('background-image','url('+$('.hero-image').attr('data-img').split(',')[0]+')');
        $(document).ready(function(){   
            $('#menu-toggle').on('click',function(){
                $('#collaps-menu').toggleClass(['hidden','active']);
            })        
            $('#myRange').attr('max',$('.slider-item').length - 3)
            $('#myRange').on('input change', function(){
                // console.log($(this).val());
                let left = 0;
                if($(this).val() != 1){
                    left = -($(this).val() * 200);
                }else{
                    left = 0;
                }
                $('.scroll-content').css('margin-left', left)
            })
            
            $(window).on('scroll',function(){
                if($(window).scrollTop()){
                    $('#lg-nav').addClass(['lg:bg-gray-100','lg:text-black'])
                }else{
                    $('#lg-nav').removeClass(['lg:bg-gray-100','lg:text-black'])
                }
            })
            // $('.section-ancor a').smoothScroll()
            var hashTagActive = "";
            $(".section-ancor a").on("click touchstart" , function (event) {
                if(hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.
                event.preventDefault();
                //calculate destination place
                var dest = 0;
                if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
                    dest = $(document).height() - ($(window).height());
                    // console.log($(this.hash).offset().top);
                } else {
                    dest = $(this.hash).offset().top;
                }
                // console.log($(this.hash).offset().top);
                //go to destination
                $('html,body').animate({
                    scrollTop: dest
                    }, 2000, 'swing');
                    hashTagActive = this.hash;
                }
            });

            // $('.moveMessage').on('mousemove',function(e){
            //     let xAxis = (window.innerWidth / 2 - e.pageX) / 35;
            //     let yAxis = (window.innerHeight / 2 - e.pageY) / 35;
            //     $(this).css('transform',`rotateY(${xAxis}deg) rotateX(${yAxis}deg)`)
            // })
            // $('.moveMessage').on('mouseleave',function(e){
            //     $(this).css('transform',`rotateY(0deg) rotateX(0deg)`)
            // })
        })


        function heroSlide(count){
            // console.log(count);
            const imgset = $('.hero-image').attr('data-img').split(',')[count]
            $('.hero-image').css('background-image','url('+imgset+')');
        }
    </script>

    @stack('script')
</body>

</html>