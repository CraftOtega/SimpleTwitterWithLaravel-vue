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
    'count.posts.' . $user->id, now()->addSeconds(30),
     function () use ($user) {
    return    $user->profilepage->followers->count();
  });



  

  $followingCount  = Cache::remember(
    'count.posts.' . $user->id, now()->addSeconds(30),
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



if (request()->hasFile('image')) {
    try {
        

// create image manager with desired driver
$manager = new ImageManager(new Driver());

        $image = $manager->read(request()->file('image'));

        // Resize the image to 1000x1000 with aspect ratio maintained
        $image->cover(1000, 1000);

        // Generate a unique filename
        $filename = uniqid() . '.' . request()->file('image')->getClientOriginalExtension();

        // Store the image in the 'profile' directory within the 'public' disk
        $image->save(public_path('profile/' . $filename));

        $imageArray = ['image' => $filename];
    } catch (\Exception $e) {
        // Handle any exceptions that occur during image processing
        return back()->withError('Error processing the image.');
    }
}


// Update profile data only if there's any change
if (isset($imageArray) || !empty($data)) {
    auth()->user()->profilepage->update(array_merge(
        $data ?? [],
        $imageArray ?? []
    ));
}

return redirect("/profile/{$user->id}");




}




}
























<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class postsController extends Controller
{
    


public function __construct()
{
    $this->middleware('auth');
}



    public function create(){


return view('posts.create');

    }



public function store(Request $request){






$data = request()->validate([
  //  'another' => '',
    'caption' => 'required',
    'image'  =>['required', 'image'],


]);



if($request->file('image')){


// create image manager with desired driver
$manager = new ImageManager(new Driver());
//$name_gen=hexdec(uniqid()). '.' .$request->file('image')->getClientOriginalExtension();
$imagepath = request('image')->store('uploads', 'public');
$imagepath=$manager->read($request->file('image'));
$imagepath=$imagepath->resize(1200, 1200);

//$img->tojpeg(80)->save(base_path('public/upload/category/' .$name_gen));

//$img->tojpeg(80)->save(base_path("storage/{$imagepath}"));

$saveimg=public_path("storage/{$imagepath}");

$saveimg->save();

}




/*
 $imagepath = request('image')->store('uploads', 'public');

$image= Image::make(public_path("storage/{$imagepath}"))->fit(1200, 1200);
$image->save();
*/
auth()->user()->posts()->create([

'caption' => $data['caption'],
'image' => $imagepath,


]);



return redirect('/profile/' .  auth()->user()->id);

}






}
