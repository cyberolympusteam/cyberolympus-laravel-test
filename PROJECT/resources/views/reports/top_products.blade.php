<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) == 0)
            <tr>
                <td colspan="3" class="text-center">No Product Data</td>
            </tr>
            @else
            @foreach($datas as $k => $v)
            <tr>
                <td>#{{ $v['id'] }}</td>
                <td>{{ $v['product_name'] }}</td>
                <td>{{ $v['qty'] }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
