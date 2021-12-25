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
        <div align="right">
         <button  type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Submit Complain</button>
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
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($complain as $cmpln)
                                @if($cmpln->email ==  Auth::user()->email)
                                <tr>
                                  <td> {{ $cmpln->std_id}} </td>
                                  <td> {{ $cmpln->std_name}} </td>
                                  <td> {{ $cmpln->email}} </td>
                                  <td> {{ $cmpln->phone}} </td>
                                  <td> {{ $cmpln->room}} </td>
                                  <td> {{ $cmpln->complain_dtls}} </td>
                                  @if($cmpln->status == 'hold')
                                   <td><span class="label label-warning">HOLD</span></td>
                                  @elseif($cmpln->status == 'forward')
                                   <td><span class="label label-success">FORWARDED</span></td>
                                   @elseif($cmpln->status == 'cancel')
                                   <td><span class="label label-danger">CANCELED</span></td>
                                   @elseif($cmpln->status == 'solve')
                                   <td><span class="label label-danger">SOLVED</span></td>
                                   @else
                                   <td><span class="label label-danger">PENDING</span></td>
                                  @endif
                                </tr>
                                 @endif
                                @endforeach
                              </tbody>
                             <span id="val"></span>
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           <div id="formModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Complain Box</h4>
          </div>
          <div class="modal-body">
            <span id="form_result"></span>
            <form class="" action="{{url('createcomplain')}}" method="POST">
{{csrf_field()}}


     <div class="form-row">
      <div class="form-group col-6">
         <label for="exampleInputEmail1">Student ID</label>
         <input name="std_id" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ Auth::user()->std_id }}">
       </div>

       <div class="form-group col-6">
          <label for="exampleInputEmail1">Student Name</label> 
          <input name="std_name" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
        </div>
      </div>
        <div class="form-row">

          <div class="form-group col-6">
             <label for="exampleInputEmail1">Email</label>
             <input name="email" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{Auth::user()->email}}">
           </div>

           <div class="form-group col-6">
            <label for="exampleInputEmail1">Phone Number</label>
           <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
        </div>

        <div class="form-row">
         <div class="form-group col-6">
          <label for="exampleFormControlSelect1">Room No</label>
          <select type="text" class="form-control form-control-sm" name="room">
            <option value="">Select Room No</option>
          <option value="100AB">100AB</option>
            <option value="101AB">101AB</option>
            <option value="102AB">102AB</option>
            <option value="103AB">103AB</option>
          </select>
        </div>
        </div>
        
          <div class="form-group">
             <label for="exampleFormControlTextarea1">Complain Details</label> <br>
             <textarea name="complain_dtls"  id="exampleFormControlTextarea1"   cols="85" placeholder="Enter here short description"></textarea>
           </div>

           <input name="status" value="1" type="hidden"  class="form-control" >
           <div class="" >
             <button type="submit" class="btn btn-success">Submit</button>
           </div>


    </form>
          </div>
      </div>
    </div>
</div>

<script>
$(document).ready(function(){

  $('#create_record').click(function(){
    $('.modal-title').text('Complain Box');
    $('#action_button').val('Add');
    $('#action').val('Add');
    $('#form_result').html('');

    $('#formModal').modal('show');
  });

  $('#sample_form').on('submit', function(event){
    event.preventDefault();
    var action_url = '';


    $.ajax({
      url: action_url,
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      success:function(data)
      {
        var html = '';
        if(data.errors)
        {
          html = '<div class="alert alert-danger">';
          for(var count = 0; count < data.errors.length; count++)
          {
            html += '<p>' + data.errors[count] + '</p>';
          }
          html += '</div>';
        }
        if(data.success)
        {
          html = '<div class="alert alert-success">' + data.success + '</div>';
          $('#sample_form')[0].reset();
          $('#user_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
      }
    });
  });

  

  var user_id;

  $(document).on('click', '.delete', function(){
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){
    $.ajax({
      url:"sample/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#user_table').DataTable().ajax.reload();
          alert('Data Deleted');
        }, 2000);
      }
    })
  });

});
</script>

                      <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("mylist");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
} 
    </script>    
        
@endsection
