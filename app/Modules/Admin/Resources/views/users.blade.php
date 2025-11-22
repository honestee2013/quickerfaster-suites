

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="admin">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="users & permissions"  moduleName="admin">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="users & permissions" moduleName="admin">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\admin\Models\User"
            pageTitle="Users"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'password',
    '1' => 'remember_token',
    '2' => 'email_verified_at',
],
    'onNewForm' => [
    '0' => 'email_verified_at',
    '1' => 'remember_token',
    '2' => 'status',
],
    'onEditForm' => [
    '0' => 'password',
    '1' => 'password_confirmation',
    '2' => 'remember_token',
    '3' => 'email_verified_at',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


