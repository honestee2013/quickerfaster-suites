<x-core.views::layouts.app>
    <x-slot name="sidebar">
    <x-core.views::layouts.navbars.auth.sidebar moduleName="hr">
    </x-core.views::layouts.navbars.auth.sidebar>
</x-slot>

  <x-slot name="pageHeader">
    @include('core.views::components.layouts.navbars.auth.content-header', [ "pageTitile" => "Attendance & Earning"])
</x-slot>

  <x-core.views::tab-bar>
    <x-hr.views::layouts.navbars.auth.attendance-and-earning-tab-bar-links active='daily-earnings' />
</x-core.views::tab-bar>


    <livewire:data-tables.data-table-manager model="App\Modules\Hr\Models\DailyEarning"
    pageTitle="Daily Earnings Overview"
    queryFilters=[]
    :hiddenFields="[
  'onTable' => 
  [
    0 => 'employee_profile_id',
  ],
  'onNewForm' => 
  [
    0 => 'employee_profile_id',
  ],
  'onEditForm' => 
  [
    0 => 'employee_profile_id',
  ],
  'onQuery' => 
  [
  ],
]"
    :queryFilters="[
]"
/>


    <x-slot name="pageFooter">
    @include('core.views::components.layouts.navbars.auth.content-footer', [ ])
</x-slot>

</x-core.views::layouts.app>
