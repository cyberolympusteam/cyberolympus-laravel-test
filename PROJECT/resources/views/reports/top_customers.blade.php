<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Total Buy</th>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) == 0)
            <tr>
                <td colspan="3" class="text-center">No Customer Data</td>
            </tr>
            @else
            @foreach($datas as $k => $v)
            <tr>
                <td>#{{ $v['id'] }}</td>
                <td>{{ $v['first_name'] }} {{ $v['last_name'] }}</td>
                <td>{{ $v['price'] }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
