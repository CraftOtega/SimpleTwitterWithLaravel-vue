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


public function  index(){

//fetching the list of  you are following
$users = auth()->user()->following()->pluck('profilepages.user_id');

//dd($users);
//eager loading with('user')
$posts =post::WhereIn('user_id', $users)->with('user')->latest()->paginate(5);

//dd($posts);


return view('posts.index', compact('posts'));


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

// Store the uploaded image in the 'uploads' directory within the 'public' disk
$imagepath = request('image')->store('uploads', 'public');


$image=$manager->read($request->file('image'));

// Read the stored image using the ImageManager
//$image = $ma(storage_path("app/public/{$imagepath}"));

// Resize the image to 1200x1200
$image= $image->cover(1200, 1200);

// Save the resized image back to the storage path
$image->save(public_path("storage/{$imagepath}"));
//$image->save(storage_path("app/public/{$imagepath}"));



auth()->user()->posts()->create([

    'caption' => $data['caption'],
    'image' => $imagepath,
    
    
    ]);

}

/*
 $imagepath = request('image')->store('uploads', 'public');

$image= Image::make(public_path("storage/{$imagepath}"))->fit(1200, 1200);
$image->save();
*/



return redirect('/profile/' .  auth()->user()->id);

}










public function show(post $post){

   // dd($post);

return view('posts.show',compact('post'));

}










}
