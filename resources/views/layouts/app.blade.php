<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'YT IG TT - Creator Discovery Platform!')</title>
  <meta name="description" content="@yield('description', 'Explore featured creators, submit your content, and participate in the YT IG TT daily discovery experience for YouTube, Instagram, and TikTok creators worldwide.')">

  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
      font-family: 'Poppins', sans-serif;
      line-height: 1.75;
    }

    header,
    footer {
      background: linear-gradient(135deg, #134e5e, #71b280);
    }

    section {
      margin: 3rem 0;
    }

    .hidden-fields {
      opacity: 0.2;
      pointer-events: none;
      transition: opacity 0.6s ease;
    }

    .visible-fields {
      opacity: 1;
      pointer-events: all;
      transition: opacity 0.6s ease;
    }

    #stars {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 0;
      overflow: hidden;
    }

    .star {
      position: absolute;
      width: 2px;
      height: 2px;
      background: white;
      border-radius: 50%;
      opacity: 0.8;
      animation: moveUp linear infinite, twinkle 2s ease-in-out infinite;
    }

    @keyframes moveUp {
      from {
        transform: translateY(100vh);
      }

      to {
        transform: translateY(-10vh);
      }
    }

    @keyframes twinkle {

      0%,
      100% {
        opacity: 0.2;
      }

      50% {
        opacity: 1;
      }
    }

    header,
    nav,
    main,
    footer {
      position: relative;
      z-index: 2;
    }
  </style>
</head>

<body class="text-gray-900">

  <div id="stars"></div>

  <header class="text-white px-6 py-4 flex justify-between items-center">
    <h1 class="text-3xl font-bold" style="font-family: 'Libre Baskerville', serif;">
      <a href="{{ route('home') }}" class="hover:text-green-300 transition">YT IG TT</a>
    </h1>
    <button id="menuBtn" class="text-3xl" aria-expanded="false">&#9776;</button>
  </header>

  <nav id="menu" class="hidden bg-gradient-to-br from-[#71b280] to-[#134e5e] text-white flex flex-col items-center gap-4 py-6">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About Us</a>
    <a href="{{ route('service') }}">Our Service</a>
    <a href="{{ route('terms') }}">Terms and Conditions</a>
    <a href="{{ route('privacy') }}">Privacy Policy</a>
    <a href="{{ route('advertising-policy') }}">Advertising Policy</a>
    <a href="{{ route('acceptable-use-policy') }}">Acceptable Use Policy</a>
    <a href="{{ route('community-guidelines') }}">Community Guidelines</a>
    <a href="{{ route('founder') }}">FoUNDER</a>
  </nav> 

  @yield('content')

  <footer class="text-white py-4 text-sm text-center">
    &copy; - <a href="https://www.ytigtt.com">YT IG TT</a>
  </footer>

  <script>
    const menuBtn = document.getElementById("menuBtn");
    const menu = document.getElementById("menu");

    menuBtn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
      const expanded = menuBtn.getAttribute('aria-expanded') === 'true';
      menuBtn.setAttribute('aria-expanded', !expanded);
    });

    const starsContainer = document.getElementById("stars");

    function createStar() {
      const star = document.createElement("div");
      star.classList.add("star");

      star.style.left = Math.random() * 100 + "vw";

      const size = Math.random() * 3;
      star.style.width = size + "px";
      star.style.height = size + "px";

      const duration = 5 + Math.random() * 5;
      star.style.animationDuration = duration + "s";

      starsContainer.appendChild(star);

      setTimeout(() => {
        star.remove();
      }, duration * 1000);
    }

    setInterval(createStar, 200);
  </script>

  @stack('scripts')
</body>

</html>
