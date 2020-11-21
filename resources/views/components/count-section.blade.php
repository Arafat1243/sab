<section {{$attributes->merge(['class' => 'project-count object-cover relative'])}}
    style="background-image: url({{asset('storage/other-image/hero-image-3.jpg')}})">
    <div class="w-full text-white text-4xl flex flex-wrap justify-between items-center py-10 lg:py-20 z-40">
        <div
            class="count-content my-4 lg:my-0 flex flex-col justify-center items-center text-center w-full md:w-1/2 lg:w-1/4">
            <i class="lni lni-checkbox"></i>
            <samp class="counter">{{$count['complete']}}</samp>
            <samp class="text-lg">Project Done</samp>
        </div>
        <div
            class="count-content my-4 lg:my-0 flex flex-col justify-center items-center text-center w-full md:w-1/2 lg:w-1/4">
            <i class="lni lni-wallet"></i>
            <samp class="counter">{{$count['running']}}</samp>
            <samp class="text-lg">Running Project</samp>
        </div>
        <div
            class="count-content my-4 lg:my-0 flex flex-col justify-center items-center text-center w-full md:w-1/2 lg:w-1/4">
            <i class="lni lni-thumbs-up"></i>
            <samp class="counter">{{$count['client']}}</samp>
            <samp class="text-lg">Heppy Client</samp>
        </div>
        <div
            class="count-content my-4 lg:my-0 flex flex-col justify-center items-center text-center w-full md:w-1/2 lg:w-1/4">
            <i class="lni lni-users"></i>
            <samp class="counter">{{$count['employee']}}</samp>
            <samp class="text-lg">EMPLOYEES WORKING</samp>
        </div>
    </div>
</section>