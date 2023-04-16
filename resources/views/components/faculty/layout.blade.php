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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

</head>
<body>
     {{-- @if(auth()->user()->score->research < 7)
      <h3 class="font-bold text-3xl tracking-widest">Conclusion</h3>
      <h6 class="mt-5 text-2xl text-red-700 tracking-widest">
        After thorough consideration, it has been determined that the employee does not meet the qualifications and requirements for the promotion.
      </h6>
      @endif --}}
    @if(!auth()->user()->score->research == '' && auth()->user()->score->research < 7)
        <div class="hidden md:flex flex-col justify-center items-center">
            <img src="{{asset('images/hau-logo.png')}}" alt="" class="w-60 object-cover">
            <h1 class="font-bold text-4xl tracking-widest">Holy Angel University</h1>
            <h2 class="mt-2 font-bold text-lg tracking-widest">FACULTY PROMOTION AND RANKING PORTAL</h2>
        </div>
        <div class="flex flex-col justify-center items-center mx-24">
            <h4 class="mt-8 text-2xl tracking-widest self-start">Dear {{auth()->user()->first_name . ' ' . auth()->user()->last_name}}, </h4>
            <h5 class="indent-24 mt-5 text-2xl text-justify tracking-widest">
                I regret to inform you that after careful consideration, it has been determined that you do not meet the qualifications and requirements for the promotion at this time. I understand that this may be disappointing news, and I apologize for any inconvenience this may cause. Please know that we value your contributions and remain committed to supporting your career growth within the organization. If you have any questions or would like to discuss this further, please do not hesitate to reach out.
            </h5>
            <h6 class="mt-8 text-2xl tracking-widest self-start">Sincerely, Human Resources</h6>

        </div>
        <form method="POST" action="{{route('logout')}}" class="md:p-2 px-0 text-center">
            @csrf
                <button class="lowercase py-1 px-2 md:uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                    <i class="fa-solid fa-power-off mr-1"></i>
                    Logout
                </button>
        </form>
    @else
        @include('partials.faculty._phoneNav')
        {{$slot}}
    @endif
       

    {{-- Tailwind Elements JS --}}
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

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
                paddingBottom: 220,
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