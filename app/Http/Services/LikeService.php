<?php

namespace App\Http\Services;

use App\Models\Like;

class LikeService
{
    public function likeCreated(int $postId, int $userId): void
    {
        Like::create([
            'post_id' => $postId,
            'user_id' => $userId
        ]);
    }
}
