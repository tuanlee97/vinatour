<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;
use App\Models\User;
use Validator;
class Comment_TourController extends Controller
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
           return datatables()->of(BinhLuan::join('users', 'binhluan.user_id', '=', 'users.id')
                    ->join('tour', 'binhluan.tour_id', '=', 'tour.id')
                ->select( 'binhluan.*', 'users.name as username', 'tour.tentour as tentour')
                ->latest()->get())
                    ->addColumn('action', function($data){
                          
                        $button = '<input style="" type="checkbox" name="status" class="status" value="'.$data->id.'" />';
                      
                        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.comment_tour_manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function Xoa(Request $request)
    {

            foreach ($request->id as $value) {
               $data = BinhLuan::find($value);
                        $data->delete();
}
           
    }
        public function XuLy(Request $request)
    {

            foreach ($request->id as $value) {
               $data = BinhLuan::find($value);
              
               $data->status = 1;
               $data->save();

              
         
            }
        
    }
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
    public function update($id)
    {

        $data = BinhLuan::find($id);
         
        $form_data = array(
        'status' =>  1,
        );
        $data->update($form_data);

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
        
          $data = BinhLuan::find($id);
           $data->delete();
        

    }
}
