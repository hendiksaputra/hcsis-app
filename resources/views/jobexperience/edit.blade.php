@extends('admin.main-layout')
@section('content-header')
                <div class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1 class="m-0">Job Experiences</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Job Experiences</li>
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
              <h3 class="card-title">Edit Job Experiences Data Employee</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                <div class="col-sm-12 col-md-6">
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="mt-5 d-flex justify-content-end">
                      <a href="{{route('jobexperiences') }}" class="btn btn-primary">Back</a>
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
                <form class="form-horizontal" action="/updateJobexperiences/{{$jobexperiences->slug}}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="employee_id" class="col-sm-2 col-form-label">Employee Name</label> :
                            <div class="col-sm-3">
                                <select name="employee_id" class="form-control select2 select2-hidden-accessible">
                                    @foreach ($employee as $employee)
                                    <option value="{{ $employee->id }}"
                                      {{ old('employee_id', $jobexperiences->employee_id) == $employee->id ? 'selected' : '' }}>
                                      {{ $employee->fullname }}
                                    </option>
                                    @endforeach
                                  </select>
                            </div>
                          </div> 
                        <div class="form-group row">
                          <label for="company_name" class="col-sm-2 col-form-label">Company Name</label> :
                          <div class="col-sm-3">
                            <input type="text" value="{{$jobexperiences->company_name}}" name="company_name" class="form-control" id="company_name" placeholder="">
                            @if ($errors->any('company_name'))
                            <span class="text-danger">{{ ($errors->first('company_name')) }}</span>
                          @endif
                        </div>
                          
                        </div>
                        <div class="form-group row">
                            <label for="job_position" class="col-sm-2 col-form-label">Job Position</label> :
                            <div class="col-sm-3">
                              <input type="text" value="{{$jobexperiences->job_position}}" name="job_position" class="form-control" id="job_position" placeholder="">
                              @if ($errors->any('job_position'))
                                <span class="text-danger">{{ ($errors->first('job_position')) }}</span>
                              @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label for="job_duration" class="col-sm-2 col-form-label">Job Duration</label> :
                            <div class="col-sm-3">
                              <input type="text" value="{{$jobexperiences->job_duration}}" name="job_duration" class="form-control" id="job_duration" placeholder="">
                              @if ($errors->any('job_duration'))
                                <span class="text-danger">{{ ($errors->first('job_duration')) }}</span>
                              @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label for="quit_reason" class="col-sm-2 col-form-label">Quit Reason</label> :
                            <div class="col-sm-3">
                              <input type="text" value="{{$jobexperiences->quit_reason}}" name="quit_reason" class="form-control" id="quit_reason" placeholder="">
                              @if ($errors->any('quit_reason'))
                                <span class="text-danger">{{ ($errors->first('quit_reason')) }}</span>
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









