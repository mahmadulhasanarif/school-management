@extends('admin.layouts.master')
@section('main')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Create Student Registration Form</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title">Student Registration Form</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" action="{{route('student.registration.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                  @csrf
                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustomUsername">Student Name<sapn class="text-danger">*</sapn></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                          </div>
                          <input type="text" name="name" class="form-control  @error ('name') is-invalid @enderror" placeholder="student user name">
                        </div>
                        @error('name')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
      

                    <div class="col-md-4 mb-3">
                        <label for="simple-select2">Father's Name<sapn class="text-danger">*</sapn></label>
                        <div class="input-group">
                          <input type="text" name="fname" class="form-control  @error ('fname') is-invalid @enderror" placeholder="student father name">
                        </div>

                        @error('fname')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="simple-select2">Mother's Name<sapn class="text-danger">*</sapn></label>
                        <div class="input-group">
                          <input type="text" name="mname" class="form-control  @error ('mname') is-invalid @enderror" placeholder="student monter name" >
                        </div>

                        @error('mname')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                   
                    <div class="col-md-4 mb-3">
                        <label for="simple-select2">Address<sapn class="text-danger">*</sapn></label>
                        <div class="input-group">
                          <input type="text" name="address" class="form-control  @error ('address') is-invalid @enderror" placeholder="student address" >
                        </div>
                        @error('address')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="simple-select2">Phone<sapn class="text-danger">*</sapn></label>
                        <div class="input-group">
                          <input type="text" name="phone" class="form-control  @error ('phone') is-invalid @enderror" placeholder="student phone" >
                          <div class="input-group-append">
                          </div>
                        </div>
                        @error('phone')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="inputState5">Gender<sapn class="text-danger">*</sapn></label>
                        <select id="inputState5" name="gender" class="form-control @error ('gender') is-invalid @enderror">
                          <option selected="" disabled>select gender...</option>
                          <option value="Male">Male</option>
                          <option value="Famale">Famale</option>
                          <option value="Trans">Trans</option>
                        </select>
                        @error('fee_category_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="inputState5">Religion<sapn class="text-danger">*</sapn></label>
                        <select id="inputState5" name="religion" class="form-control @error ('religion') is-invalid @enderror">
                          <option selected="" disabled>select religion...</option>
                          <option value="Islam">Islam</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Khistran">Khistran</option>
                          <option value="Boddho">Boddho</option>
                          <option value="Other">Other</option>
                        </select>
                        @error('religion')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="simple-select2">Date Of Birth<sapn class="text-danger  @error ('dob') is-invalid @enderror">*</sapn></label>
                            <div class="input-group">
                              <input type="date" name="dob" class="form-control" >
                            </div>
                        @error('dob')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="simple-select2">Discount<sapn class="text-danger">*</sapn></label>
                        <div class="input-group">
                          <input type="number" name="discount" class="form-control  @error ('discount') is-invalid @enderror" placeholder="student discount" >
                          <div class="input-group-append">
                          </div>
                        </div>
                        @error('discount')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="inputState5">Class<sapn class="text-danger">*</sapn></label>
                        <select id="inputState5" name="class_id" class="form-control @error ('class_id') is-invalid @enderror" >
                          <option selected="" disabled>choose class...</option>
                          @foreach ($class as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('class_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="inputState5">Year<sapn class="text-danger">*</sapn></label>
                        <select id="inputState5" name="year_id" class="form-control @error ('year_id') is-invalid @enderror" >
                          <option selected="" disabled>choose year...</option>
                          @foreach ($year as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('year_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                   

                    <div class="col-md-4 mb-3">
                        <label for="inputState5">Group<sapn class="text-danger">*</sapn></label>
                        <select id="inputState5" name="group_id" class="form-control @error ('group_id') is-invalid @enderror">
                          <option selected="" disabled>choose group...</option>
                          @foreach ($group as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('group_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputState5">Shift<sapn class="text-danger">*</sapn></label>
                        <select id="inputState5" name="shift_id" class="form-control @error ('shift_id') is-invalid @enderror">
                          <option selected="" disabled>choose class...</option>
                          @foreach ($shift as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('shift_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                     <div class="col-md-4 mb-3">
                      <label for="customFile">Student Image<sapn class="text-danger">*</sapn></label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input  @error ('image') is-invalid @enderror" name="image" id="image">
                        <label class="custom-file-label" for="customFile">Choose file...</label>
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                     <div class="col-md-1 mb-3"></div>
                     <div class="col-md-3 mb-3">
                        <img src="{{ url('images/admins/No_Image.jpg')}}" height="100px" width="140px" id="showImage">
                    </div>
                  
                  </div>
                  <button class="btn btn-primary" type="submit">Register Submit</button>
                </form>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div> <!-- end section -->
      </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div>
</div>
@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function(e){
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection





