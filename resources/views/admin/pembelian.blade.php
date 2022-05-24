@extends('layouts.admin_tampilan')
@section('pembelian')
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
                <h5>Halaman Konfirmasi Pembelian</h5>
                {{-- <button class="btn waves-effect waves-light btn-success btn-outline-success badge badge-pill badge-success"
                    data-target="#tabbed-form" data-titleku="DataOrkemas" data-toggle="modal">Tambah Reservasi<span
                        data-feather="plus-circle"></span></button> --}}
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="new-cons" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Pembeli</th>
                                <th>Nama Pembeli</th>
                                <th>Reservasi Yang dibeli</th>
                                <th>Total Asset</th>
                                <th>Pendapatan</th>
                                <th>Rekening</th>
                                <th>Tanggal Pesan</th>
                                {{-- <th>Nomor Whatsapp</i>
							</th> --}}
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        @foreach ($pembelians as $no => $pembelian)
                            <tbody>
                                <tr>
                                    <td>{{ ++$no }}</td>

                                    <td>{{ $pembelian->user->phone }}</td>
                                    <td>{{ $pembelian->user->name }}</td>
                                    <td>{{ $pembelian->reservasi->nama_reservasi }}</td>
                                    <td>{{ $pembelian->asset }}</td>

                                    <td>{{ $pembelian->reservasi->pendapatan }}</td>

                                    <td>
                                        <p> Nama Pemilik : {{ $pembelian->user->nama }}</p>
                                        <p> Nomor Rekening : {{ $pembelian->user->no_rekening }}</p>
                                        <p> Jenis Bank : {{ $pembelian->user->nama_rekening }}</p>
                                    </td>
                                    <td>{{ $pembelian->created_at }}</td>
                                    <td>

                                        @if ($pembelian->status == '5')
                                            <div class="label-main">
                                                <label class="label label-lg label-success"><i class="fa fas fa-check"></i>
                                                    Terkonfirmasi</label>
                                            </div>
                                        @else
                                            <div class="label-main">
                                                <label class="label label-lg label-primary"><i class="fa fas fa-check"></i>
                                                    Belum Terkonfirmasi</label>
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                               
                                        @if ($pembelian->status == '2')
                             
                                            
                                        @elseif($pembelian->status == '3')
                                          
                                            
                                                           
                                            
                                              @elseif($pembelian->status == '4')
                                              <form action="{{ route('admin.update.pembelian') }}" method="POST"
                                                class="d-inline">
                                                @csrf

                                                <p>Penghasilan :Rp
                                                    {{ ceil($penghasilan = ($pembelian->harga_acak * $pembelian->reservasi->pendapatan) / 100) }}
                                                </p>
                                                <p>Nilai Asli : <b>
                                                        {{ $hasil_rupiah = 'Rp ' . number_format($pembelian->harga_acak, 0, '', '.') }}
                                                    </b></p>

                                                <input type="hidden" name="id" value="{{ $pembelian->id }}">
                                                <input type="hidden" name="reservasi_id"
                                                    value="{{ $pembelian->reservasi->id }}">
                                                <input type="hidden" name="user_id" value="{{ $pembelian->user->id }}">
                                                <input type="hidden" name="asset"
                                                    value="{{ ceil($pembelian->harga_acak + $penghasilan) }}">
                                                <button
                                                    class="btn waves-effect waves-light btn-warning btn-outline-success badge bg-success"
                                                    onclick="return confirm('Apakah ingin Menkonfirmasi Transaksi ini ?')"><span
                                                        data-feather="check-circle"></span></button>
                                            </form>
                                            
                                             @elseif($pembelian->status == '5')
                                                 <div class="label-main">
                                                <label class="label label-lg label-success"><i class="fa fas fa-check"></i>
                                                    Terkonfirmasi</label>
                                            </div
                                        @else
                                        
                                        
                                        @endif


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
