<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use Validator;
class YeuCauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Notification::join('users', 'notification.user_id', '=', 'users.id')
                ->select( 'notification.*', 'users.name as username')
                ->latest()->get())
                    ->addColumn('action', function($data){
                    	  $button = '<a  title="Tải về" class="btn btn-info btn-sm" href="download/'.$data->file_name.'" download="'.$data->file_name.'"><i class ="fa fa-download"></i></a>';
                           $button .= '&nbsp;&nbsp;';
                        $button .= '<input style="float: right;" type="checkbox" name="status" class="status" value="'.$data->id.'" />';
                      
                        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.yeucau_manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function Xoa(Request $request)
    {

            foreach ($request->id as $value) {
               $data = Notification::find($value);
                        $data->delete();
}
           
    }
        public function XuLy(Request $request)
    {

            foreach ($request->id as $value) {
               $data = Notification::find($value);
               $user = $data->user_id;
               $data->status = 1;
               $data->save();

               $form_data = array(
        'role' =>  1,
        );
           User::whereId($user)->update($form_data);
            }
        
    }
    public function update($id)
    {

       	$data = Notification::find($id);
         $user = $data->user_id;
 		$form_data = array(
        'status' =>  1,
        );
        $data->update($form_data);

       
        $form_data2 = array(
        'role' =>  1,
        );
           User::whereId($user)->update($form_data2);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
          $data = Notification::find($id);
           $data->delete();
        

    }
}
