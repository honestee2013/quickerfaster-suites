

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\system\Models\Company"
            pageTitle="Companies"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'database_name',
    '1' => 'billing_address_line_2',
],
    'onNewForm' => [
    '0' => 'database_name',
    '1' => 'status',
],
    'onEditForm' => [
    '0' => 'subdomain',
    '1' => 'database_name',
],
    'onQuery' => [
    '0' => 'database_name',
],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


