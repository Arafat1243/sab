<section {{$attributes->merge(['class' => 'bg-white pt-20'])}}>
    <div class="flex flex-col justify-center items-center text-center">
        <h1 class="uppercase font-bold text-2xl text-gray-900">LATEST WORKS</h1>
        <h4 class="italic text-gray-500 text-xl">Lorem ipsum dolor sit amet consectetur.</h4>
        <div class="design-arrow"></div>
    </div>
    <div class="my-7 w-full flex flex-col justify-center items-center overflow-hidden">
        <div class="scroll-content inline-flex mb-5">
            <img src="{{asset('storage/hero-image-1.jpg')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-2.png')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-3.jpg')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-1.jpg')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-2.png')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-3.jpg')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-1.jpg')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-1.jpg')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-1.jpg')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-1.jpg')}}" alt="" class="slider-item object-cover">
            <img src="{{asset('storage/hero-image-1.jpg')}}" alt="" class="slider-item object-cover">
        </div>
        <input type="range" min="1" max="100" value="0" class="slider w-10/12 lg:w-2/5" id="myRange">
    </div>
</section>