<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    //public $isBtnAddClicked = false;
    public $currentPage = PAGELIST;
    public $newUser = [];
    public $editUser = [];

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
    public function render()
    {
        return view('livewire.utilisateurs.index', [
            'users' => User::latest()->paginate(6),
        ])
            ->extends('layouts.master')
            ->section('contenu');
    }

    public function goToAddUser()
    {
        $this->currentPage = PAGECREATE;
    }
    public function goToListUsers()
    {
        $this->currentPage = PAGELIST;
    }
    public function goToEdittUser($id)
    {
        $this->editUser = User::find($id)->toArray();
        $this->currentPage = PAGEEDIT;
        

    }
    public function addUser()
    {
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


    public function confirmDelete($name,$id)
    {
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
            'showSuccesssMessage',
            ['message' => "Utilisateur créé avec succès!"]
        );
    }
}
