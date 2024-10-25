@extends('layouts.dahboard_layout')

@section('title', 'My Account')

@section('breadcrumb')
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
            <a class="text-white opacity-90" href="javascript:;">Dashboard</a>
            </li>
            <li class="text-sm pl-2 text-white capitalize leading-normal  before:float-left before:pr-2 before: before:content-['/']" aria-current="page">Profile</li>
        </ol>
    <h6 class="mb-0 font-bold text-white capitalize">My Account</h6>
@endsection

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-white">
                        Edit My Profile
                    </h2>
                    <p class="text-sm text-white">
                        Enter your data Correctly & Properly
                    </p>
                </div>
            </div>
        </div>
        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">
                        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="">
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <div class="flex items-center mt-1">
                                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="photo profile" class="rounded-full w-16 h-16 object-cover object-center">

                                                <label for="choose" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 cursor-pointer">Choose File</label>

                                                <input type="file" id="choose" name="avatar" hidden>
                                            </div>

                                            @if ($errors->has('avatar'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('avatar')}}</p>
                                            @endif

                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Full Name</label>
                                            <input placeholder="Your Name" type="text" name="name" id="name" autocomplete="name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm" value="{{$user->name}}">

                                            @if ($errors->has('name'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('name')}}</p>
                                            @endif

                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="email" class="block mb-3 font-medium text-gray-700 text-md">Email Address</label>
                                            <input placeholder="Your Email" type="email" name="email" id="email" autocomplete="email" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm" value="{{$user->email}}">

                                            @if ($errors->has('email'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('email')}}</p>
                                            @endif

                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="phone" class="block mb-3 font-medium text-gray-700 text-md">Contact Number</label>
                                            <input placeholder="Your Number" type="number" name="phone" id="phone" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm" value="{{$user->phone}}">

                                            @if ($errors->has('phone'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('phone')}}</p>
                                            @endif
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="birth" class="block mb-3 font-medium text-gray-700 text-md">Birthday</label>
                                            <input placeholder="Your Number" type="date" name="birth" id="birth" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm" value="{{$user->birth}}">
                                            @if ($errors->has('birth'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('birth')}}</p>
                                            @endif
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Tempat Lahir</label>
                                            <select name="regency_id" id="regency_id" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                                @foreach ($regencies as $regency)
                                                    <option value="{{$regency->id}}">{{$regency->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="id_number" class="block mb-3 font-medium text-gray-700 text-md">Nomor Ktp</label>
                                            <input placeholder="Your Ktp Number" type="number" name="id_number" id="id_number" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm" value="{{$user->id_number}}">

                                            @if ($errors->has('id_number'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('id_number')}}</p>
                                            @endif
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <div class="relative flex h-52 w-auto cursor-pointer">
                                                <a href="#image-modal" class="block w-full">
                                                    <img
                                                    class="h-full w-full object-cover object-center rounded-xl"
                                                    src="{{asset($user->id_photo)}}"
                                                    />
                                                </a>
                                            </div>
                                            <label for="id_photo" class="mt-5 block mb-3 font-medium text-gray-700 text-md">Nomor Ktp</label>
                                            <input placeholder="Your Number" type="file" name="id_photo" id="" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm" value="{{$user->id_photo}}">

                                            @if ($errors->has('id_photo'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('id_photo')}}</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 text-right sm:px-6">
                                    <a href="" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('are you want to cancel?')">
                                        Cancel
                                    </a>
                                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-primary-500 border border-transparent rounded-lg shadow-sm hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" onclick="return confirm('are you want to submit this data?')">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="px-2 py-2 mt-10 bg-white rounded-xl">
                        <form action="{{route('profile.updatePassword')}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="">
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="col-span-12">
                                        <h2 class="mt-8 mb-1 text-2xl font-bold text-gray-700">
                                            Change Password
                                        </h2>
                                    </div>
                                    <div class="mt-10">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="md:col-span-6 lg:col-span-3">
                                                <label for="current_password" class="block mb-3 font-medium text-gray-700 text-md">Current Password</label>
                                                <input placeholder="Your Current Password" type="password" name="current_password" id="password" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                                @if ($errors->has('password'))
                                                    <p class="text-red-500 mb-3 text-sm">{{$errors->first('current_password')}}</p>
                                                @endif
                                            </div>
                                            <div class="md:col-span-6 lg:col-span-3">
                                                <label for="new_password" class="block mb-3 font-medium text-gray-700 text-md">New Password</label>
                                                <input placeholder="Your New Password" type="password" name="new_password" id="password" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                                @if ($errors->has('new_password'))
                                                    <p class="text-red-500 mb-3 text-sm">{{$errors->first('password')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 text-right sm:px-6">
                                    <a href="" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('are you want to cancel?')">
                                        Cancel
                                    </a>
                                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-primary-500 border border-transparent rounded-lg shadow-sm hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" onclick="return confirm('are you want to submit this data?')">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </section>
    </main>

<div id="image-modal" class="fixed inset-0 z-100 bg-black bg-opacity-60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 target:opacity-100 target:pointer-events-auto">
    <!-- Link pembungkus untuk close saat klik anywhere -->
    <a href="#" class="fixed inset-0 flex items-center justify-center p-4">
        <div class="relative max-w-3xl mx-auto" onclick="event.stopPropagation()">
            <div>
                <img
                    class="w-full max-h-[80vh] object-contain"
                    src="{{asset($user->id_photo)}}"
                />
            </div>
        </div>
    </a>
</div>
@endsection