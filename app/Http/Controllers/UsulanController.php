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
        if(in_array($usulan_id,array(1,2))){
            return view('usulan.view',compact('template','data','disabled','usulan_id','kode_usulan','mst','ide'));
        }
        elseif(in_array($usulan_id,array(5,6))){
            return view('usulan.view_2',compact('template','data','disabled','usulan_id','kode_usulan','mst','ide'));
        }else{
            return view('usulan.view_3',compact('template','data','disabled','usulan_id','kode_usulan','mst','ide'));
        }
        
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

   
    public function save(request $request,$usulan_id){
        error_reporting(0);
        $rules = [];
        $messages = [];
        if(in_array($usulan_id,array(1,2))){
        
                $rules['kode_form']= 'required';
                $messages['kode_form.required']= 'Lengkapi kolom id form';
                
                $rules['nama_barang']= 'required';
                $messages['nama_barang.required']= 'Lengkapi kolom Nama Barang';
                
                $rules['qty']= 'required';
                $messages['qty.required']= 'Lengkapi kolom Qty ada';
                
                $rules['qty_order']= 'required';
                $messages['qty_order.required']= 'Lengkapi kolom Qty Beli';
                
                $rules['spesifikasi']= 'required';
                $messages['spesifikasi.required']= 'Lengkapi kolom spesifikasi';
                
                $rules['harga']= 'required';
                $messages['harga.required']= 'Lengkapi kolom harga';
                
                $rules['m_matauang_id']= 'required';
                $messages['m_matauang_id.required']= 'Lengkapi kolom mata uang';
                
                $rules['tujuan_id']= 'required';
                $messages['tujuan_id.required']= 'Lengkapi kolom tujun=an';

                $data=Usulan::create([
                    'Usulan'=>$request->Usulan,
                    'aktif'=>1,
                ]);
        }
       
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
                $mst=Musulan::where('id',$usulan_id)->first();
                $no_dokumen=no_dokumen($mst->kode);
                if(in_array($usulan_id,array(1,2))){
                    $data=Usulan::create([
                        'no_dokumen'=>$no_dokumen,
                        'kode_group'=>$mst->kode,
                        'kode_form'=>$request->kode_form,
                        'nama_barang'=>$request->nama_barang,
                        'qty'=>$request->qty,
                        'qty_order'=>$request->qty_order,
                        'spesifikasi'=>$request->spesifikasi,
                        'harga'=>$request->harga,
                        'm_matauang_id'=>$request->m_matauang_id,
                        'tujuan_id'=>$request->tujuan_id,
                        'harga'=>$request->harga,
                        'tahun'=>date('Y'),
                        'bulan'=>date('m'),
                        'aktif'=>1,
                    ]);

                    echo'@ok';
                }else{

                }
                
            }else{
                $data=Usulan::where('id',$request->id)->update([
                    'Usulan'=>$request->Usulan,
                ]);

                echo'@ok';
            }
        }
    }
}
