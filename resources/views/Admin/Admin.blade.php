@include('Resources.Header')

<div class="card">
    <div class="card-header">
        <h4>Add Admin</h4>
    </div>
    <div class="card-body">
        @if ($error==1)
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    Admin Added Successfully.
                </div>
            </div>
        @endif
        @if ($error==0)
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    Error Occur Try again.
                </div>
            </div>
        @endif
        <form method="POST" action="{{ Route('add.admin') }}" class="needs-validation" novalidate="">
            @csrf

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="Username" value="{{ old('Username') }}" required class="form-control">
                <div class="invalid-feedback">
                    @error('Username')
                        {{ $message }}
                    @enderror
                </div>

                <label class="mt-3">Password</label>
                <input type="text" name="Password" value="{{ old('Password') }}" required class="form-control">
                <div class="invalid-feedback">
                    @error('Password')
                        {{ $message }}
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <label>Admin Type</label>
                    <select name="auth_type" class="form-control">
                        <option value="Admin" selected>Admin</option>
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
