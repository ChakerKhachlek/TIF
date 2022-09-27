<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Newsletter;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\NewsletterExport;
use Maatwebsite\Excel\Facades\Excel;

class NewsletterComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selectedNews;

    public function render()
    {
        $data=Newsletter::paginate(10);
        return view('livewire.dashboard.newsletter-component',['data'=>$data]);
    }

    public function exportExcel(){

        return Excel::download(new NewsletterExport, 'newsletter.xlsx');

    }

    public function export(){

        $data=Newsletter::all()->sortBy('created_at');
       $pdf = PDF::loadView('PDF.newsletter-export', compact('data'))->output();

return response()->streamDownload(
    fn () => print($pdf),
    'newsletter.pdf'
    );

    }

    public function deleteNewsMode($id){
        $this->selectedNews=$id;
    }

    public function deleteNews(){
    $record=Newsletter::findOrFail($this->selectedNews);
    $record->delete();
    $this->emit('news-deleted','Registred email deleted successfully !');
    }
}
