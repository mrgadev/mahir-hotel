@extends('layouts.dahboard_layout')

@section('title', 'My Account')

@section('breadcrumbs')
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="">
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <div class="flex items-center mt-1">
                                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="photo profile" class="rounded-full w-16 h-16">

                                                <label for="choose" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 cursor-pointer">Choose File</label>

                                                <input type="file" accept="image/*" id="choose" name="photo" hidden>

                                                <a href="" type="button" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-red-700 bg-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" onclick="return confirm('are you sure?')">
                                                    Delete
                                                </a>
                                            </div>

                                            @if ($errors->has('photo'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('photo')}}</p>
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
                        <form action="" method="POST" enctype="multipart/form-data">
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
@endsection