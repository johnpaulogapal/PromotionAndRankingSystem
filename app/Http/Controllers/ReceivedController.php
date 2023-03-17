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

        $userInfo['status'] = 'processing';

        $user->update($userInfo);

        return view('admin.received.verify.profile', [
            'user' => $user,
        ]);
    }

    public function application(Application $application){

        $applicationInfo['status'] = 'processing';

        $application->update($applicationInfo);

        return view('admin.received.verify.application', [
            'application' => $application,
        ]);
    }

    public function undergrad(Undergrad $undergrad){

        $undergradInfo['status'] = 'processing';

        $undergrad->update($undergradInfo);

        return view('admin.received.verify.undergrad', [
            'undergrad' => $undergrad,
        ]);
    }

    public function masters(Master $master){

        $masterInfo['status'] = 'processing';

        $master->update($masterInfo);

        return view('admin.received.verify.masters', [
            'master' => $master,
        ]);
    }

    public function phd(Phd $phd){

        $phdInfo['status'] = 'processing';

        $phd->update($phdInfo);

        return view('admin.received.verify.phd', [
            'phd' => $phd,
        ]);
    }

    public function prc(Prc $prc){

        $prcInfo['status'] = 'processing';

        $prc->update($prcInfo);

        return view('admin.received.verify.prc', [
            'prc' => $prc,
        ]);
    }

    public function mpo(Mpo $mpo){

        $mpoInfo['status'] = 'processing';

        $mpo->update($mpoInfo);

        return view('admin.received.verify.mpo', [
            'mpo' => $mpo,
        ]);
    }

    public function training(Training $training){

        $trainingInfo['status'] = 'processing';

        $training->update($trainingInfo);
        
        return view('admin.received.verify.training', [
            'training' => $training,
        ]);
    }
}
