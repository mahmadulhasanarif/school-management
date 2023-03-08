@extends('admin.layouts.master')
@section('main')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <div class="col-md-9">
            <h2 class="mb-2 page-title">Data table</h2>
          </div>

          <div class="col-md-3">
            <a style="float: right" class="btn mb-2 btn-success" href="{{route('student.fee_category_amount.index')}}">Back To Index</a>
          </div>
          <p class="col-lg-4"><strong class="text-danger">Fee Category Type</strong> : {{ $fee_category_amount[0]->fee_category->name }}</p>
          <p class="card-text col-md-8">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive.</p>
        </div>
        <div class="row my-4">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                <table class="table datatables" id="dataTable-1">
                  <thead>
                    <tr>
                      <th width="0"></th>
                      <th width="20%">#</th>
                      <th width="50%">Student Class</th>
                      <th width="30%">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($fee_category_amount as $item)
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input">
                          <label class="custom-control-label"></label>
                        </div>
                      </td>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{$item->class->name}}</td>
                      <td>{{$item->amount}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div> <!-- simple table -->
        </div> <!-- end section -->
      </div> <!-- .col-12 -->
    </div>
</div>
@endsection