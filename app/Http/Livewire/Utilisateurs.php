<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $isBtnAddClicked = false;

    public $newUser =[];

    protected $rules = [
        'newUser.name' => 'required',
        'newUser.prenom' => 'required',
        'newUser.sexe' => 'required',
        'newUser.email' => 'required|email | unique:users,email',
        'newUser.telephone1' => 'required|numeric',
        'newUser.telephone2' => 'numeric',
        'newUser.pieceIdentite' => 'required',
        'newUser.numeroPieceIdentite' => 'numeric',
        
    ];

    //protected $messages = [
    //    'newUser.nom.required' => 'Le nom est obligatoire.',
    //    'newUser.email.email' => 'The Email Address format is not valid.',
    //];

    //protected $validationAttributes = [
    //    'newUser.email' => 'email address'
    //];
    public function render()
    {
        return view('livewire.utilisateurs.index',[
            'users' => User::latest()->paginate(6),
        ])
        ->extends('layouts.master')
        ->section('contenu');
    }

    public function goToAddUser(){
        $this->isBtnAddClicked = true;
    }
    public function goToListUsers(){
        $this->isBtnAddClicked = false;
    }
    public function addUser(){

        $validationAttributes = $this->validate();
        $validationAttributes["newUser"]['password'] = 'password';
        $validationAttributes["newUser"]['photo'] = 'photo';
        User::create($validationAttributes["newUser"]);

        $this->newUser = [];

        $this->dispatchBrowserEvent('showSuccessMessage',
            ['message' => 'Utilisateur créé avec succès!']);
    }
}
