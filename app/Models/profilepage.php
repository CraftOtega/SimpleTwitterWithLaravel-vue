<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class profilepage extends Model
{
    use HasFactory; 

    protected $fillable = [
        'title',
        'description',
        'url',
        'image',
        'user_id',
    ];
 

    //storage\app\public\profile\mIcfV9lH3Vo4kv4BTqqYYwh6gVkdNiv2OSP3JslA.jpg
 public function profiledefaultimage(){

$imagepath =($this->image) ?  $this->image :"/profile/no-img.png";

//return ($this->image) ? '/storage/' .$this->image :"/storage/profile/mIcfV9lH3Vo4kv4BTqqYYwh6gVkdNiv2OSP3JslA.jpg";
return '/storage/' .$imagepath;
 
}

public function user(){



return $this->belongsTo(User::class);

}



public function  followers(){

return $this->belongsToMany(User::class);


}




}
