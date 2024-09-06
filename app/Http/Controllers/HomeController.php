<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
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

        $ruleCategories = RuleCategory::with(['rules' => function ($query) {
            $query->latest()->limit(3);
        }])->get();

        // Mengubah struktur data untuk dikirim ke view
        $rulesByCategory = [];
        foreach ($ruleCategories as $ruleCategory) {

            if ($ruleCategory->rules->isNotEmpty()) {
                $rulesByCategory[$ruleCategory->name] = $ruleCategory->rules;
            }
        }

        // dd($rulesByCategory);

        return view('home', [
            'posts' => $posts,
            'carousels' => $carousels,
            'rulesByCategory' => $rulesByCategory,
            'galleries' => $galleries,
            'totalGalleries' => $galleries->count(),

        ]);
    }
}
