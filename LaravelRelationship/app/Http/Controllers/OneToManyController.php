<?php

namespace App\Http\Controllers;

use App\Models\BloggerModel;
use App\Models\PostsModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OneToManyController extends Controller
{
    public function create_example_1(Request $request)
    {
        DB::beginTransaction();
        $check = false;
        try {
            $blogger = new BloggerModel();
            $blogger->bloger_name = "Blogger 4";
            $blogger->save();
            if (!$blogger->id) {
                throw new Exception("Error in table 1");
            }
            for ($i = 0; $i < 3; $i++) {
                $posts = new PostsModel();
                $posts->post = "Post 4-" . $i;
                $blogger->posts()->save($posts);
                if (!$posts->id) {
                    throw new Exception("Error in table 2");
                }
            }
            $check = true;
            DB::commit();
        } catch (Exception $error) {
            $check = false;
            DB::rollBack();
        }
        return response()->json(['message' => $check]);
    }
    public function read_data_example1(Request $request)
    {
        // Get All Posts With Blogger Details
        $blogger = BloggerModel::with('posts')->find(5);
        // Get all posts id
        $postID = $blogger->posts->pluck('id')->toArray();
        // Get All Posts
        $all_blogger = BloggerModel::find(5)->posts;
        // get blogger by posts id
        $posts = PostsModel::with('blogger')->find(8);
        return response()->json(['message' => $posts]);
    }
}
