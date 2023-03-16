<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use App\Models\Master;
use App\Models\Mpo;
use App\Models\Phd;
use App\Models\Prc;
use App\Models\Training;
use App\Models\Undergrad;
use Illuminate\Http\Request;

class ReceivedController extends Controller
{
    public function index(){
        return view('admin.received.index', [
            'receivedApplications' => Application::where('status', 'received')->get(),
        ]);
    }

    public function show(User $user){
        return view('admin.received.show', [
            'user' => $user,
        ]);
    }

    // VERIFY
    public function profile(User $user){
        return view('admin.received.verify.profile', [
            'user' => $user,
        ]);
    }

    public function application(Application $application){
        return view('admin.received.verify.application', [
            'application' => $application,
        ]);
    }

    public function undergrad(Undergrad $undergrad){
        return view('admin.received.verify.undergrad', [
            'undergrad' => $undergrad,
        ]);
    }

    public function masters(Master $master){
        return view('admin.received.verify.masters', [
            'master' => $master,
        ]);
    }

    public function phd(Phd $phd){
        return view('admin.received.verify.phd', [
            'phd' => $phd,
        ]);
    }

    public function prc(Prc $prc){
        return view('admin.received.verify.prc', [
            'prc' => $prc,
        ]);
    }

    public function mpo(Mpo $mpo){
        return view('admin.received.verify.mpo', [
            'mpo' => $mpo,
        ]);
    }

    public function training(Training $training){
        return view('admin.received.verify.training', [
            'training' => $training,
        ]);
    }
}
