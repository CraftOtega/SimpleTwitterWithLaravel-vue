<x-app-layout>
  

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
    <img src="{{ $user->profilepage->profiledefaultimage()}}" class="rounded-circle w-100" style="height:100px;width:150px;" alt="image" >

</div>  

{{-- Debugging --}}
{{-- dd($user, $user->profilepage, auth()->user()->can('update', $user->profilepage)) }}

{{-- Alternatively, log information --}}
{{-- Log::info('User:'.print_r($user,true)) --}}
{{-- Log::info('Profile: ' . print_r($user->profilepage, true)) }}
{{-- Log::info('CanUpdate:'.auth()->user()->can('update',$user->profilepage)) --}}

<div class="col-9 pt-5">

 <div class="d-flex justify-content-between align-items-baseline">


    <div class="d-flex align-items-center pb-3">


       
        <div class="h4">{{ $user->username  }}</div>
   
 

   <div id="app">
    <div id="followButton">
  <follow userid="{{ $user->id }}" follows="{{ $follows }}"> <follow/>
    </div>
    </div>

       

    </div>



    @can('update', $user->profilepage)  

    <a href="{{ url('/p/create') }}">Add a new post</a>

    @endcan



</div>


@can('update', $user->profilepage)

<a href="/profile/{{ $user->id }}/edit">EDit Profile</a>

    
@endcan
    <div class="d-flex">

        <div class="pr-4"><strong>{{ $postsCount }}</strong>posts</div>
        <div class="pr-4"><strong>{{$followersCount }}</strong>followers</div>
        <div class="pr-4"><strong>{{ $followingCount }}</strong>following</div>
    </div>

<div class="pt-4">{{ optional($user->profilepage)->title  }}</div>
<div> {{  optional($user->profilepage)->description  }}</div>
    <div><a href="#">{{  optional($user->profilepage)->url   }}</a></div>
</div>
</div>


<div class="row pt-5">

@foreach ($user->posts as  $post)
    


<div class="col-4 pb-4">
    <a href="/p/{{ $post->id }}">
        <img src=" /storage/{{ $post->image}}" alt="" class="w-100">


    </a>
</div>

@endforeach


<!-- close tag for container -->
</div>














</x-app-layout>
