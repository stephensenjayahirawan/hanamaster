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
                        <h5>Job Vacancy List</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="/admin/job_vacancy/add" class="btn btn-md btn-primary">Add New Job Vacancy</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Job Name</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thed>
                                <tbody>
                                    @if (count($jobs) > 0)
                                    @foreach($jobs as $index => $job)
                                    <tr>
                                        <td>{{$index+=1}}</td>
                                        <td>{{$job->title}}</td>
                                        <td>{{$job->valid_from}} s/d {{$job->valid_to}}</td>
                                        <td>
                                            @if (Carbon\Carbon::now() < $job->valid_to)
                                            <span class="badge badge-primary">Active</span>
                                            @endif
                                            @if (Carbon\Carbon::now() > $job->valid_to)
                                            <span class="badge badge-danger">Expired</span>
                                            @endif
                                        </td>
                                        <td>{{$job->created_at}}</td>
                                        <td>
                                            <a href="/admin/job_vacancy/show/{{$job->id}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach 
                                    @endif
                                    @if (count($jobs) <= 0)
                                    <tr>
                                        <td colspan="6">No Data</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("admin_template.footer")