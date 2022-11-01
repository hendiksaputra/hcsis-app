@extends('admin.main-layout')
@section('content-header')
                <div class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1 class="m-0">Operable Units</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Operable Units</li>
                        </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
@endsection
@section('body')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Operable Units Data Employee</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                <div class="col-sm-12 col-md-6">
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="mt-5 d-flex justify-content-end">
                      <a href="{{route('operableunits') }}" class="btn btn-primary">Back</a>
                  </div>
                  </div>
                </div>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                <form class="form-horizontal" action="/updateOperableunits/{{$operableunits->slug}}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="employee_id" class="col-sm-2 col-form-label">Employee Name</label> :
                            <div class="col-sm-3">
                                <select name="employee_id" class="form-control select2 select2-hidden-accessible">
                                    @foreach ($employee as $employee)
                                    <option value="{{ $employee->id }}"
                                      {{ old('employee_id', $operableunits->employee_id) == $employee->id ? 'selected' : '' }}>
                                      {{ $employee->fullname }}
                                    </option>
                                    @endforeach
                                  </select>
                            </div>
                          </div> 
                        <div class="form-group row">
                          <label for="unit_name" class="col-sm-2 col-form-label">Unit Name</label> :
                          <div class="col-sm-3">
                            <input type="text" value="{{$operableunits->unit_name}}" name="unit_name" class="form-control" id="unit_name" placeholder="">
                            @if ($errors->any('unit_name'))
                            <span class="text-danger">{{ ($errors->first('unit_name')) }}</span>
                          @endif
                        </div>
                          
                        </div>
                        <div class="form-group row">
                            <label for="unit_type" class="col-sm-2 col-form-label">Unit Type</label> :
                            <div class="col-sm-3">
                              <input type="text" value="{{$operableunits->unit_type}}" name="unit_type" class="form-control" id="unit_type" placeholder="">
                              @if ($errors->any('unit_type'))
                                <span class="text-danger">{{ ($errors->first('unit_type')) }}</span>
                              @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label for="unit_remarks" class="col-sm-2 col-form-label">Unit Remarks</label> :
                            <div class="col-sm-3">
                              <input type="text" value="{{$operableunits->unit_remarks}}" name="unit_remarks" class="form-control" id="unit_remarks" placeholder="">
                              @if ($errors->any('unit_remarks'))
                                <span class="text-danger">{{ ($errors->first('unit_remarks')) }}</span>
                              @endif
                            </div>
                           
                        </div>        
                        
                      </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Save</button>
                      <button type="reset" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                  </form>
                
          
            </div>
          
          </div>
  

         

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>


@endsection









