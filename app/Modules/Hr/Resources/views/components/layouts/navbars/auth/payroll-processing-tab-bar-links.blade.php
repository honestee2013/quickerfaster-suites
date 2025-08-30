<x-core.views::layouts.navbars.sidebar-link-item
    iconClasses="fas fa-money-bill-wave"
    url="hr/payroll-runs"
    title="Payroll Runs"
    anchorClasses="{{ ($active == 'payroll_runs')? 'active': ''}}"
/>


<x-core.views::layouts.navbars.sidebar-link-item
    iconClasses="fas fa-users-cog"
    url="hr/payroll-employees"
    title="Payroll Employees"
    anchorClasses="{{ ($active == 'payroll-employees')? 'active': ''}}"
/>

