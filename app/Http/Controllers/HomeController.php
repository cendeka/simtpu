<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Registrasi;
use App\Models\Retribusi;
use App\Models\Makam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function root()
    {
        $now = Carbon::now();
        $subTahun3 = Makam::season(Carbon::now()->subYear(3))->count();
        $subTahun2 = Makam::season(Carbon::now()->subYear(2))->count();
        $subTahun1 = Makam::season(Carbon::now()->subYear(1))->count();
        $registrasi = Registrasi::with('ahliwaris','makam','retribusi')->get();
        $retribusi = Retribusi::sum('nominal');
        $makam = Makam::get();
          
        return view('index', compact(
            'registrasi',
            'retribusi', 
            'makam', 
            'subTahun1',
            'subTahun2',
            'subTahun3'
        ));
    }

    public function chart(Request $request)
    {

        // $bulan = Makam::whereYear('tanggal_meninggal', $request->tahun)->get();
        $bulan = Makam::season($request->tahun)->select(
            DB::raw("DATE_FORMAT(tanggal_meninggal,'%M') as label"),
            DB::raw('count(*) as data'), 
            )
            ->groupBy('label')
            ->pluck('data');
        $label_bulan = Makam::season($request->tahun)->select(
            DB::raw("DATE_FORMAT(tanggal_meninggal,'%M') as label"),
            DB::raw('count(*) as data'), 
            )
            ->groupBy('label')
            ->pluck('label');
        $retri = Retribusi::select(
            DB::raw("DATE_FORMAT(created_at,'%Y') as label"),
            DB::raw('sum(nominal) as data'), 
            )
            ->groupBy('label')
            ->get('data');
        $label_retri = Retribusi::select(
            DB::raw("DATE_FORMAT(created_at,'%Y') as label"),
            DB::raw('sum(nominal) as data'), 
            )
            ->groupBy('label')
            ->get('label');
        // return response()->json(['data'=>$bulan->count()],200);
        $makam = ["tahun"=>$request->tahun, "label"=>$label_bulan, "data"=>$bulan];
        $retribusi = [$label_retri, $retri];
        return response()->json(
            [
                "makam"=>$makam,
                "retribusi"=>$retribusi,

            ]
        );
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
            $user->avatar = '/images/' . $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "User Details Updated successfully!"
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
