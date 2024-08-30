<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post): void
    {
        $originalSlug = str()->slug($post->tittle);
        $slug = $originalSlug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $post->slug = $slug;
        $post->excerpt = Str::limit(strip_tags($post->body), 500);
        
    }
    
    public function updating(Post $post): void
    {
        
        $originalSlug = str()->slug($post->tittle);
        $slug = $originalSlug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $post->slug = $slug;
        $post->excerpt = Str::limit(strip_tags($post->body), 500);
    }

    // public function created()
    // {


    // }
}
