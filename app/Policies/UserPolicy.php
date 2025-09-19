<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole(['super_admin', 'Secretário']);
    }

    public function view(User $user, User $model): bool
    {
        return $user->hasRole(['super_admin', 'Secretário']);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(['super_admin', 'Secretário']);
    }

    public function update(User $user, User $model): bool
    {
        return $user->hasRole(['super_admin', 'Secretário']);
    }

    public function delete(User $user, User $model): bool
    {
        return $user->hasRole(['super_admin', 'Secretário']);
    }
}
