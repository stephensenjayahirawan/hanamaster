<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Applicants;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
	public function index(){
		$today = date("Y-m-d");
		$jobs = Jobs::where('is_deleted',0)->whereDate('valid_from', '<=', $today)->whereDate('valid_to', '>=', $today)->get();
		return view('Home',compact('jobs'));
	}

	public function basic_email() {
		$data = array('name'=>"Virat Gandhi");

		Mail::send(['text'=>'mail'], $data, function($message) {
			$message->to('stphn2909@gmail.com', 'Tutorials Point')->subject
			('Laravel Basic Testing Mail');
			$message->from('xyz@gmail.com','Virat Gandhi');
		});
		echo "Basic Email Sent. Check your inbox.";
	}
	public function send_email() {
		$data = array('name'=>"PELAMAR BROTHER",
			'title'=>"MARKETING DEIRECTOR");

		Mail::send('emails.template_email', $data, function($message) {
			$message->to('stphn2909@gmail.com', 'Tutorials Point')->subject
			('Laravel HTML Testing Mail');
			$message->from('no-reply@hanamaster.co.id','Virat Gandhi');
		});
		echo "HTML Email Sent. Check your inbox.";
	}

	public function apply(Request $request)
	{
		if(substr($request->input('phone'),0,3) == '+62'){
			$phone_number = substr($request->input('phone'),1);
		}
		else if (substr($request->input('phone'),0,2) == '62'){
			$phone_number = $request->input('phone');
		}
		else if(substr($request->input('phone'),0,1) == '0'){
			$phone_number = '62'.substr($request->input('phone'),1);
		}
		else{
			$phone_number = '62'.$request->input('phone');
		}
		$request->merge(['phone' => $phone_number]);
		$validatedData = $request->validate([
			'name' => 'required',
			'email' => 'email|required',
			'phone' => 'required|phone:ID',
			'uploaded_file' => 'required',
    		'captcha' => 'required|captcha'
		],
		['captcha.captcha'=>'Invalid captcha code.',
		'phone.phone'=>'Invalid phone number format.']);
		$extension = $request->file('uploaded_file')->getClientOriginalExtension();
		// print_r($request->file('uploaded_file')->getSize());
		// print_r($extension);
		// return;
		if(($request->file('uploaded_file')->getSize() / 1000 ) > 4096){
			return redirect('/')->with('alert-success','Max size CV file is 4MB!')->withInput($request->input());
		}
		if($extension != 'pdf'){
			return redirect('/')->with('alert-success','File CV must be in PDF format!')->withInput($request->input());
		}
		
		$application_no = $this->generateApplicationNo(10);

		$checkApplicationNo = Applicants::where([['application_no', $application_no]])->get();
		while($checkApplicationNo->count()){
			$application_no = $this->generateApplicationNo(10);
			$checkApplicationNo = Applicants::where([['application_no', $application_no]])->first();
		}
		$file = $request->file('uploaded_file');
		
	 
		$nama_file = time()."_".$file->getClientOriginalName();
	 
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
	 
		$Applicants = new Applicants();
		$Applicants->name = $request->input('name');
		$Applicants->application_no = $application_no;
		$Applicants->email = $request->input('email');
		$Applicants->phone_number = $request->input('phone');
		$Applicants->file_cv = $nama_file;
		$Applicants->job_id = $request->input('job_id');
		
		$Applicants->save();
		$mails = ['info@hanamaster.co.id', $Applicants->email];
		$details = [
			'title' => $request->input('job_title'),
			'body' => 'This is for testing email using smtp',
			'application_no' => $application_no,
			'name' => $Applicants->name,
			'mail_to' => $Applicants->email,
			'uploaded_file' => $tujuan_upload.'/'.$nama_file,
			'mails_to' => $mails
		];

		\Mail::to($Applicants->email)->send(new \App\Mail\EmailController($details));

		if (!Mail::failures()) {
			return redirect('/')->with('alert-success','You Have Successfully Applied for '.$request->input('job_title').'. Please check your email for further information.');
		}else{
			return redirect('/')->with('alert-success','There is something wrong when sending the email.');
		}

	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptchaPost(Request $request)
    {
    	request()->validate([
    		'email' => 'required|email',
    		'password' => 'required',
    		'captcha' => 'required|captcha'
    	],
    	['captcha.captcha'=>'Invalid captcha code.']);
    	dd("You are here :) .");
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function refreshCaptcha()
    {
    	return response()->json(['captcha'=> captcha_img()]);
	}
	
	private function generateApplicationNo($length){
		$result = "";
		for ($i = 0; $i < $length; $i++) 
		{
			$result .= mt_rand(0,9);
		}
		return $result;
	}
}
