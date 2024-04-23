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
  
    <h1>edit profile</h1>


    <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
        @csrf

        @method('PATCH')


        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text"
             name="title" :value=" old('title') ?? $user->profilepage->title "  autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>



                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text"
                        name="description" :value="old('description')  ?? $user->profilepage->description "  
                         autofocus autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>


                    

                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="url" :value="__('Url')" />
                        <x-text-input id="url" class="block mt-1 w-full" type="text"
                        name="url" :value="old('url')  ?? $user->profilepage->url"  autofocus autocomplete="url" />
                        <x-input-error :messages="$errors->get('url')" class="mt-2" />
                    </div>


  
 <!-- Name -->
 <div class="mt-4">
    <x-input-label for="image" :value="__('Post Image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file"
     name="image" :value="old('image')"  autofocus autocomplete="image" />
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div><br><br>



<x-primary-button class="ms-4">
    {{ __('Save Profile') }}
</x-primary-button>

    </form>



<!-- close tag for container -->
</div>














</x-app-layout>
