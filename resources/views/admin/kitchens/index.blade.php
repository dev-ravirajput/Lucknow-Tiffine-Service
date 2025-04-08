@extends('admin.layouts')
@section('content')
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kitchens /</span> Available Kitchens</h4>
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

              <!-- Responsive Table -->
              <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Available Kitchens</h5>
                    <a href="{{ route('admin.create.kitchens') }}" class="btn btn-primary">Add Kitchen</a>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Owner Name</th>
                        <th>Contact No.</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Sqft</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($kitchens as $k)
                      <tr>
                        <th scope="row">{{ ($kitchens->currentPage() - 1) * $kitchens->perPage() + $loop->iteration }}</th>
                        <td>{{ $k->kitchen_name }}</td>
                        <td style="text-transform: capitalize;">{{ $k->type }}</td>
                        <td>{{ $k->owner_name }}</td>
                        <td>{{ $k->contact_no }}</td>
                        <td>{{ $k->email }}</td>
                        <td>
                          @if($k->status == 'pending')
                          <span class="badge bg-label-warning me-1">{{ $k->status }}</span>
                          @elseif($k->status == 'active')
                          <span class="badge bg-label-success me-1">{{ $k->status }}</span>
                          @else
                          <span class="badge bg-label-primary me-1">{{ $k->status }}</span>
                          @endif
                        </td>
                        <td>{{ $k->rating }} <i class='bx bxs-star'></i></td>
                        <td>{{ $k->sqft }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5" class="text-center py-4">No avatars found. <a href="{{ route('admin.create.kitchens') }}">Create one</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- Pagination -->
                @if($kitchens->hasPages())
                <div class="card-footer d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if($kitchens->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $kitchens->previousPageUrl() }}" rel="prev">Previous</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach($kitchens->getUrlRange(1, $kitchens->lastPage()) as $page => $url)
                                @if($page == $kitchens->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if($kitchens->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $kitchens->nextPageUrl() }}" rel="next">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                @endif
                <!-- End Pagination -->
              </div>
              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
@endsection