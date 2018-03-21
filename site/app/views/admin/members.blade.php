<style type="text/css">
    tr.item.red {
        background: #f09696;
    }
    tr.item.green {
        background: #96f09d;
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
        <div>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px;"> SN</th>
                    <th>Name </th>
                    <th>Seniority (mths) </th>
                    <th>Months in step</th>
                    <th style="width: 120px">Individual Global Training Progress</th>
                    <th style="width: 150px">Individual Expected Global Training Progress</th>
                    <th>% Expected against Actual</th>
                    <th>Available Fixed Step Months</th>
                    <th>Months of no training</th>
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
                    <tr class="item {{$class}}">
                        <td> {{$count}}</td>
                        <td> {{$member->full_name}} </td>
                        <td> {{$member->seniority_months}} </td>
                        <td> {{$member->month_step}} </td>
                        <td> {{$member->indivisual_global_training_progress}} </td>
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
        
        
    </div>
</div>