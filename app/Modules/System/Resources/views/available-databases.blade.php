

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="system">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="system"  moduleName="system">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="system" moduleName="system">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\system\Models\AvailableDatabase"
            pageTitle="Available Databases"
            queryFilters=[]
            :hiddenFields="[]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


