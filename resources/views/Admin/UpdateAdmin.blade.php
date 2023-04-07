@include('Resources.Header')

<div class="card">
    <div class="card-header">
        <h4>Update Admin</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ Route('view.updateadminform') }}" class="needs-validation" novalidate="">
            @csrf

            <div class="form-group">
                <label>ID</label>
                <input type="text" name="ID"  value="{{$Adminupdate->ID}}"  class="form-control" readonly >

                <label class="mt-3">Username</label>
                <input type="text" name="Username" value="{{$Adminupdate->Username}}"  class="form-control" >
                <div class="invalid-feedback">
                    @error('Username')
                        {{ $message }}
                    @enderror
                </div>

                <label class="mt-3">Password</label>
                <input type="text" name="Password" value="{{$Adminupdate->Password}}"  class="form-control">
                <div class="invalid-feedback">
                    @error('Password')
                        {{ $message }}
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <label>Admin Type</label>
                    <select  name="auth_type" class="form-control">
                        <option value="{{$Adminupdate->auth_type}}" selected>{{$Adminupdate->auth_type}}</option>
                    </select>
                </div>
                <div class="invalid-feedback">
                    @error('auth_type')
                        {{ $message }}
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block submit-form mt-4">Submit</button>

            </div>

        </form>
    </div>
</div>

@include('Resources.Footer')
