<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Affectation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserRepository
{

        /**
      * @var User
      */
    protected $user;

      /**
      * UserRepository constructor
      *
      * @param  User $user
      */

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function createAUser($request)
    {
        $user =  User::create([
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'email' => $request->email,
            'poste' => $request->poste,
            'sexe' => $request->sexe,
            'numero_de_telephone' => $request->numero_de_telephone,
            'N_de_license' => $request->N_de_license,
            'mot_de_passe' => bcrypt($request->mot_de_passe)
        ]);
        return $user;

    }
    public function assignARoleToAUser($request, $user)
    {
        $role = Role::findByName($request->role);
        return $user->assignRole($role->name);
    }

    public function displayAllUsers()
    {
        return User::with('roles')->get();
    }

    public function displayAUser($id)
    {
        return User::find($id)->load('roles');
    }



    public function updateAUser($request, $id)
    {
        $user = User::find($id);
        return $user->update([
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'email' => $request->email,
            'poste' => $request->poste,
            'sexe' => $request->sexe,
            'numero_de_telephone' => $request->numero_de_telephone,
            'N_de_license' => $request->N°_de_license,
            'mot_de_passe' => bcrypt($request->mot_de_passe)

        ]);
    }
    public function updateAUserRole($request, $id)
    {
        $user = User::find($id);
        $oldProfils = $user->getRoleNames();
        $profil = Role::find($request->profil_id);
        foreach($oldProfils as $oldProfil) {
            $user->removeRole($oldProfil);
        }
        return $user->assignRole($profil->name);
    }

    public function deleteAUser($id)
    {
        $user = User::find($id);
        return $user->delete();

    }
}
