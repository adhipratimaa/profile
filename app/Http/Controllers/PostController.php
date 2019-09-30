<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use File;
use DB;
use Image;

use Carbon\Carbon;
use DateTime;

class PostController extends Controller
{
    public function submit(Request $request)
    {
    	$rules=
        [

    		'name'=>'required|string',
    		'image'=>'required|image|max:5000',
    		'email'=>'required|email|unique:posts,email',
    		'number'=>'sometimes',
    		'address'=>'required|string',
    		'country'=>'required|string|in:nepal,india,maldives',
    		'district'=>'required|string|in:kathmandu,bhaktapur,lalitpur',
    		'city'=>'required|string',
    		'status'=>'required|string|in:married,unmarried',
    		'gender'=>'required|string|in:male,female',
    		'dob'=>'required|date',
    		'socialid'=>'required',
    		'license'=>'sometimes',
    		'vehicle'=>'sometimes'
        ];

    	$request->validate($rules);
    	$socialid = $_POST['socialid'];
    	$socialid = implode(", ", $socialid);
        $social = $_POST['social'];

        if($social[0] != '' && $social[1] != '')
        {
            $social = implode(", ", $social);
        }
        else if($social[0] == '' && $social[1] != '')
        {
            $social = $social[1];
        }
        else if($social[0] == '' && $social[1] == '')
        {
            $social = '';
        }
        else
        {
            $social=$social[0];
        }

        
        $data=$request->except('_token');
        $data['socialid'] = $socialid;
        $data['social'] = $social;
        //dd($request);
        //dd($request->image);
  //   	if($request->image)
  //       {
  //   	$path= public_path(). '/uploads';
  //   	//dd($path);
		// if(!File::exists($path))
  //       {
  //   		File::makeDirectory($path, 0777, true, true);
  //       }

  //   	//$file = $request->file('Picture');
		// //$destinationPath = 'public/img/';
		// //$originalFile = $file->getClientOriginalName();
		// //$file->move($destinationPath, $originalFile);

  //   	$file_name = "Image-".date('Ymdhis').rand(0, 1234).".".$request->image->getClientOriginalName();
  //   	//dd($file_name);
  //   	$success = $request->image->move($path, $file_name);
  //       }
    	  
  //   	  $data['image']=$file_name;  	
    	
        $image = $request->file('image');
        $input['imagename'] =  "Image-".date('Ymdhis').rand(0,1234).".".$request->image->getClientOriginalName();;
      $path=public_path().'/thumbnail';
 //           //dd($path);
           if(!File::exists($path)){
               File::makeDirectory($path,0777,true,true);
           }
        $destinationPath = public_path().'/thumbnail';
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

         $path=public_path().'/imgupload';
         if(!File::exists($path)){
               File::makeDirectory($path,0777,true,true);
           }
        $destinationPath = public_path().'/imgupload';
        $img = Image::make($image->getRealPath());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
    $data['image']=$input['imagename'];
    	

    	$add=new Post;
    	
    

    	$add->fill($data);
       
    	$add->save($data);
    	return redirect()->route('list');
    }

    public function list()
    {
    	$add=new Post;
    	$add=$add->getpost();
    	return view('list')->with('post_data',$add);

    }

    public function edit($id)
    {
    	$add=new Post;
    	$add=$add->find($id);
    	//dd($id);
    	return view('edit')->with('post_data',$add);
    }

    public function update(Request $request)
    {
    	$add=Post::find($request->id);
    	//dd($request->id);
    	//$socialid = $_POST['socialid'];
    	//$socialid = implode(", ", $socialid);
    	
    	$data= $request->except('_token','submit');
    		// dd($request->image);

    //     if(Input::hasFile('image_file'))
    // {
    //     $usersImage = public_path("uploads/images/{$users->image_file}"); // get previous image from folder
    //     if (File::exists($usersImage)) { // unlink or remove previous image from folder
    //         unlink($usersImage);
    //     }

        if($request->hasFile('image'))
        {
             $usersImage = public_path("uploads/{$add->image}");

    if (File::exists($usersImage)) 
        { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        }
    
    // dd($request);
    

    	if($request->image)
        {
    	$path= public_path(). '/uploads';
    	//dd($path);
		if(!File::exists($path))
        {
    		File::makeDirectory($path, 0777, true, true);

        }

    	//$file = $request->file('Picture');
		//$destinationPath = 'public/img/';
		//$originalFile = $file->getClientOriginalName();
		//$file->move($destinationPath, $originalFile);

    	$file_name = "Image-".date('Ymdhis').rand(0, 1234).".".$request->image->getClientOriginalName();
    	//dd($file_name);
    	$success = $request->image->move($path, $file_name);
        }
    	  
    	  $data['image']=$file_name;  	
    	
    	//dd($data);
    	$data['socialid']=implode(",",$request->socialid);
    	
    	$add->fill($data);
    	$add->save();
    	return redirect()->route('list');
    }


   public function delete(Request $request){
        $profile=Post::find($request->id);
        // dd($profile);
       $image=$profile->image;
       // dd($image);
        $success=$profile->delete();
        if($success){
             if(!empty($image) && file_exists(public_path().'/uploads/'.$image))
        {
            unlink(public_path().'/thumbnail/'.$image);
        }
        $request->session()->flash('success','Deleted Successfully');
    }
    else
    {
       $request->session()->flash('error','Sorry couldnot delete'); 
    }
        
        return redirect()->route('list');
    }


    public function displaynews()
    {
        $add=new Post;
        $add=$add->getpost();
            
        return view('news')->with('post_data',$add);

    }

    public function picture()
    {
         $images = \File::allFiles(public_path('uploads'));

  return view('pictures')->with('images',$images);
}


public function deleteUnusedImages()
{
    $file_types = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
    );
    $directory = public_path('uploads/');
    $files = File::allFiles($directory);
    // dd($files);

    foreach ($files as $file)
    {
    // var_dump($file->getFilename());
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        // dd($ext);
        if (in_array($ext, $file_types)) {

            if($a=DB::table('posts')->where('image', '=', $file->getFilename())->count())
                // dd($a);
                continue; // continue if the picture is in use
            echo 'removed' . basename($file)."<br />";
            unlink($file); // delete if picture isn't in use
            return redirect()->route('pictures');
        }
    }
}


    // public function age()
    // {
       
    //     $posts = DB::table('posts')->select('dob')->first();
    //    // $posts = DB::table('posts')->where('dob', '=' )->first();
    // //foreach ($ages as $age)
       
    //     $b_date = $posts->dob;
    //      //$b_date = $posts;
    //     //dd($b_date);

    //      $age = Carbon::parse($b_date)->age;

    //      //print $age;

    //      return view('age')->with('posts', $posts);
    
    //     }


public function age()
    {
       
        $posts = DB::table('posts')->pluck('dob');
      
    foreach ($posts as $post)
    {
        //echo $dob;
        $age = Carbon::parse($post)->age;
        echo $age."<br>"; 

    }


       
        


         return view('age')->with('posts', $posts);
    
        }


        
    }






       


