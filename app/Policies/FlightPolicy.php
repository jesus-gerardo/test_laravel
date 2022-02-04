<?php

namespace App\Policies;

use App\Models\Flights;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlightPolicy0{
    use HandlesAuthorization;
    
    public function before(User $user){
        if($user->id == 1){
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user){ }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flights  $flights
     * @return mixed
     */
    public function view(User $user, Flights $flights){
        if($user->can('flight.view')){
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user){
        if($user->can('flight.store')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flights  $flights
     * @return mixed
     */
    public function update(User $user, Flights $flights){
        if($user->can('flight.update')){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flights  $flights
     * @return mixed
     */
    public function delete(User $user, Flights $flights){
        if($user->can('flight.delete')){
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flights  $flights
     * @return mixed
     */
    public function restore(User $user, Flights $flights){}

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Flights  $flights
     * @return mixed
     */
    public function forceDelete(User $user, Flights $flights){}
}
