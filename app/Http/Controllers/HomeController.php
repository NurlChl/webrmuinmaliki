<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use App\Models\Rule;
use App\Models\RuleCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $carousels = Post::query()->orderBy('views', 'desc')->limit(5)->get();
        $posts = Post::query()->latest()->limit(10)->get();
        $galleries = Gallery::query()->latest()->limit(10)->get();
        $ruleCategories = Rule::query()->latest()->limit(15)->get();

        $ruleByCategory = $ruleCategories->groupBy(function ($post) {
            return $post->ruleCategory->name; 
        });


        return view('home', [
            'posts' => $posts,
            'carousels' => $carousels,
            'rulesByCategory' => $ruleByCategory,
            'galleries' => $galleries,
            'totalGalleries' => $galleries->count(),

        ]);
    }
}
