

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\system\Models\Plan"
            pageTitle="Plans"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'description',
    '1' => 'slug',
    '2' => 'sort_order',
],
    'onNewForm' => [],
    'onEditForm' => [
    '0' => 'slug',
],
    'onQuery' => [
    '0' => 'slug',
    '1' => 'sort_order',
],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


