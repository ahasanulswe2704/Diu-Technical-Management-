@extends('layouts.edit')

@section('title')
Complain list
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="col-md-6">
<div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Input masks</h3>
            </div>
            <form class="well form-horizontal"  action="{{action('AdminController@update', $id)}}" method = "post" enctype="multipart/form-data">
                              {{csrf_field()}}
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <input type="hidden" name="_method" value="PATCH" />
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Student ID:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-id-badge"></i>
                  </div>
                  <input type="text" class="form-control" name="std_id"   value="{{ $comp->std_id }}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Student Name:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="std_name"  value="{{ $comp->std_name }}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Student Email:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-email"></i>
                  </div>
                  <input type="text" class="form-control" name="email" value="{{ $comp->email }}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>Student Phone:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="phone" value="{{ $comp->phone }}" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Complain:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="complain_dtls" value="{{ $comp->complain_dtls }}" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              
              <div class="form-group">
                <label>Update Status:</label>

                <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="status" class="form-control selectpicker">
                <option >Select Status</option>
                <option value="hold">HOLD</option>
                <option value="forward">FORWARD</option>
                <option value="cancel">CANCEL</option>
                </select>
            </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Comment:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-commenting-o"></i>
                  </div>
                  <input type="text" class="form-control" name="comment" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUPDATE <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</div>
          @endsection
