<?php

namespace App\Http\Repositories;

use App\Models\User;

/**
 * Interface UserRepositoryInterface
 */
interface UserRepositoryInterface
{
    /**
     * Retrive user by email.
     * @param string $email
     */
    public function getUserByEmail(string $email): ?User;
}
