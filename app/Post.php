<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['name', 'image','address', 'email', 'number', 'country', 'district', 'city','status', 'dob', 'gender', 'socialid', 'social', 'license', 'vehicle'];
            
      public function getpost()
      {
      	$data=$this->get();
      	return $data;
      }      
}
