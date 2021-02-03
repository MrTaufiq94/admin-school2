<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

/**
 * PostController
 */
class PostController extends Controller
{
    /**
     * index posts
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Posts"
            ],
            "data" => $posts
        ], 200);
    }

    /**
     * detail post
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if($post) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail Data Post"
                ],
                "data" => $post
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data Post Tidak Ditemukan!"
                ],
                "data" => null
            ], 404);

        }
    }


    public function PostHomePage()
    {
        $posts = Post::latest()->take(6)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Posts Homepage"
            ],
            "data" => $posts
        ], 200);
    }
}
