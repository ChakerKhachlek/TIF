<?php

namespace App\Exports;

use App\Models\Bid;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BidsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bid::with('tif')->get();
    }
    public function headings(): array
    {
        return Schema::getColumnListing('bids');

    }
}
