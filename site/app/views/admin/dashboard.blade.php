<div class="dashboard-section container">
    <div class="container-fluid dash-img">
        <div class="row">
            <div class="col-md-3 col-sm-6 dash-item-front ">
                <div class="dash-on" onclick="gotosales()">
                    <div class="text">Sales</div>
                    <div class="icon">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                </div>
            </div>
            @foreach($subProducts as $product)
                <div class="col-md-3 col-sm-6 dash-item-front">
                    <a href="{{url('/job-progress/'.$product->id)}}">
                        <div class="dash-on" onclick="">
                            <div class="text">{{$product->name}}</div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-3 col-sm-6 dash-item-front">
                <div class="dash-on">
                    <div class="text">Aftersales</div>
                    <div class="icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 dash-item-front">
                <div class="dash-on">
                    <div class="text">Digital</div>
                    <div class="icon">
                        <i class="fa fa-wifi"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 dash-item-front">
                <div class="dash-on">
                    <div class="text">Data Management</div>
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                </div>
            </div>
        <!-- </div>
        <div class="row dash-row"> -->
            
            <div class="col-md-3 col-sm-6 dash-item-front ">
                <div class="dash-on">
                    <div class="text">Customer Satisfaction</div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 dash-item-front">
                <div class="dash-on">
                    <div class="text">Used Cars</div>
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 dash-item-front">
                <div class="dash-on">
                    <div class="text">Project Management</div>
                    <div class="icon">
                        <i class="fa fa-pie-chart"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function gotosales(){
        location.href = '{{url('/')}}/sales';
    }
</script>