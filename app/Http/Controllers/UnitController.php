<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Munit;
use App\Models\Tusulan;

class UnitController extends Controller
{
    
    public function index(request $request)
    {
        $template='top';
        return view('unit.index',compact('template'));
    }
    public function modal(request $request)
    {
        error_reporting(0);
        $template='top';
        $data=Munit::find($request->id);
        $idkey=$request->id;
        if($request->id==0){
            $disabled='';
            
        }else{
            $disabled='disabled';
            
        }
        // dd($kode_usulan);
        return view('unit.modal',compact('template','data','disabled','idkey'));
    }

    public function get_nik(request $request){
        error_reporting(0);
        $json = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/'.$request->nik);
        $item = json_decode($json,true);
        
        $unit=$item;
        $personnel_no=$unit['personnel_no'];
        $name=$unit['name'];
        if($name==""){
            echo'Null@Null';
        }else{
            echo $name.'@'.$unit['position_name'];
        }

    }
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $data = Munit::orderBy('nama_unit','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn='
                    <div class="btn-group" style="margin:0px">
                        <span class="btn btn-white btn-sm" onclick="location.assign(`'.url('master/Usulan/create?id='.$row->id).'`)">X</span>
                        <span class="btn btn-white btn-sm"  onclick="delete_data('.$row['id'].')">S</span>
                    </div>
                ';
                return $btn;
            })
            
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete_data(request $request){
        $data = Munit::where('id',$request->id)->update(['aktif'=>0]);
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
