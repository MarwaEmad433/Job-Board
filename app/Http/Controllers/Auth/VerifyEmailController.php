<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class VerifyEmailController extends Controller
{
    /**
     * المسار الذي سيتم إعادة التوجيه إليه بعد التحقق.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * إنشاء مثيل جديد للتحكم.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'signed'])->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        $this->middleware('auth')->only('resend');
    }

    /**
     * التحقق من البريد الإلكتروني.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string  $hash
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request, $id, $hash)
    {
        if (!hash_equals((string) $id, (string) $request->user()->getKey())) {
            return redirect($this->redirectTo)->withErrors(['email' => 'Verification link is invalid.']);
        }

        if (!hash_equals((string) $hash, sha1($request->user()->getEmailForVerification()))) {
            return redirect($this->redirectTo)->withErrors(['email' => 'Verification link is invalid.']);
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectTo);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect($this->redirectTo)->with('verified', true);
    }

    /**
     * إعادة إرسال رابط التحقق.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectTo);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
