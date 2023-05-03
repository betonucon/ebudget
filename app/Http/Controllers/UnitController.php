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
        $data = Vunit::orderBy('nama_unit','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn='
                        <div class="btn-group" style="margin:0px">
                            <span class="btn btn-secondary btn-sm" onclick="tambah(`'.$row->id.'`)"><i class="bx bx-pencil"></i></span>
                            <span class="btn btn-danger btn-sm"  onclick="delete_data('.$row->id.')"><i class="bx bx-trash-alt"></i></span>
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
        if($request->id==0){
            $rules['kode_unit']= 'required';
            $messages['kode_unit.required']= 'Lengkapi kolom kode unit';

            $rules['nama_unit']= 'required';
            $messages['nama_unit.required']= 'Lengkapi kolom nama unit';
        }
        $rules['unit_id']= 'required';
        $messages['unit_id.required']= 'Lengkapi kolom Kategori unit';
        $rules['singkatan']= 'required';
        $messages['singkatan.required']= 'Lengkapi kolom singkatan unit';
        $rules['nik']= 'required';
        $messages['nik.required']= 'Lengkapi kolom NIK Atasan';

        $rules['name_mgr']= 'required';
        $messages['name_mgr.required']= 'Lengkapi kolom Nama Atasan';
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
                
                $data=Munit::UpdateOrcreate([
                    'kode_unit'=>$request->kode_unit,
                ],[
                    'nama_unit'=>$request->nama_unit,
                    'name_mgr'=>$request->name_mgr,
                    'unit_id'=>$request->unit_id,
                    'singkatan'=>$request->singkatan,
                    'nik'=>$request->nik,
                ]);
                $emp=Employe::updateOrCreate(
                    [   
                        'nik'=>$request->nik,
                        
                    ],[
                        'role_id'=>2,
                        'role_utama'=>2,
                        'password'=>Hash::make('admin'),
                        
                        'update'=>date('Y-m-d H:i:s'),
                        'posisi'=>posisi($request->nik)['org_unit_name'],
                        'name'=>Auth::user()->name,
                        'kode_unit'=>kode_unit(posisi($request->nik)['org_unit_name']),
                        'cost_ctr'=>posisi($request->nik)['cost_ctr'],
                    ]
                );
                echo'@ok';
                
            }else{
                $data=Munit::UpdateOrcreate([
                    'id'=>$request->id,
                ],[
                    'name_mgr'=>$request->name_mgr,
                    'nik'=>$request->nik,
                    'unit_id'=>$request->unit_id,
                    'singkatan'=>$request->singkatan,
                ]);
                $emp=Employe::updateOrCreate(
                    [   
                        'nik'=>$request->nik,
                        
                    ],[
                        'role_id'=>2,
                        'role_utama'=>2,
                        'password'=>Hash::make('admin'),
                        
                        'update'=>date('Y-m-d H:i:s'),
                        'posisi'=>posisi($request->nik)['org_unit_name'],
                        'name'=>Auth::user()->name,
                        'kode_unit'=>kode_unit(posisi($request->nik)['org_unit_name']),
                        'cost_ctr'=>posisi($request->nik)['cost_ctr'],
                    ]
                );
                echo'@ok';
            }
        }
    }
}
