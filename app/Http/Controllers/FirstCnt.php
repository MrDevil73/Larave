<?php
//
//namespace App\Http\Controllers;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//
//class FirstCnt extends Controller
//{
//    public function home()
//    {
//        return view('pages.home');
//    }
//
//    public function about()
//    {
//        return view('pages.about');
//    }
//
//    public function contact()
//    {
//        return view('pages.contact');
//    }
//}
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class FirstCnt extends Controller
{
    public function about()
    {
        return view('pages/about'); // Возвращает представление (шаблон) с именем 'about'
    }
    public function home()
    {
        return view('pages/home'); // Возвращает представление (шаблон) с именем 'about'
    }
    public function register()
    {
        return view('pages/register'); // Возвращает представление (шаблон) с именем 'about'
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect("/courses");
//        $request->validate([
//            'name' => ['required', 'string'],
//php            'email' => ['required', 'string', 'email', 'unique:users'],
//            'password' => ['required', 'confirmed', 'min:8']
//        ]);
//
//        $user = User::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password)
//        ]);
//
//
//        Auth::login($user);
//
//        return redirect(RouteServiceProvider::HOME); // Возвращает представление (шаблон) с именем 'about'
    }



    public function auth_get(Request $request){
        return view('pages/login');
    }

    public function auth_post(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return view('pages/login');
        }

        $request->session()->regenerate();

        return redirect('/courses');
    }



    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('register');
    }

}

