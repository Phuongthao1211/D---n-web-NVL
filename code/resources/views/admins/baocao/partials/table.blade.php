<div class="tab-content mt-3">
    <div class="tab-pane show active data-table" id="buttons-table-preview">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Ngày</th>
                <th>Doanh thu</th>
                <th>Số lượng sản phẩm bán ra</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item['ngay']}}</td>
                    <td>{{number_format($item['doanhthu'])}} VNĐ</td>
                    <td>{{$item['soluong']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
