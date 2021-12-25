@extends('layouts.master')

@section('title')
Complain list
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
   
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
   <div class="box-header">
              <h3 class="box-title">Complain List</h3>
 @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
                                    <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Email</th> 
                                  <th>Phone</th>
                                  <th>Room No</th>
                                  <th>Complain</th>
                                  <th>Comment</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($complain as $cmpln)
                                @if($cmpln->status == 'forward' OR $cmpln->status == 'pending')
                                <tr>
                                  <td> {{ $cmpln->std_id}} </td>
                                  <td> {{ $cmpln->std_name}} </td>
                                  <td> {{ $cmpln->email}} </td>
                                  <td> {{ $cmpln->phone}} </td>
                                  <td> {{ $cmpln->room}} </td>
                                  <td> {{ $cmpln->complain_dtls}} </td>
                                  <td> {{ $cmpln->comment}} </td>
                                  @if($cmpln->status == 'hold')
                                   <td><span class="label label-warning">HOLD</span></td>
                                  @elseif($cmpln->status == 'forward')
                                   <td><span class="label label-success">FORWARDED</span></td>
                                   @elseif($cmpln->status == 'cancel')
                                   <td><span class="label label-danger">CANCELED</span></td>
                                   @elseif($cmpln->status == 'solve')
                                   <td><span class="label label-danger">SOLVED</span></td>
                                   @elseif($cmpln->status == 'pending')
                                   <td><span class="label label-danger">PENDING</span></td>
                                  @endif
                                  <td><a href="{{action('DepartmentController@edit', $cmpln['id'])}}" class="btn btn-success"> <i class="fa fa-eye"></i> View</a> </td> 
                                </tr>
                                 @endif
                                @endforeach
                              </tbody>
                             <span id="val"></span>
                            </table>
                           </div>
                               
@endsection
