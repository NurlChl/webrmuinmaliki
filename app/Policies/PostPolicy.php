<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    
    public function update(User $user, Post $post): Response
    {
        return $user->id === $post->user_id ? Response::allow() : Response::denyAsNotFound();
    }



    // public function update(User $user, Post $post): bool
    // {
    //     return $user->id === $post->user_id;
    // }
   
   
    // public function destroy(User $user, Post $post): bool
    // {
    //     return $this->update($user, $post);
    // }

    

}
