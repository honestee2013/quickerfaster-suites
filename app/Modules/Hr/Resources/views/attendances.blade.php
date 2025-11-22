

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\hr\Models\Attendance"
            pageTitle="Attendance"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'approved_by',
    '1' => 'approved_at',
    '2' => 'sessions',
],
    'onNewForm' => [
    '0' => 'is_approved',
    '1' => 'approved_by',
    '2' => 'approved_at',
],
    'onEditForm' => [
    '0' => 'is_approved',
    '1' => 'approved_by',
    '2' => 'approved_at',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


