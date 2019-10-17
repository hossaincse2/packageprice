<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Contracts\PackageInterface;
use App\Http\Requests\PackageRequest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id = null, PackageRequest $request, PackageInterface $package, Package $companyEloquent, ActivityLogInterface $activityInterFace)
    {
        $message = "";

        //print_r($request->all()); exit;
        //print_r($request_ex);
        //exit;


        try {
            if ($request->isMethod("POST")) {
                $requestExcept = $request->except(['save', '_token']);
                //dd($requestExcept);
                //print_r($requestExcept); 


                if ($id) {
                    $log_title = "Edit Company";
                    $message = "Company Updated Successfully!";
                    $companyEloquent = $package->find($id);

                    $ArrayByID = $companyEloquent->toArray();

                   // dd($ArrayByID);

                    //echo $oldvalueNewvalue;exit;

                    if ($companyEloquent->id == $id)
                        $data = $companyEloquent->update($request->all());
                } else {
                    $ArrayByID = "";
                    $log_title = "Add Company";
                    $companyEloquent->fill($request->all());

                    //print_r($companyEloquent);exit;
                    $data = $package->save($companyEloquent);
                    $message = "Company Added Successfully!";
                }

                if ($data) {
                    $log_type = "audit_log";

                    $activityInterFace->dataSave($id, $requestExcept, $ArrayByID, $log_title, $log_type);

                    Session::flash('m-class', 'alert-success');
                    Session::flash('message', $message);

                    return redirect()->route('company-list');
                }
            }
        } catch (\Exception $e) {
            $dBmessage = $e->getMessage();
            $message = "Something went wrong please try again!";
            $log_type = "error_log";
            $activityInterFace->dataSave($id = "", $dBmessage, $ArrayByID = "", $log_title, $log_type);

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'exception' => [$message]
            ]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
