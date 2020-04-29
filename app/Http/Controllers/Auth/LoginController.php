<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Response;
// use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /* login action */
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], [
            'required' => ':attribute Harus Diisi',
        ]);

        /* cek validasi */
        if ($validator->fails()){
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        return Response::json(array('success' => true), 200);

        // $credentials = $request->only($this->username(), 'password');
        // $authSuccess = Auth::attempt($credentials, $request->has('remember'));
        //
        // if($authSuccess) {
        //     $request->session()->regenerate();
        //     return response(['success' => true], Response::HTTP_OK);
        // }
    }

    /* cek login */
    public function showLoginForm()
    {
      if(!Auth::check())
        {return view('auth.login');}
      else
        {return redirect('homes');}
    }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //    $data = $request->all();
    //    if (!empty($data['isactive'])) {
    //      throw ValidationException::withMessages([
    //        $this->username() => $data['isactive'],
    //      ]);
    //    }
    //    throw ValidationException::withMessages([
    //      $this->username() => [trans('auth.failed')],
    //    ]);
    // }
}
