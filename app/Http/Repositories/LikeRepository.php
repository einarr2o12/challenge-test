<?php

namespace App\Http\Repositories;

use App\Models\Like;
use App\Models\User;

class LikeRepository implements LikeRepositoryInterface
{
    /**
     * Retrive like by post id and user id.
     * @param User $user
     * @param int $postId
     * @return Like|null
     */
    public function getLikeByPostAndUserId(User $user, int $postId): ?Like
    {
        return Like::where('post_id', $postId)->where('user_id', $user->id)->first();
    }
}
