<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class profilesController extends Controller
{

    
public function index(User $user){



    $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;


$postsCount = Cache::remember(
    'count.posts.' . $user->id, now()->addSeconds(30),
     function () use ($user) {
    return   $user->posts->count();
  });



  $followersCount = Cache::remember(
    'count.followers.' . $user->id, now()->addSeconds(30),
     function () use ($user) {
    return    $user->profilepage->followers->count();
  });



  

  $followingCount  = Cache::remember(
    'count.following.' . $user->id, now()->addSeconds(30),
     function () use ($user) {
    return  $user->following->count();
  });

//  now()->addSeconds(30),
//  now()->addSeconds(30),
//  now()->addSeconds(30),

   // dd($follows);

//$user =User::findOrfail($user); 

//dd($user);

return view('profiles.index', [

    'user' => $user,
    'follows' => $follows,
    'postsCount' => $postsCount,
    'followersCount' => $followersCount,
    'followingCount' => $followingCount

]);


}






public function edit(User $user){

//you also pass this blade file using @can method
//update is method u define in profilepagepolicy
$this->authorize('update', $user->profilepage);

return view('profiles.edit', compact('user'));


}





public function update(User $user, Request $request){

    $this->authorize('update', $user->profilepage);

//dd(request()->description);

    $data = request()->validate([
        //  'another' => '',
          'title' => 'required',
          'description' => 'required',
          'url'=>'',
          'image'  =>'',
      ]);




      if(request('image')){


// create image manager with desired driver
$manager = new ImageManager(new Driver());

// Store the uploaded image in the 'profile' directory within the 'public' disk
$imagepath = request('image')->store('profile', 'public');


$image=$manager->read($request->file('image'));

// Read the stored image using the ImageManager
//$image = $ma(storage_path("app/public/{$imagepath}"));

// Resize the image to 1200x1200
$image= $image->cover(1000, 1000);


//$image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);

// Save the resized image back to the storage path
$image->save(public_path("storage/{$imagepath}"));


$imageArray =   ['image' => $imagepath];

      }




      //dd($data);

     // $user->profilepage->update($data);

     auth()->user()->profilepage->update(array_merge(

           $data,
          $imageArray ?? []

     ));

      return redirect("/profile/{$user->id}");


}




}
