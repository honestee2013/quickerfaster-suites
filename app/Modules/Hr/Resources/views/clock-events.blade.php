

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    
    
    

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\hr\Models\ClockEvent"
            pageTitle="Clock Events"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [],
    'onNewForm' => [],
    'onEditForm' => [],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


