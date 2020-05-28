@include("admin_template.header")
@include("admin_template.sidebar")
@include("admin_template.topbar")
@include("admin_template.notification")
<div class="wrapper wrapper-content animated fadeIn">
    <div class="p-w-md m-t-sm">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Edit Job Vacancy</h5>
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="{{ url('/admin/job_vacancy/post_edit') }}">
                            @csrf
                        <div class="form-group row">
                            <label for="jobName" class="col-sm-2 col-form-label">Job Name</label>
                            <div class="col-sm-10 input-group">
                                <input type="text" class="form-control" id="JobName" name="job_title" value="{{$job->title}}">
                            </div>
                        </div>    
                        <div class="form-group row "   id="data_1">
                            <label for="jobName" class="col-sm-2 col-form-label">Last Registration Date :</label>
                            <div class="col-sm-10 input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" value="{{$job->valid_to}}" name="last_registration_date" class="form-control" placeholder="mm/dd/yyyy">
                            </div>
                        </div>  
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Content : <span style="color:red;">*</span></label>
                                <div class="col-sm-10 input-group">
                                    <textarea id="content" class="form-control" name="content" rows="10" cols="50" >{!! $job->content !!}</textarea>
                                </div>
                            </div>
                        <div class="row">
                        <input type="hidden" id="jobId" name="jobId" value="{{$job->id}}">
                        <div class="form-group row text-center">
                                <a href="/admin/job_vacancy" style="float:left; margin-left:20px" class="btn btn-md btn-danger "><i class="fa fa-times"></i> Cancel</a>
                                <button type="submit" class="btn btn-md btn-primary "><i class="fa fa-check"></i> Edit Job Vacancy</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("admin_template.footer")