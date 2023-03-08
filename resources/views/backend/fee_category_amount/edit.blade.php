@extends('admin.layouts.master')
@section('main')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
        <h2 class="h3 mb-4 page-title">Student Fee Category Amount Edit</h2>
        <div class="my-4">
          <form method="POST" action="{{route('student.fee_category_amount.update', $data[0]->fee_category_id)}}">
            @csrf
            <hr class="my-4">
            <div class="add_item">
              <div class="form-group ">
                <label for="inputState5">Fee Category</label>
                <select id="inputState5" name="fee_category_id" class="form-control">
                  <option selected="" disabled>Choose fee category...</option>
                  @foreach ($fee_category as $item)
                  <option value="{{$item->id}}" {{$item->id == $data[0]->fee_category_id ? 'selected' : ''}}>{{$item->name}}</option>
                  @endforeach
                </select>
                @error('fee_category_id')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              @foreach ($data as $singleData)
              <div class="delete_whole_extra_item">
              <div class="row">

                <div class="form-group col-lg-5">
                  <label for="inputState5">Student Class</label>
                  <select id="inputState5" name="class_id[]" class="form-control">
                    <option selected="" disabled>Choose class...</option>
                    @foreach ($student_class as $item)
                    <option value="{{$item->id}}" {{ $item->id == $singleData->class_id ? 'selected': '' }}>{{$item->name}}</option>
                    @endforeach
                  </select>
                  @error('class_id')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
  
  
                <div class="form-group col-lg-5">
                  <label for="firstname">Student Amount</label>
                  <input type="text" name="amount[]" value="{{old('amount', $singleData->amount)}}" class="form-control" placeholder="Fee amount">
                  @error('amount')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
  
  
                <div class="col-lg-2 addEvent">
                  <span class="btn btn-success addEventMore"><i class="fa fa-plus-circle"></i></span>
                  <span class="btn btn-danger removeEventMore"><i class="fa fa-minus-circle"></i></span>
                </div>
  
               </div>
              </div>
              @endforeach

            </div>
           
            <button type="submit" class="btn mb-2 btn-secondary">Save Change</button>
          </form>

        </div> <!-- /.card-body -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->


  <div style="visibility: hidden;">
    <div class="whole_extra_item_add">
      <div class="delete_whole_extra_item">
        <div class="form-row">
          
          <div class="form-group col-lg-5">
            <label for="inputState5">Student Class</label>
            <select id="inputState5" name="class_id[]" class="form-control  @error ('class_id') is-invalid @enderror">
              <option selected="" disabled>Choose class...</option>
              @foreach ($student_class as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
            @error('class_id')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>


          <div class="form-group col-lg-5">
            <label for="firstname">Student Amount</label>
            <input type="text" name="amount[]" class="form-control  @error ('amount') is-invalid @enderror" placeholder="Fee amount">
            @error('amount')
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
      $(document).on("click", '.addEventMore', function(){
        let whole_extra_item_add = $('.whole_extra_item_add').html();
        $(this).closest('.add_item').append(whole_extra_item_add);
        counter++;
      });

      $(document).on("click", '.removeEventMore', function(){
        let delete_whole_extra_item = $('.delete_whole_extra_item').html();
        $(this).closest('.delete_whole_extra_item').remove();
        counter -= 1;
      });
    });
  </script>
@endsection