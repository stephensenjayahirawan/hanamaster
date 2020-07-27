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
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Applicants List</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Job Name</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Created At</th> 
                                        </tr>
                                    </thed>
                                    <tbody>
                                        @if (count($applicant) > 0)
                                        @foreach($applicant as $index => $app)
                                        <tr>
                                            <td>{{$index+=1}}</td>
                                            <td>{{$app->title}}</td>
                                            <td>{{$app->name}}</td>
                                            <td>
                                            {{$app->email}}
                                            </td>
                                            <td>{{$app->phone_number}}</td>
                                            <td>{{$app->created_at}}</td>
                                        </tr>
                                        @endforeach 
                                        @endif
                                        @if (count($applicant) <= 0)
                                        <tr>
                                            <td colspan="6">No Data</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
                            
</div>
@include("admin_template.footer")