<?php

namespace App\Policies;

use App\User;
use App\ChcPatient;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChcPatientPolicy
{
  use HandlesAuthorization;

  /**
  * Determine whether the user can view the chcPatient.
  *
  * @param  \App\User  $user
  * @param  \App\ChcPatient  $chcPatient
  * @return mixed
  */
  public function view(User $user, ChcPatient $chcPatient)
  {
    //
  }

  /**
  * Determine whether the user can create chcPatients.
  *
  * @param  \App\User  $user
  * @return mixed
  */
  public function create(User $user)
  {
    if($user->pos_id == 1)
    {
      return true;
    }
    return false;
  }

  /**
  * Determine whether the user can update the chcPatient.
  *
  * @param  \App\User  $user
  * @param  \App\ChcPatient  $chcPatient
  * @return mixed
  */
  public function update(User $user, ChcPatient $chcPatient)
  {
    //
  }

  /**
  * Determine whether the user can delete the chcPatient.
  *
  * @param  \App\User  $user
  * @param  \App\ChcPatient  $chcPatient
  * @return mixed
  */
  public function delete(User $user, ChcPatient $chcPatient)
  {
    //
  }
}
