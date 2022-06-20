<?php

namespace App\Observers;

use App\Models\User;

class DeleteAccountObserver
{
    public function deleted(User $user)
    {
        $user->card()->delete();
        $user->contact()->delete();
        $user->added()->detach();
        $user->adder()->detach();
        $user->viewed()->detach();
        $user->viewer()->detach();
        $user->token()->delete();
    }
}
