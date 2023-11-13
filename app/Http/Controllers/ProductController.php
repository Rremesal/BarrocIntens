<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index() {
        return view('post.index', [
            'posts' => post::orderby('created_at', 'asc')->paginate(6)
        ]);
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'subject' => ['required', 'min:1', 'max:255', 'unique:posts,subject'],
            'content' => ['required', 'min:1'],
        ]);
        
        $post = post::create($data);

        return redirect()->route('post');
    }
}
