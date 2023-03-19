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
            'receivedApplications' => Application::where('app_status', 'received')->get(),
        ]);
    }

    public function show(User $user){
        return view('admin.received.show', [
            'user' => $user,
            'totalEdubg' => Undergrad::where('status', 'verified')->get()->count(),
        ]);
    }

    // VERIFY
    public function profile(User $user){

        if($user->status == 'resubmit')
            $userInfo['status'] = 'resubmit';
        elseif($user->status == 'verified')
            $userInfo['status'] = 'verified';
        else
            $userInfo['status'] = 'processing';
            
        $user->update($userInfo);

        return view('admin.received.verify.profile', [
            'user' => $user,
        ]);
    }

    public function application(Application $application){

        if($application->status == 'resubmit')
            $applicationInfo['status'] = 'resubmit';
        elseif($application->status == 'verified')
            $applicationInfo['status'] = 'verified';
        else
            $applicationInfo['status'] = 'processing';

        $application->update($applicationInfo);

        return view('admin.received.verify.application', [
            'application' => $application,
        ]);
    }

    public function undergrad(Undergrad $undergrad){

        if($undergrad->status == 'resubmit')
            $undergradInfo['status'] = 'resubmit';
        elseif($undergrad->status == 'verified')
            $undergradInfo['status'] = 'verified';
        else
            $undergradInfo['status'] = 'processing';

        $undergrad->update($undergradInfo);

        return view('admin.received.verify.undergrad', [
            'undergrad' => $undergrad,
        ]);
    }

    public function masters(Master $master){

        if($master->status == 'resubmit')
            $masterInfo['status'] = 'resubmit';
        elseif($master->status == 'verified')
            $masterInfo['status'] = 'verified';
        else
            $masterInfo['status'] = 'processing';

        $master->update($masterInfo);

        return view('admin.received.verify.masters', [
            'master' => $master,
        ]);
    }

    public function phd(Phd $phd){

        if($phd->status == 'resubmit')
            $phdInfo['status'] = 'resubmit';
        elseif($phd->status == 'verified')
            $phdInfo['status'] = 'verified';
        else
            $phdInfo['status'] = 'processing';

        $phd->update($phdInfo);

        return view('admin.received.verify.phd', [
            'phd' => $phd,
        ]);
    }

    public function prc(Prc $prc){

        if($prc->status == 'resubmit')
            $prcInfo['status'] = 'resubmit';
        elseif($prc->status == 'verified')
            $prcInfo['status'] = 'verified';
        else
            $prcInfo['status'] = 'processing';

        $prc->update($prcInfo);

        return view('admin.received.verify.prc', [
            'prc' => $prc,
        ]);
    }

    public function mpo(Mpo $mpo){

        if($mpo->status == 'resubmit')
            $mpoInfo['status'] = 'resubmit';
        elseif($mpo->status == 'verified')
            $mpoInfo['status'] = 'verified';
        else
            $mpoInfo['status'] = 'processing';

        $mpo->update($mpoInfo);

        return view('admin.received.verify.mpo', [
            'mpo' => $mpo,
        ]);
    }

    public function training(Training $training){

        if($training->status == 'resubmit')
            $trainingInfo['status'] = 'resubmit';
        elseif($training->status == 'verified')
            $trainingInfo['status'] = 'verified';
        else
            $trainingInfo['status'] = 'processing';

        $training->update($trainingInfo);
        
        return view('admin.received.verify.training', [
            'training' => $training,
        ]);
    }
}
