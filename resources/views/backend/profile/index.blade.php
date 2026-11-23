@extends('backend.layout')
@section('backend_content')
<div class="controller my-3 bg-white shadow p-3">
    <div class="row">
        <div class="col-lg-8">
            <h4>Profile Details</h4>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header px-3">
                    <h4 class="pb-0">password update</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update.own') }}" method="post">
                        @csrf
                        <label for="old_pass">Old Password</label>
                        <input type="password" class="form-control mb-2" name="current_pass"
                            placeholder="current password">
                        @error('current_pass')
                        <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror


                        <label for="new_pass">New Password</label>
                        <input type="password" class="form-control mb-2" name="new_pass" placeholder="new password">
                        @error('new_pass')
                        <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary w-100">Update Password</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('backend_js')

@if (session()->has('success'))
<script>
    Swal.fire({
    title: "Drag me!",
    icon: "success",
    draggable: true
    });
</script>

@endif
@endpush