          <ul class="metismenu" id="menu">
            <li class="@if(Request::is('usulan/*')==1) mm-active @endif">
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
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
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Master</div>
              </a>
              <ul>
                
                    <li> <a href="{{url('master/pusatkendali')}}"><i class="bi bi-circle"></i>Pusat Kendali</a></li>
                    <li> <a href="{{url('master/group')}}"><i class="bi bi-circle"></i>Group</a></li>
               
              </ul>
            </li>
           
          </ul>