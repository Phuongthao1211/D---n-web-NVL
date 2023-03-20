<ul class="conversation-list" data-simplebar="" style="max-height: 537px">
    @foreach($binhluan as $bl)
        <li class="clearfix">
            <div class="chat-avatar">
                <div class="avatar-sm">
                    <span class="avatar-title bg-success rounded-circle">
                        <i class="uil uil-chat-bubble-user font-24"></i>
                    </span>
                </div>
            </div>
            <div class="conversation-text">
                <div class="ctext-wrap">
                    <i>
                        {{$bl->created_at}}
                        @for($i=1;$i<=$bl->danhgia;$i++)
                            <span class="text-warning mdi mdi-star"></span>
                        @endfor
                    </i>
                    <i class="font-18">{{$bl->user->name}}</i>
                    <p class="font-16">
                        {{$bl->binhluan}}
                    </p>
                </div>
            </div>
            <div class="conversation-actions dropdown">
                <a href="" data-url="{{route('admin.dashboard.delete')}}" data-id="{{$bl->id}}" class="btn btn-danger btn-delete-bt"><i class="mdi mdi-window-close"></i> </a>
            </div>
        </li>
    @endforeach
</ul>
