                    <form class="form form-horizontal" action="{{ route('backend.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Project</label>
                          <input type="text" id="namaproject" name="namaproject" class="form-control" placeholder="Enter Name" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Keterangan</label>
                          <textarea class="form-control" rows="3" id="keterangan" name="keterangan" required></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit" style="float: right">Save</button>
                    </form>