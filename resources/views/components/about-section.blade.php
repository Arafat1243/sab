<section {{$attributes->merge(['class' => 'about bg-white pt-20'])}}>
    <div class="flex flex-col justify-center items-center text-center">
        <h1 class="uppercase font-bold text-2xl text-gray-900">About US</h1>
        <h4 class="italic text-gray-500 text-xl">Lorem ipsum dolor sit amet consectetur.</h4>
        <div class="design-arrow"></div>
    </div>
    <div class="my-7 px-10 flex flex-wrap justify-around items-center">
        <img class="min-h-80 w-full lg:w-2/5 rounded shadow-xl object-cover" src="{{asset($about->image_url)}}" alt="{{$about->image}}"
            srcset="">
        <div class="w-full lg:w-2/5 mt-7 lg:mt-0 text-justify">
            {!! $about->about !!}
        </div>
    </div>
</section>