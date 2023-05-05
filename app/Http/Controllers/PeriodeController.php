<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Mpusatkendali;
use App\Models\Viewstatus;
use App\Models\Mperiode;

class PeriodeController extends Controller
{
    
    public function index(request $request)
    {
        $template='top';
        return view('periode.index',compact('template'));
    }
    public function modal(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=encoder($request->id);
        
        $data=Mperiode::find($id);
        if($id==0){
            $disabled='';
            
        }else{
            $disabled='disabled';
            
        }
        // dd($kode_usulan);
        return view('periode.modal',compact('template','data','disabled','id'));
    }

    
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $query = Viewstatus::query();
        $data = $query->orderBy('id','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn='
                    <div class="btn-group" style="margin:0px">
                        <span class="btn btn-secondary btn-sm" onclick="tambah(`'.coder($row->id).'`)"><i class="bx bx-pencil"></i></span>
                        <span class="btn btn-danger btn-sm"  onclick="delete_data(`'.coder($row->id).'`)"><i class="bx bx-trash-alt"></i></span>
                    </div>
                ';
                return $btn;
            })
            ->addColumn('act', function ($row) {
                if($row->active==1){
                    $btn='
                        <div class="btn-group" style="margin:0px">
                            <span class="btn btn-secondary btn-sm" onclick="proses_inactive(`'.coder($row->id).'`)">Active</span>
                        </div>
                    ';
                }else{
                    $btn='
                        <div class="btn-group" style="margin:0px">
                            <span class="btn btn-danger btn-sm" onclick="proses_active(`'.coder($row->id).'`)">Inactive</span>
                        </div>
                    ';
                }
                    
                return $btn;
            })
            
            ->rawColumns(['action','act'])
            ->make(true);
    }

    public function delete_data(request $request){
        $id=encoder($request->id);
        $data = Mperiode::where('id',$id)->update(['active'=>0]);
    }
    public function proses_active(request $request){
        $id=encoder($request->id);
        // $all = Mperiode::update(['active'=>0]);
        $data = Mperiode::where('id',$id)->update(['active'=>1]);
        $non = Mperiode::where('id','!=',$id)->update(['active'=>0]);
    }
    public function proses_inactive(request $request){
        $id=encoder($request->id);
        // $all = Mperiode::update(['active'=>0]);
        $data = Mperiode::where('id',$id)->update(['active'=>0]);
    }

   
    public function save(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        
        $rules['start_date']= 'required|date';
        $messages['start_date.required']= 'Lengkapi kolom start date';

        $rules['end_date']= 'required|date';
        $messages['end_date.required']= 'Lengkapi kolom end date';

        $rules['status_id']= 'required';
        $messages['status_id.required']= 'Lengkapi kolom status periode';
        
        $rules['tahun']= 'required';
        $messages['tahun.required']= 'Lengkapi kolom tahuh periode';
        
       
        $validator = Validator::make($request->all(), $rules, $messages);
        $val=$validator->Errors();


        if ($validator->fails()) {
            echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">';
                foreach(parsing_validator($val) as $value){
                    
                    foreach($value as $isi){
                        echo'-&nbsp;'.$isi.'<br>';
                    }
                }
            echo'</div></div>';
        }else{
           
            
                $cek=Mperiode::count();
                $data=Mperiode::UpdateOrcreate([
                    'tahun'=>$request->tahun,
                ],[
                    'start_date'=>$request->start_date,
                    'end_date'=>$request->end_date,
                    'status_id'=>$request->status_id,
                    
                ]);
                echo'@ok';
        }
    }
}
