@extends('admin.layouts.master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            
            <!-- search option start -->
          <div class="card mb-5">
              <div class="card-header">
                  <strong> <h5>Student <strong>Roll Generate</strong></h5> </strong>
              </div>
              <div class="card-body shadow">
                  <form action="{{route('student.roll.generate.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <h5>Year <span class="text-danger"> </span></h5>
                            <div class="controls">
                                <select name="year_id" id="year_id" required="" class="form-control">
                                    <option value="" selected="" disabled="">Select Year</option>
                                    @foreach($years as $year)
                                    <option value="{{ $year->id }}" >{{ $year->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-5 mb-3">
                            <div class="form-group">
                                <h5>Year <span class="text-danger"> </span></h5>
                                <div class="controls">
                                    <select name="class_id" id="class_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select class</option>
                                        @foreach($classes as $class)
                                        <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>		 
                            </div>
                        </div>
        
                        <div class="col-md-2 mb-3" id="search-btn">
                            <a name="search" class="btn mb-2 btn-secondary" id="search">Search</a>
                        </div>
                    </div>

                   <!--ROll Generate start-->

                   <div class="row d-none" id="roll-generate">
                        <div class="col-lg-12">
                            <h2 class="text-danger"  style="text-align: center; border: 1px solid red">Student Roll Generate</h2>
                            <table class="table datatables" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID No</th>
                                        <th>Student Name </th>
                                        <th>Father Name </th>
                                        <th>Gender</th>
                                        <th>Roll</th>
                                    </tr>
                                  </thead>

                                  <tbody id="roll-generate-tr">

                                  </tbody>
                            </table>
                        </div>
                   </div>

                   <input type="submit" class="btn btn-info" value="Roll Generator">

                </form>
               </div>
              </div>
          </div>
        <!-- search option End -->

        <hr>

      </div> <!-- .col-12 -->
    </div>
</div>
@endsection

@section('styles')
    <style>
        #search-btn{
            padding-top: 30px;
        }
    </style>
@endsection



 
@section('scripts')

<script>
    $(document).on('click','#search',function(){
      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
       $.ajax({
        url: "{{ route('student.registration.getstudents')}}",
        type: "GET",
        data: {'year_id':year_id,'class_id':class_id},
        success: function (data) {
          $('#roll-generate').removeClass('d-none');
          var html = '';
          $.each( data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.fname+'</td>'+
            '<td>'+v.student.gender+'</td>'+
            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
            '</tr>';
          });
          html = $('#roll-generate-tr').html(html);
        }
      });
    });
  
  </script>
  
@endsection