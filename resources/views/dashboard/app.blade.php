<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('public/css/multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-select.css') }}">
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="{{ asset('public/js/app.js') }}"></script>
  
    @stack('css')

    <style>
       .user-popup{
           position: absolute !important;
           border-radius: 0px !important;
           z-index: 9999;
       }
       .card{
          
          border-radius: 0px !important;
       }
       .card-header{
           border-bottom: 0px;
       }
       .readonly{
           background: #EFEFEF;
           border: 0px;
       }

    </style>

</head>
<body>
    <div id="app">
       

        @include('dashboard/inc/menu')

        <main class="py-4">
            @yield('content')
        </main>
    </div>


<script src="{{ asset('public/js/tinymce/tinymce.js') }}"></script>
<script>
    $(function () {
        //TinyMCE
        tinymce.init({
            selector: "#editor",
            theme: "modern",
            height: 300,

            plugins: [
            'autolink lists link charmap preview hr anchor pagebreak',
            'searchreplace visualblocks visualchars code',
            'insertdatetime media table contextmenu',
            'emoticons template paste textcolor colorpicker textpattern codesample'
            ],
            toolbar: 'undo redo | sizeselect fontselect fontsizeselect | bold italic  | hr alignleft aligncenter alignright alignjustify | bullist numlist link | forecolor backcolor emoticons | codesample | blockquote code ',
            max_width: 100, 
            height:300,
            menubar: false,
            resize: true,
            statusbar: true,
            body_class: 'my_tinny_mce',

            nowrap : false,   
            // element_format : 'html',
            relative_urls: false, //Most Important
            remove_script_host: false,
            theme: 'modern',
            mobile: { theme: 'mobile' },
            image_advtab: true
            
        });

        tinymce.suffix = ".min";
        tinyMCE.baseURL = '{{ asset("public/js/tinymce") }}';
    });
</script> 

<script src="{{ asset('public/js/bootstrap-multiselect.js') }}"></script>

<script src="{{ asset('public/js/multiselect.js') }}"></script>

@stack('scripts')

</body>
</html>
