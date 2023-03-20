<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane show active" id="striped-rows-preview">
                <div class="table-responsive-sm">
                    <table class="table table-striped table-centered m-0 font-16" id="striped-rows-preview">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donhang as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->user->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    @switch($item->active)
                                        @case(1)
                                            <i class="mdi mdi-circle text-primary"></i> Chờ duyệt
                                            @break
                                        @case(2)
                                            <i class="mdi mdi-circle text-warning"></i> Đang giao
                                            @break
                                        @case(3)
                                            <i class="mdi mdi-circle text-success"></i> Đã giao
                                            @break
                                        @case(0)
                                            <i class="mdi mdi-circle text-danger"></i> Hủy
                                            @break
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admindonhang.view',['id'=>$item->id])}}" class="btn btn-outline-dark btn-rounded">Xem</a>

                                @switch($item->active)
                                        @case(1)
                                            <a href="" data-url="{{route('admindonhang.duyetdon')}}" data-dh="{{$item->id}}" data-value="{{$item->active}}" class="btn btn-outline-dark btn-rounded btn-duyetdon">Duyệt</a>
                                            <a href="" data-url="{{route('admindonhang.huydon')}}" data-dh="{{$item->id}}" data-value="{{$item->active}}" class="btn btn-outline-dark btn-rounded btn-huydon">Hủy</a>
                                            @break
                                        @case(2)
                                            <a href="" data-url="{{route('admindonhang.xacnhandon')}}" data-dh="{{$item->id}}" data-value="{{$item->active}}" class="btn btn-outline-dark btn-rounded btn-xacnhangiao">Xác nhận giao</a>
                                            <a href="" data-url="{{route('admindonhang.huydon')}}" data-dh="{{$item->id}}" data-value="{{$item->active}}" class="btn btn-outline-dark btn-rounded btn-huydon">Hủy</a>
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3 text-center d-flex justify-content-center">
            {{$donhang->links()}}
        </div>
    </div>
</div>
