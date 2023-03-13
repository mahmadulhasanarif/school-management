@extends('admin.layouts.master')
@section('main')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
        <h2 class="h3 mb-4 page-title">Student Assign Subject Create</h2>
        <div class="my-4">
          <form method="POST" action="{{route('setup.assign_subject.store')}}">
            @csrf
            <hr class="my-4">
            <div class="add_item">
              <div class="form-group ">
                <label for="inputState5">Class</label>
                <select id="inputState5" name="class_id" class="form-control @error ('class_id') is-invalid @enderror">
                  <option selected="" disabled>Choose class...</option>
                  @foreach ($class as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
                @error('class_id')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              

             <div class="row">

              <div class="form-group col-lg-4">
                <label for="inputState5">Subject</label>
                <select id="inputState5" name="subject_id[]" class="form-control @error ('subject_id') is-invalid @enderror">
                  <option selected="" disabled>Choose subject...</option>
                  @foreach ($subject as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
                @error('subject_id')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group col-lg-2">
                <label for="firstname">Full Mark</label>
                <input type="text" name="full_mark[]" class="form-control  @error ('full_mark') is-invalid @enderror" placeholder="full mark">
                @error('full_mark')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group col-lg-2">
                <label for="firstname">Pass Mark</label>
                <input type="text" name="pass_mark[]" class="form-control  @error ('pass_mark') is-invalid @enderror" placeholder="pass mark">
                @error('pass_mark')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group col-lg-2">
                <label for="firstname">Got Mark</label>
                <input type="text" name="subjective_mark[]" class="form-control  @error ('subjective_mark') is-invalid @enderror" placeholder="subjective mark">
                @error('subjective_mark')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="col-lg-2 addEvent">
                <span class="btn btn-success addEventMore"><i class="fa fa-plus-circle"></i></span>
              </div>

             </div>

            </div>
           
            <button type="submit" class="btn mb-2 btn-secondary">Save Change</button>
          </form>

        </div> <!-- /.card-body -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->

<div style="visibility: hidden;">

  <div class="extra_event_item_add">
    <div class="extra_event_item_remove">
      <div class="row">

        <div class="form-group col-lg-4">
          <label for="inputState5">Subject</label>
          <select id="inputState5" name="subject_id[]" class="form-control @error ('subject_id') is-invalid @enderror">
            <option selected="" disabled>Choose subject...</option>
            @foreach ($subject as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>
          @error('subject_id')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group col-lg-2">
          <label for="firstname">Full Mark</label>
          <input type="text" name="full_mark[]" class="form-control  @error ('full_mark') is-invalid @enderror" placeholder="full mark">
          @error('full_mark')
              <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group col-lg-2">
          <label for="firstname">Pass Mark</label>
          <input type="text" name="pass_mark[]" class="form-control  @error ('pass_mark') is-invalid @enderror" placeholder="pass mark">
          @error('pass_mark')
              <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group col-lg-2">
          <label for="firstname">Got Mark</label>
          <input type="text" name="subjective_mark[]" class="form-control  @error ('subjective_mark') is-invalid @enderror" placeholder="subjective mark">
          @error('subjective_mark')
              <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="col-lg-2 addEvent">
          <span class="btn btn-success addEventMore"><i class="fa fa-plus-circle"></i></span>
          <span class="btn btn-danger removeEventMore"><i class="fa fa-minus-circle"></i></span>
        </div>

       </div>
    </div>
  </div>

</div>

@endsection

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
  <style>
    .addEvent{
      padding-top: 28px;
    }
    .removeEventMore{
      padding-top: 10px;
    }
    .addEventMore{
      padding-top: 10px;
    }
  </style>
@endsection

@section('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      let counter = 0;
      $(document).on('click', '.addEventMore', function(){
        let extra_event_item_add = $('.extra_event_item_add').html();
        $(this).closest('.add_item').append(extra_event_item_add);
        counter++;
      });

      $(document).on('click', '.removeEventMore', function(){
        let extra_event_item_remove = $('.extra_event_item_remove').html();
        $(this).closest('.extra_event_item_remove').remove();
        counter --;
      });
    });
  </script>
@endsection