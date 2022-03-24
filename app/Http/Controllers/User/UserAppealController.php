<?php

namespace App\Http\Controllers\User;

use App\Models\Appeal;
use App\Models\Competition;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAppealController extends Controller
{
    public function store(Competition $competition, Request $request)
    {
        if ($competition->appealedBy($request->user())) {
            return response(null, 409);
        }

        $competition->appeals()->create([
            'user_id' => $request->user()->id,
            'user_name' => $request->user()->name,
        ]);

        return back();
    }

    public function destroy(Competition $competition, Request $request)
    {
        $request->user()->appeals()->where('competitions_id', $competition->id)->delete();

        return back();
    }
}
