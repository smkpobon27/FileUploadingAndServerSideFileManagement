<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallary;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Auth;

class GallaryController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>'index']);
    }
	//List gallaries
    public function index(){
        
        $gallaries = Gallary::paginate(8);
    	return view('gallary.index', compact('gallaries'));
    }
    //List gallaries of that user after user logged in
    public function gallaries(){
        
        $gallaries = Gallary::where('user_id', Auth::id())->paginate(4);
        return view('gallary.gallaries', compact('gallaries'));
    } 
    //show create form
    public function create(){
        return view('gallary.create');
    	
    }
    //store gallary
    public function store(Request $request){

        Session::flash('message', 'Gallary Created Successfully');

    	$name= $request->name;
        $description= $request->description;
        $cover_image= $request->file('cover_image');
        $user_id= Auth::id();
        $privacy = $request->privacy;
        //check image upload
        if($request->hasFile('cover_image')){
            $cover_image_filename= $cover_image->getClientOriginalName();
            Storage::putFileAs('public/', $cover_image, $cover_image_filename); 
        }else{
            $cover_image_filename= 'noimage.jpg';
        }
        //Insert into DB
        $newGallary= new Gallary;
        $newGallary->name = $name;
        $newGallary->description = $description;
        $newGallary->cover_image = $cover_image_filename;
        $newGallary->user_id = $user_id;
        $newGallary->privacy = $privacy;
        $newGallary->save();

        return redirect('/gallaries');
    }
    //show gallary photos
    public function show($id){
        $gallary = Gallary::find($id);
        // $photos = Photo::where('gallary_id', $id)->get();
        if($gallary->privacy==0 and $gallary->user_id==Auth::id()){
            /*if privacy== 0 and current user is the admin of this gallary then show this private gallary to this user.If this gallary is requested by any other user, it'll not be shown.*/
            return view('gallary.show', compact('gallary'));
        }elseif ($gallary->privacy == 1) {
            //if gallary is public 
           return view('gallary.show', compact('gallary')); 
        }
        return \Redirect(route('gallaries'));
        
    }
 
    //show public gallaries
    public function publicGallary(){
        $gallaries = Gallary::where('privacy',1)->paginate(8);
        return view('gallary.publicgallary', compact('gallaries'));
    }

    //Delete a galary
    public function delete($id){
        Session::flash('message', 'Gallary Deleted Successfully.');
        $gallary = Gallary::find($id);
        $gallary->delete();
        return redirect()->route('gallaries');
    }
}
