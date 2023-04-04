          <ul class="metismenu" id="menu">
            <li class="@if(Request::is('usulan/*')==1) mm-active @endif">
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-file"></i>
                </div>
                <div class="menu-title">Usulan</div>
              </a>
              <ul>
                @foreach(get_usulan() as $usl)
                    <li> <a href="{{url('usulan/'.$usl->id)}}"><i class="bi bi-circle"></i>{{$usl->nama_usulan}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="@if(Request::is('master/*')==1) mm-active @endif">
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-collection"></i>
                </div>
                <div class="menu-title">Master</div>
              </a>
              <ul>
                
                    <li> <a href="{{url('master/pusatkendali')}}"><i class="bi bi-circle"></i>Pusat Kendali</a></li>
                    <li> <a href="{{url('master/group')}}"><i class="bi bi-circle"></i>Group</a></li>
                    <li> <a href="{{url('master/periode')}}"><i class="bi bi-circle"></i>Periode</a></li>
                    <li> <a href="{{url('master/anggaran')}}"><i class="bi bi-circle"></i>Anggaran</a></li>
               
              </ul>
            </li>
           
          </ul>