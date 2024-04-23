<?php

namespace App\Http\Controllers;

use App\Imports\DebtorsImport;
use App\Models\Debtor;
use App\Models\Status_notification;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class StatusNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $debtorNotifications = Debtor::where("status_id", 1)->paginate(10);

        return view('adminhtml.notifications.index', compact('debtorNotifications'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminhtml.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'file_upload' => 'required|mimes:xlsx,xls'
        ]);
        $file = $request->file('file_upload');

        $data = Excel::toArray([], $file)[0];


        foreach ($data as $row) {


            $search = Debtor::where('credit_number', $row[0])->first();

            if ($search) {
                $search->status_id = 1;
                $search->save();
            } 

        }

        return redirect()->route('statusNotifications.index')->with('success','Notification sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status_notification  $status_notification
     * @return \Illuminate\Http\Response
     */
    public function show(Status_notification $status_notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status_notification  $status_notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Status_notification $status_notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status_notification  $status_notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status_notification $status_notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status_notification  $status_notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status_notification $status_notification)
    {
        //
    }
}
