<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Cabang;

class CabangController extends Controller
{
    public function index()
    {
        $title = 'Data cabang';
        $subtitle = 'List cabang';
        return view('cabang.cabang_index', compact('title', 'subtitle'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function yajra(Request $request)
    {
        $users = DB::table('cabang')
        ->join('kota', 'cabang.kota', '=', 'kota.id')
        ->select('cabang.id','cabang.nama', 'kota.nama_kota', 'cabang.alamat', 'cabang.telp')
        ->get();
            $datatables = Datatables::of($users)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                return '<center><a href="cabang/'.$row->id.'" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a> 
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-danger deleteData"><i class="fa fa-trash"></i> Delete</a></center>';
            });

        return $datatables->make(true);
    }
    
    public function get()
    {
        $get = DB::table('cabang')
        ->join('kota', 'cabang.kota', '=', 'kota.id')
        ->select('cabang.id','cabang.nama', 'kota.nama_kota', 'cabang.alamat', 'cabang.telp')
        ->get();
        $response=[
            'status'=>'success',
            'message'=>'Data Cabang list',
            'data' => $get,
        ];

        return response()->json($response, 200);
    }

    public function add()
    {
        $title = 'cabang';
        $subtitle = 'Add cabang';
        return view('cabang/cabang_add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'nama'    =>  'required',
            'kota' =>  'required',
            'alamat' =>  'required',
            'telp' =>  'required'
        ]);
         Cabang::insert([
            'nama'=>$request->nama,
            'kota'=>$request->kota,
            'alamat'=>$request->alamat,
            'telp'=>$request->telp,
         ]);
         return redirect('cabang')
         ->with('success','cabang Created successfully'); 
    }
    
    public function edit($id)
    {
        $title = 'cabang';
        $subtitle = 'Edit Cabang';
        $data = DB::table('cabang')
        ->JOIN('kota', 'cabang.kota', '=', 'kota.id')
        ->SELECT('cabang.*', 'kota.nama_kota')
        ->WHERE('cabang.id', $id)->first();
        // $data = Cabang::where('id',$id)->first();
        return view('cabang/cabang_edit', compact('title', 'subtitle', 'data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    =>  'required',
            'kota' =>  'required',
            'alamat' =>  'required',
            'telp' =>  'required'
        ]);
        cabang::where('id',$id)->update([
            'nama'=>$request->nama,
            'kota'=>$request->kota,
            'alamat'=>$request->alamat,
            'telp'=>$request->telp,
            ]);
        return redirect('cabang')
        ->with('update','cabang updated successfully');
    }

    public function delete($id)
    {
        Cabang::destroy($id);
    	return redirect('cabang/cabang_index') ->with('delete',' Delete cabang successfully');
    }

    public function getdata(Request $request)
    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("kota")
            		->select("id","nama_kota")
            		->where('nama_kota','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }

}
