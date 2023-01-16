<?php

function bulan($bulan)
{
   Switch ($bulan){
      case '01' : $bulan="Januari";
         Break;
      case '02' : $bulan="Februari";
         Break;
      case '03' : $bulan="Maret";
         Break;
      case '04' : $bulan="April";
         Break;
      case '05' : $bulan="Mei";
         Break;
      case '06' : $bulan="Juni";
         Break;
      case '07' : $bulan="Juli";
         Break;
      case '08' : $bulan="Agustus";
         Break;
      case '09' : $bulan="September";
         Break;
      case 10 : $bulan="Oktober";
         Break;
      case 11 : $bulan="November";
         Break;
      case 12 : $bulan="Desember";
         Break;
      }
   return $bulan;
}
function kata($text){
    $da=substr($text,0,15);
    return $da;
}
// function insert_user(){
//     $exp=explode('@',Auth::user()->email);
//     $cek=App\Models\Employe::where('username',Auth::user()->employeeNumber)->count();
//     $posisi=posisi(Auth::user()->employeeNumber)['position_name'];
//     $cost_ctr=posisi(Auth::user()->employeeNumber)['cost_ctr'];
//     if($cost_ctr=='111815'){
//         if(substr_count($posisi,'Superintendent')>0){
//             $role=3;
//         }else{
//             if(substr_count($posisi,'Manager')>0){
//                 $role=6;
//             }else{
//                 $role=4;
//             } 
//         }
//     }else{
//         if(substr_count($posisi,'Superintendent')>0){
//             $role=2;
//         }else{
//             if(substr_count($posisi,'Manager')>0){
//                 $role=5;
//             }else{
//                 $role=1;
//             } 
//         }
//     }
//     if($cek>0){
//         $data=App\Models\Employe::where('username',Auth::user()->employeeNumber)->update([
//             'update'=>date('Y-m-d H:i:s'),
//             'posisi'=>$posisi,
//             // 'role_id'=>$role,
//             'unit'=>posisi(Auth::user()->employeeNumber)['org_unit_name'],
//             'cost_ctr'=>posisi(Auth::user()->employeeNumber)['cost_ctr'],
//             'unit_singkatan'=>singkatan_unit(posisi(Auth::user()->employeeNumber)['org_unit_name']),
//         ]);
//     }else{
//         $data=App\Models\Employe::create([
//             'name'=>Auth::user()->name,
//             'username'=>Auth::user()->employeeNumber,
//             'role_id'=>$role,
//             'role_utama'=>$role,
//             'email'=>Auth::user()->email,
//             'password'=>Auth::user()->password,
//             'posisi'=>$posisi,
//             'admin'=>1,
//             'unit'=>posisi(Auth::user()->employeeNumber)['org_unit_name'],
//             'cost_ctr'=>posisi(Auth::user()->employeeNumber)['cost_ctr'],
//             'unit_singkatan'=>singkatan_unit(posisi(Auth::user()->employeeNumber)['org_unit_name']),
//             'nik'=>Auth::user()->employeeNumber,
//             'update'=>date('Y-m-d H:i:s')
//         ]);
//     }
// }
function posisi($nik){
    error_reporting(0);
    $json = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/'.$nik);
    $item = json_decode($json,true);
    
    $unit=$item;
    return $unit;
}
function get_bos($nik){
    error_reporting(0);
    $json = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/'.$nik.'/bosses');
    $item = json_decode($json,true);
    
    $unit=$item;
    return $unit;
}
function get_cost($cost_ctr){
    error_reporting(0);
    $json = file_get_contents('https://portal.krakatausteel.com/eos/api/structdisp/costCenter/'.$cost_ctr);
    $item = json_decode($json,true);
        
    $unit=$item;
    return $unit;
}

function url_plug(){
    $data=url('/');
    return $data;
}
function coder($text){
    $data=base64_encode(base64_encode($text));
    return $data;
}
function encoder($text){
    $data=base64_decode(base64_decode($text));
    return $data;
}
function barcoderider($id,$w,$h){
    $d = new Milon\Barcode\DNS2D();
    $d->setStorPath(__DIR__.'/cache/');
    return $d->getBarcodeHTML($id, 'QRCODE',$w,$h);
}
function barcoderr($id){
    $d = new Milon\Barcode\DNS2D();
    $d->setStorPath(__DIR__.'/cache/');
    return $d->getBarcodePNGPath($id, 'PDF417');
}
function parsing_validator($url){
    $content=utf8_encode($url);
    $data = json_decode($content,true);
 
    return $data;
}

function tanggal_indo_full($tgl){
    $data=date('d/m/Y H:i:s',strtotime($tgl));
    return $data;
}

?>