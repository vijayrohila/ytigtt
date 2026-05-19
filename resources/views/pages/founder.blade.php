@extends('layouts.app')

@section('title', 'Founder - YT IG TT')

@section('content')
<main class="px-6 md:px-12 max-w-6xl mx-auto">
  <section>
    <h3 class="text-white font-semibold text-center mb-5 text-2xl">
      F<span style="background: linear-gradient(135deg, #134e5e, #71b280); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">o</span>UNDER
    </h3>
    <div class="flex flex-col items-center space-y-8">
      <img src="{{ asset('images/chaitanya.jpg') }}" alt="Founder Chaitanya" class="border-2 border-gray-300 shadow-md w-80 md:w-80 lg:w-96 max-w-full h-auto object-contain" loading="lazy" />
      <p class="text-white font-bold text-4xl tracking-widest founder-name">ChaiTanyA</p>

      <h4 class="text-white font-semibold underline-thin mt-3 mb-3">👇 Show Your 🫶 Love 🤗</h4>
      <div class="flex justify-center gap-4 sm:gap-5 md:gap-6 text-3xl">
        <a href="https://www.youtube.com/@fvrttrvlr" target="_blank" rel="noopener noreferrer" title="YouTube" class="hover:scale-125 transition-transform text-red-600">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://www.instagram.com/fvrttrvlr" target="_blank" rel="noopener noreferrer" title="Instagram" class="hover:scale-125 transition-transform text-pink-500">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://x.com/fvrttrvlr" target="_blank" rel="noopener noreferrer" title="X (Twitter)" class="hover:scale-125 transition-transform text-white">
          <i class="fab fa-x-twitter"></i>
        </a>
        <a href="https://www.whatsapp.com/channel/0029Vb6OC2RDeOMy90wCA31V" target="_blank" rel="noopener noreferrer" title="WhatsApp" class="hover:scale-125 transition-transform text-green-500">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.snapchat.com/@fvrttrvlr" target="_blank" rel="noopener noreferrer" title="Snapchat" class="hover:scale-125 transition-transform text-yellow-400">
          <i class="fab fa-snapchat-ghost"></i>
        </a>
        <a href="https://www.linkedin.com/in/fvrttrvlr" target="_blank" rel="noopener noreferrer" title="LinkedIn" class="hover:scale-125 transition-transform" style="color: #0A66C2;">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="https://www.t.me/fvrttrvlr" target="_blank" rel="noopener noreferrer" title="Telegram" class="hover:scale-125 transition-transform text-sky-500">
          <i class="fab fa-telegram"></i>
        </a>
      </div>
    </div>
  </section>
</main>
@endsection