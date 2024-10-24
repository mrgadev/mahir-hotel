@extends('layouts.dahboard_layout')

@section('title', 'Home')

@section('content')
    <div class="flex flex-col gap-5 w-full p-6">
        <div class="flex items-center gap-1 bg-primary-100 p-2 text-primary-700 rounded-lg w-fit text-sm">
            <a href="{{route('admin.dashboard')}}" class="flex items-center">
                <span class="material-symbols-rounded scale-75">home</span>
            </a>
            <span class="material-symbols-rounded">chevron_right</span>
            <p>My Profile</p>
        </div>

        <h1 class="text-white text-4xl font-medium">
            My Profile
        </h1>
    </div>
    <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <form class="w-full px-3 mb-6">
            div
            <div class="flex flex-col gap-2">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" >
            </div>
        </form>

        


    </div>
@endsection