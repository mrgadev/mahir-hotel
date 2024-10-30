@extends('layouts.auth')
@section('title', 'Login')
@section('main')
<div class="container sticky top-0 z-sticky">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 flex-0">
    </div>
  </div>
</div>
<main class="mt-0 transition-all duration-200 ease-in-out">
  <section>
    <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
      <div class="container z-1">
        <div class="flex flex-wrap -mx-3">
          <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0">
                <h4 class="font-medium text-3xl mb-5x text-primary-700">Daftar Akun</h4>
                {{-- <p class="mb-0 text-[#976033]">Masuk ke Mahir Hotel untuk melakukan reservasi kamar</p> --}}
              </div>
              <div class="flex-auto p-6">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="mb-4">
                      <input type="text" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Nama Lengkap" aria-label="Name" aria-describedby="email-addon" name="name" required autocomplete="off" />
                      @error('name')
                          <span class="text-red-500 text-sm">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <input type="email" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" required autocomplete="off" />
                      @error('email')
                          <span class="text-red-500 text-sm">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <input type="number" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Nomor Telepon" aria-label="Name" aria-describedby="email-addon" name="phone" required autocomplete="off" />
                      @error('phone')
                          <span class="text-red-500 text-sm">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <input type="password" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" required />
                      @error('password')
                          <span class="text-red-500 text-sm">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="mb-4">
                      <input type="password" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Konfirmasi Password" aria-label="Password" aria-describedby="password-addon" name="password_confirmation" required />
                      @error('password_confirmation')
                          <span class="text-red-500 text-sm">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="text-center">
                      <button type="submit" class="inline-block w-full px-5 py-2.5 mt-6 mb-2 font-medium text-center text-white align-middle transition-all rounded-lg cursor-pointer hover:shadow-xs leading-normal text-sm bg-[#976033] from-zinc-800 to-zinc-700 hover:bg-primary-700">Daftar</button>
                  </div>
              </form>
              </div>
              <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 pt-0 px-1 sm:px-6">
                <p class="mx-auto mb-6 leading-normal text-sm">Sudah punya akun? <a href="{{route('login')}}" class="text-[#976033] font-medium underline bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500]">Masuk</a></p>
              </div>
            </div>
          </div>
          <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
            <div class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('https://images.unsplash.com/photo-1549294413-26f195200c16?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] rounded-xl">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection