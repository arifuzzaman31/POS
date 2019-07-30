<form>
  <div class="form-row">
    <div class="form-group col-md-4">
        <select id="category" class="form-control">
          <option selected>Select Category...</option>
            @if(count($categories) > 0)
              @foreach($categories as $category)
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
              @endforeach
            @endif
       </select>
    </div>
    <div class="form-group col-md-4">
      
      <select id="subCategory" class="form-control">
          <option selected>Select Sub Category...</option>
           @if(count($subCategories) > 0)
              @foreach($subCategories as $subCategory)
                <option value="{{$subCategory->sub_categories_id}}">{{$subCategory->sub_category_name}}</option>
              @endforeach
            @endif
       </select>
    </div>
    <div class="form-group col-md-4">
      
      <select id="brand" class="form-control">
          <option selected>Select Brand...</option>
          @if(count($brands) > 0)
            @foreach($brands as $brand)
              <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
            @endforeach
          @endif
       </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      
      <select id="color" class="form-control">
          <option selected>Select Color...</option>
          @if(count($colors) > 0)
            @foreach($colors as $color)
              <option value="{{$color->color_id}}">{{$color->color_name}}</option>
            @endforeach
          @endif
       </select>
    </div>
    <div class="form-group col-md-4">
      
      <select id="size" class="form-control">
          <option selected>Select Size...</option>
          @if(count($sizes) > 0)
            @foreach($sizes as $size)
              <option value="{{$size->size_id}}">{{$size->size_name}}</option>
            @endforeach
          @endif
       </select>
    </div>
    <div class="form-group col-md-4">
      
      <select id="company" class="form-control">
          <option selected>Select Company...</option>
          @if(count($companies) > 0)
              @foreach($companies as $company)
                <option value="{{$company->item_company_id}}">{{$company->item_company_name}}</option>
              @endforeach
            @endif
       </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      
      <input type="text" class="form-control" id="product-name" placeholder="Product Name">
    </div>
    <div class="form-group col-md-6">
      
      <input type="text" class="form-control" id="product-code" placeholder="Product Code">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      
      <input type="text" class="form-control" id="purchase-price" placeholder="purchase Price">
    </div>
    <div class="form-group col-md-6">
      
      <input type="text" class="form-control" id="sale-price" placeholder="Sale Price">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <div class="input-group col-md-6">
        <input type="number" class="form-control col-md-3" id="discount" name="discount_percent">
          <span class="input-group-addon"><b>%</b></span>

          <input id="invoice-discount-taka" type="number" class="form-control col-md-6 col-md-offset-1" name="discount_taka" value="0">
      </div>
      <!-- <input type="text" class="form-control" id="discount" placeholder="Discount"> -->
    </div>
    <div class="form-group col-md-6">
      
      <input type="text" class="form-control" id="quantity" placeholder="Quantity">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label" for="gridCheck">
        Status
      </label>
      <input class="form-check-input" type="checkbox" id="gridCheck">
    </div>
  </div>
  <button type="button" id="submit" class="btn btn-primary">Add</button>
</form>

<script type="text/javascript">
    $('#submit').click(function(){
        var category = $('#category').val();
        var subCategory = $('#subCategory').val();
        var brand = $('#brand').val();
        var color = $('#color').val();
        var size = $('#size').val();
        var company = $('#company').val();
        var productName = $('#product-name').val();
        var code = $('#product-code').val();
        var purchasePrice = $('#purchase-price').val();
        var salePrice = $('#sale-price').val();
        var discount = $('#discount').val();
        var quantity = $('#quantity').val();
        var status = $("input[type='checkbox']").is(':checked') ? 1 : 0;
          $.ajax({
              url: 'store-product',
              type: 'POST',
              data: {'category': category, 'subCategory': subCategory, 'brand': brand, 'color': color, 'size': size,'company': company, 'productName': productName, 'code': code, 'purchasePrice': purchasePrice, 'salePrice': salePrice, 'discount' : discount, 'quantity': quantity, 'status': status },
              success: function(data,message){
                alert(data.message);
                console.log(data);
                 $('#categoryModel').modal('hide');
              },
              error: function(data){
                console.log(data);
              }
          });
    });
  
</script>