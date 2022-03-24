<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appeal;
use App\Models\Competition;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAppealController extends Controller
{
    public function show(Appeal $appeal)
    {
        $appeal->appeal_status = 1;
        $appeal->save();

        //dd($appeal);

        return redirect()->back()->with('success', 'Success !');
    }

    public function destroy(Appeal $appeal)
    {
        $appeal->delete();
  
        return redirect()->back();
    }
}
