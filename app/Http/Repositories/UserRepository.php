<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Retrive user by email.
     * @param string $email
     * @return User
     */
    public function getUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
