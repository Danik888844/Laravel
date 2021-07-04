<?php

namespace App\Policies;

use App\Models\ccdCarShop;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }

    public function delete(User $user, Comment $comment)
    {
        $postFK = (new ccdCarShop)->getForeignKey();

        $exists = $user
            ->posts()
            ->where('id',$comment->getAttribute($postFK))
            ->exists();

        if($exists)
            return true;

        if(!$comment->user)
            return false;

        return $user->id == $comment->user->id;
    }
}
