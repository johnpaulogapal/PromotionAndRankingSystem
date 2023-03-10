<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- HAU LOGO --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/hau-logo.png')}}" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"/>
    
    {{-- Nunito Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Tailwind Elements --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

</head>
<body>
    
    {{$slot}}

    {{-- Tailwind Elements JS --}}
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

     {{-- Alphine Js --}}
     <script src="//unpkg.com/alpinejs"></script>

     {{-- Anime Js Cdn --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
        let edubgOpen = document.getElementById("edubgOpen");
        let edubgClose = document.getElementById("edubgClose");
        let edubgContent = document.getElementById("edubgContent");

        edubgOpen.onclick = function() {edubgDropDown()};
        edubgClose.onclick = function() {edubgDropUp()};

        function edubgDropDown() {
            anime({
                targets: '#edubg',
                paddingBottom: 200,
                duration: 1000
            });

            anime({
                targets: '#edubgContent',
                opacity: 1,
                easing: 'easeInOutExpo',
                delay: 300,
                duration: 1000
            });

            edubgOpen.classList.add('hidden');
            edubgClose.classList.remove('hidden');
        }

        function edubgDropUp() {
            anime({
                targets: '#edubg',
                paddingBottom: 0,
                duration: 1000,
                delay: 100
            });

            anime({
                targets: '#edubgContent',
                opacity: 0,
            });

            edubgOpen.classList.remove('hidden');
            edubgClose.classList.add('hidden');
        }  
    </script>

</body>
</html>