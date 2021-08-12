<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.123
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attemptLogin(Request $request)
    {
        if (auth()->attempt(array('email_id' => $request->input('email'),
          'password' => $request->input('password')),true))
        {
            return response()->json('success');
        }
        return response()->json(['error'=>'Sorry User not found.']);

        //  $validator = Validator::make($request->all(), [
        //    'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // if ($validator->passes()) {
        //     if (auth()->attempt(array('email' => $request->input('email'),
        //       'password' => $request->input('password')),true))
        //     {
        //         return response()->json('success');
        //     }
        //     return response()->json(['error'=>'Sorry User not found.']);
        // }

        // return response()->json(['error'=>$validator->errors()->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email_id' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        if(empty($user->id))
        {
            echo json_encode(['error' => 'User not register successfuly.']);
        }
        else
        {
            echo json_encode(['success' => 'User register successfuly.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
