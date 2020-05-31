<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()){
            $job_vacancy = 'class=active';
            $title = "Job Vacancy List - Hana Master Admin";
            $jobs = Jobs::where('is_deleted',0)->orderBy('valid_to', 'DESC')->get();
            return view('admin/job_vacancy',compact(array('jobs', 'title', 'job_vacancy')));
        }
        else{
            return redirect('/admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()){
            $title = "Add New Job Vacancy - Hana Master Admin";
            $job_vacancy = 'class=active';
            return view('admin/job_vacancy_add', compact(array('title', 'job_vacancy')));
        }
        else{
            return redirect('/admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()){
            date_default_timezone_set('Asia/Jakarta');
            $validatedData = $request->validate([
                'job_title' => 'required',
                'last_registration_date' => 'required',
                'content' => 'required',
            ]);
        dd($validatedData);
            
if ($validatedData->fails()) {
        dd($validatedData);

            return redirect('post/create')
            ->withErrors($validator)
            ->withInput();
        }
            $last_registration_unix = strtotime($request->input('last_registration_date'));
            $today_unix = time();
            if($last_registration_unix < $today_unix){
                return redirect('/admin/job_vacancy/add')->with('alert','Last Registration Date must be greater than today!')->withInput($request->input());
            }
            $job = new Jobs();
            $job->title = $request->input('job_title');
            $job->content = $request->input('content');
            $job->valid_to = date("Y-m-d", strtotime($request->input('last_registration_date')) );
            $job->is_deleted = 0;
            $job->valid_from = date('Y-m-d');
            $job->added_by = Auth::user()->id;
            if($job->save()){
                return redirect('/admin/job_vacancy')->with('alert-success','Successfully add new job vacancy!');
            }
            else{
                return redirect('/admin/job_vacancy/add')->with('alert','Failed add new job vacancy!');
            }
        }
        else{
            return redirect('/admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()){
            $job_vacancy = 'class=active';
            $title = "Job Vacancy Detail - Hana Master Admin";
            $job = Jobs::where([['id', $id], ['is_deleted', 0]])->first();
            if($job->count()){
                return view('admin/job_vacancy_show',compact(array('job', 'title', 'job_vacancy')));
            }
            else{
                return redirect('/admin/job_vacancy')->with('alert','Cant find Job Vacancy ID!');
            }
        }
        else{
            return redirect('/admin');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()){
            $title = "Edit Job Vacancy - Hana Master Admin";
            $job_vacancy = 'class=active';
            $job = Jobs::where([['id', $id], ['is_deleted', 0]])->first();
            if($job->count()){
                return view('admin/job_vacancy_edit',compact(array('job', 'title', 'job_vacancy')));
            }
            else{
                return redirect('/admin/job_vacancy')->with('alert','Cant find Job Vacancy ID!');
            }
        }
        else{
            return redirect('/admin');
        }
    }

    /**
     * Post edit job vacancy
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request)
    {
        if (Auth::user()){
            date_default_timezone_set('Asia/Jakarta');
            $validatedData = $request->validate([
                'job_title' => 'required',
                'last_registration_date' => 'required',
                'content' => 'required',
            ]);
            $last_registration_unix = strtotime($request->input('last_registration_date'));
            $today_unix = time();

            if($last_registration_unix < $today_unix){
                return redirect('/admin/job_vacancy/edit/'.$request->input('jobId'))->with('alert','Last Registration Date must be greater than today!')->withInput($request->input());
            }
            $job = Jobs::where([['id', $request->input('jobId')], ['is_deleted', 0]])
                            ->update(['title' => $request->input('job_title'),
                                    'valid_to' => date("Y-m-d", strtotime($request->input('last_registration_date')) ),
                                    'content' => $request->input('content')]
                                    );
            if($job){
                return redirect('/admin/job_vacancy')->with('alert-success','Successfully edit job vacancy!');
            }
            else{
                return redirect('/admin/job_vacancy/edit/'.$request->input('jobId'))->with('alert','Failed to edit job vacancy!');
            }
        }
        else{
            return redirect('/admin');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobs $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()){
            $job = Jobs::where('id', $id)->first();
            $job = Jobs::where('id', $id)
                    ->update(['is_deleted' => 1]);
            if($job){
                return redirect('/admin/job_vacancy')->with('alert-success','Successfully deleted job vacancy!');
            }
            else{
                // return redirect('/admin/job_vacancy')
            }
        }
        else{
            return redirect('/admin');
        }
        
    }
}
