<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\blog;
use Illuminate\Http\Request;

class PagesController extends Controller {

    public function getWelcome(){
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
//        return $datas['categories'];
        return view('pages.welcome', $datas);
    }
    public function getPage($postid){
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
        return view('pages.page', $datas)->with('postid', $postid);
    }
    public function getCategory($categoryid){
        $datas['categories'] = Category::orderBy('category_id')->get();
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        return view('pages.category', $datas)->with('categoryid', $categoryid);
    }
    public function createPost(){
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
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
    public function registrationPage(){
        $datas['data'] = blog::orderBy('post_id', 'DESC')->get();
        $datas['categories'] = Category::orderBy('category_id')->get();
        return view('pages.registration', $datas);
    }

}
