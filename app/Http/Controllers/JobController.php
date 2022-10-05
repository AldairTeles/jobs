<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Job $job): View
    {
        $jobs = Job::with(['company'])->get();

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create', [
            'companies' => Company::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company_id' => 'required',
        ]);

        $company = Company::find($data['company_id']);

        $job = new Job();
        $job->fill($data);

        $company->jobs()->save($job);

        return redirect()->route('jobs.index');
    }

    public function show(Job $job): View
    {
        return view('jobs.show', [
            'job' => $job,
            'users' => $job->users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job): View
    {
        return view('jobs.edit', [
            'jobs' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $job->fill($data);
        $job->save();

        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index');
    }

    public function apply(Job $job, User $user): RedirectResponse
    {
        $user->jobs()->attach($job);
        return redirect()->route('jobs.index');
    }
}
