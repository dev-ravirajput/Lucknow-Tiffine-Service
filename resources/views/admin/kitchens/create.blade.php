@extends('admin.layouts')
@section('content')
<style>
  #map {
    height: 300px;
    width: 100%;
    border-radius: 10px;
}
.avatar-option input[type="radio"]:checked + label img {
            border: 3px solid #7367F0;
            box-shadow: 0 0 0 2px rgba(115, 103, 240, 0.2);
          }
          .avatar-label {
            cursor: pointer;
            transition: all 0.2s ease;
          }
          .avatar-label:hover img {
            transform: scale(1.1);
          }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ&libraries=places">
</script>

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kitchens/</span>Add Kitchens</h4>

               <!-- Display Success/Error Messages -->
            @if($errors->any())
              <div class="alert alert-danger">
                  <ul class="mb-0">
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Kitchen Information</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" action="{{ route('admin.store.kitchens') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <!-- Avatar Selection Section -->
                        <div class="mb-4">
                          <label class="form-label">Select Kitchen Avatar</label>
                          <div class="d-flex flex-wrap gap-3">
                            @foreach($avatars as $av)
                            <div class="avatar-option">
                              <input type="radio" name="avatar" id="{{ $av->slug }}" value="{{ $av->slug }}" class="d-none" {{ old('avatar') == $av->slug ? 'checked' : '' }}>
                              <label for="{{ $av->slug }}" class="avatar-label">
                                <img src="{{ asset('storage/'.$av->avatar) }}" class="rounded-circle" width="60" height="60">
                              </label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                          <!-- Left Column -->
                          <div class="col-xl-6">
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-fullname">Owner Name</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                  ><i class="bx bx-user"></i
                                ></span>
                                <input
                                  type="text"
                                  value="{{ old('owner_name') }}"
                                  name="owner_name"
                                  class="form-control"
                                  id="basic-icon-default-fullname"
                                  placeholder="John Doe"
                                  aria-label="John Doe"
                                  aria-describedby="basic-icon-default-fullname2"
                                />
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-company">Kitchen Name</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-buildings"></i
                                ></span>
                                <input
                                  type="text"
                                  value="{{ old('kitchen_name') }}"
                                  name="kitchen_name"
                                  id="basic-icon-default-company"
                                  class="form-control"
                                  placeholder="ACME Inc."
                                  aria-label="ACME Inc."
                                  aria-describedby="basic-icon-default-company2"
                                />
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-email">Email Address (You can use letters, numbers & periods)</label>
                              <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input
                                  type="text"
                                  name="email"
                                  value="{{ old('email') }}"
                                  id="basic-icon-default-email"
                                  class="form-control"
                                  placeholder="john.doe"
                                  aria-label="john.doe"
                                  aria-describedby="basic-icon-default-email2"
                                />
                                <span id="basic-icon-default-email2" class="input-group-text">@gmail.com</span>
                              </div>
                            </div>

                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-phone">Contact No.</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"
                                  ><i class="bx bx-phone"></i
                                ></span>
                                <input
                                  type="text"
                                  name="phone"
                                  value="{{ old('phone') }}"
                                  id="basic-icon-default-phone"
                                  class="form-control phone-mask"
                                  placeholder="658 799 8941"
                                  aria-label="658 799 8941"
                                  aria-describedby="basic-icon-default-phone2"
                                />
                              </div>
                            </div>
                          </div>
                          
                          <!-- Right Column -->
                          <div class="col-xl-6">
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-phone">Sqft</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"
                                  ><i class='bx bx-area'></i></span>
                                <input
                                  type="text"
                                  name="sqft"
                                  value="{{ old('sqft') }}"
                                  class="form-control"
                                  placeholder="2,450"
                                  aria-label="2,450"
                                  aria-describedby="basic-icon-default-phone2"
                                />
                              </div>
                            </div>

                            <div class="mb-3">
                              <div class="input-group">
                            <label class="input-group-text">Status</label>
                            <select class="form-select" name="status">
                              <option selected>Choose...</option>
                              <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                              <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                              <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                          </div>
                            </div>

                            <div class="mb-3">
                              <div class="input-group">
                            <label class="input-group-text">Type</label>
                            <select class="form-select" name="type">
                              <option selected>Choose...</option>
                              <option value="veg" {{ old('type') == 'veg' ? 'selected' : '' }}>Veg</option>
                              <option value="nonveg" {{ old('type') == 'nonveg' ? 'selected' : '' }}>Non-Veg</option>
                              <option value="both" {{ old('type') == 'both' ? 'selected' : '' }}>Both</option>
                            </select>
                          </div>
                            </div>

                            <div class="mb-3">
                              <div class="input-group">
                            <label class="input-group-text">Rating</label>
                            <select class="form-select" name="rating">
                              <option selected>Choose...</option>
                              <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1 Star</option>
                              <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2 Star</option>
                              <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3 Star</option>
                              <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4 Star</option>
                              <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5 Star</option>
                            </select>
                          </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-message">Location</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"
                                  ><i class='bx bxs-edit-location'></i></span>
                                <input
                                  type="text"
                                  name="location"
                                  value ="{{ old('location') }}"
                                  id="search-box"
                                  class="form-control phone-mask"
                                  placeholder="Lucknow"
                                  aria-label="Lucknow"
                                  aria-describedby="basic-icon-default-phone2"
                                />
                              </div>
                            </div>
                          </div>
                        <div class="col-xl-12 mt-1 p-2">
                        <div id="map"></div>
                        <input type="hidden" value="{{ old('coordinates') }}" id="coordinates" name="coordinates">
                       </div>
                        </div>
                        
                        <!-- Centered Buttons -->
                        <div class="row mt-4">
                          <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Send</button>
                            <a href="{{ route('admin.kitchens') }}" class="btn btn-danger">Cancel</a>
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
var map;
var marker;
var searchBox;
var geocoder;

function initMap() {
    var initialPos = {
        lat: 26.8466937,
        lng: 80.94616599999999
    };

    // Initialize Google Map
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: initialPos
    });

    // Initialize Marker
    marker = new google.maps.Marker({
        position: initialPos,
        map: map,
        draggable: true
    });

    // Initialize SearchBox
    var input = document.getElementById('search-box');
    searchBox = new google.maps.places.SearchBox(input);
    geocoder = new google.maps.Geocoder();

    // Bias SearchBox results towards the map's viewport
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    // Handle place selection from search
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        if (places.length === 0) return;

        var place = places[0]; // Get the first place result

        if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
        }

        // Move marker and update hidden field
        marker.setPosition(place.geometry.location);
        updateHiddenField(place.geometry.location.lat(), place.geometry.location.lng());

        // Adjust map view
        map.setCenter(place.geometry.location);
        map.setZoom(15); // Adjust zoom level for better visibility
    });

    // Handle marker drag to update address in search field
    google.maps.event.addListener(marker, 'dragend', function(event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        updateHiddenField(lat, lng);

        // Get address from dragged marker position
        geocoder.geocode({
            location: {
                lat: lat,
                lng: lng
            }
        }, function(results, status) {
            if (status === "OK" && results[0]) {
                document.getElementById('search-box').value = results[0].formatted_address;
            } else {
                console.log("Geocoder failed due to: " + status);
            }
        });
    });

    // Initialize hidden field with initial position
    updateHiddenField(initialPos.lat, initialPos.lng);
}

function updateHiddenField(lat, lng) {
    document.getElementById('coordinates').value = lat + ',' + lng;
}

window.onload = initMap;
</script>
@endsection