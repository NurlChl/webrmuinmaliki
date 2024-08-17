<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post): void
    {

        $post->slug = str()->slug($post->tittle);
        $post->excerpt = Str::limit(strip_tags($post->body), 500);
        
    }
    
    public function updating(Post $post): void
    {
        
        $post->slug = str()->slug($post->tittle);
        $post->excerpt = Str::limit(strip_tags($post->body), 500);
    }

    // public function created()
    // {


    // }
}
