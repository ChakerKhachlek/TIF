<?php

namespace App\Exports;

use App\Models\Owner;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class OwnersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Owner::all();
    }

    public function headings(): array
    {
        return Schema::getColumnListing('owners');

    }
}
