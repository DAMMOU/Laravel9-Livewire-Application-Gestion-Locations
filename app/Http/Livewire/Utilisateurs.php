<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    //public $isBtnAddClicked = false;
    public $currentPage = PAGELIST;
    public $newUser = [];
    public $editUser = [];
    public $rolesPermissions = [];



    public function rules(){
        if($this->currentPage == PAGEEDIT){
            return [
                'editUser.name' => 'required',
                'editUser.prenom' => 'required',
                'editUser.sexe' => 'required',
                'editUser.email' => ['required','email',Rule::unique('users','email')->ignore($this->editUser['id'])],
                'editUser.telephone1' => 'required|numeric',
                'editUser.telephone2' => 'numeric',
                'editUser.pieceIdentite' => 'required',
                'editUser.numeroPieceIdentite' => 'numeric',
            ];
        }
        return [
            'newUser.prenom' => 'required',
            'newUser.name' => 'required',
            'newUser.sexe' => 'required',
            'newUser.email' => ['required','email','unique:users,email'],
            'newUser.telephone1' => 'required',
            'newUser.telephone2' => 'numeric',
            'newUser.pieceIdentite' => 'required',
            'newUser.numeroPieceIdentite' => 'numeric',
        ];    
    }
   

    //protected $messages = [
    //    'newUser.nom.required' => 'Le nom est obligatoire.',
    //    'newUser.email.email' => 'The Email Address format is not valid.',
    //];

    //protected $validationAttributes = [
    //    'newUser.email' => 'email address'
    //];
    public function render(){

        Carbon::setLocale('fr');

        return view('livewire.utilisateurs.index', [
            'users' => User::latest()->paginate(6),
        ])->extends('layouts.master')
            ->section('contenu');
    }

    public function goToAddUser(){
        $this->currentPage = PAGECREATE;
    }

    public function goToListUsers(){
        $this->currentPage = PAGELIST;
    }

    public function goToEdittUser($id){
        $this->editUser = User::find($id)->toArray();
        $this->currentPage = PAGEEDIT;    
        $this->populateRolesPermissions();    
    }
    public function populateRolesPermissions(){
       $this->rolesPermissions['roles'] = []; 
       $this->rolesPermissions['permissions'] = []; 

       $mapForCB = function($value){
        return $value['id'];
       };

        $rolesIds = array_map($mapForCB, User::find($this->editUser['id'])->roles->toArray());
        $permissionIds = array_map($mapForCB, User::find($this->editUser['id'])->permissions->toArray());

        foreach(Role::all() as $role){
            if(in_array($role->id, $rolesIds)){
                array_push($this->rolesPermissions['roles'], 
                ['role_id'=>$role->id, 'role_nom'=>$role->nom, 'active'=>true]);
            }else{
                array_push($this->rolesPermissions['roles'], 
                ['role_id'=>$role->id, 'role_nom'=>$role->nom, 'active'=>false]);
            }
        }
      
        foreach(Permission::all() as $permission){
            if(in_array($permission->id, $permissionIds)){
                array_push($this->rolesPermissions['permissions'], 
                ['permission_id'=>$permission->id, 'permission_nom'=>$permission->nom, 'active'=>true]);
            }else{
                array_push($this->rolesPermissions['permissions'], 
                ['permission_id'=>$permission->id, 'permission_nom'=>$permission->nom, 'active'=>false]);
            }
        }
        //dump($this->rolesPermissions);
    }
    public function updateRolesPermissions(){
        DB::table("user_role")->where('user_id',$this->editUser['id'])->delete();
        DB::table("user_permission")->where('user_id',$this->editUser['id'])->delete();

        foreach($this->rolesPermissions['roles']as $role){
            if($role['active']){
                User::find($this->editUser['id'])->roles()->attach($role['role_id']);
            }
        }
        foreach($this->rolesPermissions['permissions'] as $permission){
            if($permission['active']){
                User::find($this->editUser['id'])->permissions()->attach($permission['permission_id']);
            }
        }

        $this->dispatchBrowserEvent(
            'showSuccessEditMessage',
            ['message' => "Roles et permissions mis a jour avec succès!"]
        );
    }


    public function addUser(){
        $validationAttributes = $this->validate();
        $validationAttributes["newUser"]['password'] = 'password';
        $validationAttributes["newUser"]['photo'] = 'photo';
        User::create($validationAttributes["newUser"]);

        $this->newUser = [];

        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ['message' => 'Utilisateur créé avec succès!']
        );
    }
    public function confirmDelete($name,$id){
        $this->dispatchBrowserEvent(
            'showConfirmMessage', [
            'message' =>[
                'text' => "Vous etes sur sur le point de supprimer $name de la liste des utilisateurs voules-vous continuer?",
                'title' => "Vous etes sur?",
                'icon' => "warning",
                'data' => [
                'user_id' => $id,
                    ]
        ]]);
    }

    public function deleteUser($id){
        User::destroy($id);
        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ['message' => 'Utilisateur supprimé avec succès!']
        );
    }




    public function updateUser(){
        $validationAttributes = $this->validate();
        
        User::find($this->editUser['id'])->update($validationAttributes["editUser"]);
        $this->dispatchBrowserEvent(
            'showSuccessEditMessage',
            ['message' => "Utilisateur créé avec succès!"]
        );
    }




    public function confirmPwdReset(){
        $this->dispatchBrowserEvent(
            'showConfirmMessage', [
            'message' =>[
                'text' => "Vous etes sur sur le point de réinitialiser 
                    le mot de passe de". $this->editUser['name']." de la liste des utilisateurs.
                    Voules-vous continuer?",
                'title' => "Vous etes sur?",
                'icon' => "warning",
                'data' => [
                'user_id' => $this->editUser['id'],
                    ]
        ]]);
    }
    public function resetPassword(){
        User::find($this->editUser['id'])
        ->update(['password'=>Hash::make(DEFAULTPASSWORD)]);
        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ['message' => "Le mot de passe a été bien réinitialiser!"]
        );

    }
}
