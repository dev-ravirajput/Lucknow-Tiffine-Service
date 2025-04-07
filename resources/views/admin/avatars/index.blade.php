@extends('admin.layouts')
@section('content')
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Avatars /</span> Available Avatars</h4>

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
                  <h5 class="mb-0">Available Avatars</h5>
                  <a href="{{ route('admin.create.avatars') }}" class="btn btn-primary">Add Avatar</a>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($avatars as $index)
                      <tr>
                        <th scope="row">{{ $loop->iteration + ($avatars->currentPage() - 1) * $avatars->perPage() }}</th>
                        <td>
                          <img src="{{ asset('storage/'.$index->avatar) }}" height="50px" width="50px" style="border-radius: 5px" onerror="this.src='https://via.placeholder.com/50?text=No+Image'">
                        </td>
                        <td>{{ $index->name }}</td>
                        <td>{{ $index->slug }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('admin.edit.avatars', $index->id) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                              </a>
                              <form method="POST" action="{{ route('admin.delete.avatars', $index->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this avatar?')">
                                  <i class="bx bx-trash me-1"></i> Delete
                                </button>
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5" class="text-center py-4">No avatars found. <a href="{{ route('admin.create.avatars') }}">Create one</a></td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                
                <!-- Bootstrap 5 Pagination -->
                @if($avatars->hasPages())
                <div class="card-footer">
                  <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mb-0">
                      {{-- Previous Page Link --}}
                      @if($avatars->onFirstPage())
                        <li class="page-item disabled">
                          <span class="page-link">Previous</span>
                        </li>
                      @else
                        <li class="page-item">
                          <a class="page-link" href="{{ $avatars->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                      @endif

                      {{-- Pagination Elements --}}
                      @foreach($avatars->getUrlRange(1, $avatars->lastPage()) as $page => $url)
                        @if($page == $avatars->currentPage())
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
                      @if($avatars->hasMorePages())
                        <li class="page-item">
                          <a class="page-link" href="{{ $avatars->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                      @else
                        <li class="page-item disabled">
                          <span class="page-link">Next</span>
                        </li>
                      @endif
                    </ul>
                  </nav>
                </div>
                @endif
              </div>
              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
@endsection