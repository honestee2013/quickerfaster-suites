<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr" />
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="people" moduleName="hr" />
    </x-slot>

    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="people" moduleName="hr" />
    </x-slot>

    <livewire:qf::wizards.wizard-manager wizard-id="employee_onboarding" module="hr" />
</x-qf::livewire.bootstrap.layouts.app>