@extends('app')
  @section('content')
  <section class="content">
<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h2>Category</h2>   
              <p>Category</p>   
            </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                  <a href="#" onclick=" addOrView('get-category','Add Category') " class="small-box-footer">
                    Add New <i class="fa  fa-plus-square"></i></a>
                  <a href="#" onclick=" addOrView('get-category-list','Category List') " class="small-box-footer">View <i class="fa fa-th-list"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h2>Sub Category</h2>

              <p>Sub Category</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
             <a href="#" onclick=" addOrView('get-sub-category','Add Sub Category') " class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick=" addOrView('get-sub-category-list','Sub Category List') " class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h2>Brand</h2>

              <p>Brand</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
             <a href="#" onclick=" addOrView('get-brand','Add Brand') " class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick="addOrView('get-brand-list','Brand List')" class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Product</h2>
              <p>Unique Product</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
             <!-- <a href =" {{url('backend/get-product')}} " class="small-box-footer"> -->
             <a href="#" onclick=" addOrView('get-product','Add Product') " class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick=" addOrView('get-product-list','Product List') " class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h2>Item-Companies</h2>   
              <p>Item-Companies</p>   
            </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                  <a href="#" onclick=" addOrView('get-item-company','Add Company Status') " class="small-box-footer">
                    Add New <i class="fa  fa-plus-square"></i></a>
                  <a href="#" onclick=" addOrView('get-item-company-list','Company List') " class="small-box-footer">View <i class="fa fa-th-list"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->  
          <div class="small-box bg-aqua">
            <div class="inner">
              <h2>Product Color</h2>

              <p>Product Color</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
             <a href="#" onclick=" addOrView('get-product-color','Product Color') " class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick=" addOrView('get-product-color-list','product color List') " class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Product Size</h2>

              <p>Product Size</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
             <a href="#" onclick=" addOrView('get-product-size','Product Size') " class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick="addOrView('get-product-size-list','Product Size List')" class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2>Slider</h2>
              <p>Slider</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
             <a href="#" onclick="addOrView('get-slider','Add Slider')" class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick="addOrView('all-slider','All Slider')"" class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h2>Product Slider</h2>   
              <p>Product Slider</p>   
            </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                  <a href="#" class="small-box-footer">
                    Add New <i class="fa  fa-plus-square"></i></a>
                  <a href="#" onclick=" addOrView('product-slider-list','product Slider List') " class="small-box-footer">View <i class="fa fa-th-list"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->  
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Product Image</h2>

              <p>Product Image</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
             <a href="#" onclick=" addOrView('get-product-image','Add Product') " class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick=" addOrView('get-product-image-list','Product List') " class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2>Selected Product</h2>

              <p>Selected Product</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
             <a href="#" onclick=" addOrView('product-size','Product Size') " class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick="addOrView('product-size-list','Product Size List')" class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h2>Admin House</h2>
              <p>Admin House</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
             <a href="#" onclick="addOrView()" class="small-box-footer">
              Add New <i class="fa  fa-plus-square"></i>
            </a>
            <a href="#" onclick="addOrView()"" class="small-box-footer">
              View <i class="fa fa-th-list"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
<!-- Modal -->
<div class="modal fade" id="categoryModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          

        </div>
        <div class="modal-footer">
        </div>
    </div>
  </div>
</div>
</section>
    <!-- /.content --> 
 @endsection

@section('script')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addOrView(url, text){
    $('#categoryModel').modal();
        $('.modal-title').text(text).css('font-weight', 'bold');
      $('.modal-body').load(url);
}

  function saveCategory(){
    var category_name = $('#category_name').val();
    var url           = $('#url').val();
    var status        = $("input[type='checkbox']").is(":checked") ? 1 : 0 ;
    
    $.ajax({
      url: 'add-category',
      type: 'POST',
      data: { 'category_name': category_name, 'url': url, 'status': status },
      success: function(data,success){
          alert(success);
          console.log(data);
          $('#categoryModel').modal('hide');
      },
      error: function(data,error){
        alert(error);
          console.log(data);
      }
    });
  }
