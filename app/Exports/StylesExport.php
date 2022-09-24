<?php

namespace App\Exports;

use App\Models\Style;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StylesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Style::all();
    }

    public function headings(): array
    {
        return Schema::getColumnListing('styles');

    }
}
