<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\PackageInterface;
use Session;

class IndexController extends Controller
{
    public function index(PackageInterface $package){

        return view('welcome',[ 'data' => $package->findAll()]);
    }

    public function package(PackageInterface $package){

        return view('package',[ 'data' => $package->findAll()]);
    }
}
