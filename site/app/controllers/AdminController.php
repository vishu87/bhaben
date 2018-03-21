<?php
class AdminController  extends BaseController {
    protected $layout = 'layout';

    public function dashboard(){
    	$subProducts = SubProduct::get();
        $this->layout->sidebar = "";
        $this->layout->main = View::make('admin.dashboard',["subProducts"=>$subProducts]);
    }

    public function sales(){
        $this->layout->sidebar = "";
        $this->layout->main = View::make('admin.sales');
    }
   	
   	public function uploadFile(){
        $this->layout->sidebar = "";
        $this->layout->main = View::make('admin.uploadFile');
    }

    public function postUploadFile(){
    	$messages = array( 'report' => 'This :attribute aint long enough.' );
    	$cre = [
    		"report"=>Input::file("report"),
    		'extension' => Input::file('report')->getClientOriginalExtension()
    	];
    	$rules = [
    		"report"=>"required",
    		'extension' => 'required|in:xlsx,xls',
    	];

    	$validator = Validator::make($cre,$rules);
    	if($validator->passes()){
    		$file_name = '';
	    	$destination = 'uploads/';
	    	if(Input::hasFile('report')){
	            $file = Input::file('report');
	            $extension = Input::file('report')->getClientOriginalExtension();

	            $name = 'report_'.strtotime("now").'.'.strtolower($extension);
	            $file = $file->move($destination, $name);
	            $file_name = $destination.$name;
		    	$sheet_name = '2018_Training Progress_Summary-';

		    	include(app_path().'/libraries/Classes/PHPExcel/IOFactory.php');

		    	if($extension == 'xls'){
		    		$objReader = new PHPExcel_Reader_Excel5();
		    	}else{
		    		$objReader = new PHPExcel_Reader_Excel2007();
		    	}

				$objReader->setReadDataOnly(true);
				$objPHPExcel = $objReader->load($file_name);
				$objReader->setLoadSheetsOnly($sheet_name);
				$sheet = $objPHPExcel->getSheet(0);
				$highestRow = $sheet->getHighestRow(); 
				
				TrainingProgressReport::truncate();

				for ($row = 2; $row <= $highestRow; $row++){ 
					$sub_product = $objPHPExcel->getActiveSheet()->getCell('B'.$row)->getValue();
					$subProduct = SubProduct::where('name',trim($sub_product))->first();

		   			if(!$subProduct){
		   				$subProduct = new SubProduct;
		   				$subProduct->name = trim($sub_product);
		   				$subProduct->save();
		   			}

		   			$report = new TrainingProgressReport;
		   			$report->product_line_code_hr = $objPHPExcel->getActiveSheet()->getCell('A'.$row)->getValue();
		   			$report->subproduct_id = $subProduct->id;
		   			$report->alias = $objPHPExcel->getActiveSheet()->getCell('C'.$row)->getValue();
		   			$report->full_name = $objPHPExcel->getActiveSheet()->getCell('D'.$row)->getValue();
		   			$report->gin = $objPHPExcel->getActiveSheet()->getCell('E'.$row)->getValue();
		   			$report->grade = $objPHPExcel->getActiveSheet()->getCell('F'.$row)->getValue();
		   			$report->month_of_no_training = $objPHPExcel->getActiveSheet()->getCell('G'.$row)->getValue();
		   			$report->month_in_step = $objPHPExcel->getActiveSheet()->getCell('H'.$row)->getValue();
		   			$report->country_assn = $objPHPExcel->getActiveSheet()->getCell('I'.$row)->getValue();
		   			$report->city_assn = $objPHPExcel->getActiveSheet()->getCell('J'.$row)->getValue();
		   			$report->job = $objPHPExcel->getActiveSheet()->getCell('K'.$row)->getValue();
		   			$report->job_code = $objPHPExcel->getActiveSheet()->getCell('L'.$row)->getValue();
		   			$report->hr_org_unit = $objPHPExcel->getActiveSheet()->getCell('N'.$row)->getValue();
		   			$report->delay = $objPHPExcel->getActiveSheet()->getCell('O'.$row)->getValue();
		   			$report->step1 = $objPHPExcel->getActiveSheet()->getCell('P'.$row)->getValue();
		   			$report->step2 = $objPHPExcel->getActiveSheet()->getCell('Q'.$row)->getValue();
		   			$report->step3 = $objPHPExcel->getActiveSheet()->getCell('R'.$row)->getValue();
		   			$report->step4 = $objPHPExcel->getActiveSheet()->getCell('S'.$row)->getValue();
		   			$report->indivisual_global_training_progress = $objPHPExcel->getActiveSheet()->getCell('T'.$row)->getValue();
		   			$report->indivisual_expected_global_training_progress = $objPHPExcel->getActiveSheet()->getCell('U'.$row)->getValue();
		   			$report->expected_against_actual = $objPHPExcel->getActiveSheet()->getCell('V'.$row)->getValue();
		   			$report->indivisual_fst_progress = $objPHPExcel->getActiveSheet()->getCell('W'.$row)->getValue();
		   			$report->indivisual_expected_fst_progress = $objPHPExcel->getActiveSheet()->getCell('X'.$row)->getValue();
		   			$report->available_fixed_step_months = $objPHPExcel->getActiveSheet()->getCell('Y'.$row)->getValue();

		   			$report->training_start_date = date("Y-m-d",strtotime($objPHPExcel->getActiveSheet()->getCell('Z'.$row)->getValue()));

		   			$report->area_region = $objPHPExcel->getActiveSheet()->getCell('AA'.$row)->getValue();
		   			$report->geo_market_code = $objPHPExcel->getActiveSheet()->getCell('AB'.$row)->getValue();
		   			$report->manager_last_name = $objPHPExcel->getActiveSheet()->getCell('AC'.$row)->getValue();
		   			$report->manager_first_name = $objPHPExcel->getActiveSheet()->getCell('AD'.$row)->getValue();
		   			$report->gender = $objPHPExcel->getActiveSheet()->getCell('AE'.$row)->getValue();
		   			$report->job_function = $objPHPExcel->getActiveSheet()->getCell('AF'.$row)->getValue();
		   			$report->seniority_months = $objPHPExcel->getActiveSheet()->getCell('AG'.$row)->getValue();
		   			$report->position_flag = $objPHPExcel->getActiveSheet()->getCell('AH'.$row)->getValue();
		   			$report->month_step = $objPHPExcel->getActiveSheet()->getCell('AJ'.$row)->getValue();
		   			$report->save();

				    
				}

				return Redirect::back()->with('success','Excel file is uploaded successfully');
	        }

    	}else{
    		return Redirect::back()->withErrors($validator);
    	}
    }

    public function jobProgressReport($subproduct_id){
    	$jobs = TrainingProgressReport::distinct()->where('subproduct_id',$subproduct_id)->get(['job','job_code']);
    	$this->layout->sidebar = "";
        $this->layout->main = View::make('admin.progress-report',["jobs"=>$jobs , "subproduct_id"=>$subproduct_id]);
    }
   	
   	public function jobMembers($job_code , $subproduct_id){
   		$jobDetails = TrainingProgressReport::select('job','sub_products.name as sub_product')->where('subproduct_id',$subproduct_id)->where('job_code',$job_code)->join('sub_products','sub_products.id','=','training_progress_report.subproduct_id')->first();
   		
   		$jobDetails->subproduct_id = $subproduct_id;
   		
   		$jobDetails->members = TrainingProgressReport::select('full_name','seniority_months','month_step','indivisual_global_training_progress','indivisual_expected_global_training_progress','expected_against_actual','available_fixed_step_months','month_of_no_training')->where('subproduct_id',$subproduct_id)->where('job_code',$job_code)->orderBy('indivisual_global_training_progress','ASC')->get();

   		$this->layout->sidebar = "";
        $this->layout->main = View::make('admin.members',["jobDetails"=>$jobDetails]);
   	}
}