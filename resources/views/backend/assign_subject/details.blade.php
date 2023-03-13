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
            <a style="float: right" class="btn mb-2 btn-success" href="{{route('setup.assign_subject.index')}}">Back To Index</a>
          </div>
          <p class="col-lg-4"><strong class="text-danger">Fee Category Type</strong> : {{ $data[0]->class->name }}</p>
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
                      <th width="10%">#</th>
                      <th width="25%">Subject</th>
                      <th width="20%">Full Mark</th>
                      <th width="20%">Pass Mark</th>
                      <th width="25%">Got Mark</th>
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
                      <td>{{$item->subject->name}}</td>
                      <td>{{$item->full_mark}}</td>
                      <td>{{$item->pass_mark}}</td>
                      <td>{{$item->subjective_mark}}</td>
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