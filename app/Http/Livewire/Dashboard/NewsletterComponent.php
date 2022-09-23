<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Newsletter;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;

class NewsletterComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data=Newsletter::paginate(10);
        return view('livewire.dashboard.newsletter-component',['data'=>$data]);
    }

    public function export(){

        $data=Newsletter::all()->sortBy('created_at');
       $pdf = PDF::loadView('PDF.newsletter-export', compact('data'))->output();

return response()->streamDownload(
    fn () => print($pdf),
    'newsletter.pdf'
    );

    }
}
