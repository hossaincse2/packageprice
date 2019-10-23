

@section('htmlheader_title')
PACKAGE QUERY REPORT
@endsection


<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<body style="padding:30px; text-align:center">
    <form style="text-align: center">

        <div align="center">
            <table border="0" align="center" width="921" style="text-align:center;">

                <tr>
                    <td><strong>PACKAGE QUERY REPORT </strong></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>                
                </tr>
 
                @if(isset($request['start_at']))
                <tr>        
                    <td><strong>Date</strong>: {{$request['start_at']}} To {{$request['end_at']}}</td>
                </tr>
                @endif
            </table><br>      

            <table border="0"  class="table table-striped"  style="width:100%">
                <thead>
                    <tr>
                            <th>#SL</th>
                            <th>User Name</th>
                            <th>Order Number</th>
                            <th>Package Name</th>
                            <th>Query Count</th>
                            <th>Domain Name</th>
                            <th>Ip Address</th>
                            <th>Request URl</th>
                            <th>Api Key</th>
                            <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp

                    @foreach ($data as $list)   
                    <tr>
                            <td>{{$i++}}</td>
                            <td>{{$list->user->name}}</td>
                            <td>{{$list->order->order_number}}</td>
                            <td>{{$list->package->package_name}}</td>
                            <td>{{$list->query_count}}</td>
                            <td>{{$list->domain_name}}</td>
                            <td>{{$list->ip_address}}</td>
                            <td>{{$list->request_url}}</td>
                            <td>{{$list->api_key}}</td>
                            <td>{{$list->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </form>
</body>

