<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Http\Responses\RegisterResponse as FortifyRegisterResponse;
use RealRashid\SweetAlert\Facades\Alert;
class RegisterResponse extends FortifyRegisterResponse
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
       
       
        $this->guard = $guard;
    }

    public function toResponse($request)
    {
        

        $this->guard->logout();

        alert()->success('Information Save!','Your account is being reviewed at the moment. We will send you an SMS with the status of your registration as soon as possible. Thankyou!')->showConfirmButton()->buttonsStyling(true);
       
        return $request->wantsJson()
            ? new Response('', 204)
            : redirect(config('fortify.login'));
    }
}