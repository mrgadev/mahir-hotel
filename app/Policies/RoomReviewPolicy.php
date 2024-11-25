<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RoomReview;
use Illuminate\Auth\Access\Response;

class RoomReviewPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user) {
        return $user->hasAnyRole(['admin', 'staff']) ? Response::allow() : Response::deny('Silahkan hubungi administrator anda');
    }

    public function view(User $user)  {
        return $user->hasAnyRole(['admin', 'staff']) ? Response::allow() : Response::deny('Silahkan hubungi administrator anda');
    }

    public function store(User $user) {
        return $user->hasRole('user') ? Response::allow() : Response::deny('Anda tidak berhak mengakses halaman ini!');
    }

    public function update(User $user) {
        return $user->hasRole('user') ? Response::allow() : Response::deny('Anda tidak berhak mengakses halaman ini!');
    }

    public function delete(User $user) {
        return $user->hasAnyRole(['admin', 'staff']) ? Response::allow() : Response::deny('Silahkan hubungi administrator anda');
    }
    
    public function changeVisibility(User $user) {
        return $user->hasAnyRole(['admin', 'staff']) ? Response::allow() : Response::deny('Silahkan hubungi administrator anda');
    }
}
