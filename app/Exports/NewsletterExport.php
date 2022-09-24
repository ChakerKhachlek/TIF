<?php

namespace App\Exports;

use App\Models\Newsletter;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsletterExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Newsletter::all();
    }

    public function headings(): array
    {
        return Schema::getColumnListing('newsletters');

    }
}
