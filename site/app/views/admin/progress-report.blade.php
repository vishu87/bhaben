<div style="padding: 10px 0; background: #3080a9">
    
    <div class="container-fluid title">
        <div class="row">
            <div class="col-md-6 col-xs-6">
                <div style="margin-top: 5px">Jobs</div>
            </div>
            <div class="col-md-6 col-xs-6 text-right">
                <a href="{{url('/dashboard')}}" class="btn dark"><i class="fa fa-angle-double-left"></i> Go Back</a>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-section container">
    <div class="container-fluid dash-img">
        <div class="row">
            @foreach($jobs as $job)
                <div class="col-md-3 col-sm-6 dash-item-front">
                    <a href="{{url('/job-members/'.$job->job_code.'/'.$subproduct_id)}}">
                        <div class="dash-on" onclick="">
                            <div class="text">{{$job->job}}</div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
