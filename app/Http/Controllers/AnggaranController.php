<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Mpusatkendali;
use App\Models\Manggaran;
use App\Models\Viewanggaran;
use App\Models\Tusulan;

class AnggaranController extends Controller
{
    
    public function index(request $request)
    {
        $template='top';
        if($request->group==""){
            $group='F';
        }else{
            $group=$request->group;
        }
        return view('anggaran.index',compact('template','group'));
    }
    public function modal(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=encoder($request->id);
        
        $data=Viewanggaran::find($id);
        if($id==0){
            $disabled='';
            
        }else{
            $disabled='readonly';
            
        }
        $kode_group=$request->kode_group;
        $nama_group=nama_group($request->kode_group);
        // dd($kode_usulan);
        return view('anggaran.modal',compact('template','data','disabled','id','kode_group','nama_group'));
    }

    
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $query = Viewanggaran::query();
        $data = $query->where('status',1)->where('kode_group',$request->kode_group)->orderBy('kode_form','Asc')->get();

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
        
        $rules['nomor']= 'required|numeric';
        $messages['nomor.required']= 'Lengkapi kolom nomor';
        
        $rules['jenis_anggaran']= 'required';
        $messages['jenis_anggaran.required']= 'Lengkapi Jenis Anggaran';

        $rules['kode_pk']= 'required';
        $messages['kode_pk.required']= 'Pilih Pusat Kendali';
        
        
       
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
                $kode_form=$request->kode_group.$request->nomor;
                $cek=Manggaran::where('kode_form',$kode_form)->count();
                if($cek>0){
                    echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">Kode Form sudah terdaftar</div></div>';
                }else{
                
                    $data=Manggaran::create([
                        'kode_pk'=>$request->kode_pk,
                        'nomor'=>$request->nomor,
                        'kode_group'=>$request->kode_group,
                        'kode_form'=>$kode_form,
                        'jenis_anggaran'=>$request->jenis_anggaran,
                        'status'=>1,
                        'nik'=>auth_nik(),
                        'created_at'=>date('Y-m-d H:i:s'),
                        'update_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok';
                }
                
            }else{
                $data=Manggaran::where('id',$request->id)->update([
                    'jenis_anggaran'=>$request->jenis_anggaran,
                    'kode_pk'=>$request->kode_pk,
                    'update_at'=>date('Y-m-d H:i:s'),
                ]);

                echo'@ok';
            }
        }
    }
}
