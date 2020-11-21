<section {{$attributes->merge(['class' => 'hero relative'])}}>
    <div class="hero-image absolute inset-0" style="background-image: url({{count($hero) > 0 ? $hero[0] : asset('storage/other-image/hero-image-1.jpg')}})"
        data-img='{!! json_encode($hero) !!}'>
        <samp class="uppercase text-white mt-20 text-xl small-text">we are oscend</samp>
        <h1 class="uppercase font-bold text-white my-2 text-xl md:text-3xl middle-text">flexible & universal</h1>
        <h5 class="lowercase italic text-white bottom-text">for all your business needs</h5>
        <div class="btn-group flex w-2/3 flex-col md:flex-row justify-center items-center mt-20">
            <a href="#" class="uppercase font-bold text-xs py-4 px-6 h-12 text-center rounded text-white bg-orange-500">get
                started now</a>
            <a href="#"
                class="ml-0 mt-6 md:mt-0 md:ml-13 uppercase font-bold text-xs py-4 px-6 h-12 text-center rounded text-white bg-white border border-white bg-opacity-25">discover
                more</a>
        </div>
    </div>
</section>