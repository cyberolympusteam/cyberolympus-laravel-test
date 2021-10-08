
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Store Name</th>
                <th>Open Time</th>
                <th>Subscription</th>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) == 0)
            <tr>
                <td colspan="6" class="text-center">No Agent Data</td>
            </tr>
            @else
            @foreach($datas as $k => $v)
            <tr>
                <td>
                    @if($v->agent)
                    <a href="javascript:void(0)">#{{ $v->agent['partner_id'] }}</a>
                    @else
                    <a href="javascript:void(0)">#{{ $v->id }}</a>
                    @endif
                </td>
                <td>
                    @if($v['agent'])
                    {{ $v['agent']->store_name }}
                    @else
                    {{ $v->first_name }} {{ $v->last_name }}
                    @endif
                </td>
                <td>
                    @if($v['agent'])
                    {{ $v['agent']->store_open }}-{{ $v['agent']->store_close }}
                    @endif
                </td>
                <td>
                    @if($v['agent'])
                    <span class="badge badge-primary">{{ $v['agent']->subscription }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    
    @if(count($datas) > 0)
    {!!  $datas->links() !!}
    @endif
</div>
