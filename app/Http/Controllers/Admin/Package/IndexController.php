<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Contracts\PackageInterface;
use App\Contracts\ActivityLogInterface;
use App\Http\Requests\PackageRequest;
use Illuminate\Http\Request;

use Session;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PackageInterface $package)
    {
        return view('admin.package.index',['data' => $package->findAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null, PackageInterface $packageRepo, Package $packageEloquent)
    {
        if ($id) {
            $title = "Edit Package";
            $package = $packageRepo->find($id);
        } else {
            $package = $packageEloquent;
            $title = "Add New Package";
        }
        $message = "";
        return view('admin.package.create', ['message' => $message, "package" => $package, 'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id = null, PackageRequest $request, PackageInterface $package, Package $packageEloquent, ActivityLogInterface $activityInterFace)
    {
        $message = "";
        //dd($request->all());
        try {
            if ($request->isMethod("POST")) {
                $requestExcept = $request->except(['save', '_token']);
                //dd($requestExcept);
                //print_r($requestExcept);   
                if ($id) {
                    $log_title = "Edit Package";
                    $message = "Package Updated Successfully!";
                    $packageEloquent = $package->find($id);

                    $ArrayByID = $packageEloquent->toArray();

                   // dd($ArrayByID);

                    //echo $oldvalueNewvalue;exit;

                    if ($packageEloquent->id == $id)
                        $data = $packageEloquent->update($request->all());
                } else {
                    $ArrayByID = "";
                    $log_title = "Add Package"; 
                    $packageEloquent->fill($request->all());
                     //dd($packageEloquent);
                    //print_r($companyEloquent);exit;
                    $data = $package->save($packageEloquent);
                    $message = "Package Added Successfully!";
                }

                if ($data) {
                    $log_type = "audit_log";

                    $activityInterFace->dataSave($id, $requestExcept, $ArrayByID, $log_title, $log_type);

                    Session::flash('m-class', 'alert-success');
                    Session::flash('message', $message);

                    return redirect()->route('package');
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
