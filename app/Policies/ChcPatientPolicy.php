<?php

namespace App\Policies;

use App\User;
use App\ChcPatient;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChcPatientPolicy
{
  use HandlesAuthorization;

  /**
  * Determine whether the user can create chcPatients.
  *
  * @param  \App\User  $user
  * @return mixed
  */
  public function managePatient(User $user)
  {
    if($user->pos_id == 1)
    {
      return true;
    }
    return false;
  }

  /**
  * Determine whether the user can create chcPatients.
  *
  * @param  \App\User  $user
  * @return mixed
  */
  public function doctorOption(User $user)
  {
    if($user->pos_id == 2)
    {
      return true;
    }
    return false;
  }
}
