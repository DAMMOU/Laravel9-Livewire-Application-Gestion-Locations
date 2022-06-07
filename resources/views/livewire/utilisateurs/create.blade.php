<div class="row p-4 pt-6 ">
    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x mr-3"></i>Formulaire d'ajouter un nouvel utilisateur</h3>
        </div>


        <form role="form" wire:submit.prevent='addUser()'>
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control @error('newUser.name')is-invalid @enderror"  
                            placeholder="Nom" wire:model='newUser.name'>
                            @error('newUser.name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Prenom</label>
                            <input type="text" class="form-control @error('newUser.prenom')is-invalid @enderror"  
                            placeholder="Prenom" wire:model='newUser.prenom'>
                            @error('newUser.prenom')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label>Sexe</label>
                    <select class="form-control @error('newUser.sexe')is-invalid @enderror" 
                    wire:model='newUser.sexe'>
                        <option value="">---</option>
                        <option value="M">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                    @error('newUser.sexe')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Adresse e-mail</label>
                    <input type="email" class="form-control @error('newUser.email')is-invalid @enderror"  
                    placeholder="Enter email " 
                    wire:model='newUser.email'>
                    @error('newUser.email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Téléphone 1 </label>
                            <input type="text" class="form-control @error('newUser.telephone1') is-invalid @enderror"  
                            placeholder="telephone 1" wire:model='newUser.telephone1'>
                            @error('newUser.telephone1')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Téléphone 2 </label>
                            <input type="text" class="form-control @error('newUser.telephone2')is-invalid @enderror"  
                            placeholder="Téléphone 2"wire:model='newUser.telephone2'>
                            @error('newUser.telephone2')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Piece d'identité</label>
                    <select class="form-control @error('newUser.pieceIdentite') is-invalid @enderror" 
                    wire:model='newUser.pieceIdentite'>
                        <option value="">---</option>
                        <option value="Passport">Passport</option>
                        <option value="Permis">Permis</option>
                        <option value="CIN">CIN</option>
                    </select>
                    @error('newUser.pieceIdentite')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Numero de piece d'identité</label>
                    <input type="text" class="form-control @error('newUser.numeroPieceIdentite')is-invalid @enderror" 
                    wire:model='newUser.numeroPieceIdentite'>
                    @error('newUser.numeroPieceIdentite')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


               
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" class="form-control" disabled placeholder="Password">
                </div>
                
               
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-danger float-right"wire:click="goToListUsers()" >Retourner à la liste</button>
            </div> 
        </form>
    </div>
</div>
<script>
    window.addEventListener('showSuccessMessage',event=>{
        Swal.fire({
            postion: 'top-end',
            icon: 'success',
            toast: true,
            title: event.detail.message || 'Opération effectuée avec succè!',
            showConfirmButton: false,
            timer: 3000
        })
    })
</script>