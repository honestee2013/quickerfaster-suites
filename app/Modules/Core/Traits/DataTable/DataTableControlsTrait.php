<?php

namespace App\Modules\Core\Traits\DataTable;


trait DataTableControlsTrait
{



    public function getPreparedControls($controls) {
        dd("aaaaa");
        if (!is_array($controls) && $controls == strtolower("all"))
            return $this->getDataTableAllControls();
        else if (is_array($controls))
            return $controls; // Do nothing

    }




    public function getDataTableAllControls()
    {
        return [
            'addButton' => true,
            'files' => [
                'export' => ['xls', 'csv', 'pdf'],
                'import' => ['xls', 'csv'],
                'print',
            ],
            'bulkActions' => [
                'export' => ['xls', 'csv', 'pdf'],
                'delete',
            ],
            'perPage' => [5, 10, 25, 50, 100, 200, 500],
            'search' => true,
            'showHideColumns' => true,
        ];
    }


    public function getDataTableFilesControls()
    {
        return [
            'files' => [
                'export' => ['xls', 'csv', 'pdf'],
                'import' => ['xls', 'csv'],
                'print',
            ]
        ];
    }

}


