<!-- form start -->
   <form class="form-horizontal">

      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>

          <div class="col-sm-10">
            <select class="form-control select2" id="category-id" style="width: 100%;">
                  <option selected="selected">Select One</option>
                  @if(count($categories) > 0)
                    @foreach($categories as $category)
                      <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                    @endforeach
                  @endif
                  
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Sub Category</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="sub-category-name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Url</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sub-cat-url">
          </div>
        </div>
        	<div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1">Status
                  </label>
                </div>
              </div>
            </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" onclick="saveSubCategory()" class="btn btn-primary">Save</button>
      </div>
    </form>