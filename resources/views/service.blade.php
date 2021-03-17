<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAB PVT LTB</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="overflow-x-hidden" onload="ready()">
    <!-- navbar -->
    <x-top-bar></x-top-bar>
    <!-- end navbar -->
    <div id="section-container" class="absolute inset-0 overflow-hidden">
        <div class="container mx-auto">
            <!-- service section -->
            <x-service-section id="service" :home="false" class="section"></x-service-section>
            <!-- end service section -->
        </div>
        <!-- end contact section -->
        <!-- footer section -->
        <x-footer-section id="footer" class="section"></x-footer-section>
        <!-- end section -->
    </div>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer="false"></script>
    <script src="{{asset('storage/qrcode.min.js')}}"></script>
    <script>
        function ready (){
            // navbar toggle function
            $('#menu-toggle').on('click',function(){
                $('#collaps-menu').toggleClass(['hidden','active']);
            });
            $('.feature-item .feature-item-title').on('click',function(e){
                e.preventDefault();
                $(this).parent().next().addClass('active');
            });
        }

        function closeModal(){
            $('.modal').removeClass('active');
        }
    </script>
</body>

</html>