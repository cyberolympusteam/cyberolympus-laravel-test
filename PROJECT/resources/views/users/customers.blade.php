<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) == 0)
            <tr>
                <td colspan="6" class="text-center">No Customer Data</td>
            </tr>
            @else
            @foreach($datas as $k => $v)
            <tr>
                <td>
                    <a href="javascript:void(0)">#{{ $v->id }}</a>
                </td>
                <td>{{ $v->first_name }}</td>
                <td>{{ $v->last_name }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->phone }}</td>
                <td></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    
    @if(count($datas) > 0)
    {!!  $datas->links() !!}
    @endif
</div>
