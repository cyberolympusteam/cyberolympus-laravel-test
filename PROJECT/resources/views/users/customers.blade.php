<div>
    <table class="table table-striped table">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
        </tr>
        @if(count($datas) == 0)
        <tr>
            <td colspan="6" class="text-center">No Customer Data</td>
        </tr>
        @else
        @foreach($datas as $k => $v)
        <tr>
            <td>
                <a href="">#{{ $v->id }}</a>
            </td>
            <td>{{ $v->first_name }}</td>
            <td>{{ $v->last_name }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->phone }}</td>
            <td></td>
        </tr>
        @endforeach
        @endif
    </table>

    @if(count($datas) > 0)
    {!!  $datas->links() !!}
    @endif
</div>
