<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 Import Export Excel to database Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>



</head>
<body>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            LARA
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control" id="import">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success " type="submit" disabled >Import User Data</button>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-danger" href="{{ route('export') }}">Export User Data</a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

            </form>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="serach" id="serach" class="form-control" placeholder="Cari data..."/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group input-daterange">
                        <input type="text" name="from_date" id="from_date" readonly class="form-control mr-2" />
                        <div class="input-group-addon mt-2">To</div>
                        <input type="text"  name="to_date" id="to_date" readonly class="form-control ml-2" />
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" name="filter" id="filter" class="btn btn-info ">Filter</button>
                    {{-- <button type="button" name="refresh" id="refresh" class="btn btn-danger ">Refresh</button> --}}
                    <a class="btn btn-danger" href="{{ route('resi') }}">Refresh</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            {{-- <th>Tanggal Order</th> --}}
                            {{-- <th>Nama</th> --}}
                            <th width="5%">No</th>
                            <th width="15%" class="sorting" data-sorting_type="asc" data-column_name="tglOrder" style="cursor: pointer">Tanggal Order <span id="tglOrder_icon"></span></th>
                            <th width="15%" class="sorting" data-sorting_type="asc" data-column_name="nama" style="cursor: pointer">Nama <span id="nama_icon"></span></th>
                            <th width="15%" class="sorting" data-sorting_type="asc" data-column_name="produk" style="cursor: pointer">Produk <span id="produk_icon"></span></th>

                            <th width="20%">Invoice</th>
                            <th width="20%">Resi</th>
                            <th>No HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('resi_data')
                    </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $('input[type=file]').change(function(){
    if($('input[type=file]').val()==''){
        $('button').attr('disabled',true)
    }
    else{
      $('button').attr('disabled',false);
    }
})
</script>
<script>
    $(document).ready(function(){

         function clear_icon()
         {
        //   $('#id_icon').html('');
          $('#tglOrder_icon').html('');
          $('#nama_icon').html('');
          $('#produk_icon').html('');


         }

         function fetch_data(page, sort_type, sort_by, query)
         {
          $.ajax({
           url:"/resi/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
           success:function(data)
           {
            $('tbody').html('');
            $('tbody').html(data);
           }
          })
         }

         $(document).on('keyup', '#serach', function(){
          var query = $('#serach').val();
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();
          var page = $('#hidden_page').val();
          fetch_data(page, sort_type, column_name, query);
         });

         $(document).on('click', '.sorting', function(){
          var column_name = $(this).data('column_name');
          var order_type = $(this).data('sorting_type');
          var reverse_order = '';
          if(order_type == 'asc')
          {
           $(this).data('sorting_type', 'desc');
           reverse_order = 'desc';
           clear_icon();
           $('#'+column_name+'_icon').html('<span class="fa fa-sort-down"></span>');
          }
          if(order_type == 'desc')
          {
           $(this).data('sorting_type', 'asc');
           reverse_order = 'asc';
           clear_icon
           $('#'+column_name+'_icon').html('<span class="fa fa-sort-up"></span>');
          }
          $('#hidden_column_name').val(column_name);
          $('#hidden_sort_type').val(reverse_order);
          var page = $('#hidden_page').val();
          var query = $('#serach').val();
          fetch_data(page, reverse_order, column_name, query);
         });

         $(document).on('click', '.pagination a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          $('#hidden_page').val(page);
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();

          var query = $('#serach').val();

          $('li').removeClass('active');
                $(this).parent().addClass('active');
          fetch_data(page, sort_type, column_name, query);
         });

        });
    </script>
    <script>
    $(document).ready(function(){

        var date = new Date();

        $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: 'yyyy-mm-dd',
        autoclose: true
        });

        var _token = $('input[name="_token"]').val();

        fetch_data_f();

        function fetch_data_f(from_date = '', to_date = '')
        {
        $.ajax({
        url:"{{ route('fetch_data_f') }}",
        method:"POST",
        data:{from_date:from_date, to_date:to_date, _token:_token},
        dataType:"json",
        success:function(data)
        {
        var output = '';
        $('#total_records').text(data.length);
        for(var count = 1; count < data.length; count++)
        {
            output += '<tr>';
            output += '<td>' + count+  '</td>';
            output += '<td>' + data[count].tglOrder + '</td>';
            output += '<td>' + data[count].nama + '</td>';
            output += '<td>' + data[count].produk + '</td>';
            output += '<td>' + data[count].invoice + '</td>';
            output += '<td>' + data[count].resi + '</td>';
            output += '<td>' + data[count].noHp + '</td></tr>';
        }
        $('tbody').html(output);
        }
        })
        }

        $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != '')
        {
        fetch_data_f(from_date, to_date);
        }
        else
        {
        alert('Both Date is required');
        }
        });

        $('#refresh').click(function(){
            // $('#from_date').val('');
            // $('#to_date').val('');
            // fetch_data_f();
        });



    });
    </script>
</body>
</html>
