<?php

namespace App\Http\Controllers;
use App\Submission;
use App\Exports\RequestExport;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
class SubmissionController extends Controller
{
    /**
     * submit response
     *
     * @return void
     */
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'country' => 'required',
            'message' => 'required',
            'motivation' => 'required',     
            
        ]);
        $data = $request->all();
        $sumission = Submission::create($data);

        Mail::send('report', $data, function ($message) use($data) {
            $message->from('no-reply@voices4change.org', 'New Submision');

            $message->to(env('ADMIN_EMAIL'));
           
        });

        return response()->json(array_merge(['message'=>'Submission sent successfully!'],['status_code' => 200]),200);
    }

    public function export()
    {
        $data = Excel::raw(new RequestExport, \Maatwebsite\Excel\Excel::XLS);
        Mail::send('report', [], function ($message) use($data) {
            $message->from('no-reply@voices4change.org', 'Submissions');

            $message->to(env('ADMIN_EMAIL'));
            $message->attachData($data, 'submissions.xls', [
                    'mime' => 'application/xls',
                ]);
        });
       
    }

    
}
