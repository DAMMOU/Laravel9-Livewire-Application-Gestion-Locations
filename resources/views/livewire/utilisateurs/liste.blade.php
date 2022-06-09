<div class="row p-4 pt-6">
    <div class="col-12">
        <div class="card">

            <div class="card-header bg-primary ">
                <h3 class="card-title d-flex align-items-center">
                <i class="fas fa-users fa-2x mr-2"></i>
                    Liste des utilisateurs
                </h3>
                <div class="card-tools d-flex align-items-center ">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent ="goToAddUser()">
                        <i class="fas fa-user-plus"></i>
                        Nouvelle utilisateurs
                    </a>

                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">

                   <thead>
                       <tr>
                           <th class="text-center" style="width:5%;">-</th>
                           <th class="text-center" style="width:25%;">Utilisateurs</th>
                           <th class="text-center" style="width:20%;">Roles</th>
                           <th class="text-center" style="width:20%;">Ajouté</th>
                           <th class="text-center" style="width:30%;">Action</th>
                       </tr>
                   </thead>

                   <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td class="text-center">
                                    
                                    @if ($user->sexe=='F') 
                                        <img src="{{asset('images/woman.png')}}" width="24" />
                                    @elseif ($user->sexe=='M') 
                                        <img src="{{asset('images/man.png')}}" width="24"/>
                                    @endif
                                </td>
                                <td class="text-center">{{$user->name}} {{$user->prenom}}</td>
                                <td class="text-center">
                                    
                                        {{$user->allRolesNames}}
                                    
                                </td>
                                <td class="text-center">
                                    <span class="tag tag-warning">{{$user->created_at->diffForHumans()}}</span>
                                </td>
                                <td class="text-center">
                                <button class="btn btn-link" wire:click="goToEdittUser({{$user->id}})"><i class="far fa-edit"></i> </button>
                                <button class="btn btn-link" wire:click="confirmDelete('{{$user->name}} {{$user->prenom}}',{{$user->id}})"><i class="far fa-trash-alt"></i> </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="card-footer">
                <div class="float-right">
                   {{$users->links()}}
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    window.addEventListener('showConfirmMessage', event=>{
        Swal.fire({
            title: event.detail.message.title,
            text: event.detail.message.text,
            icon: event.detail.message.icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, continuer',
            cancelButtonText: 'Annuler'
            })
           .then((result) => {
               if (result.isConfirmed) {
                   @this.deleteUser(event.detail.message.data.user_id)
                }
        })
        
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
    })
</script>