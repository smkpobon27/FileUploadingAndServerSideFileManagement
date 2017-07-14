<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallary;
use App\Photo;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Redirect;
use Auth;

class PhotoController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  	//show create form
    public function create($gallary_id){
        $tags = Tag::where('user_id',Auth::id())->get();
    	return view('photo.create', compact('gallary_id','tags'));
    }
    //store photos
    public function store(Request $request){
    	Session::flash('message', 'Photo Uploaded Successfully');

        //get data from request form
        $title= $request->title;
        $description= $request->description;
        $location= $request->location;
        $gallary_id= $request->gallary_id;
        $image= $request->file('image');
        $user_id= Auth::id();
        $tag = $request->select_tag;
        //check image upload
        if($request->hasFile('image')){
            $image_filename= $image->getClientOriginalName();
            Storage::putFileAs('public/images/', $image, $image_filename); 
        }else{
            $image_filename= 'noimage.jpg';
        }

        //Get the privacy of the album from gallary table
        $gallary_privacy = Gallary::where('id', $gallary_id)->get();
        $privacy = 0;
        foreach ($gallary_privacy as $p) {
            if($p->privacy)
                $privacy=$p->privacy;
        }
        
        //Insert into DB
        $newPhoto= new Photo;
        $newPhoto->title = $title;
        $newPhoto->description = $description;
        $newPhoto->location = $location;
        $newPhoto->image = $image_filename;
        $newPhoto->gallary_id = $gallary_id;
        $newPhoto->user_id = $user_id;
        $newPhoto->tag = $tag;
        $newPhoto->privacy = $privacy;
        $newPhoto->save();

        return \Redirect::route('gallary.show',['id'=>$gallary_id]);
    }
    //show photo details
    public function details($id){
        $photo = Photo::find($id);
    	return view('photo.details', compact('photo'));
    }

    //Delete single photo
    public function deletePhoto($id){
        Session::flash('message','Photo Deleted Successfully.');
        $photo = Photo::find($id);
        $photo->delete();
        return redirect()->route('gallary.show',['id'=>$photo->gallary_id]);
    }

    //Create Tag for Photo
    public function showCreateTagForm(){
        return view('photo.createtag');
    }
    //Store Tag 
    public function storeTag(Request $request){
        $newTag = new Tag;
        $newTag->tag = $request->tag;
        $newTag->user_id = Auth::id();
        $newTag->save();
        return redirect()->route('photo.tag');
    }
    //Search Photo by Tags
    public function search(){
        $query = Input::get('query');

       /* Here is a little problem which is the search result contains users private gallary photos too. Need to fix this by adding privacy to Photo model for each photo according to Gallary privacy.*/

       $searchedPhoto = Photo::where('tag','LIKE', '%'.$query.'%')->where('privacy',1)->get();
       
       $searchedPrivatePhotoOfCurrentUser = Photo::where('tag','LIKE','%'.$query.'%')->where('user_id',Auth::id())->where('privacy',0)->get();
       // $searchedPhoto->push($searchedPrivatePhotoOfCurrentUser); //can't do like this (push)
       $searchedPhoto->sortBy('created_at');
       $searchedPrivatePhotoOfCurrentUser->sortBy('created_at');
       return view('photo.searchview',compact('searchedPhoto','searchedPrivatePhotoOfCurrentUser'));
         // return $searchedPhoto;
    }
}
