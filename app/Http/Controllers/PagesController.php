<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\blog;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class PagesController extends Controller {

    public $timestamps = false;
    const UPDATED_AT = false;
    public function getWelcome(){
        $datas['writer'] = User::orderBy('user_id')->get();
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['dataa'] = blog::orderBy('clicks', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
        $datas['categoriess'] = Category::orderBy('cat_clicks', 'DESC')->get();
//        return $datas['categories'];

        if(Session::has('logid')){
            $datas['sess'] = User::where('user_id', '=', Session::get('logid'))->first()->toarray();
        }
        else{
            $datas['sess'] = array(0);
        }
        return view('pages.welcome', $datas);
    }
    public function getPage($postid){
        if(Session::has('logid')){
            $datas['sess'] = User::where('user_id', '=', Session::get('logid'))->first()->toarray();
        }
        else{
            $datas['sess'] = array(0);
        }
        $datas['writer'] = User::orderBy('user_id')->get();
        $datas['dataa'] = blog::orderBy('clicks', 'DESC')->get();
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
        $datas['categoriess'] = Category::orderBy('cat_clicks', 'DESC')->get();
        $cat = Post::select('category')->where('post_id', $postid)->get()->toArray();
        Category::where('category_id', '=', $cat[0])->increment('cat_clicks');
        Post::where('post_id', '=', $postid)->increment('clicks');
        return view('pages.page', $datas)->with('postid', $postid);
    }
    public function getCategory($categoryid){
        if(Session::has('logid')){
            $datas['sess'] = User::where('user_id', '=', Session::get('logid'))->first()->toarray();
        }
        else{
            $datas['sess'] = array(0);
        }
        $datas['writer'] = User::orderBy('user_id')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
        $datas['categoriess'] = Category::orderBy('cat_clicks', 'DESC')->get();
        $datas['dataa'] = blog::orderBy('clicks', 'DESC')->get();
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        Category::where('category_id', '=', $categoryid)->increment('cat_clicks');
        return view('pages.category', $datas)->with('categoryid', $categoryid);
    }
    public function createPost(){
        if(Session::has('logid')){
            $datas['sess'] = User::where('user_id', '=', Session::get('logid'))->first()->toarray();
        }
        else{
            $datas['sess'] = array(0);
        }
        $datas['dataa'] = blog::orderBy('clicks', 'DESC')->get();
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
        $datas['categoriess'] = Category::orderBy('cat_clicks', 'DESC')->get();
        return view('pages.post', $datas);
    }
    public function storePost(){
        $post = new blog();
        $post->title = request('title');
        $post->description = request('description');
        $post->body = request('body');
        $post->imgpath = request('imgpath');
        $post->category = request('category');
        $post->save();
        return redirect('/');
    }
    public function storeUser(Request $request){
        $request -> validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->bio = request('bio');
        $user->save();
        if($user){
            return back()->with('success', 'Registration Successful!!!');
        }
        else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }
    public function registrationPage(){
        if(Session::has('logid')){
            $datas['sess'] = User::where('user_id', '=', Session::get('logid'))->first()->toarray();
        }
        else{
            $datas['sess'] = array(0);
        }
        $datas['dataa'] = blog::orderBy('clicks', 'DESC')->get();
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
        $datas['categoriess'] = Category::orderBy('cat_clicks', 'DESC')->get();
        return view('pages.registration', $datas);
    }
    public function loginUser(Request $request){
        $request -> validate([
            'password' => 'required',
            'email' => 'required|email'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('logid', $user->user_id);
                return redirect('/');
            }
            else{
                return back()->with('fail', 'Wrong Password');
            }
        }
        else{
            return back()->with('fail', 'Email Not Yet Registered');
        }
//        $user->email = request('email');
//        $user->password = Hash::make(request('password'));
    }
    public function loginPage(){
        if(Session::has('logid')){
            $datas['sess'] = User::where('user_id', '=', Session::get('logid'))->first()->toarray();
        }
        else{
            $datas['sess'] = array(0);
        }
        $datas['dataa'] = blog::orderBy('clicks', 'DESC')->get();
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
        $datas['categoriess'] = Category::orderBy('cat_clicks', 'DESC')->get();
        return view('pages.login', $datas);
    }
    public function logout(){
        if(Session::has('logid')){
            Session::pull('logid');
            return redirect('/');
        }
        else{
            return redirect('/');
        }
    }

}
