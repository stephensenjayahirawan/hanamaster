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
		// $validatedData =  Validator::make($request->all(), [
		// 	'name' => 'email|required',
		// 	'email' => 'email|required',
		// 	'phone' => 'required',
		// 	'uploaded_file' => 'required',
  //   		'captcha' => 'required|captcha'
		// ],
		// ['captcha.captcha'=>'Invalid captcha code.']);
		$validatedData = $request->validate([
			'name' => 'required',
			'email' => 'email|required',
			'phone' => 'required',
			'uploaded_file' => 'required',
    		'captcha' => 'required|captcha'
		],
		['captcha.captcha'=>'Invalid captcha code.']);

		$file = $request->file('uploaded_file');
	 
		$nama_file = time()."_".$file->getClientOriginalName();
	 
	      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
	 
		$Applicants = new Applicants();
		$Applicants->name = $request->input('name');
		$Applicants->email = $request->input('email');
		$Applicants->phone_number = $request->input('phone');
		$Applicants->file_cv = $nama_file;
		$Applicants->job_id = $request->input('job_id');
		
		$Applicants->save();
		$details = [
			'title' => $request->input('job_title'),
			'body' => 'This is for testing email using smtp',
			'name' => $Applicants->name,
			'mail_to' => $Applicants->email,
			'uploaded_file' => $tujuan_upload.'/'.$nama_file
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
}
