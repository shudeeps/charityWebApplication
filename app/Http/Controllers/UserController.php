<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignup()
    {

        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
       $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'remember_token' => $request->input('role')
        ]);

        $user->save();

        Auth::login($user);

        if (session()->has('oldUrl')) {
            $oldUrl = session()->get('oldUrl');
            session()->forget('oldUrl');
            return redirect()->to($oldUrl);
        }

        return redirect()->route('user.profile');
    }

    public function getSignin()
    {

     //   dd('hererer');
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);


        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {

            if (session()->has('oldUrl')) {


                $oldUrl = session()->get('oldUrl');

            //    dd($oldUrl);

                session()->forget('oldUrl');
                return redirect()->to($oldUrl);
            }

            return redirect()->route('user.profile');
        }

        return redirect()->back();
    }


    public function getProfile()
    {
        $orders = Auth::user()->orders;

        if (count($orders) == 0) {
            $orders = null;
        } else {
            $orders->transform(function ($order, $key) {
                $order->cart = unserialize($order->cart);
                return $order;
            });
        }
        //   dd($orders);
        switch (Auth::user()->role) {
            case (1):
                return redirect()->route('member.Dashboard');
                break;
            default:
                return view('user.profile', ['orders' => $orders]);
        }

        //dd($orders);

    }

    public function getMemberProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        //dd($orders);
        return view('member.index', ['orders' => $orders]);
    }


    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
