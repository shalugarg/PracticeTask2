<?php

namespace App\Http\Controllers;

use View;
use Input;
use App\Entity\Feedback as Feedback;
use Illuminate\Http\Request;
use Excel;
use Validator;


class FeedbackController extends Controller
{
    
   /**
   *Function to show the feedback page 
   *@param request object
   */
   public function index(){
   	 return view('welcome');
   }

   /**
   *Function to store the feedback submitted by customers
   *@param request object
   */
   public function store(Request $request){

   		$validatedData = Validator::make($request->all(),[
	        'first_name' => 'required|max:100',
	        'last_name' => 'required|max:100',
	        'email' => 'required|email',
	        'telephone' => 'min:11|numeric',
	        'feedback_nature' => 'required',
	        'details' => 'required | max:1000',
    	]);

   		if($validatedData->fails())
	    {
	        return redirect()->back()->withErrors($validatedData->errors())->withInput();
	    }
	   	$feedback=Feedback::create(Input::except('_token'));
		return redirect()->route('feedbacksuccess');

   	}

	/**
   *Function to list the feedbacks submitted by customers
   *@param null
   */
   	public function list(){
   		$feedbacks=Feedback::orderBy('created_at','DESC')->get();
   		return View::make('feedbackList')->with('feedbacks',$feedbacks);;
   	}

   /**
   *Function to show success message after feedback submission
   *@param null
   */
	public function success(){
		return view('feedbackSuccess');
	}

    /**
   *Function to export the feedback result on listing page
   *@param request object
   */
	public function export(){
		$feedbacks=Feedback::orderBy('created_at')->get();
		$feedbackArray[] = ['Date', 'Name','Email Address','Nature of feedback','Details'];
		// Convert each member of the returned collection into an array,
    	// and append it to the Result array.
    	foreach($feedbacks as $feedback){
    		$resultArray=array();
    		$resultArray[]=date_format($feedback->created_at,'d/m/y');
    		$resultArray[]=ucfirst($feedback->first_name) .' '.ucfirst($feedback->last_name);
    		$resultArray[]=$feedback->email; 
    		switch($feedback->feedback_nature){
	            case 1: $resultArray[]= 'Feature request';break;
	            case 2: $resultArray[]= 'General feedback';break;
	            case 3: $resultArray[]= 'Bug';break;
          }

    		$resultArray[]=$feedback->details;
    		$feedbackArray[]=$resultArray;
		}
		
		// Generate and return the spreadsheet
		    Excel::create('GomoLearningFeedbackReport', function($excel) use ($feedbackArray) {

		        // Set the spreadsheet title, creator, and description
		        $excel->setTitle('Feedback Report');
		        $excel->setCreator('Michel')->setCompany('Gomo Learning');
		        $excel->setDescription('Customer Feedback File');

		        // Build the spreadsheet, passing in the payments array
		        $excel->sheet('sheet1', function($sheet) use ($feedbackArray) {	
		        	$sheet->rows($feedbackArray);		        	
		        	$sheet->setAutoSize(true);		          		           
		        });

		    })->download('xls');
		    die;
	}
}