@extends('Blading.Master2')

@push('title')
    1st Page
@endpush()



@push('navbar')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button"
                role="tab" aria-controls="messages" aria-selected="false">Messages</button>
        </li>
    </ul>
@endpush



@push('main')
    <h1> This is stack section</h1>
@endpush

@push('main')
    <h1> This is stack section</h1>
@endpush

@push('main')
    <h1> This is stack section</h1>
@endpush

@push('footer')
    <h3>Footer here!</h3>
@endpush
