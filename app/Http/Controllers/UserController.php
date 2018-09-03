<?php 
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\http\Response;


class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email|unique:users",
            "first_name" => "required|max:20",
            "password" => "required|min:4"
        ]);
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();

        Auth::login($user);

        return redirect()->route("dashboard");
    }
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email|",
            "password" => "required|min:4"
        ]);
        if (Auth::attempt(["email" => $request["email"], "password" => $request["password"]])){
            return redirect()->route("dashboard");
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route("home");
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }
    public function postSaveAccount(Request $request){
        $this->validate($request, [
            'first_name' => 'required|max:20'
        ]);

        $user = Auth::user();
        $user->first_name=$request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpeg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');
    }
    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }
}