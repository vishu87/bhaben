<style type="text/css">
    .barspan {
        font-size: 11px;
        color: #000;
        font-style: italic;
    }
    .bar.red {
        background: #d73535;
    }
    .bar.green {
        background: #28d735;
    }
</style>
<div style="padding: 10px 0; background: #3080a9">
    
    <div class="container-fluid title">
        <div class="row">
            <div class="col-md-6 col-xs-6">
                <div style="margin-top: 5px">Members List</div>
            </div>
            <div class="col-md-6 col-xs-6 text-right">
                <a href="{{url('/job-progress/'.$jobDetails->subproduct_id)}}" class="btn dark"><i class="fa fa-angle-double-left"></i> Go Back</a>
            </div>
        </div>
    </div>
</div>

<div style="background:#FFF; padding: 10px 0;min-height: 550px;">
    <div class="container-fluid">
        <h2 class="page-title">{{$jobDetails->job.' (' . $jobDetails->sub_product. ' )'}}</h2>
        <div  style="overflow-x: auto">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px;"> SN</th>
                    <th>Name </th>
                    <th style="width: 50px">Seniority (mths) </th>
                    <th style="width: 50px">Months in step</th>
                    <th style="width: 250px">Individual Global Training Progress</th>
                    <th style="width: 150px">Individual Expected Global Training Progress</th>
                    <th>% Expected against Actual</th>
                    <th style="width: 100px">Available Fixed Step Months</th>
                    <th style="width: 100px">Months of no training</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;?>
                @foreach($jobDetails->members as $member)
                    <?php
                        $class = "";
                        if(!$member->indivisual_global_training_progress){
                            $class = 'red';
                        } else {
                            if($member->indivisual_global_training_progress < 100){
                                $class = 'red';
                            } else {
                                $class = 'green';
                            }
                        }


                    ?>
                    <tr class="item">
                        <td> {{$count}}</td>
                        <td> {{$member->full_name}} </td>
                        <td> {{$member->seniority_months}} </td>
                        <td> {{$member->month_step}} </td>
                        <td valign="middle" style="overflow: hidden;">
                            <div style="width: 200px">
                                @if($member->indivisual_global_training_progress)
                                <span class="barspan">{{$member->indivisual_global_training_progress}}</span>
                                <div style="width: {{$member->indivisual_global_training_progress}}%; height: 3px; " class="bar {{$class}}"></div>
                                @endif
                            </div>
                        </td>
                        <td> {{$member->indivisual_expected_global_training_progress}} </td>
                        <td> {{$member->expected_against_actual}} </td>
                        <td> {{$member->available_fixed_step_months}} </td>
                        <td> {{$member->month_of_no_training}} </td>

                    </tr>
                    <?php $count++?>
                @endforeach
            </tbody>
        </table>
        </div>

        <div class="text-center">
            <button class="btn blue btn-lg" onclick="alert('Mail has been sent')">Send Email</button>
        </div>
        
        
    </div>
</div>