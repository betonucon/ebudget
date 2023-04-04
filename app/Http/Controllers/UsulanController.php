<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Musulan;
use App\Models\Tusulan;

class UsulanController extends Controller
{
    
    public function index(request $request,$id)
    {
        $template='top';
        $data=Musulan::where('id',$id)->first();
        $ide=$id;
       
        return view('usulan.index',compact('template','data','ide'));
    }
    public function view(request $request,$id)
    {
        error_reporting(0);
        $template='top';
       
        $usulan_id=$id;
        $ide=encoder($request->id);
        $mst=Musulan::find($id);
        $data=Tusulan::find($ide);
        if($request->id==0){
            $disabled='';
            $kode_usulan=penomoran($id);
        }else{
            $disabled='disabled';
            $kode_usulan=$data->kode_usulan;
        }
        // dd($kode_usulan);
        return view('usulan.view',compact('template','data','disabled','idkey','usulan_id','kode_usulan','mst','ide'));
    }
    public function get_data(request $request,$id)
    {
        error_reporting(0);
        $data = Musulan::where('id',$id)->orderBy('id','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn='
                    <div class="btn-group">
                        <span class="btn btn-white btn-sm" onclick="location.assign(`'.url('master/Usulan/create?id='.$row->id).'`)"><i class="fas fa-pencil-alt text-blue"></i></span>
                        <span class="btn btn-white btn-sm"  onclick="delete_data('.$row['id'].')"><i class="fas fa-trash text-green"></i></span>
                    </div>
                ';
                return $btn;
            })
            
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete_data(request $request){
        $data = Usulan::where('id',$request->id)->update(['aktif'=>0]);
    }

   
    public function save(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        
        $rules['Usulan']= 'required';
        $messages['Usulan.required']= 'Lengkapi kolom Usulan';
       
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
            if($request->id==0){
                
                $data=Usulan::create([
                    'Usulan'=>$request->Usulan,
                    'aktif'=>1,
                ]);

                echo'@ok';
                
            }else{
                $data=Usulan::where('id',$request->id)->update([
                    'Usulan'=>$request->Usulan,
                ]);

                echo'@ok';
            }
        }
    }
}
