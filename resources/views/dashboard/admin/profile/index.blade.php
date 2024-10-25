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
    <div class="w-full px-6 py-6 mx-auto shadow-xl rounded-xl mt-5">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <form class="w-full px-3 mb-6">
            <h2 class="col-span-2 mt-5 font-medium text-gray-700 text-lg">
                Informasi Pribadi
            </h2>

            <div class="grid lg:grid-cols-2 gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="name">Foto Profil</label>
                    <input type="file" name="name" >
                </div>
                <div class="flex flex-col gap-2">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}" class="rounded-lg">
                </div>
            </div>

            <div class="grid lg:grid-cols-2 my-5 gap-5">
                <div class="flex flex-col gap-2">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="rounded-lg">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="phone">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}" class="rounded-lg">
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="birth">Tanggal Lahir</label>
                    <input type="date" name="birth" class="rounded-lg">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="name">Tempat Lahir</label>
                    <select name="regency_id" id="regency_id">
                        @foreach ($regencies as $regency)
                            <option value="{{$regency->id}}">{{$regency->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <h2 class="col-span-2 mt-5 font-medium text-gray-700 text-lg">
                Ubah Password
            </h2>
            
            <div class="grid lg:grid-cols-2 gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="rounded-lg">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="password">Ulangi Password</label>
                    <input type="password" name="password_confirmation" class="rounded-lg">
                </div>
            </div>
        </form>

        


    </div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#regency_id').select2();
    })
</script>
@endpush