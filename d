[1mdiff --git a/resources/views/layouts/app.blade.php b/resources/views/layouts/app.blade.php[m
[1mindex ddcef20..fec97d7 100644[m
[1m--- a/resources/views/layouts/app.blade.php[m
[1m+++ b/resources/views/layouts/app.blade.php[m
[36m@@ -5,7 +5,7 @@[m
   <meta charset="UTF-8" />[m
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />[m
   <meta name="csrf-token" content="{{ csrf_token() }}">[m
[31m-  <title>@yield('title', 'YT IG TT - Creator Discovery Platform')</title>[m
[32m+[m[32m  <title>@yield('title', 'YT IG TT - Creator Discovery Platform!')</title>[m
   <meta name="description" content="@yield('description', 'Explore featured creators, submit your content, and participate in the YT IG TT daily discovery experience for YouTube, Instagram, and TikTok creators worldwide.')">[m
 [m
   <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">[m
[1mdiff --git a/resources/views/pages/home.blade.php b/resources/views/pages/home.blade.php[m
[1mindex cecd20c..cdea046 100644[m
[1m--- a/resources/views/pages/home.blade.php[m
[1m+++ b/resources/views/pages/home.blade.php[m
[36m@@ -69,7 +69,11 @@[m [mclass="inline-block bg-gradient-to-br from-[#134e5e] to-[#71b280] text-white px-[m
 [m
       <div class="bg-white border border-red-500 rounded-2xl shadow-lg p-6 flex-1 max-w-sm mx-auto flex flex-col justify-between">[m
         <h4 class="text-center text-2xl font-semibold text-red-600 mb-3">YouTube - YT</h4>[m
[31m-[m
[32m+[m[41m        [m
[32m+[m[32m        <p class="text-center text-xs text-gray-600 mb-2">[m
[32m+[m[32m          YouTube Active Creators - <span class="font-semibold text-red-500">69M+</span>[m
[32m+[m[32m        </p>[m
[32m+[m[41m        [m
         <p class="text-center text-xs text-gray-600 mb-6">[m
           YouTube Monthly Active Users - <span class="font-semibold text-red-500">2.6B+</span>[m
         </p>[m
[36m@@ -100,10 +104,13 @@[m [mclass="w-full border border-gray-400 rounded-md p-2 mb-3[m
         <h4 class="text-center text-2xl font-semibold text-pink-600 mb-3">[m
           Instagram - IG[m
         </h4>[m
[32m+[m[41m        [m
[32m+[m[32m        <p class="text-center text-xs text-gray-600 mb-2">[m
[32m+[m[32m          Instagram Active Creators - <span class="font-semibold text-pink-500">5.8M+</span>[m
[32m+[m[32m        </p>[m
 [m
         <p class="text-center text-xs text-gray-600 mb-6">[m
[31m-          Instagram Monthly Active Users -[m
[31m-          <span class="font-semibold text-pink-500">2B+</span>[m
[32m+[m[32m          Instagram Monthly Active Users - <span class="font-semibold text-pink-500">2B+</span>[m
         </p>[m
 [m
         <div class="flex gap-3 mb-6">[m
[36m@@ -136,10 +143,13 @@[m [mclass="w-full bg-gradient-to-r from-pink-600 to-purple-600 text-white py-2 round[m
         <h4 class="text-center text-2xl font-semibold text-[#FE2C55] mb-3">[m
           TikTok - TT[m
         </h4>[m
[31m-[m
[32m+[m[41m        [m
[32m+[m[32m        <p class="text-center text-xs text-gray-600 mb-2">[m
[32m+[m[32m          TikTok Active Creators - <span class="font-semibold text-[#FE2C55]">15.8M+</span>[m
[32m+[m[32m        </p>[m
[32m+[m[41m        [m
         <p class="text-center text-xs text-gray-600 mb-6">[m
[31m-          TikTok Monthly Active Users -[m
[31m-          <span class="font-semibold text-[#FE2C55]">1.9B+</span>[m
[32m+[m[32m          TikTok Monthly Active Users - <span class="font-semibold text-[#FE2C55]">1.9B+</span>[m
         </p>[m
 [m
         <div class="flex gap-3 mb-6">[m
[36m@@ -427,7 +437,7 @@[m [mfunction checkReturnFromRedirect() {[m
         clearPlatformAccess(lastClicked);[m
         hideFields(lastClicked);[m
         localStorage.removeItem('lastClicked');[m
[31m-        showMessage('Unlock expired', 'This submit unlock expired. Click the featured creator again.', 'warning');[m
[32m+[m[32m        showMessage('Session expired', 'This submit unlock expired. Click the featured creator again.', 'warning');[m
         return;[m
       }[m
 [m
[36m@@ -461,7 +471,7 @@[m [mfunction checkReturnFromRedirect() {[m
       if (isExpired(access)) {[m
         clearPlatformAccess(p);[m
         hideFields(p);[m
[31m-        await showMessage('Unlock expired', 'This submit unlock expired. Click the featured creator again.', 'warning');[m
[32m+[m[32m        await showMessage('Session expired', 'This submit unlock expired. Click the featured creator again.', 'warning');[m
         return;[m
       }[m
 [m
[36m@@ -518,4 +528,4 @@[m [mfunction checkReturnFromRedirect() {[m
     });[m
   });[m
 </script>[m
[31m-@endpush[m
[32m+[m[32m@endpush[m
\ No newline at end of file[m
