<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExtraDetailsController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $submitted = false;
        if ($user->role == 'delivery' && DeliveryMan::where('user_id', $user->id)->exists()) {
            $submitted = true;
        } elseif ($user->role == 'shop' && Shop::where('user_id', $user->id)->exists()) {
            $submitted = true;
        }

        return view('auth.details', [
            'submitted' => $submitted,
        ]);

    }

    public function store(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == 'delivery') {
            if (DeliveryMan::where('user_id', Auth::id())->exists()) {
                return back()->with('error', 'Already applied as Delivery Man');
            }

            $validated = $request->validate([
                'nid' => ['required', 'string'],
                'vehicle' => ['required', 'in:cycle,bike'],
            ]);

            DeliveryMan::create([
                'user_id' => Auth::id(),
                ...$validated,
            ]);
        } elseif ($role == 'shop') {
            if (Shop::where('user_id', Auth::id())->exists()) {
                return back()->with('error', 'Already applied as a Shop');
            }

            $validated = $request->validate([
                'name' => ['required', 'string', 'max:225'],
                'address' => ['required', 'string'],
                'type' => ['required', 'in:grocery,food'],
                'social_link' => ['nullable', 'url'],
                'web_link' => ['nullable', 'url'],

            ]);

            Shop::create([
                'user_id' => Auth::id(),
                ...$validated,
            ]);

        } else {
            return abort(403);
        }

        return back()->with('success', 'Successfully applied as '.ucfirst($role));

    }
}
