@extends('admin.layouts.master')
@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            
            <!-- search option start -->
          <div class="card mb-5">
              <div class="card-header">
                  <strong> <h5>Student <strong>Registration Fee</strong></h5> </strong>
              </div>
              <div class="card-body shadow">
                 
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

                   <!--Student Registration Fee start-->

                   <div class="row">
                        <div class="col-lg-12">
                            <script id="document-template" type="text/x-handlebars-template">
                            <table class="table datatables">
                                <thead>
                                    <tr>
                                        @{{{thsource}}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @{{#each this}}
                                        <tr>
                                            @{{tdsource}}    
                                        </tr>
                                    @{{/each}}
                                </tbody>
                            </table>
                        </script>
                        </div>
                   </div>

                  
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
        url: "{{ route('student.registration.fee.classwise')}}",
        type: "get",
        data: {'year_id':year_id,'class_id':class_id},
        beforeSend: function() {       
        },
        success: function (data) {
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $('#DocumentResults').html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
      });
    });
  
  </script>
@endsection