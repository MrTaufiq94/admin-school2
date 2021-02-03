<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * index tags
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Tags"
            ],
            "data" => $tags
        ], 200);
    }

    /**
     * detail tag
     */
    public function show($slug)
    {
        $tag  = Tag::where('slug', $slug)->first();

        if($tag) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Data Post Berdasarkan Tag: ". $tag->name
                ],
                "data" => $tag->posts()->latest()->paginate(6)
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data Post Berdasarkan Tag Tidak Ditemukan!"
                ],
                "data" => null
            ], 404);

        }
    }
}
