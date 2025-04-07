@extends('admin.layouts')
@section('content')
<!-- Layout container -->
<div class="layout-page">
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Avatars/</span>Add Avatar</h4>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Avatar Information</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.store.avatars') }}" enctype="multipart/form-data">
                                @csrf
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
                                                <img id="image-preview" src="https://via.placeholder.com/200x200?text=No+Image+Selected" 
                                                     alt="Avatar Preview" 
                                                     class="img-fluid rounded" 
                                                     style="max-height: 200px;">
                                                <div class="mt-2 text-muted" id="preview-text">No image selected</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Centered Buttons -->
                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary">Save Avatar</button>
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
            preview.src = "https://via.placeholder.com/200x200?text=No+Image+Selected";
            previewText.textContent = "No image selected";
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
        display: none;
    }
</style>
@endsection