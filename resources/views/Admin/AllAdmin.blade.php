@include('Resources.Header')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Admin Data</h4>

            </div>
            <div class="card-body">
                @if ($error)
                    <div class="alert alert-{{$type}} alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{$message}}
                        </div>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                            <tr>
                                <th>UserName</th>
                                <th>Admin Type</th>
                                <th>Joined On</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($admin as $admins)
                            <tbody>
                                <tr>


                                    <td>{{ $admins->Username }}</td>
                                    <td>
                                        @if ($admins->auth_type == 'SuperAdmin')
                                            <div class="badge badge-danger badge-shadow">SuperAdmin</div>
                                        @endif
                                        @if ($admins->auth_type == 'Admin')
                                            <div class="badge badge-success badge-shadow">Admin</div>
                                        @endif

                                    </td>
                                    <td>{{ $admins->Created_on }}</td>
                                    <td><a href="{{url('/UpdateAdmin')}}/{{ $admins->ID }}" class="btn btn-primary">Update</a></td>

                                    <td>
                                        @if ($admins->auth_type == 'Admin')
                                            <a href="{{ route('view.alladmin') }}/{{ $admins->ID }}"
                                                class="btn btn-danger">Delete</a>
                                        @endif

                                    </td>

                                </tr>

                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@include('Resources.Footer')
