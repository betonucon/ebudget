<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Mpusatkendali;
use App\Models\Mgroup;

class GroupController extends Controller
{
    
    public function index(request $request)
    {
        $template='top';
        return view('group.index',compact('template'));
    }
    public function modal(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=encoder($request->id);
        
        $data=Mgroup::find($id);
        if($id==0){
            $disabled='';
            
        }else{
            $disabled='disabled';
            
        }
        // dd($kode_usulan);
        return view('group.modal',compact('template','data','disabled','id'));
    }

    
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $query = Mgroup::query();
        $data = $query->where('status',1)->orderBy('kode_group','Asc')->get();

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
            
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete_data(request $request){
        $id=encoder($request->id);
        $data = Mgroup::where('id',$id)->update(['status'=>0]);
    }

   
    public function save(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        
        $rules['kode_group']= 'required';
        $messages['kode_group.required']= 'Lengkapi kolom kode group';
        
        $rules['nama_group']= 'required';
        $messages['nama_group.required']= 'Lengkapi kolom nama group';
       
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
                
                $cek=Mgroup::where('kode_group',$request->kode_group)->count();
                if($cek>0){
                    echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">Kode PK sudah terdaftar</div></div>';
                }else{
                
                    $data=Mgroup::create([
                        'kode_group'=>$request->kode_group,
                        'nama_group'=>$request->nama_group,
                        'deskripsi_group'=>$request->deskripsi_group,
                        'status'=>1,
                        'nik'=>auth_nik(),
                        'created_at'=>date('Y-m-d H:i:s'),
                        'update_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok';
                }
                
            }else{
                $data=Mgroup::where('id',$request->id)->update([
                    'nama_group'=>$request->nama_group,
                    'deskripsi_group'=>$request->deskripsi_group,
                    'update_at'=>date('Y-m-d H:i:s'),
                ]);

                echo'@ok';
            }
        }
    }
}
