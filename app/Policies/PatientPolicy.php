<?php

namespace App\Policies;

use App\User;
use App\ChcPatient;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can create chcPatients.
     *
     * @param  \App\User  $user
     * @return mixed
     */
     public function create(User $user)
     {
         if($user->role==1)
         {
             return true;
         }
         return false;
     }

     public function delete(User $user)
     {
         if($user->role==1)
         {
             return true;
         }
         return false;
     }
}
