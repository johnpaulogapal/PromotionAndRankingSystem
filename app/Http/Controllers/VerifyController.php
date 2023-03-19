<?php

namespace App\Http\Controllers;

use App\Models\Mpo;
use App\Models\Phd;
use App\Models\Prc;
use App\Models\User;
use App\Models\Master;
use App\Models\Training;
use App\Models\Undergrad;
use App\Models\Application;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function profileResubmit(Request $request, User $user){

        $userInfo = $request->validate([
            'comment' => 'required',
        ]);

        $userInfo['status'] = 'resubmit';

        $user->update($userInfo);
        
        return redirect()->route('received.show', $user->id)->with('message', 'User Personal Information has been updated for editing');
    }

    public function profileVerified(User $user){

        $userInfo['status'] = 'verified';

        $user->update($userInfo);
        
        return redirect()->route('received.show', $user->id)->with('message', 'User Personal Information has been Verified');
    }

    public function applicationResubmit(Request $request, Application $application){

        $applicationInfo = $request->validate([
            'comment' => 'required',
        ]);

        $applicationInfo['status'] = 'resubmit';

        $application->update($applicationInfo);
        
        return redirect()->route('received.show', $application->user_id)->with('message', 'User Application Information has been updated for editing');
    }

    public function applicationVerified(Application $application){

        $applicationInfo['status'] = 'verified';

        $application->update($applicationInfo);
        
        return redirect()->route('received.show', $application->user_id)->with('message', 'User Application Information has been Verified');
    }

    public function undergradResubmit(Request $request, Undergrad $undergrad){

        $undergradInfo = $request->validate([
            'comment' => 'required',
        ]);

        $undergradInfo['status'] = 'resubmit';

        $undergrad->update($undergradInfo);
        
        return redirect()->route('received.show', $undergrad->user_id)->with('message', 'User Undergrad Information has been updated for editing');
    }

    public function undergradVerified(Undergrad $undergrad){

        $undergradInfo['status'] = 'verified';

        $undergrad->update($undergradInfo);
        
        return redirect()->route('received.show', $undergrad->user_id)->with('message', 'User Undergrad Information has been Verified');
    }

    public function masterResubmit(Request $request, Master $master){

        $masterInfo = $request->validate([
            'comment' => 'required',
        ]);

        $masterInfo['status'] = 'resubmit';

        $master->update($masterInfo);
        
        return redirect()->route('received.show', $master->user_id)->with('message', 'User Masters Information has been updated for editing');
    }

    public function masterVerified(Master $master){

        $masterInfo['status'] = 'verified';

        $master->update($masterInfo);
        
        return redirect()->route('received.show', $master->user_id)->with('message', 'User Masters Information has been Verified');
    }

    public function phdResubmit(Request $request, Phd $phd){

        $phdInfo = $request->validate([
            'comment' => 'required',
        ]);

        $phdInfo['status'] = 'resubmit';

        $phd->update($phdInfo);
        
        return redirect()->route('received.show', $phd->user_id)->with('message', 'User PHD Information has been updated for editing');
    }

    public function phdVerified(Phd $phd){

        $phdInfo['status'] = 'verified';

        $phd->update($phdInfo);
        
        return redirect()->route('received.show', $phd->user_id)->with('message', 'User PHD Information has been Verified');
    }

    public function prcResubmit(Request $request, Prc $prc){

        $prcInfo = $request->validate([
            'comment' => 'required',
        ]);

        $prcInfo['status'] = 'resubmit';

        $prc->update($prcInfo);
        
        return redirect()->route('received.show', $prc->user_id)->with('message', 'User Prc License Information has been updated for editing');
    }

    public function prcVerified(Prc $prc){

        $prcInfo['status'] = 'verified';

        $prc->update($prcInfo);
        
        return redirect()->route('received.show', $prc->user_id)->with('message', 'User Prc License Information has been Verified');
    }

    public function mpoResubmit(Request $request, Mpo $mpo){

        $mpoInfo = $request->validate([
            'comment' => 'required',
        ]);

        $mpoInfo['status'] = 'resubmit';

        $mpo->update($mpoInfo);
        
        return redirect()->route('received.show', $mpo->user_id)->with('message', 'User Membership in Professional Organization Information has been updated for editing');
    }

    public function mpoVerified(Mpo $mpo){

        $mpoInfo['status'] = 'verified';

        $mpo->update($mpoInfo);
        
        return redirect()->route('received.show', $mpo->user_id)->with('message', 'User Membership in Professional Organization Information has been Verified');
    }

    public function trainingResubmit(Request $request, Training $training){

        $trainingInfo = $request->validate([
            'comment' => 'required',
        ]);

        $trainingInfo['status'] = 'resubmit';

        $training->update($trainingInfo);
        
        return redirect()->route('received.show', $training->user_id)->with('message', 'User Training/Seminars/Webinars Information has been updated for editing');
    }

    public function trainingVerified(Training $training){

        $trainingInfo['status'] = 'verified';

        $training->update($trainingInfo);
        
        return redirect()->route('received.show', $training->user_id)->with('message', 'User Training/Seminars/Webinars Information has been Verified');
    }

    public function applicationApproved(Application $application){

        $applicationInfo['app_status'] = 'approved';

        $application->update($applicationInfo);
        
        return redirect()->route('approved.index')->with('message', 'Application has been Approved');
    }
}
