<x-core.views::layouts.app>
    <x-slot name="sidebar">
    <x-core.views::layouts.navbars.auth.sidebar moduleName="hr">
    </x-core.views::layouts.navbars.auth.sidebar>
</x-slot>

  <x-slot name="pageHeader">
    @include('core.views::components.layouts.navbars.auth.content-header', [ "pageTitile" => "Compliance Standards Management"])
</x-slot>



    <livewire:data-tables.data-table-manager model="App\Modules\Hr\Models\ComplianceStandard"
    pageTitle="Compliance Standards Management"
    queryFilters=[]
    :hiddenFields="[
  'onTable' =>
  [
  ],
  'onNewForm' =>
  [
  ],
  'onEditForm' =>
  [
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
