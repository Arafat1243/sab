<section {{$attributes->merge(['class' => 'service bg-white pt-20'])}}>
    <div class="flex flex-col justify-center items-center text-center">
        <h1 class="uppercase font-bold text-2xl text-gray-900">our service</h1>
        <h4 class="italic text-gray-500 text-xl">Lorem ipsum dolor sit amet consectetur.</h4>
        <div class="design-arrow"></div>
    </div>
    <div class="my-7 px-10 flex flex-wrap justify-between lg:justify-start items-center">
        @foreach ($services as $item)
        <div class="feature-item w-full md:w-2/5 lg:w-1/4 flex flex-col justify-center items-center">
            <div class="wrap-feature-icon">
                <div class="feature-icon">
                    <div class="w-full h-full object-cover bg-cover bg-center bg-no-repeat rounded-full" 
                    style="background-image: url({{$item->image_url}})"></div>
                </div>
            </div>
            <a href="#" class="font-bold feature-item-title text-center">{{substr($item->title,0,30)}}</a>
            <div class="text-gray-600 text-justify max-h-24 overflow-hidden">
                {{substr($item->discraption,0,100)}} ...
            </div>
        </div>
        <x-service-modal :service="$item"></x-service-modal>
        @endforeach
    </div>
</section>