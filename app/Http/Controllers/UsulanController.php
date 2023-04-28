<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Musulan;
use App\Models\Usulan;
use App\Models\Tusulan;
use App\Models\Viewusulan;
use App\Models\Tdetailusulan;

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
        // dd(Auth::user());
        $template='top';
       
        $usulan_id=$id;
        $ide=encoder($request->id);
        $mst=Musulan::find($id);
        $data=Viewusulan::find($ide);
        if($request->id==0){
            $disabled='';
          
        }else{
            $disabled='disabled';
          
        }
        // dd($data);
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
        $mst=Musulan::where('id',$id)->first();
        $data = Viewusulan::where('kode_group',$mst->kode_group)->orderBy('id','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $mst=Musulan::where('kode_group',$row->kode_group)->first();
                $btn='
                    <div class="btn-group" style="margin:0px">
                        <span class="btn btn-secondary btn-sm" onclick="location.assign(`'.url('usulan').'/'.$mst->id.'/view?id='.coder($row->id).'`)"><i class="bx bx-pencil"></i></span>
                        <span class="btn btn-danger btn-sm"  onclick="delete_data(`'.coder($row->id).'`)"><i class="bx bx-trash-alt"></i></span>
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
        $count=count((array) $request->bulan);
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

                if($count==0){
                    $rules['bulan']= 'required';
                    $messages['bulan.required']= 'Pilih periode';
                }


        }
        if(in_array($usulan_id,array(5,6))){
        
                $rules['kode_form']= 'required';
                $messages['kode_form.required']= 'Lengkapi kolom id form';
                
                $rules['pekerjaan']= 'required';
                $messages['pekerjaan.required']= 'Lengkapi kolom Pekerjaan';
                
                $rules['nilai_pekerjaan']= 'required';
                $messages['nilai_pekerjaan.required']= 'Lengkapi kolom Nilai Pekerjaan';
                
                $rules['m_matauang_id']= 'required';
                $messages['m_matauang_id.required']= 'Lengkapi kolom mata uang';
                
                $rules['tujuan_id']= 'required';
                $messages['tujuan_id.required']= 'Lengkapi kolom tujun=an';

                if($count==0){
                    $rules['bulan']= 'required';
                    $messages['bulan.required']= 'Pilih periode';
                }


        }
        if(in_array($usulan_id,array(3,4,7))){
        
                if($request->id==0){
                    $rules['kode_form']= 'required';
                    $messages['kode_form.required']= 'Lengkapi kolom id form';
                }
                    
                $rules['aktifitas']= 'required';
                $messages['aktifitas.required']= 'Lengkapi kolom aktifitas';
                
                
                $rules['m_matauang_id']= 'required';
                $messages['m_matauang_id.required']= 'Lengkapi kolom mata uang';
                
                
                if($request->periode_nilai==1){
                    if($count==0){
                        $rules['bulan']= 'required';
                        $messages['bulan.required']= 'Pilih periode';

                        
                    }else{
                        $jum=0;
                        for($x=0;$x<$count;$x++){
                            $bb=$request->bulan[$x];
                            if($request->nillai[$bb]=="" || $request->nillai[$bb]==0){
                                $jum+=0;
                            }else{
                                $jum+=1;
                            }
                            echo $request->nillai[$bb].' -'.$request->bulan[$x].'<br>';
                        }
                        if($count!=$jum){
                            $rules['value']= 'required';
                            $messages['value.required']= 'Isi nilai pada kolom yang dicentang'.$count.'-'.$jum;
                        }
                        
                    }

                }else{
                    $rules['nilai_tahunan']= 'required';
                    $messages['nilai_tahunan.required']= 'Lengkapi kolom Nilai Pertahun';
                }
                


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
                if(unit_employe()->singkatan=="" || unit_employe()->singkatan=="Null"){
                    echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">- Singkatan unit kerja tidak tersedia</div></div>';
                }else{
                    $mst=Musulan::where('id',$usulan_id)->first();
                    $no_dokumen=no_dokumen($mst->kode_group);
                    if(in_array($usulan_id,array(1,2))){
                        $data=Tusulan::create([
                            'no_dokumen'=>$no_dokumen,
                            'kode_group'=>$mst->kode_group,
                            'm_usulan_id'=>$usulan_id,
                            'kode_form'=>$request->kode_form,
                            'nama_barang'=>$request->nama_barang,
                            'cost_center'=>auth_employe()->cost_ctr,
                            'kode_unit'=>auth_employe()->kode_unit,
                            'qty'=>$request->qty,
                            'qty_order'=>$request->qty_order,
                            'spesifikasi'=>$request->spesifikasi,
                            'nik_keyperson'=>Auth::user()->employeeNumber,
                            'harga'=>$request->harga,
                            'm_matauang_id'=>$request->m_matauang_id,
                            'm_tujuan_id'=>$request->tujuan_id,
                            'harga'=>$request->harga,
                            'tahun'=>date('Y'),
                            'bulan'=>date('m'),
                            'aktif'=>1,
                            'status_id'=>1,
                        ]);

                        for($x=0;$x<$count;$x++){
                            $detail=Tdetailusulan::UpdateOrcreate([
                                't_usulan_id'=>$data->id,
                                'bulan'=>$request->bulan[$x],
                                'tahun'=>date('Y'),
                            ],[
                                'sts'=>0,
                            ]);
                        }
                        echo'@ok';
                    }
                    if(in_array($usulan_id,array(3,4,7))){
                        $data=Tusulan::create([
                            'no_dokumen'=>$no_dokumen,
                            'kode_group'=>$mst->kode_group,
                            'm_usulan_id'=>$usulan_id,
                            'kode_form'=>$request->kode_form,
                            'periode_nilai'=>$request->periode_nilai,
                            'cost_center'=>auth_employe()->cost_ctr,
                            'kode_unit'=>auth_employe()->kode_unit,
                            
                            'aktifitas'=>$request->aktifitas,
                            'nik_keyperson'=>Auth::user()->employeeNumber,
                            'm_matauang_id'=>$request->m_matauang_id,
                            
                            'tahun'=>date('Y'),
                            'bulan'=>date('m'),
                            'aktif'=>1,
                            'status_id'=>1,
                        ]);
                        if($request->periode_nilai==1){
                            for($x=0;$x<$count;$x++){
                                $bb=$request->bulan[$x];
                                $detail=Tdetailusulan::UpdateOrcreate([
                                    't_usulan_id'=>$data->id,
                                    'bulan'=>$request->bulan[$x],
                                    'tahun'=>date('Y'),
                                ],[
                                    'value'=>$request->nillai[$bb],
                                    'sts'=>0,
                                ]);
                            }
                        }else{
                            $data=Tusulan::UpdateOrcreate([
                                'id'=>$data->id,
                            ],[
                                'harga'=>$request->nilai_tahunan,
                            ]);
                        }
                        echo'@ok';
                    }
                    if(in_array($usulan_id,array(5,6))){
                        $data=Tusulan::create([
                            'no_dokumen'=>$no_dokumen,
                            'kode_group'=>$mst->kode_group,
                            'm_usulan_id'=>$usulan_id,
                            'kode_form'=>$request->kode_form,
                            'periode_nilai'=>$request->periode_nilai,
                            'cost_center'=>auth_employe()->cost_ctr,
                            'kode_unit'=>auth_employe()->kode_unit,
                            'm_tujuan_id'=>$request->tujuan_id,
                            'nilai_pekerjaan'=>$request->nilai_pekerjaan,
                            'pekerjaan'=>$request->pekerjaan,
                            'nik_keyperson'=>Auth::user()->employeeNumber,
                            'm_matauang_id'=>$request->m_matauang_id,
                            'tahun'=>date('Y'),
                            'bulan'=>date('m'),
                            'aktif'=>1,
                            'status_id'=>1,
                        ]);
                        for($x=0;$x<$count;$x++){
                            $detail=Tdetailusulan::UpdateOrcreate([
                                't_usulan_id'=>$data->id,
                                'bulan'=>$request->bulan[$x],
                                'tahun'=>date('Y'),
                            ],[
                                'sts'=>0,
                            ]);
                        }
                        echo'@ok';
                    }
                }
                
                
            }else{
                if(in_array($usulan_id,array(1,2))){
                    $data=Tusulan::create([
                        'no_dokumen'=>$no_dokumen,
                        'kode_group'=>$mst->kode_group,
                        'm_usulan_id'=>$usulan_id,
                        'kode_form'=>$request->kode_form,
                        'nama_barang'=>$request->nama_barang,
                        'cost_center'=>auth_employe()->cost_ctr,
                        'kode_unit'=>auth_employe()->kode_unit,
                        'qty'=>$request->qty,
                        'qty_order'=>$request->qty_order,
                        'spesifikasi'=>$request->spesifikasi,
                        'nik_keyperson'=>Auth::user()->employeeNumber,
                        'harga'=>$request->harga,
                        'm_matauang_id'=>$request->m_matauang_id,
                        'm_tujuan_id'=>$request->tujuan_id,
                        'harga'=>$request->harga,
                        'tahun'=>date('Y'),
                        'bulan'=>date('m'),
                        'aktif'=>1,
                    ]);

                    for($x=0;$x<$count;$x++){
                        $delete=Tdetailusulan::where('t_usulan_id',$request->id)->delete();
                        $detail=Tdetailusulan::UpdateOrcreate([
                            't_usulan_id'=>$data->id,
                            'bulan'=>$request->bulan[$x],
                            'tahun'=>date('Y'),
                        ],[
                            'sts'=>0,
                        ]);
                    }
                    echo'@ok';
                }
                if(in_array($usulan_id,array(3,4,7))){
                    $data=Tusulan::UpdateOrcreate([
                        'id'=>$request->id,
                    ],[
                        'periode_nilai'=>$request->periode_nilai,
                        'aktifitas'=>$request->aktifitas,
                        'nik_keyperson'=>Auth::user()->employeeNumber,
                        'm_matauang_id'=>$request->m_matauang_id,
                    ]);
                    if($request->periode_nilai==1){
                        $delete=Tdetailusulan::where('t_usulan_id',$request->id)->delete();
                        for($x=0;$x<$count;$x++){
                            $bb=$request->bulan[$x];
                            $detail=Tdetailusulan::UpdateOrcreate([
                                't_usulan_id'=>$request->id,
                                'bulan'=>$request->bulan[$x],
                                'tahun'=>date('Y'),
                            ],[
                                'value'=>$request->nillai[$bb],
                            ]);
                        }
                    }else{
                        $delete=Tdetailusulan::where('t_usulan_id',$request->id)->delete();
                        $data=Tusulan::UpdateOrcreate([
                            'id'=>$request->id,
                        ],[
                            'harga'=>$request->nilai_tahunan,
                        ]);
                    }
                    echo'@ok';
                }
                if(in_array($usulan_id,array(5,6))){
                    $data=Tusulan::create([
                        'no_dokumen'=>$no_dokumen,
                        'kode_group'=>$mst->kode_group,
                        'm_usulan_id'=>$usulan_id,
                        'kode_form'=>$request->kode_form,
                        'nilai_pekerjaan'=>$request->nilai_pekerjaan,
                        'pekerjaan'=>$request->pekerjaan,
                        'cost_center'=>auth_employe()->cost_ctr,
                        'kode_unit'=>auth_employe()->kode_unit,
                        
                        'm_tujuan_id'=>$request->m_tujuan_id,
                        'nik_keyperson'=>Auth::user()->employeeNumber,
                        'm_matauang_id'=>$request->m_matauang_id,
                        'tahun'=>date('Y'),
                        'bulan'=>date('m'),
                        'aktif'=>1,
                    ]);
                    for($x=0;$x<$count;$x++){
                        $delete=Tdetailusulan::where('t_usulan_id',$request->id)->delete();
                        $detail=Tdetailusulan::UpdateOrcreate([
                            't_usulan_id'=>$data->id,
                            'bulan'=>$request->bulan[$x],
                            'tahun'=>date('Y'),
                        ],[
                            'sts'=>0,
                        ]);
                    }
                    echo'@ok';
                }
            }
        }
    }
}
