<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTour;
use App\Models\Tour;
use Validator;

class LoaiTourController extends Controller
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

            return datatables()->of(LoaiTour::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->maloai.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->maloai.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.loaitour_manage');
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
      $rules = array(
          'tenloai'    =>  'required',

      );

      $error = Validator::make($request->all(), $rules);

      if($error->fails())
      {
          return response()->json(['errors' => $error->errors()->all()]);
      }



      $form_data = array(
          'tenloai'        =>  $request->tenloai,

      );

      LoaiTour::create($form_data);

      return response()->json(['success' => 'Data Added successfully.']);
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
     if(request()->ajax())
        {
            $data = LoaiTour::where('maloai', $id)->firstOrFail();
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id="")
    {
        $rules = array(
                 'tenloai'    =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }


        $form_data = array(
            'tenloai'        =>  $request->tenloai

        );
        LoaiTour::where('maloai', $request->hidden_id)->update($form_data);

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
      $tour = Tour::where('loaitour',$id);
      if($tour)
      return response()->json(['errors' => 'LỖI : Loại tour này đang được khai thác']);
      else {
        $data = LoaiTour::find($id);
         $data->delete();
      }
    }
}
