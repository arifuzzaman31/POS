<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Sliders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Slider</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($all_ProductSlider) > 0)
                	@foreach($all_ProductSlider as $slider)
		                <tr>
		                  <td><img src="{{URL::to('public/images/slider/'.$slider->slider->slider_image_path)}}" height="30px" width="50px"></td>
                  
		                  <td>{{$slider->status}}</td>
		                  <td>
                        <a type="button" title="Status" onclick=" changeStatus('change-product-slider-status/','{{$slider->product_slider_id}}','{{$slider->status}}') " class="btn @if($slider->status > 0) btn-success @else btn-warning @endif btn-xs">@if($slider->status > 0)<i class="fa fa-check-circle"></i> @else <i class="fa fa-ban"></i> @endif</a>

                        <a type="button" title="Delete" onclick=" deletecat('delete-product-slider/','{{$slider->product_slider_id}}') " class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
		                  </td>
		                </tr>
               		@endforeach
                @endif
                </tfoot>
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