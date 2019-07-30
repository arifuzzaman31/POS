<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Sub Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Cat-Name</th>
                  <th>Sub-Name</th>
                  <th>Url</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($SubCaregoryList) > 0)
                	@foreach($SubCaregoryList as $category)
		                <tr>
                      <td>{{$category->categoryName->category_name}}</td>
                      <td>
                        <span>{{$category->sub_category_name}}</span>
                        <input type="text" style=" display: none" value="{{$category->sub_category_name}}" id="subCat-{{$category->sub_categories_id}}">
                      </td>
		                  <td>
                        <span>{{$category->sub_category_url}}</span>
                        <input type="text" style=" display: none" value="{{$category->sub_category_url}}" id="subCatUrl-{{$category->sub_categories_id}}">
                      </td>
		                  <td>{{$category->status}}</td>
		                  <td>
                        <a href="javascript:;" title="Edit" class="btn btn-info btn-xs edit-btn">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="javascript:;" title="Update" class="btn btn-success btn-xs update-btn" id="updateBtn-{{$category->sub_categories_id}}" style="display: none;">
                          <i class="fa fa-save"></i>
                        </a>

                        <a href="javascript:;" title="Refresh" class="btn btn-success btn-xs refresh-btn" style="display: none;">
                          <i class="fa fa-refresh fa-spin"></i>
                        </a>
		                
                        <a type="button" onclick=" changeStatus('change-sub-category-status/','{{$category->sub_categories_id}}','{{$category->status}}') " class="btn @if($category->status > 0) btn-success @else btn-warning @endif btn-xs">@if($category->status > 0)<i class="fa fa-check-circle"></i> @else <i class="fa fa-ban"></i> @endif</a>

		                  	<a type="button" onclick=" deletecat('delete-sub-category/','{{$category->sub_categories_id}}') " class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                        
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
  
</section>
 <!-- /.modal -->

<!-- DataTables -->
<script src="{{ asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
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
      $(this).parent().prev().prev().prev().children().next().show().prev().hide();
      $(this).parent().prev().prev().children().next().show().prev().hide();
      $(this).hide().next().show().next().show();
  });

  $('.refresh-btn').on('click', function(){
      $(this).parent().prev().prev().prev().children().next().hide().prev().show();
      $(this).parent().prev().prev().children().next().hide().prev().show();
      $(this).hide().prev().hide().prev().show();
  });

  $('.update-btn').on('click', function(){
      var thisProp = $(this);
      var id = (thisProp.attr('id')).split('-')[1];
      var name = $("#subCat-"+id);
      var url = $("#subCatUrl-"+id);

      $.ajax({
          url: 'update-sub-category',
          type: 'POST',
          dataType: 'JSON',
          data: {
            'id': id,
            'name': name.val(),
            'url': url.val()
          },
          success: function(data){
            if (data.status == true) {
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
            alert(data.message);  
          }
      });
  });
</script>