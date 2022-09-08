<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class PagesController extends Controller {

    public $timestamps = false;
    const UPDATED_AT = false;
    public function getWelcome(){
        $datas['writer'] = User::orderBy('user_id')->get();
        $datas['data'] = blog::orderBy('post_id', 'DESC')->paginate(3);
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
        $datas['comments'] = Comment::orderBy('comment_id', 'DESC')->get();
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
        $datas['data'] = blog::where('category', $categoryid)->orderBy('post_id', 'DESC')->paginate(3);
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
    public function contactPage(){
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
        return view('pages.contact', $datas);
    }
    public function storePost(Request $request){

        $post = new blog();
        $post->poster_id = session()->get('logid');
        $post->title = request('title');
        $post->description = request('description');
        $post->body = request('body');
        if (!$request->hasFile('image')) {
            return $request;
        }
        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();

        // Note you have a typo in your example, you're using a `,` instead of a `.`
        $filename = time().'.'.$extension;

        // To store (move) the file to the 'public/image' folder, use this:
        $file->move(public_path('page/upload/'), $filename);
        $filename = 'upload/'.$filename;
        $post->imgpath = $filename;
        $post->category = request('category');
        $post->comments = 0;
        $post->clicks = 0;
        $post->save();
        return redirect('/');
    }
    public function storeContact(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $contact = new ContactMessage();
        $contact->contact_name = request('name');
        $contact->contact_email = request('email');
        $contact->contact_subject = request('subject');
        $contact->contact_message = request('message');
        $contact->save();
        return redirect('/');
    }
    public function storeComment(Request $request){
        if(Session::has('logid')) {
            $request -> validate([
                'comment' => 'required',
            ]);
            $comment = new Comment();
            $comment->comment = request('comment');
            $comment->post_id = request('postid');
            $comment->commenter_id = session()->get('logid');
            $comment->save();
            Post::where('post_id', '=', request('postid'))->increment('comments');
            return back();
        }
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
