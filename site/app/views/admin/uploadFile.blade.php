<div style="padding: 10px 0; background: #3080a9">
	
    <div class="container-fluid title">
        <div class="row">
            <div class="col-md-6 col-xs-6">
                <div style="margin-top: 5px">Upload Training Progress Report</div>
            </div>
            <div class="col-md-6 col-xs-6 text-right">
                <a href="{{url('/dashboard')}}" class="btn dark"><i class="fa fa-angle-double-left"></i> Go Back</a>
            </div>
        </div>
    </div>
</div>

<div style="background:#FFF; padding: 10px 0;min-height: 550px;">
    <div class="container">
        <h2 class="page-title">Upload Training Progress Report</h2>
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {{Session::get('success')}}
            </div>
        @endif
        {{Form::open(["url"=>"/upload-file","method"=>"post","files"=>"true"])}}
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Select File</label>
                    {{Form::file('report',["class"=>"form-control","required"=>true])}}
                    <span class="error">{{$errors->first('report')}}</span>
                    <span class="error">{{$errors->first('extension')}}</span>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>

        {{Form::close()}}
        
    </div>
</div>