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
    <div class="col-8 offset-2">



    






    <form method="POST" action="/p" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="caption" :value="__('Post Caption')" />
            <x-text-input id="caption" class="block mt-1 w-full" type="text"
             name="caption" :value="old('caption')"  autofocus autocomplete="caption" />
            <x-input-error :messages="$errors->get('caption')" class="mt-2" />
        </div>

 <!-- Name -->
 <div class="mt-4">
    <x-input-label for="image" :value="__('Post Image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file"
     name="image" :value="old('image')"  autofocus autocomplete="image" />
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div><br><br>





<x-primary-button class="ms-4">
    {{ __('Add New Post') }}
</x-primary-button>

    </form>



</div>
</div>
</div>

</x-app-layout>

