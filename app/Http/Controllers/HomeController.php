<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Models\Dbsc;
use App\Models\ModBirthdayPicture;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'resetpassword','sendresetpassword'
        ]]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root(Request $request)
    {
        if(date("H") >= 12 && date("H:i") < date("H:i",strtotime("17:59"))) {
            $greeting = "Good Afternoon";
        } elseif(date("H") >= 18) {
            $greeting = "Good Evening";
        } else {
            $greeting = "Good Morning";
        }
        $dbsc = Dbsc::find(auth()->user()->id);

        if(!empty($dbsc)) {
            $greeting_name = $dbsc->firstname;
        }

        $list_teams = Dbsc::select('dbsc.team_id','team.team_name',
                DB::raw('COUNT(*) AS number_people'),
                DB::raw("(SELECT CONCAT(dbsc.`firstname`,' ',dbsc.`lastname`)
                    FROM `deputy_team` INNER JOIN dbsc ON deputy_team.`profile_id` = dbsc.`id`
                    WHERE deputy_team.`team_id` = team.`team_id`) AS headed_by"))
                ->join('team', 'team.team_id', '=', 'dbsc.team_id')
                ->where('team.status_id',1)
                //->join('deputy_team', 'deputy_team.team_id', '=', 'team.team_id')
                //->groupby('dbsc.team_id','team.team_name','team.team_id')
                ->groupby('dbsc.team_id')
                ->orderby('team_name')
                ->get();

        //active mapped accounts
        $active_accounts = DB::table('users')
            ->join('dbsc', 'users.id', '=', 'dbsc.id')
            ->where('users.status',1)
            ->count();

        $today_birthdays = Dbsc::select('modid','firstname','lastname','birthday')
            ->where(DB::raw("DATE_FORMAT(birthday,'%m-%d')"),date("m-d"))
            ->orderByRaw('lastname, firstname')
            ->get();
        //only mapped active accounts
        $total_male = DB::table('dbsc')
            ->join('users', 'users.id', '=', 'dbsc.id')
            ->where('users.status',1)
            ->where('dbsc.sex','male')
            ->count();
        //only mapped active accounts
        $total_female = DB::table('dbsc')
            ->join('users', 'users.id', '=', 'dbsc.id')
            ->where('users.status',1)
            ->where('dbsc.sex','female')
            ->count();
        //newly registered active accounts
        $total_newly_registered = DB::table('dbsc')
            ->join('users', 'users.id', '=', 'dbsc.id')
            ->where('users.status',1)
            ->where(DB::raw("DATEDIFF(DATE_FORMAT(NOW(),'%Y-%m-%d'),DATE_FORMAT(dbsc.created_at,'%Y-%m-%d'))"),"<",31)
            ->count();
        $birthday_cards = ModBirthdayPicture::select('mod_id','pic_name','pic_filename','birthday')
            ->join('dbsc', 'dbsc.modid', '=', 'mod_birthday_pic.mod_id')
            ->where(DB::raw("DATE_FORMAT(birthday,'%m-%d')"),date("m-d"))
            ->orderByRaw('firstname')
            ->get();

            // echo "<pre>";
            // print_r($birthday_cards);
            // exit;
            // echo "</pre>";
        //number of teams
        $total_teams = DB::table('team')->where('status_id',1)->count();
        //echo auth()->user()->id;
        // echo "<pre>";
        // print_r($list_teams);
        // echo "</pre>";
        // exit;
        return view('index',compact('dbsc','greeting','active_accounts','today_birthdays','total_male','total_female','list_teams','total_newly_registered','total_teams','birthday_cards'));
        //return view('index');
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function resetpassword(){
        return view('auth-pass-reset-basic');
    }

    public function sendresetpassword(Request $request){
        $request->validate(['email' => 'required|email'],[
            'required'=>'Email is required',
            'user'=>'Email is not a valid moderator']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar =  $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "User Details Updated successfully!"
            // ], 200); // Status code here
            return redirect()->back();
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "Something went wrong!"
            // ], 200); // Status code here
            return redirect()->back();

        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
