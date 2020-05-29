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
                        <h5>Job Vacancy Details</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6 row">
                                    <h4><span style="font-weight:bold;">Job Name</span> : {{$job->title}}</h4>
                                    <h4><span style="font-weight:bold;">Validity</span> : {{$job->valid_from}} s/d  {{$job->valid_to}}</h4>
                                    <h4><span style="font-weight:bold;">Status</span> :
                                        @if (Carbon\Carbon::now() <= $job->valid_to)
                                        <span class="badge badge-primary">Active</span>
                                        @endif
                                        @if (Carbon\Carbon::now() > $job->valid_to)
                                        <span class="badge badge-danger">Expired</span>
                                        @endif
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><span style="font-weight:bold;">Created At</span> : {{$job->created_at}}</h4>
                                    <h4><span style="font-weight:bold;">Updated At</span> : {{$job->update_at}}</h4>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h4><span style="font-weight:bold;">Content :</span> <br>{!! $job->content !!}</h4>
                            </div>
                           
                            <div class="col-md-12">
                                <hr class="hr-line-dashed">
                                <a href="/admin/job_vacancy" style="float:left;" class="btn btn-md btn-danger "><i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("admin_template.footer")