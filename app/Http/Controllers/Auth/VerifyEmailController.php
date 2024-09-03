<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        //start sabbir role for dashboard
        $role = Auth::user()->role;

        if($role == 'admin'){
            return redirect()->intended(route('dashboard', absolute: false));
        }

        if($role == 'user'){
            return redirect()->intended(route('profile.index', absolute: false));
        }
        //end sabbir role for dashboard

        return redirect()->intended(route('home', absolute: false).'?verified=1');
    }
}
