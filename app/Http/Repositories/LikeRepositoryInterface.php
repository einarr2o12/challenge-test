<?php

namespace App\Http\Repositories;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface LiketRepositoryInterface
 */
interface LikeRepositoryInterface
{
    /**
     * Retrive like by post id and user id.
     * @param User $user
     * @param int $postId
     * @return Like|null
     */
    public function getLikeByPostAndUserId(User $user, int $postId): ?Like;
}
