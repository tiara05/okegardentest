                    <form class="form form-horizontal" action="{{ route('backend.update',$project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Project</label>
                          <input type="text" value="{{$project->namaproject}}" id="namaproject" name="namaproject" class="form-control" placeholder="Enter Name" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Keterangan</label>
                          <textarea class="form-control" rows="3" id="keterangan" name="keterangan" required>{{$project->keterangan}}</textarea>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="On Progress">On Progress</option>
                                <option value="Presentasi">Presentasi</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                          </div>
                        </div>
                        
                        <button class="btn btn-primary" type="submit" style="float: right">Save changes</button>
                    </form>