<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Aimbeat Softech</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link href="/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body style="background-color: #cddee1;">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    Aimbeat Softech
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else

                            
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="/jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js' type='text/javascript'></script>
        <!-- Datepicker -->
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
        <script>
            $(function() {
               $( "#birth_date_picker" ).datepicker();
               $( "#join_date_picker" ).datepicker();
            });  
            let base_url = "{{ env('APP_URL') }}";    
        </script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script>
            $(document).ready(function(){
                
                 let _token = $('meta[name="csrf-token"]').attr('content');
                 $('[data-toggle="tooltip"]').tooltip();
            
                 $('#dataTable tbody').on('click', 'tr td a.edit-emp-btn',function () {
                    //  alert (base_url);
                 var row_id = $(this).closest('tr').attr('employee_id');
                 $("#editEmployeeForm").attr('emp-id',row_id);
                 $("#editEmployeeForm #editEmployeeSubmit").attr('emp-id',row_id);
                 var data = {
                         _token: _token
                 }
                 $.ajax({
                         url: base_url+"/get-employee/"+row_id,
                         method: "GET",
                         data:data,
                         success: function(result){
                             // first empty  all inputs
                            $("#editEmployeeForm #name").val('');
                            $("#editEmployeeForm #age").val('');
                            $("#editEmployeeForm #birth_date_picker").val('');
                            $("#editEmployeeForm #join_date_picker").val('');
                            $("#editEmployeeForm #gender").val('');
                            $("#editEmployeeForm #designation").val('');
                            $("#editEmployeeForm #email").val('');
                         
                            console.log(result);
            
            
                            $("#editEmployeeForm #name").val(result.name);
                            $("#editEmployeeForm #age").val(result.age);
                            $("#editEmployeeForm #birth_date_picker").val(result.dob);
                            $("#editEmployeeForm #join_date_picker").val(result.doj);
                            $("#editEmployeeForm #gender").val(result.gender);
                            $("#editEmployeeForm #designation").val(result.designation);
                            $("#editEmployeeForm #email").val(result.email);
                           
                            if(result.address){
                             $("#editEmployeeForm #address").val(result.address);
                            }
                            $("#editEmployeeModal").modal('show');
                         }
                     });
                 });
            
            // onclick table row btn to delete record 
            
                 $('#dataTable tbody').on('click', 'tr td a.delete-btn',function () {
                     var row_id = $(this).closest('tr').attr('employee_id'); // table row id
                     $.ajax({
                         url: base_url+"/delete-employees/"+row_id,
                         method: "DELETE",
                         success: function(result){
                             
                             $("#dataTable #deleteMsg").removeClass('d-none');
                             console.log("success");
                             location.reload();    
                         }
                     });
                 });
                 
               
             });
            
             // on submit open edit emplyee form with filed id wise details
             $(document).on("submit", "#editEmployeeForm", function(e) {
                     e.preventDefault(); 
                     var showError = $("#editEmployeeForm #showError");
                     var $form = $(this).attr('emp-id');
                    //  alert("hii");
                     $.ajax({
                             url: base_url+"/update-employees/"+$form,
                             type: 'POST',
                             contentType: false,
                             processData: false,
                             async: false,
                             data: new FormData(this),
                             success: function(result) {
                                 location.reload();           
                             },
                             error: function ( xhr, status, error) {
                                     
                                 showError.removeClass('d-none');
                                     if(xhr.responseText){
                                         errortoshow = '';
                                         $.each(JSON.parse(xhr.responseText).errors, function (i) {
                                             $.each(JSON.parse(xhr.responseText).errors[i], function (key, val) {
                                                 errortoshow += val+'<br>';
                                             });
                                         });
                                         showError.html(errortoshow);
                                     }
                                 }
                         });
             });
             
        </script>
       
        <script src="/datatables/jquery.dataTables.min.js"></script>
        <script src="/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/datatables/datatables-demo.js"></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js' type='text/javascript'></script>
     
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
       
    </body>
</html>