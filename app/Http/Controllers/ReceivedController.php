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
            'receivedApplications' => Application::where('received', 1)->get(),
        ]);
    }

    public function show(User $user){
        return view('admin.received.show', [
            'user' => $user,
        ]);
    }

    // VERIFY
    public function profile(User $user){

        if($user->status == 'resubmit')
            $userInfo['status'] = 'resubmit';
        elseif($user->status == 'approved')
            $userInfo['status'] = 'approved';
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
        elseif($application->status == 'approved')
            $applicationInfo['status'] = 'approved';
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
        elseif($undergrad->status == 'approved')
            $undergradInfo['status'] = 'approved';
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
        elseif($master->status == 'approved')
            $masterInfo['status'] = 'approved';
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
        elseif($phd->status == 'approved')
            $phdInfo['status'] = 'approved';
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
        elseif($prc->status == 'approved')
            $prcInfo['status'] = 'approved';
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
        elseif($mpo->status == 'approved')
            $mpoInfo['status'] = 'approved';
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
        elseif($training->status == 'approved')
            $trainingInfo['status'] = 'approved';
        else
            $trainingInfo['status'] = 'processing';

        $training->update($trainingInfo);
        
        return view('admin.received.verify.training', [
            'training' => $training,
        ]);
    }
}
