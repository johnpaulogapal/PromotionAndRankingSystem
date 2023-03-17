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

    public function profileApproved(User $user){

        $userInfo['status'] = 'approved';

        $user->update($userInfo);
        
        return redirect()->route('received.show', $user->id)->with('message', 'User Personal Information has been Approved');
    }

    public function applicationResubmit(Request $request, Application $application){

        $applicationInfo = $request->validate([
            'comment' => 'required',
        ]);

        $applicationInfo['status'] = 'resubmit';

        $application->update($applicationInfo);
        
        return redirect()->route('received.show', $application->user_id)->with('message', 'User Application Information has been updated for editing');
    }

    public function applicationApproved(Application $application){

        $applicationInfo['status'] = 'approved';

        $application->update($applicationInfo);
        
        return redirect()->route('received.show', $application->user_id)->with('message', 'User Application Information has been Approved');
    }

    public function undergradResubmit(Request $request, Undergrad $undergrad){

        $undergradInfo = $request->validate([
            'comment' => 'required',
        ]);

        $undergradInfo['status'] = 'resubmit';

        $undergrad->update($undergradInfo);
        
        return redirect()->route('received.show', $undergrad->user_id)->with('message', 'User Undergrad Information has been updated for editing');
    }

    public function undergradApproved(Undergrad $undergrad){

        $undergradInfo['status'] = 'approved';

        $undergrad->update($undergradInfo);
        
        return redirect()->route('received.show', $undergrad->user_id)->with('message', 'User Undergrad Information has been Approved');
    }

    public function masterResubmit(Request $request, Master $master){

        $masterInfo = $request->validate([
            'comment' => 'required',
        ]);

        $masterInfo['status'] = 'resubmit';

        $master->update($masterInfo);
        
        return redirect()->route('received.show', $master->user_id)->with('message', 'User Masters Information has been updated for editing');
    }

    public function masterApproved(Master $master){

        $masterInfo['status'] = 'approved';

        $master->update($masterInfo);
        
        return redirect()->route('received.show', $master->user_id)->with('message', 'User Masters Information has been Approved');
    }

    public function phdResubmit(Request $request, Phd $phd){

        $phdInfo = $request->validate([
            'comment' => 'required',
        ]);

        $phdInfo['status'] = 'resubmit';

        $phd->update($phdInfo);
        
        return redirect()->route('received.show', $phd->user_id)->with('message', 'User PHD Information has been updated for editing');
    }

    public function phdApproved(Phd $phd){

        $phdInfo['status'] = 'approved';

        $phd->update($phdInfo);
        
        return redirect()->route('received.show', $phd->user_id)->with('message', 'User PHD Information has been Approved');
    }

    public function prcResubmit(Request $request, Prc $prc){

        $prcInfo = $request->validate([
            'comment' => 'required',
        ]);

        $prcInfo['status'] = 'resubmit';

        $prc->update($prcInfo);
        
        return redirect()->route('received.show', $prc->user_id)->with('message', 'User Prc License Information has been updated for editing');
    }

    public function prcApproved(Prc $prc){

        $prcInfo['status'] = 'approved';

        $prc->update($prcInfo);
        
        return redirect()->route('received.show', $prc->user_id)->with('message', 'User Prc License Information has been Approved');
    }

    public function mpoResubmit(Request $request, Mpo $mpo){

        $mpoInfo = $request->validate([
            'comment' => 'required',
        ]);

        $mpoInfo['status'] = 'resubmit';

        $mpo->update($mpoInfo);
        
        return redirect()->route('received.show', $mpo->user_id)->with('message', 'User Membership in Professional Organization Information has been updated for editing');
    }

    public function mpoApproved(Mpo $mpo){

        $mpoInfo['status'] = 'approved';

        $mpo->update($mpoInfo);
        
        return redirect()->route('received.show', $mpo->user_id)->with('message', 'User Membership in Professional Organization Information has been Approved');
    }

    public function trainingResubmit(Request $request, Training $training){

        $trainingInfo = $request->validate([
            'comment' => 'required',
        ]);

        $trainingInfo['status'] = 'resubmit';

        $training->update($trainingInfo);
        
        return redirect()->route('received.show', $training->user_id)->with('message', 'User Training/Seminars/Webinars Information has been updated for editing');
    }

    public function trainingApproved(Training $training){

        $trainingInfo['status'] = 'approved';

        $training->update($trainingInfo);
        
        return redirect()->route('received.show', $training->user_id)->with('message', 'User Training/Seminars/Webinars Information has been Approved');
    }
}
