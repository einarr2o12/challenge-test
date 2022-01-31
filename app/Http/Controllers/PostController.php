<?php

namespace App\Http\Controllers;

use App\Http\Repositories\LikeRepositoryInterface;
use App\Http\Repositories\PostRepositoryInterface;
use App\Http\Requests\PostReactionRequest;
use App\Http\Resources\PostResource;
use App\Http\Services\LikeService;
use App\Models\Like;
use App\Models\Post;
use App\Traits\ResponserTraits;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ResponserTraits;
    /**
     * @var PostRepositoryInterface $postRepository;
     */
    protected PostRepositoryInterface $postRepository;

    /**
     * @var LikeRepositoryInterface $likeRepository
     */
    protected LikeRepositoryInterface $likeRepository;

    /**
     * @var LikeService $likeService
     */
    protected LikeService $likeService;

    public function __construct(
        PostRepositoryInterface $postRepository,
        LikeRepositoryInterface $likeRepository,
        LikeService $likeService,
    ) {
        $this->postRepository = $postRepository;
        $this->likeRepository = $likeRepository;
        $this->likeService = $likeService;
    }

    public function list(Request $request)
    {
        $posts = $this->postRepository->getPosts($request->user());

        return $this->responseSuccess(PostResource::collection($posts));
    }

    public function toggleReaction(PostReactionRequest $request)
    {
        $post = $this->postRepository->getPostById($request->post_id);

        if (!$post) {
            return $this->responseNotFound('model not found');
        }

        if ($post->author_id == $request->user()->id) {
            return $this->responseInternalError('You cannot like your post');
        }

        $like = $this->likeRepository->getLikeByPostAndUserId($request->user(), $request->post_id);

        if ($like && $like->post_id == $request->post_id && $request->like) { // i can use throw exception but i havn't enough time.
            return $this->responseInternalError('You already liked this post');
        } elseif ($like && $like->post_id == $request->post_id && !$request->like) {
            $like->delete();

            return $this->responseInternalError('You unlike this post successfully');
        }

        $this->likeService->likeCreated($request->post_id, $request->user()->id);

        return $this->responseSuccessWithStatusCode('You like this post successfully');
    }
}
