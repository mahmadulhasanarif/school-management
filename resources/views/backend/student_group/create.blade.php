@extends('admin.layouts.master')
@section('main')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
        <h2 class="h3 mb-4 page-title">Student Group Create</h2>
        <div class="my-4">
          <form method="POST" action="{{route('student.group.store')}}">
            @csrf
            <hr class="my-4">
              <div class="form-group ">
                <label for="firstname">Student Group Name</label>
                <input type="text" name="name" class="form-control  @error ('name') is-invalid @enderror" placeholder="Student Group Name">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
           
            <button type="submit" class="btn mb-2 btn-secondary">Save Change</button>
          </form>

        </div> <!-- /.card-body -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection