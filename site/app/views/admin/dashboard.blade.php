<div class="dashboard-section container">
    <div class="container-fluid dash-img">
        <div class="row">
            
            @foreach($subProducts as $product)
                <div class="col-md-3 col-sm-6 dash-item-front">
                    <a href="{{url('/job-progress/'.$product->id)}}">
                        <div class="dash-on" onclick="">
                            <div class="text">{{$product->name}}</div>
                            <div class="icon">
                                <i class="fa fa-cogs"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script type="text/javascript">
    function gotosales(){
        location.href = '{{url('/')}}/sales';
    }
</script>