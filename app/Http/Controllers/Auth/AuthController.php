<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Session;
use App\Models\User;
use App\Repositories\UserRespository;
use Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct(protected UserRespository $userRespository)
    {      

    }
    public function index()
    {
        return view('auth.login');
    }  
      
    public function registration()
    {
        return view('auth.registration');
    }
      
    public function postLogin(LoginRequest $loginRequest)
    {
   
        $credentials = $loginRequest->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
        return redirect("login")->withErrors('Oppes! You have entered invalid credentials');
    }
      
    
    public function postRegistration(EmployeeRequest $employeeRequest)
    {  
           // Check if image file is a actual image or isValid image
        if(isset($employeeRequest['photo']) && $employeeRequest['photo']->isValid()){
            $folderPath = 'uploads/employee';

            // move an photo using ::move() laravel function
            $employeeRequest['photo']->move($folderPath,$employeeRequest['photo']->getClientOriginalName());
             //get path for uplaod 
            $employeeRequest['photo_path'] = $folderPath.'/'.$employeeRequest['photo']->getClientOriginalName();
        }

        $this->userRespository->createEmployees($employeeRequest);
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    public function dashboard()
    {
        if(Auth::check()){
        //get list of all employees
        $employeeData = $this->userRespository->getEmployees();
        return view('home')->with('employeeData', json_decode($employeeData));
           
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}