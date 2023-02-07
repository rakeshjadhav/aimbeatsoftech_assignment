@extends('layouts.app')
<style>
    .form-group{
    padding-bottom: 20px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Mail
                </div>
                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                 
                    <div class="">
                        <form action="{{ route('sendEmail') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row ">
                                <div class="col-sm-12 form-group">
                                    <label for="">To Mail</label>
                                    <select id="tomail"  name="tomail" class="form-control browser-default custom-select">
                                        <option value="">Select Email</option>
                                        <?php foreach ($employeeData as $mailIds) : ?>
                                        <option value="<?php echo $mailIds->email ?>"><?php echo $mailIds->email ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    @if ($errors->has('tomail'))
                                    <span class="text-danger">{{ $errors->first('tomail') }}</span>
                                   @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Message</label>
                                    <textarea type="text" class="form-control"  id="message" name="message" rows="10"></textarea>
                                    @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                   @endif
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection