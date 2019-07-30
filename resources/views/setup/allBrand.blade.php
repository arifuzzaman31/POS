<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Brand</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>brand</th>
                        <th>url</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                <tbody>
                  @if(count($brandList) > 0)
                	@foreach($brandList as $brand)
		                <tr>
		                  <td>
                        <span>{{$brand->brand_name}}</span>
                        <input type="text" class="form-control" id="brandName-{{$brand->brand_id}}" value="{{$brand->brand_name}}" style="display: none">
                      </td>
                      <td>
                        <span>{{$brand->url}}</span>
                        <input type="text" class="form-control" id="brandUrl-{{$brand->brand_id}}" value="{{$brand->url}}" style="display: none">
                      </td>
		                  <td>{{$brand->status}}</td>
		                  <td>
                        <a href="javascript:;" type="button" title="Edit" class="btn btn-warning btn-xs btn-edit"><i class="fa fa-edit"></i></a>

                        <a href="javascript:;" type="button" title="Update" class="btn btn-success btn-xs btn-update" id="updateBtn-{{$brand->brand_id}}" style="display: none;">
                          <i class="fa fa-save"></i></a>

                        <a href="javascript:;" type="button" title="Refresh" class="btn btn-success btn-xs btn-refresh" style="display: none;">
                          <i class="fa fa-refresh fa-spin"></i>
                        </a>

		                  	<a type="button" title="@if($brand->status > 0) Active @else Inactive @endif" onclick=" changeStatus('change-brand-status/','{{$brand->brand_id}}','{{$brand->status}}') " class="btn @if($brand->status > 0) btn-success @else btn-warning @endif btn-xs">@if($brand->status > 0)<i class="fa fa-check-circle"></i> @else <i class="fa fa-ban"></i> @endif</a>

		                  	<a type="button" title="Delete" onclick=" deletecat('delete-brand/','{{$brand->brand_id}}') " class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
		                  </td>
		                </tr>
               		@endforeach
                @endif
              <tfoot></tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>      <!-- /.modal -->
<!-- DataTables -->
<script src="{{ asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
   $(function () {
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
  
    $(".btn-edit").on('click', function(){
      $(this).parent().prev().prev().prev().children().next().show().prev().hide();
      $(this).parent().prev().prev().children().next().show().prev().hide();
      $(this).hide().next().show().next().show();
    });
    $('.btn-refresh').on('click', function(){
      $(this).parent().prev().prev().prev().children().next().hide().prev().show();
      $(this).parent().prev().prev().children().next().hide().prev().show();
      $(this).hide().prev().hide().prev().show();
    });

    $('.btn-update').on('click', function(){
        var thisProp = $(this);
        var id = (thisProp.attr('id')).split('-')[1];
        var name = $('#brandName-'+id);
        var url = $('#brandUrl-'+id);

        $.ajax({
            url: 'update-brand',
            dataType: 'JSON',
            method: 'POST',
            data: {
                'id': id,
                'name': name.val(),
                'url': url.val()
            },
            success: function(data){
              if (data.success == true) {
                alert(data.message);
                name.hide().prev().show().html(name.val());
                url.hide().prev().show().html(url.val());
                thisProp.hide().next().hide().prev().prev().show();
              }
              else {
                alert(data.message);
              }
            },
            error: function(data){
              console.log(data.message);
            }
        });
    });
</script>