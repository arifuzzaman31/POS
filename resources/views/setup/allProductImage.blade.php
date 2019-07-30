
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($images) > 0)
                	@foreach($images as $image)
		                <tr>
                      <td>{{$image->product->product_name}}</td>
                      <td><img src="{{URL::to('public/images/product-image/'.$image->image_path)}}" height="30px" width="50px"></td>
		                  <td>{{$image->status}}</td>
		                  <td>
		                  <a type="button" title="Status" onclick=" changeStatus('change-image-status/','{{$image->product_image_id}}','{{$image->status}}') " class="btn @if($image->status > 0) btn-success @else btn-warning @endif btn-xs">@if($image->status > 0)<i class="fa fa-check-circle"></i> @else <i class="fa fa-ban"></i> @endif</a>

		                  <a type="button" title="Delete" onclick=" deletecat('delete-image/','{{$image->product_image_id}}') " class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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