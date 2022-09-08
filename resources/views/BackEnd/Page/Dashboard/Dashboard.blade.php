@extends('BackEnd.Master')

@section('content')
            <div class="card">
                <h5 class="card-header">Data Project</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if(Auth::user()->role == "user")
                @else
                <button type="button" class="btn btn-primary ms-4 mx-4 mb-4" onClick="create()"><i class="bx bx-add me-1"></i>Add Project</button>
                @endif
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Project</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $no = 0;
                      ?>
                        @foreach($project as $pr)
                      <?php
                        $no += 1;
                      ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$no}}</td>
                        <td>{{$pr->namaproject}}</td>
                        <td>{{$pr->status}}</td>
                        <td>
                          @if(Auth::user()->role == "user")
                          <button type="button" class="btn btn-info" onClick="tampil({{ $pr->id }})">
                          <i class="bx bx-edit-alt me-2"></i>Detail
                          </button>
                          @else
                          <button type="button" class="btn btn-info" onClick="tampil({{ $pr->id }})">
                          <i class="bx bx-edit-alt me-2"></i>Detail
                          </button>
                          <button type="button" class="btn btn-warning" onClick="show({{ $pr->id }})">
                          <i class="bx bx-edit-alt me-2"></i>Ubah
                          </button>
                          <a href="{{route('backend.delete', $pr->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                          <i class="bx bx-trash me-2"></i>Delete</a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    {!! $project->links() !!}
                  </table>
                </div>
              </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Data Project</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div id="page" class="p-2"></div>
                    </div>
                  </div>
                </div>
              </div>

      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script>

        // Untuk modal halaman create
        function create() {
            $.get("{{ url('/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Add Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

        // Untuk modal halaman update
        function show(id) {
            $.get("{{ url('/show') }}/"+ id, {}, function(data, status) {
                $("#exampleModalLabel").html('Ubah Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

        // Untuk modal halaman read
        function tampil(id) {
            $.get("{{ url('/tampil') }}/"+ id, {}, function(data, status) {
                $("#exampleModalLabel").html('Tampil Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

    </script>
  

@endsection