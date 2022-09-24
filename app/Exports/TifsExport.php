<?php

namespace App\Exports;

use App\Models\Tif;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TifsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tif::with('categories')->get();
    }

    public function headings(): array
    {
        return Schema::getColumnListing('tifs');

    }
}
