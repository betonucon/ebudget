<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Munit;
use Illuminate\Support\Facades\Hash;
use App\Models\Tusulan;
use App\Models\Vunit;
use App\Models\Employe;
use App\Models\Vemploye;

class EmployeController extends Controller
{
    
    public function index(request $request)
    {
        $template='top';
        return view('employe.index',compact('template'));
    }
    public function modal(request $request)
    {
        error_reporting(0);
        $template='top';
        $data=Vemploye::find($request->id);
        $idkey=$request->id;
        if($request->id==0){
            $disabled='';
            
        }else{
            $disabled='disabled';
            
        }
        // dd($kode_usulan);
        return view('employe.modal',compact('template','data','disabled','idkey'));
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
        $data = Vemploye::orderBy('name','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn='
                        <div class="btn-group" style="margin:0px">
                            <span class="btn btn-secondary btn-sm" onclick="tambah(`'.$row->id.'`)"><i class="bx bx-pencil"></i></span>
                          
                        </div>
                    ';
                return $btn;
            })
            
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete_data(request $request){
        $data = Employe::where('id',$request->id)->update(['aktif'=>0]);
    }

   
    public function save(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        
        $rules['name']= 'required';
        $messages['name.required']= 'Lengkapi kolom Nama Karyawan';
        $rules['role_id']= 'required';
        $messages['role_id.required']= 'Lengkapi kolom Otorisasi';

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
            
                
                $data=Employe::UpdateOrcreate([
                    'id'=>$request->id,
                ],[
                    'name'=>$request->name,
                    'role_id'=>$request->role_id,
                    'admin'=>$request->admin,
                    
                ]);
               
                echo'@ok';
           
        }
    }
}
