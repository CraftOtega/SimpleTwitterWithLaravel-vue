<x-app-layout>
    

{{-- Debugging --}}
{{-- dd($user, $user->profilepage, auth()->user()->can('update', $user->profilepage)) }}

{{-- Alternatively, log information --}}
{{-- Log::info('User:'.print_r($user,true)) --}}
{{-- Log::info('Profile: ' . print_r($user->profilepage, true)) }}
{{-- Log::info('CanUpdate:'.auth()->user()->can('update',$user->profilepage)) --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>


<div class="container">
    <div class="row">

<div class="col-3  p-5">
    <img src="{{ asset('logo/logo-1.jpg') }}" class="rounded-circle" style="height:100px;width:150px;" alt="image" >

</div>


<div class="col-9 pt-5">

 <div><h1>{{ $user->username  }}</h1></div>

    <div class="d-flex">

        <div class="pr-4"><strong>153</strong>posts</div>
        <div class="pr-4"><strong>23K</strong>followers</div>
        <div class="pr-4"><strong>212</strong>following</div>
    </div>

<div class="pt-4">{{ optional($user->profilepage)->title  }}</div>
<div> {{  optional($user->profilepage)->description  }}</div>
    <div><a href="#">{{  optional($user->profilepage)->url   }}</a></div>
</div>
</div>


<div class="row pt-5">



<div class="col-4 ">
<img src="{{ asset('img/pexHOUSE.jpg') }}" alt="" class="w-100">
</div>



<div class="col-4">
<img src="{{ asset('img/pexHOUSE.jpg') }}" alt="" class="w-100">
</div>



<div class="col-4">
    <img src="{{ asset('img/mountain.jpg') }}" alt="" class="w-100">
    </div>

</div>


<!-- close tag for container -->
</div>





/*

// Intervention\Image\Image;
use Intervention\Image\facades\Image;
//use Intervention\Image\Image
//use Intervention\Image\ImageManager;

*/




</x-app-layout>
