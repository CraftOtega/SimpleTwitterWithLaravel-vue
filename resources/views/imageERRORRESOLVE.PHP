<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


Please how can I display the images stored in storage folder in my view in laravel Here is my controller;


<?php

if ($request->file('image')) {
    $file = $request->file('image');
    $filename = date('YmdHi').$file->getClientOriginalName();
    Image::make($file)->resize(248,203)->save(storage_path('upload/category/'.$filename));
    $data['image'] = $filename;
}
$data->save();

?>
And here is my view blade


<img src="{{Storage::url('upload/category'.$category->image) }}" alt="" width="100">


I have runned php artisan storage:link but still the image is not displaying. 
Is there any thing else I was supposed to do.


3 Answers

2

use this code to link storage public directory to app public directory

php artisan storage:link

Then you can access to it's directories or file with this url

http://yoursite.com/storage/.....

You can use this code to get files that exist in this folder

assets('upload/category')












Okay Thank you all for your help. I finally got it right.
 Let me drop it here might be of help to someone else. 
I am using laravel 8 so in my controller i used
<?php
if ($request->file('image')) {
    $file = $request->file('image');
    $filename = date('YmdHi').$file->getClientOriginalName();
    Image::make($file)->resize(248,203)->save(storage_path('app/public/category/'.$filename));
    $data['image'] = $filename;
    }
   $data->save();

?>


and in my view

<img src="{{Storage::url('category/'.$category->image) }}" alt="" 
 width="100"> 
NOTE: the directory path is storage>app>public (all these ones are there by default dont create them at least for me) I just had to create the category directory only making it like this

STORAGE>APP>PUBLIC>CATEGORY

and it worked. Thank you all once more for your help so far

Share
Improve this answer
Follow

    
</body>
</html>