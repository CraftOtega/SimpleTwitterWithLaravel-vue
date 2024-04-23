<x-app-layout>
   

<div class="container">
<div class="row">

     <!-- Authentication -->
     <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a  href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
     </a>
    </form>


 

    <div class="col-8 ">
<img src="/storage/{{ $post->image }}" alt="" class="w-100">
</div>


<div class="col-4">
    <div>

<div class="d-flex align-items-center">


    
     <div class="pr-3">
        <img src="{{ $post->user->profilepage->profiledefaultimage() }}" alt="" 
        class="rounded-circle w-100" style="max-width: 40px;">
    </div>
  

    <div>
           <div class="font-weight-bold">
            <a href="/profile/{{ $post->user->id }}">
                {{ $post->user->username }}</a>
                <a href="#" class="pl-3">follow</a>
            </div>
    </div> 
</div>
<br>
<hr>
<br>
<br>

    <p><span class="font-weight-bold">
        <a href="/profile/{{ $post->user->id }}">
            {{ $post->user->username }}</a></span>
            {{ $post->caption }}</p>

 <!-- close of div -->
</div>
  <!-- close of col-4 -->
</div>



</div>
</div>

</x-app-layout>

