<x-app-layout>
   

<div class="container">

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
 
        <a  href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
     </a>
    </form>

@foreach ($posts as $post )


<div class="row">





   <div class="col-6 offset-3">
<a href="/profile/{{ $post->user->id }}">
    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
</a>
</div>
</div>



<div class="row pt-2 pb-4">
<div class="col-6 offset-3">
   <div>

<div class="d-flex align-items-center">







    <!--<div class="pr-3">
        <img src="{{-- $post->user->profilepage->profiledefaultimage() --}}" alt="" 
        class="rounded-circle w-100" style="max-width: 40px;">
    </div>
  
 
    <div>
           <div class="font-weight-bold">
            <a href="/profile/{{-- $post->user->id --}}">
                {{-- $post->user->username --}}</a>
                <a href="#" class="pl-3">follow</a>
            </div>
    </div> 
 </div>
 <br>
 <hr>-->













   <p><span class="font-weight-bold">
       <a href="/profile/{{ $post->user->id }}">
           {{ $post->user->username }}</a></span>
           {{ $post->caption }}</p>

<!-- close of div -->
</div>
 <!-- close of col-8 -->
</div>
</div>



</div>
    
@endforeach

<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>

</div>

</x-app-layout>

