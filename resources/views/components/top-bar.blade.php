
<nav id="lg-nav"
    class="fixed top-0 w-full flex items-center justify-between flex-wrap text-gray-800 bg-white px-8 lg:px-15 transition-all duration-150 ease-in z-40">
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
            <a href="{{route('home')}}#hero" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                Home
            </a>
            <a href="{{route('home')}}#service" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                Service
            </a>
            <a href="{{route('home')}}#what-we-do" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                What we do
            </a>
            <a href="{{route('home')}}#about" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                About Us
            </a>
            <a href="{{route('home')}}#contact" class="nav-link block mt-4 lg:inline-block lg:mt-0 lg:mx-5">
                Contact
            </a>
            <a href="{{route('dashboard')}}" class="rounded text-white bg-orange-500 block mt-4 px-2 py-1 lg:inline-block lg:mt-0 lg:mx-5">
                Admin
            </a>
        </div>
    </div>
</nav>