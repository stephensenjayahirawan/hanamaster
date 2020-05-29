@include("admin_template.header")
@include("admin_template.sidebar")
@include("admin_template.topbar")
@include("admin_template.notification")
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Total Job Vacancy</h5>
                    <div class="ibox-tools">
                        <span class="label label-primary float-right">Active</span>
                    </div>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$job_active}}</h1>
                    <small>Job(s)</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Total Job Vacancy</h5>
                    <div class="ibox-tools">
                        <span class="label label-danger float-right">Expired</span>
                    </div>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins ">{{$job_expired}}</h1>
                    <small>Job(s)</small>
                </div>
            </div>
        </div>
    </div>
</div>
@include("admin_template.footer")