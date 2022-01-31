<?php

namespace App\Http\Repositories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface PostRepositoryInterface
 */
interface PostRepositoryInterface
{
    /**
     * Retrive posts.
     * @param User $user
     * @return Collection
     */
    public function getPosts(User $user): Collection;

    /**
     * Retrive post by id.
     * @param int $id
     * @return Post
     */
    public function getPostById(int $id): Post;
}
