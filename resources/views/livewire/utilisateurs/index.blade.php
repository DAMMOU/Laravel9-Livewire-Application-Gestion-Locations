<div>

    @if($currentPage == PAGECREATE)
        @include('livewire.utilisateurs.create');
    @endif

    @if($currentPage == PAGELIST)
        @include('livewire.utilisateurs.liste');
    @endif
    
    @if($currentPage == PAGEEDIT)
        @include('livewire.utilisateurs.edit');

    @endif

</div>
