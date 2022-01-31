<?php

namespace App\Http\Repositories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    /**
     * Retrive Posts by authentication user.
     * @param User $user
     * @return Collection
     */
    public function getPosts(User $user): Collection
    {
        return Post::where('author_id', $user->id)->get();
    }

    /**
     * Retrive post by id.
     * @param int $id
     * @return Post
     */
    public function getPostById(int $id): Post
    {
        return Post::find($id);
    }
}
