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
                  <th>Category</th>
                  <th>Sub-Category</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($products) > 0)
                  @foreach($products as $product)
		                <tr>
                      <td>{{$product->category->category_name}}</td>
                      <td>{{$product->subcategory->name}}</td>
                        <td>
                          @if($product->image)
                            <img src="{{URL::to('public/images/product-image/'.$product->image->image_path)}}" height="30px" width="50px">
                          @endif
                        </td>
                        
                      <td>
                          <span>
                            {{$product->product_name}}
                          </span>
                          <input type="text" class="form-control" value="{{$product->product_name}}" id="product-{{$product->product_id}}" style="display: none;">
                      </td>
		                  <td>
                        <span>
                          {{$product->sale_price}}
                        </span>
                           <input type="text" class="form-control" value="{{$product->sale_price}}" id="price-{{$product->product_id}}" style="display: none;">
                      </td>
		                  <td>{{$product->status}}</td>
		                  <td>
		                  	
                        <a href="javascript:;" title="Edit" class="btn btn-info btn-xs edit-btn">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="javascript:;" title="Update" class="btn btn-success btn-xs update-btn" id="updateBtn-{{$product->product_id}}" style="display: none;">
                           <i class="fa fa-save"></i>
                        </a>
                        <a href="javascript:;" title="Refresh" class="btn btn-info btn-xs refresh-btn" style="display: none;">
                           <i class="fa fa-refresh fa-spin"></i>
                        </a>

                        <a type="button" title="Status" onclick=" changeStatus('change-product-status/','{{$product->product_id}}','{{$product->status}}') " class="btn @if($product->status > 0) btn-success @else btn-warning @endif btn-xs">@if($product->status > 0)<i class="fa fa-check-circle"></i> @else <i class="fa fa-ban"></i> @endif</a>

                        <a type="button" title="Delete" onclick=" deletecat('delete-product/','{{$product->product_id}}') " class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
    $(".edit-btn").on('click', function(){

    $(this).parent().prev().prev().prev().children().next().show().prev().hide();
    $(this).parent().prev().prev().children().next().show().prev().hide();
    $(this).hide().next().show().next().show();
  });

  $(".refresh-btn").on('click', function(){

    $(this).parent().prev().prev().prev().children().next().hide().prev().show();
    $(this).parent().prev().prev().children().next().hide().prev().show();
    $(this).hide().prev().hide().prev().show();
  });
  $(".update-btn").on('click',function(){
      var thisProp = $(this);
      var id = (thisProp.attr('id')).split('-')[1];
      var name = $("#product-"+id);
      var price = $("#price-"+id);

      $.ajax({
        url : 'update-product',
        dataType : 'JSON',
        method : 'POST',
        data : {
          'id': id,
          'name': name.val(),
          'price': parseFloat(price.val())
        },
        success: function(data){
          if(data.success == true){
            alert(data.message);
            name.hide().prev().show().html(name.val());
            price.hide().prev().show().html(price.val());
            thisProp.hide().next().hide().prev().prev().show();
          }else{
            alert(data.message);
          }

        },
        error: function(data){
          alert(data.message);
        }
      });

  });  
</script>