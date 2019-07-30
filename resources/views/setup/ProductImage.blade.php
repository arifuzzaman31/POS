<!-- form start -->
   <form class="form-horizontal" id="productForm" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
          <div class="col-sm-8">
            <select class="form-control select2" name="name" style="width: 100%;">
                  <option selected="selected">Select One</option>
                  @if(count($Products) > 0)
                    @foreach($Products as $Product)
                      <option value="{{$Product->product_id}}">{{$Product->product_name}}</option>
                    @endforeach
                  @endif
                  
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>

          <div class="col-sm-8">
            <input type="file" class="form-control" name="file">
          </div>
        </div>
        	<div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" value="1">Status
                  </label>
                </div>
              </div>
            </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
  </form>
<script type="text/javascript">
    $(document).ready(function(){
          $('#productForm').on('submit', function(e){
              e.preventDefault();
            var formdata = new FormData($('#productForm')[0]);
              $.ajax({
                  url: 'add-product-image',
                  type: 'POST',
                  data: formdata,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(data){
                    alert(data.message);
                    console.log(data);
                    $('#categoryModel').modal('hide');
                  },
                  error: function(data){
                    console.log(data);
                  }
              });
          });
    });
</script>