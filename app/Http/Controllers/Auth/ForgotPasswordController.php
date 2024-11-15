<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\Customer;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    
    public function __construct()
    {
        $this->middleware('guest:customer');
    }
    
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
    
        if (Customer::where('email', $request->email)->exists()) {
            $customer = Customer::where('email', $request->email)->first();

            if ($customer->type != $request->type) {
                $errorMessage = ($request->type !== '1') ? trans('auth.email_used_b2c') : trans('auth.email_used_b2b');
                return response()->json(['errors' => ['email' => $errorMessage]], 422);
            }
        }
        
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        // dd($request->all());
        if ($request->ajax()) {
            return response()->json(['status' => trans($response)]);
        }
        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        // dd($request->all());
        if ($request->ajax()) {
            return response()->json(['error' => trans($response)]);
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('customers');
    }
}
