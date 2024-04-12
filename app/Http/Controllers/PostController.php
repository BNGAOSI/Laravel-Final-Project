<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    { 
        /* ... */
    }
    public function create()
    { 
        /* ... */
    }
    public function store(Request $request)
    {
        /* ... */
    }

    public function testIndex()
{
    $response = $this->get('/posts');
    $response->assertStatus(200);
    $response->assertViewIs('posts.index');
}

}
