<!-- form start -->
    <form class="form-horizontal" id="attachform" enctype="multipart/form-data">
      <div class="box-body">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="title" id="title">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Slider</label>
          <div class="col-sm-8">
            <input type="file" class="form-control" name="file" id="file">
          </div>
        </div>
          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" id="status" value="1">Status
                  </label>
                </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" onclick="imageForm('add-slider')" class="btn btn-primary">Save</button>
      </div>
  </form>

  <script type="text/javascript">
    //form Submit
 $(document).ready(function(){

      $("#attachform").on('submit',function(event){
          event.preventDefault();
        var postData = new FormData($("#attachform")[0]);
          $.ajax({
             url: 'add-slider',
             type: 'POST',
             data: postData,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {
               alert(data.message);
               console.log(data);
               $('#categoryModel').modal('hide');
             },
             error: function(data){
              console.log(data.message);
             }
         });
      });

 }); 
</script>
   