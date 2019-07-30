<!-- form start -->
    <form class="form-horizontal">

      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="brand_name" name="brand_name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Brand Url</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="url" id="url">
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
        <button type="button" onclick="saveBrand()" class="btn btn-primary">Save</button>
      </div>
    </form>