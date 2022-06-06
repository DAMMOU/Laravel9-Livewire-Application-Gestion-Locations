<div>
   <h1>Page utilisateurs livewire</h1>
<div class=" p-4 pt-6">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary ">

                <h3 class="card-title d-flex align-items-center">
                <i class="fas fa-users fa-2x mr-2"></i>
                    Liste des utilisateurs
                </h3>
                <div class="card-tools d-flex align-items-center ">
                    <a class="btn btn-link text-white mr-4 d-block">
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

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th style="width:5%;">-</th>
                            <th style="width:25%;">Utilisateurs</th>
                            <th style="width:20%;">Roles</th>
                            <th style="width:20%;">Ajouté</th>
                            <th style="width:30%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-warning">Pending</span></td>
                            <td>
                            <button class="btn btn-link" ><i class="far fa-edit"></i> </button>
                            <button class="btn btn-link"><i class="far fa-trash-alt"></i> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            </div>

        </div>
    </div>
</div>
</div>
