<!DOCTYPE html>
<html lang="en">
  <head>
    @include('components.style')
    <title>Mahir Hotel | @yield('title')</title>
  </head>

  <body class="m-0 font-sora antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    @yield('main')    
  </body>
<!-- plugin for scrollbar  -->
<script src="assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
@if (session('success'))
  <script>
      const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
      }
      });
      Toast.fire({
      icon: "success",
      title: "{{session('success')}}",
      });
  </script>
@elseif (session('error'))
  <script>
    const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: "error",
    title: "{{session('error')}}",
    });
  </script>
@endif
</html>