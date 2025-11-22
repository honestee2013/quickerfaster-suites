

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\system\Models\Module"
            pageTitle="Modules"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'description',
    '1' => 'migration_path',
    '2' => 'service_provider',
],
    'onNewForm' => [],
    'onEditForm' => [
    '0' => 'slug',
],
    'onQuery' => [
    '0' => 'migration_path',
    '1' => 'service_provider',
],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


