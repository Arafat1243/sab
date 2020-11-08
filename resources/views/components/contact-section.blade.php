<section {{$attributes->merge(['class' => 'contact bg-white pt-20'])}}>
    <div class="flex flex-col justify-center items-center text-center">
        <h1 class="uppercase font-bold text-2xl text-gray-900">contact</h1>
        <h4 class="italic text-gray-500 text-xl">Lorem ipsum dolor sit amet consectetur.</h4>
        <div class="design-arrow"></div>
    </div>
    <div class="mt-7 flex flex-col justify-center items-center">
        <div class="w-full px-10 flex flex-wrap justify-around items-center">
            <div class="moveMessage hidden lg:inline lg:w-1/4 transition-all duration-150 ease-in-out">
                <svg class="w-64 h-64 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
            </div>
            <form class="w-full lg:w-1/2" action="#" method="post">
                <div class="w-full px-3">
                    <input
                        class="input-field appearance-none block w-full bg-gray-100 text-gray-700 border rounded-3xl py-3 px-4 mb-3 leading-tight focus:outline-none"
                        id="grid-first-name" type="text" placeholder="Jane">
                </div>
                <div class="w-full px-3 mt-6">
                    <input
                        class="input-field appearance-none block w-full bg-gray-100 text-gray-700 border rounded-3xl py-3 px-4 mb-3 leading-tight focus:outline-none"
                        id="grid-first-name" type="email" placeholder="example@gmail.com">
                </div>
                <div class="w-full px-3 mt-6">
                    <input
                        class="input-field appearance-none block w-full bg-gray-100 text-gray-700 border rounded-3xl py-3 px-4 mb-3 leading-tight focus:outline-none"
                        id="grid-first-name" type="text" placeholder="+880 1700-00000">
                </div>
                <div class="w-full px-3 mt-6">
                    <textarea rows="5"
                        class="input-field appearance-none block w-full bg-gray-100 text-gray-700 border rounded-3xl py-3 px-4 mb-3 leading-tight focus:outline-none"
                        id="grid-first-name" type="text" placeholder="Hey, example message"></textarea>
                </div>
                <div class="w-full flex justify-end items-center pr-5 mt-6">
                    <button type="button" class="py-2 px-4 bg-red-500 text-white rounded-3xl focus:outline-none">Send
                        Mail</button>
                </div>
            </form>
        </div>
        <div class="w-44 h-44 flex justify-center items-center my-5">
            <div id="qrcode"></div>
        </div>
        <div class="w-full mt-2">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.381221356331!2d91.39452861431411!3d23.009770884959583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37536830f4bcf3f3%3A0x151efc17e414077b!2sUTC!5e0!3m2!1sen!2sbd!4v1604559799212!5m2!1sen!2sbd"
                class="w-full" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
        <div class="mt-3 social-info w-full flex flex-col justify-center items-center h-56"
            style="background-image: url({{asset('storage/hero-image-1.jpg')}})">
            <h4 class="text-xl text-gray-400 capitalize">Find us on</h4>
            <div class="mt-3 flex justify-center items-center">
                <a href="#" class="social-btn">
                    <i class="lni lni-facebook-filled"></i>
                </a>
                <a href="#" class="social-btn">
                    <i class="lni lni-linkedin-original"></i>
                </a>
                <a href="#" class="social-btn">
                    <i class="lni lni-twitter-original"></i>
                </a>
            </div>
        </div>
    </div>
</section>