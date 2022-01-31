<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Traits\ResponserTraits;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ResponserTraits;

    /**
     * @var UserRepositoryInterface $userRepository;
     */
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Retrive to user login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $user = $this->userRepository->getUserByEmail($request->email);
        if (!$user) {
            return $this->responseNotFound('Model not found.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->responseNotFound('Invalid credentials');
        }
        return $this->responseSuccess(new LoginResource($user));
    }
}
