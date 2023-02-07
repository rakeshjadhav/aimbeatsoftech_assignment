@extends('layout')
<style>
    label {
      font-weight: 600;
      color: #666;
  }
  body {
    background: #f1f1f1;
  }
  .box8{
    box-shadow: 0px 0px 5px 1px #999;
  }
  .mx-t3{
    margin-top: -3rem;
  }
     .container{
     margin-top:2%;
     }
     .row{
     margin-bottom:2%;
     }
     .progress{
     height:5px;
     }
     .progress-bar{
     height:5px;
     }
     .gray{
     background-color:lightgray;
     }
     .gray:hover {
     background-color:gray;
     }
     .boja1{
     background-color:olive;
     }
     .boja2{
     background-color:white;
     }
     .boja3{
     background-color:black;
     }
     .boja4{
     background-color:lightred;
     }
     .boja5{
     background-color:lightyellow;
     }
     .boja6{
     background-color:lighterpurple;
     }
     .boja7{
     background-color:lightblue
     }
     .boja8{
     background-color:lighterblue;
     }
     .row .col-md-6 {
     margin-top:1%;
     }
     .box8{
     box-shadow: 0px 0px 5px 1px #999;
     }
  </style>
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Employee Registration</div>
                  <div class="card-body">
  
                      <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row ">

                            <div class="col-sm-6 form-group">
                             <label for="">Employee Name</label>
                             <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name." value={{old('name')}} >
                             @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                             @endif
                           </div>
                           <div class="col-sm-6 form-group">
                             <label for="">Employee Age</label>
                             <input type="text" class="form-control" id="age" name="age"  placeholder="Enter your age" value={{old('age')}} >
                             @if ($errors->has('age'))
                             <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                           </div>
                          
                         </div>
                   
                         <div class="row">
                            <div class="col-md-6">
                             <label for="">Date of Birth</label>
                               <input type="text" class="form-control"  id="birth_date_picker" name="birth_of_birth" placeholder="Date of Birth" value={{old('birth_of_birth')}}>
                               @if ($errors->has('birth_of_birth'))
                               <span class="text-danger">{{ $errors->first('birth_of_birth') }}</span>
                              @endif
                            </div>
                            <div class="col-md-6">
                             <label for="">Date of Joining</label>
                             <input type="text" class="form-control" id="join_date_picker" name="join_of_date" placeholder="Date of Joining" value={{old('join_of_date')}}>
                             @if ($errors->has('join_of_date'))
                             <span class="text-danger">{{ $errors->first('join_of_date') }}</span>
                            @endif
                          </div>
                         </div>
                         <div class="row">
                            <div class="col-md-4">
                             <label for="gender">Gender</label>
                             <select id="gender"  name="gender" class="form-control browser-default custom-select">
                               <option value="">Selelct Male</option>
                               <option value="male" {{old ('gender') == 'male' ? 'selected' : ''}}>Male</option>
                               <option value="female" {{old ('gender') == 'female' ? 'selected' : ''}}>Female</option>
                               
                             </select>
                             @if ($errors->has('gender'))
                             <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                            </div>
                            <div class="col-md-4">
                             <label for="designation">Designation</label>
                             <select id="designation"  name="designation" class="form-control browser-default custom-select">
                               <option value="">Selelct Designation</option>
                               <option value="employee" {{old ('designation') == 'employee' ? 'selected' : ''}}>Employee</option>
                               <option value="manager" {{old ('designation') == 'manager' ? 'selected' : ''}}>Manager</option>
                             </select>
                             @if ($errors->has('designation'))
                             <span class="text-danger">{{ $errors->first('designation') }}</span>
                            @endif
                            </div>

                           
                              <div class="col-md-4 form-group">
                                 <label>Employee Email</label>
                                 <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value={{old('email')}} >
                                 @if ($errors->has('email'))
                                 <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            
                           </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                             <div class="form-group">
                               <label>Picture</label>
                               <input type="file" id="photo" name="photo" class="form-control" />
                           </div>  
                            </div>
                   
                            <div class="col-md-6">
                             <label for="">Password</label>
                               <input type="password" class="form-control" id="password"  name="password" placeholder="Password">
                               @if ($errors->has('password'))
                               <span class="text-danger">{{ $errors->first('password') }}</span>
                              @endif
                            </div>
                         </div>
                      
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection