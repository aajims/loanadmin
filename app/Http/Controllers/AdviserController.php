<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Adviser;
use DataTables;

class AdviserController extends Controller
{
    public $path;

    public function __construct()
    {
        // $this->path = storage_path('public/images');
       
    }

    public function index()
    {
        $title = 'Data Adviser';
        $subtitle = 'List Adviser';
        $advisor = Adviser::all();
        return view('adviser.adviser_index', compact('title', 'subtitle', 'advisor'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function get()
    {
        $advis = Adviser::all();
        $response=[
            'status'=>'success',
            'message'=>'Data Adviser list',
            'data' => $advis,
        ];

        return response()->json($response, 200);
    }

    public function getdetail($id)
    {
        $advis = Adviser::where('id',$id)->first();
        $response=[
            'status'=>'success',
            'message'=>'Data Adviser list',
            'data' => $advis,
        ];

        return response()->json($response, 200);
    }

    public function yajra(Request $request)
    {
        $users = Adviser::select([
             'id','nama', 'company', 'email', 'summary']);
            $datatables = Datatables::of($users)
            ->addIndexColumn()
            ->addColumn('action',function($head){
                return '<center><a href="adviser/'.$head->id.'" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a> 
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$head->id.'" data-original-title="Delete" class="btn btn-sm btn-danger deleteData"><i class="fa fa-trash"></i> Delete</a></center></center>';
            });
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Adviser';
        $subtitle = 'Add Adviser';
        return view('adviser/adviser_add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {  
        $request->validate([
            'nama'    =>  'required',
            'company' =>  'required',
            'email' =>  'required',
            'summary' =>  'required'
        ]);

         Adviser::insert([
            'nama'=>$request->nama,
            'company'=>$request->company,
            'email'=>$request->email,
            'summary'=>$request->summary,
            'experience'=>$request->experience,
            'education'=>$request->education,
            'path'=>$request->path,
         ]);
         return redirect('adviser')
         ->with('success','adviser Created successfully'); 
    }
    
    public function edit($id)
    {
        $title = 'Adviser';
        $subtitle = 'Edit adviser';
        $data = Adviser::where('id',$id)->first();
        return view('adviser.adviser_edit', compact('title', 'subtitle', 'data'));
    }

    public function update(Request $request, $id)
    {  
        $request->validate([
            'nama'    =>  'required',
            'company' =>  'required',
            'email' =>  'required',
            'summary' =>  'required'
        ]);
        Adviser::where('id',$id)->update([
            'nama'=>$request->nama,
            'company'=>$request->company,
            'email'=>$request->email,
            'summary'=>$request->summary,
            'experience'=>$request->experience,
            'education'=>$request->education,
            'path'=>$request->path,
            ]);
        return redirect('adviser')
        ->with('update','Adviser updated successfully');
    }

    public function delete($id)
    {
        Adviser::destroy($id);
    	return redirect('adviser/adviser_index') ->with('delete','Adviser Delete successfully');
    }
}
