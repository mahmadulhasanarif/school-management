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
            <a style="float: right" class="btn mb-2 btn-success" href="{{route('setup.assign_subject.create')}}">Assign Subject Create</a>
          </div>
        </div>
        <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced.</p>
        <div class="row my-4">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                <table class="table datatables" id="dataTable-1">
                  <thead>
                    <tr>
                      <th width="10%"></th>
                      <th width="15%">#</th>
                      <th width="45%">Assign Subject</th>
                      <th width="15%">Action</th>
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
                      <td>{{$item->class->name}}</td>

                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('setup.assign_subject.edit', $item->class_id)}}">Edit</a>
                            <a class="dropdown-item" href="{{route('setup.assign_subject.details', $item->class_id)}}">Details</a>
                          </div>
                      </td>
                          
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