<?php

namespace App\Policies;

use App\Models\ccdCarShop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CcdCarShopPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, ccdCarShop $post)
    {
        return $user->id == $post->user->id;
    }

    public function delete(User $user, ccdCarShop $post)
    {
        return $user->id == $post->user->id;
    }
}
