<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <form class="form-horizontal">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($colors) > 0)
                	@foreach($colors as $color)
		                <tr>
                      <td>
                        <span>{{$color->color_name}}</span>
                        <input type="text" id="color-{{$color->color_id}}" value="{{$color->color_name}}" style="display: none;">
                      </td>
		                  <td>{{$color->status}}</td>
		                  <td>
                        <a href="javascript:;" title="Edit" type="button" class="btn btn-warning btn-xs edit-btn">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="javascript:;" title="Update" type="button" class="btn btn-success btn-xs update-btn" id="color-{{$color->color_id}}" style="display: none;">
                          <i class="fa fa-save"></i>
                        </a>
                        <a href="javascript:;" title="Refresh" type="button" class="btn btn-success btn-xs refresh-btn" style="display: none;">
                          <i class="fa fa-refresh fa-spin"></i>
                        </a>

		                  	 <a type="button" title="Status" onclick=" changeStatus('change-color-status/','{{$color->color_id }}','{{$color->status}}') " class="btn @if($color->status > 0) btn-success @else btn-warning @endif btn-xs">@if($color->status > 0)<i class="fa fa-check-circle"></i> @else <i class="fa fa-ban"></i> @endif</a>

                        <a type="button" title="Delete" onclick=" deletecat('delete-color/','{{$color->color_id}}') " class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                        
		                  </td>
		                </tr>
               		@endforeach
                @endif
              </tbody>
              <tfoot></tfoot>
                
              </table>
            </div>
            <!-- /.box-body -->
          </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
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
  $('.edit-btn').on('click', function(){
      $(this).parent().prev().prev().children().next().show().prev().hide();
      $(this).hide().next().show().next().show();
  });
  $('.refresh-btn').on('click', function(){
      $(this).parent().prev().prev().children().next().hide().prev().show();
      $(this).hide().prev().hide().prev().show();
  });
  $('.update-btn').on('click', function(){
    var thisProp = $(this);
    var id = (thisProp.attr('id')).split('-')[1];
    var color = $('#color-'+id);
    $.ajax({
        url: 'update-color',
        type: 'POST',
        dataType: 'JSON',
        data: { 'id': id, 'color': color.val() },
        success: function(data){
          if (data.success == true) {
            alert(data.message);
            color.hide().prev().show().html(color.val());
            thisProp.hide().next().hide().prev().prev().show();
          } else {
            alert(data.message);
          }
        },
        error: function(data){
          alert(data.message);
        }
    });
  });
</script>