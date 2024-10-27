<!DOCTYPE html>
<html lang="en">
  <head>
    @include('components.style')
    <title>Mahir Hotel | @yield('title')</title>
    @vite(['resources/css/app.css','resources/css/app.js'])
  </head>

  <body class="m-0 font-sora antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    @yield('main')    
  </body>
<!-- plugin for scrollbar  -->
<script src="assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</html>