<!-- form start -->
    <form class="form-horizontal">

      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="company_name" name="company_name">
          </div>
        </div>
        	<div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
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
        <button type="button" onclick="saveCompany()" class="btn btn-primary">Save</button>
      </div>
    </form>