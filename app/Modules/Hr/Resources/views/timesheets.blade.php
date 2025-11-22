

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="time"  moduleName="hr">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="time" moduleName="hr">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\hr\Models\Timesheet"
            pageTitle="Timesheets"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [],
    'onNewForm' => [
    '0' => 'submitted_at',
    '1' => 'approved_at',
    '2' => 'approved_by',
],
    'onEditForm' => [
    '0' => 'approved_at',
    '1' => 'approved_by',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


