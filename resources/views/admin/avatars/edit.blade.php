@extends('admin.layouts')
@section('content')
<!-- Layout container -->
<div class="layout-page">
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Avatars/</span>Update Avatar</h4>

            <!-- Display Success/Error Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible mb-4" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Avatar Information</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.update.avatars', $avatar->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="avatar-upload">Avatar Image</label>
                                            <div class="input-group input-group-merge">
                                                <span id="avatar-icon" class="input-group-text">
                                                    <i class='bx bxs-file-image'></i>
                                                </span>
                                                <input
                                                    type="file"
                                                    name="avatar"
                                                    class="form-control"
                                                    id="avatar-upload"
                                                    accept="image/*"
                                                    onchange="previewImage(event)"
                                                />
                                            </div>
                                            <small class="text-muted">Leave blank to keep current image</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="avatar-name">Avatar Name</label>
                                            <div class="input-group input-group-merge">
                                                <span id="name-icon" class="input-group-text">
                                                    <i class='bx bxs-user-pin'></i>
                                                </span>
                                                <input
                                                    type="text"
                                                    name="name"
                                                    id="avatar-name"
                                                    class="form-control"
                                                    placeholder="Avatar Name"
                                                    value="{{ old('name', $avatar->name) }}"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Right Column - Image Preview -->
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Image Preview</label>
                                            <div class="image-preview-container border rounded p-3 text-center">
                                                <img id="image-preview" 
                                                     src="{{ $avatar->avatar ? asset('storage/'.$avatar->avatar) : 'https://via.placeholder.com/200x200?text=No+Image' }}" 
                                                     alt="Avatar Preview" 
                                                     class="img-fluid rounded" 
                                                     style="max-height: 200px;">
                                                <div class="mt-2 text-muted" id="preview-text">
                                                    {{ $avatar->avatar ? basename($avatar->avatar) : 'Current avatar' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Centered Buttons -->
                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary">Update Avatar</button>
                                        <a href="{{ route('admin.avatars') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>

<script>
    // Initialize with current image
    document.addEventListener('DOMContentLoaded', function() {
        const currentImage = "{{ $avatar->avatar ? asset('storage/'.$avatar->avatar) : '' }}";
        if(currentImage) {
            document.getElementById('image-preview').style.display = 'block';
        }
    });

    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        const previewText = document.getElementById('preview-text');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewText.textContent = input.files[0].name;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            // Revert to current image if exists
            const currentImage = "{{ $avatar->avatar ? asset('storage/'.$avatar->avatar) : 'https://via.placeholder.com/200x200?text=No+Image' }}";
            preview.src = currentImage;
            previewText.textContent = "{{ $avatar->avatar ? basename($avatar->avatar) : 'No image selected' }}";
        }
    }
</script>

<style>
    .image-preview-container {
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    #image-preview {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection