<form id="selectform">
  <div class="box-body">
    <div class="form-row">
      <div class="form-group col-md-6">
          <select id="product" class="form-control">
            <option selected>Select product...</option>
              @if(count($products) > 0)
                @foreach($products as $product)
                  <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                @endforeach
              @endif
         </select>
      </div>
      <div class="form-group col-md-6">
        <select id="size" class="form-control">
            <option selected>Select Size...</option>
             @if(count($sizes) > 0)
                @foreach($sizes as $size)
                  <option value="{{$size->size_id}}">{{$size->size_name}}</option>
                @endforeach
              @endif
         </select>
      </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="status">Status
            </label>
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

      $("#selectform").on('submit',function(event){
            event.preventDefault();
        var product = $('#product').val();
        var size = $('#size').val();
        var status = $("input[type='checkbox']").is(':checked') ? 1 : 0;

        $.ajax({
            url: 'store-product-and-size',
            type: 'POST',
            data: { 'product': product, 'size': size, 'status': status },
            success: function(data){
              if (data.success == true) {  
                alert(data.message);
                console.log(data);
                $('#categoryModel').modal('hide');
              }
            },
            error: function(data){
              alert(data.message);
            }
        });
      }); 
    });
</script>