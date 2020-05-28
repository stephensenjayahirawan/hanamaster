 <!-- The Modal -->
 <div class="modal" id="delete_job".$index>
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Confirm Deletion</h1>
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h2>Delete "<b>{{$job->title}}</b>" Job?</h2>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer ">
          <a href="/admin/job_vacancy/delete/{{$job->id}}" class="btn btn-sm btn-danger">Delete</a> 
        </div>
        
      </div>
    </div>
  </div>
  