function saveProduct(){
  var productName = $('#product_name').val();
  var url = $('#url').val();
  var status = $("input[type='checkbox']").is(':checked') ? 1 : 0;

  $.ajax({
      url: 'store-product',
      type: 'POST',
      data: { 'productName': productName, 'url': url, 'status': status },
      success: function(data){
        alert('Product added successfully');
        console.log(data);
        $('#categoryModel').modal('hide');
      },
      error: function(data){
        alert('some error occured');
      }
  });
}
  function saveSubCategory(){
    var id = $('#category-id').val();
    var subCategoryName = $('#sub-category-name').val();
    var subCatUrl = $('#sub-cat-url').val();
    var status = $("input[type='checkbox']").is(":checked") ? 1 : 0 ;

    $.ajax({
        url: 'save-sub-category',
        type: 'POST',
        data: { 'id': id, 'subCategoryName': subCategoryName, 'subCatUrl': subCatUrl, 'status': status },
        success: function(data){
          console.log(data);
          $('#categoryModel').modal('hide');
          //alert('sub category added');
        },
        error: function(error){
          console.log(error);
        }
    });
  }

function changeStatus(url,id,status){
        var prop = $(this);    
    $.ajax({
        url: url + id,
        type: 'GET',
        data: { status: status },
        success: function(data){
          alert(data.message);
          console.log(data);    
        },
        error: function(data){
          console.log(data);
        }
      });
}

function deletecat(url,id){

    var token = $("meta[name='csrf-token']").attr("content");
      if(confirm("Are you sure delete this data!")) {
        $.ajax({
            url: url + id,
            type: 'GET',
            success: function(data){
              console.log(data);
              //$(this).parent().parent().remove();
               $(this).closest('tr').remove();
            },
            error: function(data){
              console.log('Error:', data);
            }
        });
      }
}

function saveBrand(){
  var brandName = $('#brand_name').val();
  var url = $('#url').val();
  var status = $("input[type='checkbox']").is(":checked") ? 1 : 0;
  // alert(status);
  $.ajax({
      url: 'store-brand',
      type: 'POST',
      data: { 'brandName': brandName, 'url': url, 'status': status },
      success: function(data,status){
          alert(data.status);
          $('#categoryModel').modal('hide');
          console.log(data);
      },
      error: function(data,error){
        alert(data.error);
        $('#categoryModel').modal('hide');
      }
  });
}

function saveCompany(){
  var name = $('#company_name').val();
  var status = $("input[type='checkbox']").is(':checked') ? 1 : 0;

  $.ajax({
      url: 'store-company-status',
      type: 'POST',
      data: { 'name': name, 'status': status },
      success: function(data){
        alert('A Company status Added');
        $('#categoryModel').modal('hide');
        console.log(data);
      },
      error: function(data){
        alert('some error occured');
        $('#categoryModel').modal('hide');
      }
  });
}

function saveColor(){
  var name = $('#color-name').val();
  var status = $("input[type='checkbox']").is(':checked') ? 1 : 0;
    $.ajax({
        url: 'store-product-color',
        type: 'POST',
        data: { 'name': name, 'status': status },
        success: function(data){
          alert('New color added');
          $('#categoryModel').modal('hide');
          console.log(data);
        },
        error: function(data){
          alert('some error occured');
          $('#categoryModel').modal('hide');
        }
    });
}

function saveSize(){
  var name = $('#size').val();
  var status = $("input[type='checkbox']").is(':checked') ? 1 : 0;
    $.ajax({
        url: 'store-product-size',
        type: 'POST',
        data: { 'name': name, 'status': status },
        success: function(data){
          alert('New size added');
          $('#categoryModel').modal('hide');
          console.log(data);
        },
        error: function(data){
          alert('some error occured');
          $('#categoryModel').modal('hide');
        }
    });
}

</script>

@endsection


