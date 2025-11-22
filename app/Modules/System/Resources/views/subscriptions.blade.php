

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\system\Models\Subscription"
            pageTitle="Subscriptions"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'provider_subscription_id',
    '1' => 'canceled_at',
    '2' => 'current_period_start',
    '3' => 'current_period_end',
],
    'onNewForm' => [
    '0' => 'status',
    '1' => 'trial_ends_at',
    '2' => 'ends_at',
    '3' => 'current_period_start',
    '4' => 'current_period_end',
    '5' => 'canceled_at',
    '6' => 'provider_subscription_id',
],
    'onEditForm' => [
    '0' => 'company_id',
    '1' => 'provider_subscription_id',
    '2' => 'canceled_at',
],
    'onQuery' => [
    '0' => 'provider_subscription_id',
    '1' => 'canceled_at',
],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


