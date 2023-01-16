<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Mpusatkendali;
use App\Models\Tusulan;

class PusatkendaliController extends Controller
{
    
    public function index(request $request)
    {
        $template='top';
        return view('pusat_kendali.index',compact('template'));
    }
    public function modal(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=encoder($request->id);
        
        $data=Mpusatkendali::find($id);
        if($id==0){
            $disabled='';
            
        }else{
            $disabled='disabled';
            
        }
        // dd($kode_usulan);
        return view('pusat_kendali.modal',compact('template','data','disabled','id'));
    }

    
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $query = Mpusatkendali::query();
        $data = $query->where('status',1)->orderBy('kode_pk','Asc')->get();

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
        $data = Mpusatkendali::where('id',$id)->update(['status'=>0]);
    }

   
    public function save(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        
        $rules['kode_pk']= 'required';
        $messages['kode_pk.required']= 'Lengkapi kolom kode PK';
        
        $rules['aktivitas_pk']= 'required';
        $messages['aktivitas_pk.required']= 'Lengkapi kolom aktivitas';
        
        $rules['nama_pk']= 'required';
        $messages['nama_pk.required']= 'Lengkapi kolom deskripsi';
       
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
                
                $cek=Mpusatkendali::where('kode_pk',$request->kode_pk)->count();
                if($cek>0){
                    echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">Kode PK sudah terdaftar</div></div>';
                }else{
                
                    $data=Mpusatkendali::create([
                        'kode_pk'=>$request->kode_pk,
                        'nama_pk'=>$request->nama_pk,
                        'aktivitas_pk'=>$request->aktivitas_pk,
                        'status'=>1,
                        'nik'=>auth_nik(),
                        'created_at'=>date('Y-m-d H:i:s'),
                        'update_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok';
                }
                
            }else{
                $data=Mpusatkendali::where('id',$request->id)->update([
                    'nama_pk'=>$request->nama_pk,
                    'aktivitas_pk'=>$request->aktivitas_pk,
                    'update_at'=>date('Y-m-d H:i:s'),
                ]);

                echo'@ok';
            }
        }
    }
}
