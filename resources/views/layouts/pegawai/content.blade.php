<style>
    .print-icon {
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }

    .print-icon:hover .print-text {
        color: blue;
    }

    .print-text {
        margin-left: 5px;
        transition: color 0.3s;
    }
</style>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pegawai</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Pegawai</h3>
                                <div class="float-right">
                                    <a href="{{ route('pegawai.create') }}" class="btn btn-success">Tambah Data
                                        Pegawai</a>
                                    <a href="{{ route('cetakPegawai') }}" class="btn btn-warning"><span
                                            class="print-icon">
                                            <i class="fas fa-print"></i>
                                            <span class="print-text">Cetak PDF</span>
                                        </span></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-right mt-1" method="get" action="{{ route('searchPegawai') }}">
                                <div class="input-group">
                                    <input type="text" name="searchPegawai" class="form-control" id="searchPegawai"
                                        placeholder="Masukkan Nama Pegawai">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th>@sortablelink('namaPegawai', 'Nama', ['icon' => ''])</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Foto</th>
                                            <th width="220px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawai as $pgw)
                                            <tr>
                                                <td>{{ $pgw->namaPegawai }}</td>
                                                <td>{{ $pgw->alamatPegawai }}</td>
                                                <td>{{ $pgw->telpPegawai }}</td>
                                                <td><img src="{{ asset('storage/' . $pgw->fotoPegawai) }}"
                                                        style="width: 120px; height: 120px; max-width: 100%; max-height: 100%;"
                                                        class="img-fluid"></td>
                                                <td>
                                                    <form action="{{ route('pegawai.destroy', $pgw->idPegawai) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="btn-group" role="group">
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('pegawai.show', $pgw->idPegawai) }}">Show</a>
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('pegawai.edit', $pgw->idPegawai) }}">Edit</a>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#deleteConfirmation{{ $pgw->idPegawai }}">Delete</button>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="deleteConfirmation{{ $pgw->idPegawai }}" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="deleteConfirmationLabel{{ $pgw->idPegawai }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="deleteConfirmationLabel{{ $pgw->idPegawai }}">
                                                                            Konfirmasi Hapus</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Anda yakin ingin menghapus Pegawai ini?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {!! $pegawai->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
