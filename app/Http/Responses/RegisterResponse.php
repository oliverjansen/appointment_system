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

        alert()->success('Information Save!','Your account is currently under review. We will notify you about the status of your registration through SMS. Thankyou!')->showConfirmButton()->buttonsStyling(true);
       
        return $request->wantsJson()
            ? new Response('', 204)
            : redirect(config('fortify.login'));
    }
}