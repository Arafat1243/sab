<div {{$attributes->merge(['class' => 'fixed inset-0 modal z-30 bg-gray-700 bg-opacity-75 transition-transform duration-300 ease-linear'])}}>
    <div class="modal-body left-0 lg:left-1/2 transform lg:-translate-x-1/2 -translate-y-1/2">
        <div class="h-auto w-full bg-white rounded text-gray-800 p-2 shadow">
            <div class="w-full service-header flex justify-between items-center">
                <div class="service-title text-2xl text-gray-700 font-bold">{{$service->title}}</div>
                <button onclick="closeModal()" class="bg-transparent text-gray-700 border-0 focus:outline-none">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
                <div class="w-full service-content overflow-y-auto">
                    <div class="object-cover bg-center bg-no-repeat w-full h-96 rounded"
                        style="background-image: url({{$service->image_url}})">
                    </div>
                    <div class="w-full mt-4">
                        {!! $service->discraption !!}
                    </div>
                </div>
        </div>
    </div>
</div>