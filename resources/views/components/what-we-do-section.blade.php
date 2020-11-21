<section {{$attributes->merge(['class' => 'service bg-white pt-20'])}}>
    <div class="flex flex-col justify-center items-center text-center">
        <h1 class="uppercase font-bold text-2xl text-gray-900">what we do</h1>
        <h4 class="italic text-gray-500 text-xl">Lorem ipsum dolor sit amet consectetur.</h4>
        <div class="design-arrow"></div>
    </div>
    <div class="my-7 px-10 flex flex-wrap justify-around items-center">
        <img class="w-full lg:w-2/5 object-cover" src="{{asset('storage/sab_logo.png')}}" alt="" srcset="">
        <div class="w-full lg:w-2/5 mt-7 lg:mt-0 text-justify">
            {!! $whatweare!!}
        </div>
    </div>
</section>