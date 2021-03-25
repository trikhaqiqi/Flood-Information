<?php

namespace App\Policies;

use App\Models\Polsek;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PolsekPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Polsek $polsek)
    {
        return $user->id === 1;
    }

    public function create(User $user, Polsek $polsek)
    {
        return $user->id === 1;
    }

    public function update(User $user, Polsek $polsek)
    {
        return $user->id === 1;
    }
}
