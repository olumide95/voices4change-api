<?php 

namespace App\Exports;

use App\Submission;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class RequestExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Submission::query()->select('id','name','country','state', 'motivation','message',DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y %r") as date'));
           
    }

    public function headings(): array
    {
            return [  
                'id',
                'name',
                'country',
                'state',
                'motivation',
                'message',
                'date'
            ];

    }

    
}
