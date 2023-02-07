@extends('layouts.app')
<style>
    .form-group{
    padding-bottom: 20px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  {{ Auth::user()->name }} {{ __('You are logged in!') }}
                    <div class="" style="text-align: right;">
                        <a  href="{{ url('user-emails') }}" > Send Email </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                            </div>
                            <div class="col-sm">
                                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="" style="">
                                        <div class="text-right">
                                            <input type="file" name="file" class="custom-file-input" id="customFile">
                                            <button class="btn btn-primary">Import data</button>
                                            <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-hover" width="100%" cellspacing="0">
                            <div id="deleteMsg" class="font-medium text-red-600 alert alert-success d-none"></div>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Date of Joining</th>
                                    <th>Gender</th>
                                    <th>Designation</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employeeData as $employee)
                                <tr employee_id = <?php echo $employee->id;?> >
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->age}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->dob}}</td>
                                    <td>{{$employee->doj}}</td>
                                    <td>{{$employee->gender}}</td>
                                    <td>{{$employee->designation}}</td>
                                    <td><?php 
                                        if(isset($employee->photo)){ ?>
                                        <img src="{{ env('APP_URL') }}/{{$employee->photo}}" alt="" width="50" height="50"> 
                                        <?php  
                                            }?>
                                    </td>
                                    <td>
                                        <a employee_id = <?php echo $employee->id;?> class="edit-emp-btn btn btn-primary btn-icon-split" data-toggle="modal">Edit</a>
                                        <a employee_id = <?php echo $employee->id;?> class="delete-btn btn btn-danger btn-icon-split" data-toggle="modal">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- emplyee edit model pupup bootstrap model --}}
    <div id="editEmployeeModal" class="modal fade bd-example-modal-xl">
        <div class="modal-dialog modal-dialog modal-xl">
            <div class="modal-content">
                <form id="editEmployeeForm" emp-id="">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <div id="showError" class="font-medium text-red-600 alert alert-danger d-none"></div>
                        <div class="form-group">
                            <label>Employee Name</label>
                            <input type="text" id="name" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Employee Age</label>
                            <input type="text" id="age" name="age" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control"  id="birth_date_picker" name="birth_of_birth" placeholder="Date of Birth" >
                        </div>
                        <div class="form-group">
                            <label>Date of Joining</label>
                            <input type="text" class="form-control" id="join_date_picker" name="join_of_date" placeholder="Date of Joining" >
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender"  name="gender" class="form-control browser-default custom-select">
                                <option value="">Selelct Male</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <select id="designation" name="designation" class="form-control browser-default custom-select">
                                <option value="">Selelct Designation</option>
                                <option value="employee">Employee</option>
                                <option value="manager">Manager</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Employee Email</label>
                            <input type="email" id="email" name="email" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control" />
                            
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="password"  name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" id="editEmployeeSubmit" emp-id="" class="btn btn-info" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection