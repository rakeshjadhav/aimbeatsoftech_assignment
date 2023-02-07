<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\UserRespository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class HomeController extends Controller
{
    
    public function __construct(protected UserRespository $userRespository)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
   
    public function getEmployee(Request $request){

        return $this->userRespository->getEmployee($request->id);
    }

       ### update employee data using id
       public function updateEmployees(UpdateEmployeeRequest $updateEmployeeRequest)
       {
            // Check if image file is a actual image or isValid image
           if(isset($updateEmployeeRequest['photo']) && $updateEmployeeRequest['photo']->isValid()){
               $folderPath = 'uploads/employee';
   
               // move an photo using ::move() laravel function // public_path
               $updateEmployeeRequest['photo']->move($folderPath,$updateEmployeeRequest['photo']->getClientOriginalName());
               $updateEmployeeRequest['photo_path'] = $folderPath.'/'.$updateEmployeeRequest['photo']->getClientOriginalName();
           }
           $isUpdated = $this->userRespository->updateEmployees($updateEmployeeRequest);
   
           if($isUpdated){
               return response()->json(['message'=>'Employee Successfully updated']);
           }else{
               return response()->json(['status'=>'Error']);
           }
           
       }

    ## soft Delete employee
    public function deleteEmployees(Request $request)
    {
        $isDeleted = $this->userRespository->deleteEmployees($request->id);
        if($isDeleted){
            return response()->json(['status'=>'Successfully deleted']);
        }else{
            return response()->json(['status'=>'Something went wrong']);
        }
    }

    ## employee fileImport
    public function fileImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

     ## employee fileExport
    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'employee-data.xlsx');
    }  
}
