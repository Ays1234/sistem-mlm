@extends('layouts.admin_tampilan')
@section('reservasi')
    <style>
        .modal {
            overflow-y: auto;
        }

        .ck-content .image-style-side {
            max-width: 50%;
            float: right;
            margin-left: var(--ck-image-style-spacing);
        }


        .ck-content .image.image_resized {
            display: block;
            box-sizing: border-box;
        }

        .ck-content .image.image_resized img {
            width: 100%;
        }

        .ck-content .image.image_resized>figcaption {
            display: block;
        }

        M.Modal.init(modal, {
                dismissible: false
            }

        );

        // Or "jQuery way":
        $('#modal-container').modal( {
                dismissible: false
            }

        );

    </style>


    <div class="card">
        <div class="card-block">

            <div class="card-header">
                <h5>Halaman Tambah Reservasi</h5>
                <button class="btn waves-effect waves-light btn-success btn-outline-success badge badge-pill badge-success"
                    data-target="#tabbed-form" data-titleku="DataOrkemas" data-toggle="modal">Tambah Reservasi<span
                        data-feather="plus-circle"></span></button>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="new-cons" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Reservasi</th>
                                <th>Nama Reservasi</th>
                                <th>Biaya Pembelian Reservasi</th>
                                <th>Harga Reservasi</th>
                                <th>Jam Mulai Reservasi</th>
                                <th>Jam Tutup Reservasi</th>
                                {{-- <th>Nomor Whatsapp</i>
							</th> --}}
                                <th>Status</th>
                            </tr>
                        </thead>

                        @foreach ($reservasis as $no => $reservasi)
                            <tbody>
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $reservasi->kode_reservasi }}</td>
                                    <td>{{ $reservasi->nama_reservasi }}</td>
                                    <td>{{ $reservasi->biaya_reservasi }}</td>
                                    <td>{{ $reservasi->harga_awal }} - {{ $reservasi->harga_akhir }}</td>
                                    <td>{{ $reservasi->jammasuk }}</td>
                                    <td>{{ $reservasi->jamkeluar }}</td>

                                    <td> <button
                                            class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info"
                                            data-target="#{{ $reservasi->id }}" data-titleku="DataOrkemas"
                                            data-toggle="modal"><span data-feather="edit"></span></button>
                                        {{-- <a href="/data/{{ $reservasi->id }}/edit" class="badge bg-warning"><span
                                                data-feather="edit"></span></a> --}}
                                        <form action="/reservasi/destroy/{{ $reservasi->id }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <input type="hidden" name="hapusgambar" value="{{ $reservasi->gambar }}">
                                            <button
                                                class="btn waves-effect waves-light btn-warning btn-outline-warning badge bg-danger"
                                                onclick="return confirm('Apakah ingin menghapus Reservasi ini ?')"><span
                                                    data-feather="trash-2"></span></button>
                                        </form>

                                    </td>
                                    {{-- <td>
								<a href="{{ route('admin.download', $reservasi->nama) }}" target="_blank" rel="noopener"
       class="btn btn-success btn-sm text-white">
       Download
       </a>

       </td> --}}

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($reservasis as $reservasi)
        <!-- tabbed form modal start -->
        <div id="{{ $reservasi->id }}" class="modal fade mixed-form" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign_in" role="tabpanel">
                                <form action="{{ route('update.reservasi') }}" method="POST"
                                    class="md-float-material form-material" enctype="multipart/form-data">
                                    @csrf
                                    <p class="text-muted text-center p-b-5">Edit Data Reservasi</p>
                                    <input type="hidden" name="reservasi" value="{{ $reservasi->id }}">
                                    <div class="form-group">
                                        <input type="text" name="nama_reservasi" id="nama_reservasi"
                                            class="form-control @error('nama_reservasi') is-valid @enderror" required=""
                                            value="{{ $reservasi->nama_reservasi }}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nama Reservasi</label>
                                        @error('nama_reservasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="biaya_reservasi" id="biaya_reservasi"
                                            class="form-control @error('biaya_reservasi') is-valid @enderror" required=""
                                            value="{{ $reservasi->biaya_reservasi }}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Biaya Reservasi</label>
                                        @error('biaya_reservasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="harga_awal" id="harga_awal"
                                            class="form-control @error('harga_awal') is-valid @enderror" required=""
                                            value="{{ $reservasi->harga_awal }}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Harga Awal Reservasi</label>
                                        @error('harga_awal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="harga_akhir" id="harga_akhir"
                                            class="form-control @error('harga_akhir') is-valid @enderror" required=""
                                            value="{{ $reservasi->harga_akhir }}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nilai Akhir Reservasi</label>
                                        @error('harga_akhir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="float">Tanggal Dibuat</label>
                                        <input type="date" name="tgl" id="tgl"
                                            class="form-control @error('tgl') is-valid @enderror" required=""
                                            value="{{ $reservasi->tgl }}">
                                        <span class="form-bar"></span>
                                        @error('tgl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="float">Jam Mulai</label>
                                        <input type="time" name="jammasuk" id="jammasuk"
                                            class="form-control @error('jammasuk') is-valid @enderror" required=""
                                            value="{{ $reservasi->jammasuk }}">
                                        <span class="form-bar"></span>
                                        @error('jammasuk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="float">Jam Berakhir</label>
                                        <input type="time" name="jamkeluar" id="biaya_reservasi"
                                            class="form-control @error('jamkeluar') is-valid @enderror" required=""
                                            value="{{ $reservasi->jamkeluar }}">
                                        <span class="form-bar"></span>
                                        @error('jamkeluar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="pendapatan" id="nama_reservasi"
                                            class="form-control @error('pendapatan') is-valid @enderror" required=""
                                            value="{{ $reservasi->pendapatan }}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Perdapatan</label>
                                        @error('pendapatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="hari" id="hari"
                                            class="form-control @error('hari') is-valid @enderror" required=""
                                            value="{{ $reservasi->hari }}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Pendapatan Harian</label>
                                        @error('hari')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group form-primary">
                                        <label class="col-sm-11 col-form-label">Gambar Reservasi</label>
                                        @if ($reservasi->gambar)
                                            <img src="{{ asset('gambarreservasi/' . $reservasi->gambar) }}"
                                                class="img-preview img-fluid mv3 col-sm-5">
                                        @else
                                            <img class="img-preview img-fluid mv3 col-sm-5">
                                        @endif
                                        <input type="hidden" name="filegambar" value="{{ $reservasi->gambar }}">
                                        <input type="file" name="gambar" id="image" class="form-control"
                                            onchange="previewImage()">
                                        <span class="form-bar"></span>
                                    </div>

                                    {{-- <div class="form-group text-white">
                                    <h4 class="sub-title">Kategori</h4>
                                    <select name="categori_id" class="js-example-data-array">
                                        @foreach ($categoris as $categori)
                                            @if (old('categori_id') === $categori->id)
                                                <option value="{{ $categori->id }}" select>{{ $categori->name }}
                                                </option>
                                            @else
                                                <option value="{{ $categori->id }}">{{ $categori->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div> --}}

                                    <div class="form-group text-white">
                                        <h4 class="sub-title">Aktifkan</h4>
                                        <select name="status" class="js-example-data-array">

                                            @if (old('status') === $reservasi->status)
                                                <option value="{{ $reservasi->status }}" select>
                                                    Aktif
                                                </option>

                                                <option value="{{ $reservasi->status }}">Tidak Aktif
                                                </option>
                                            @else
                                                <option value="{{ $reservasi->status }}">
                                                    Aktif
                                                </option>

                                                <option value="{{ $reservasi->status }}" select>Tidak Aktif
                                                </option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group form-primary">
                                        <label class="col-sm-4 col-form-label">Deskripsi Reservasi</label>
                                        <div id="toolbar-container"></div>
                                        <textarea class="form-control @error('deskripsi') is-valid @enderror editor" rows="10" cols="10"
                                            name="deskripsi">{{ $reservasi->deskripsi }}</textarea>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>


                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Simpan
                                                Data</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabbed form modal end -->
    @endforeach



    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/decoupled-document/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> --}}



    {{-- <script>
	ClassicEditor

		.create(document.querySelector('#editor'), {
			ckfinder: {
				uploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}"
}

})

.then(editor => {
console.log(editor);
})

.catch(error => {
console.error(error);
});

</script> --}}



    <!-- tabbed form modal start -->
    <div id="tabbed-form" class="modal fade mixed-form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="sign_in" role="tabpanel">
                            <form class="md-float-material form-material" action="{{ route('save.reservasi') }}"
                                method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <p class="text-muted text-center p-b-5">Form Tambah Reservasi</p>
                                <div class="form-group">
                                    <input type="text" name="nama_reservasi" id="nama_reservasi"
                                        class="form-control @error('nama_reservasi') is-valid @enderror" required=""
                                        value="{{ old('nama_reservasi') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Nama Reservasi</label>
                                    @error('nama_reservasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="biaya_reservasi" id="biaya_reservasi"
                                        class="form-control @error('biaya_reservasi') is-valid @enderror" required=""
                                        value="{{ old('biaya_reservasi') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Biaya Reservasi</label>
                                    @error('biaya_reservasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="harga_awal" id="harga_awal"
                                        class="form-control @error('harga_awal') is-valid @enderror" required=""
                                        value="{{ old('harga_awal') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Harga Awal Reservasi</label>
                                    @error('harga_awal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="harga_akhir" id="harga_akhir"
                                        class="form-control @error('harga_akhir') is-valid @enderror" required=""
                                        value="{{ old('harga_akhir') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Nilai Akhir Reservasi</label>
                                    @error('harga_akhir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label class="float">Tanggal Dibuat</label>
                                    <input type="date" name="tgl" id="tgl"
                                        class="form-control @error('tgl') is-valid @enderror" required=""
                                        value="{{ old('tgl') }}">
                                    <span class="form-bar"></span>
                                    @error('tgl')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="float">Jam Mulai</label>
                                    <input type="time" name="jammasuk" id="jammasuk"
                                        class="form-control @error('jammasuk') is-valid @enderror" required=""
                                        value="{{ old('jammasuk') }}">
                                    <span class="form-bar"></span>
                                    @error('jammasuk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="float">Jam Berakhir</label>
                                    <input type="time" name="jamkeluar" id="biaya_reservasi"
                                        class="form-control @error('jamkeluar') is-valid @enderror" required=""
                                        value="{{ old('jamkeluar') }}">
                                    <span class="form-bar"></span>
                                    @error('jamkeluar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <input type="text" name="pendapatan" id="pendapatan"
                                        class="form-control @error('pendapatan') is-valid @enderror" required=""
                                        value="{{ old('pendapatan') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Perdapatan</label>
                                    @error('pendapatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group"><input type="text" name="hari" id="hari"
                                        class="form-control @error('hari') is-valid @enderror" required=""
                                        value="{{ old('hari') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Pendapatan Harian</label>
                                    @error('hari')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group form-primary">
                                    <label class="col-sm-4 col-form-label">Gambar Reservasi</label>
                                    <input type="file" name="gambar" class="form-control" required="">
                                    <span class="form-bar"></span>
                                </div>

                                {{-- <div class="form-group text-white">
                                    <h4 class="sub-title">Kategori</h4>
                                    <select name="categori_id" class="js-example-data-array">
                                        @foreach ($categoris as $categori)
                                            @if (old('categori_id') === $categori->id)
                                                <option value="{{ $categori->id }}" select>{{ $categori->name }}
                                                </option>
                                            @else
                                                <option value="{{ $categori->id }}">{{ $categori->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="form-group text-white">
                                    <h4 class="sub-title">Aktifkan</h4>
                                    <select name="status" class="js-example-data-array">

                                        <option value="1" select>Aktif
                                        </option>

                                        <option value="0" select>Tidak Aktif
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group form-primary">
                                    <label class="col-sm-4 col-form-label">Deskripsi Reservasi</label>
                                    <div id="toolbar-container"></div>
                                    <textarea class="form-control @error('deskripsi') is-valid @enderror editor" rows="10" cols="10"
                                        name="deskripsi">{{ old('deskripsi') }}</textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Simpan
                                            Data</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tabbed form modal end -->

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script> --}}
    <script src="/admin_tampil/ckeditor5/ckeditor.js"></script>
    <script src="/admin_tampil/ckfinder/ckfinder.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },

                imageRemoveEvent: {
                    additionalElementTypes: null, // Add additional element types to invoke callback events. Default is null and it's not required. Already included ['image','imageBlock','inlineImage']
                    // additionalElementTypes: ['image', 'imageBlock', 'inlineImage'], // Demo to write additional element types
                    callback: (imagesSrc, nodeObjects) => {
                        // note: imagesSrc is array of src & nodeObjects is array of nodeObject
                        // node object api: https://ckeditor.com/docs/ckeditor5/latest/api/module_engine_model_node-Node.html

                        console.log('callback called', imagesSrc, nodeObjects)
                    }
                },


                toolbar: {
                    items: [
                        "ckfinder", "imageUpload", "|",
                        'resizeImage:50',
                        'resizeImage:75',
                        'resizeImage:original', "|",
                        'toggleImageCaption', 'imageTextAlternative', "|",
                        'heading', '|',
                        'alignment', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'bulletedList', 'numberedList', 'todoList',
                        'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'outdent', 'indent', '|', 'blockQuote', '|',
                        'undo', 'redo', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
            })
            .then(editor => {
                const toolbarContainer = document.querySelector('#toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
    </script>





    @foreach ($reservasis as $editor)
        <script>
            ClassicEditor
                .create(document.querySelector('#edit<?php echo $editor['id']; ?>'), {
                    ckfinder: {
                        uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                    },


                    toolbar: {
                        items: [
                            "ckfinder", "imageUpload", "|",
                            'resizeImage:50',
                            'resizeImage:75',
                            'resizeImage:original', "|",
                            'toggleImageCaption', 'imageTextAlternative', "|",
                            'heading', '|',
                            'alignment', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                            'link', '|',
                            'bulletedList', 'numberedList', 'todoList',
                            'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                            'code', 'codeBlock', '|',
                            'insertTable', '|',
                            'outdent', 'indent', '|', 'blockQuote', '|',
                            'undo', 'redo', '|',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                })
                .then(editor => {
                    const toolbarContainer = document.querySelector('#toolbar-container{{ $editor->id }}');

                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>


        <script>
            const title<?php echo $editor['id']; ?> = document.querySelector('#title<?php echo $editor['id']; ?>');
            const slug<?php echo $editor['id']; ?> = document.querySelector('#slug<?php echo $editor['id']; ?>');

            title<?php echo $editor['id']; ?>.addEventListener('change', function() {
                fetch('/admin/Reservasi/checkSlug?title=' +
                        title<?php echo $editor['id']; ?>.value)
                    .then(response => response.json())
                    .then(data => slug<?php echo $editor['id']; ?>.value = data.slug)
            });
        </script>
    @endforeach

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
