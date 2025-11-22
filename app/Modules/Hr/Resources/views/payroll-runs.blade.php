

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="payroll"  moduleName="hr">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="payroll" moduleName="hr">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\hr\Models\PayrollRun"
            pageTitle="Pay Runs"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [],
    'onNewForm' => [
    '0' => 'processed_by',
    '1' => 'processed_at',
],
    'onEditForm' => [
    '0' => 'processed_by',
    '1' => 'processed_at',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


