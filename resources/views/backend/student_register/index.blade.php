@extends('admin.layouts.master')
@section('main')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            
            <!-- search option start -->
          <div class="card mb-5">
              <div class="card-header">
                  <strong> <h5>Student Search</h5> </strong>
              </div>
              <div class="card-body shadow">
                  <form action="{{route('student.search.class.year')}}" method="GET">
               <div class="row">
                    <div class="col-md-5 mb-5">
                        <label for="inputState5">Class<sapn class="text-danger">*</sapn></label>
                        <select id="inputState5" name="class_id" class="form-control @error ('class_id') is-invalid @enderror">
                          <option selected="" disabled>choose class...</option>
                          @foreach ($class as $item)
                          <option value="{{$item->id}}" {{($item->id == @$class_id) ? 'selected':''}}>{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('class_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-5 mb-5">
                        <label for="inputState5">Year<sapn class="text-danger">*</sapn></label>
                        <select id="inputState5" name="year_id" class="form-control @error ('year_id') is-invalid @enderror">
                          <option selected="" disabled>choose year...</option>
                          @foreach ($year as $item)
                          <option value="{{$item->id}}" {{$item->id == @$year_id ? 'selected':''}}>{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('year_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="col-md-2" id="search-btn">
                        <input type="submit" class="btn mb-2 btn-secondary" name="search" value="Search">
                    </div>
                </form>
               </div>
              </div>
          </div>
        <!-- search option End -->

        <hr>

        <div class="row">
          <div class="col-md-10">
            <h2 class="mb-2 page-title">Student Data table</h2>
          </div>

          <div class="col-md-2">
            <a style="float: right" class="btn mb-2 btn-success" href="{{route('student.registration.create')}}">Student Registration</a>
          </div>
        </div>
        <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced.</p>
        <div class="row my-4">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                @if (!@$search)
                <table class="table datatables" id="dataTable-1">
                  <thead>
                    <tr>
                      <th></th>
                      <th>#</th>
                      <th>Name</th>
                      <th>ID No.</th>
                      <th>Roll</th>
                      <th>Class</th>
                      <th>Year</th>
                      <th>Image</th>
                      <th>Code</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input">
                          <label class="custom-control-label"></label>
                        </div>
                      </td>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{$item->student->name}}</td>
                      <td>{{$item->student->id_no}}</td>
                      <td>{{$item->roll}}</td>
                      <td>{{$item->studentClass->name}}</td>
                      <td>{{$item->studentYear->name}}</td>
                      <td>
                        @if ($item->student->image != null)
                            <img src="{{asset($item->student->image)}}" width="80px" height="50px" style="border: 1px solid yellow">
                        @endif
                      </td>

                      <td>{{$item->student->code}}</td>

                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('student.registration.edit', $item->student_id)}}">Edit</a>
                            <a class="dropdown-item" href="{{route('student.registration.promotion', $item->student_id)}}">Promotion</a>
                            <a class="dropdown-item" target="_blank" href="{{route('student.registration.details', $item->student_id)}}">Details</a>
                          </div>
                      </td>
                          
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                @else

                 <table class="table datatables" id="dataTable-1">
                  <thead>
                    <tr>
                      <th></th>
                      <th>#</th>
                      <th>Name</th>
                      <th>ID No.</th>
                      <th>Roll</th>
                      <th>Class</th>
                      <th>Year</th>
                      <th>Image</th>
                      @if (Auth::guard('admin')->user()->status == 2)
                      <th>Code</th>
                      @endif
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input">
                          <label class="custom-control-label"></label>
                        </div>
                      </td>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{$item->student->name}}</td>
                      <td>{{$item->student->id_no}}</td>
                      <td>{{$item->roll}}</td>
                      <td>{{$item->studentClass->name}}</td>
                      <td>{{$item->studentYear->name}}</td>
                      <td>
                        @if ($item->student->image != null)
                            <img src="{{asset($item->student->image)}}" width="80px" height="50px" style="border: 1px solid yellow">
                        @endif
                      </td>
                        @if (Auth::guard('admin')->user()->status == 2)
                            <td>{{$item->student->code}}</td>
                        @endif
                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('student.registration.edit', $item->student_id)}}">Edit</a>
                            <a class="dropdown-item" href="{{route('student.registration.promotion', $item->student_id)}}">Promotion</a>
                            <a class="dropdown-item" target="_blank" href="{{route('student.registration.details', $item->student_id)}}">Details</a>
                          </div>
                      </td>
                          
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                @endif
              </div>
            </div>
          </div> <!-- simple table -->
        </div> <!-- end section -->
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