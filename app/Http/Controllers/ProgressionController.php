<?php

// app/Http/Controllers/ProgressionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progression;
use Illuminate\Support\Facades\Auth;

class ProgressionController extends Controller
{
    public function show()
    {
        $progression = Auth::user()->progression;

        return response()->json($progression, 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'level' => 'required|integer',
        ]);

        $user = Auth::user();
        $progression = $user->progression;
        if ($progression) {
            $progression->update(['level' => $request->level]);
        } else {
            $progression = Progression::create([
                'user_id' => $user->id,
                'level' => $request->level,
            ]);
        }

        return response()->json(['message' => 'Progression updated successfully'], 200);
    }
}

