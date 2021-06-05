<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Live Search</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Products info </h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" class="form-controller" id="search" name="search"/>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        {{--$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });--}}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{ route('search') }}',
                data:{'search':$value},
                success:function(data){
                    $('tbody').html(data);
                    console.log(data);
                }
            });
        })
    </script>

</body>
</html>