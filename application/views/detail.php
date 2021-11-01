<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Arsip Surat >> Lihat</h1>
                    <p class="mb-4">Unggah surat yang telah terbit di form ini untuk diarsipkan<br>
                    Catatan:
                    <li>Gunakan file berformat pdf.</li>
                    </p>  
                    <table>
                    <tbody>
                        <tr>
                            <td scope="row"><strong>Nomor Surat</strong></td>
                            <td>:</td>
                            <td style="text-transform: uppercase;"><?= $data_surat->nomor_surat ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Kategori</strong></td>
                            <td>:</td>
                            <td><?= $data_surat->kategori ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Judul surat</strong></td>
                            <td>:</td>
                            <td><?= $data_surat->judul ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Waktu unggah</strong></td>
                            <td>:</td>
                            <td><?= $data_surat->updatedAt ?></td>
                        </tr>
                    </tbody>
                </table>  
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <iframe class="mt-3" src="<?= base_url("./assets/document/" . $data_surat->file) ?>" width="100%" height="550px"></iframe>
                        </div>
                    </div>
                    <div class="d-flex d-none d-md-flex flex-row align-items-center">
                        
                                    <a href="<?=base_url()?>index.php/Arsip/index" class="btn btn-danger btn-icon-split">
                                        <span class="text">Kembali</span>
                                    </a>
                                    <br><div>
                                    <a name="" id="" class="btn btn-success" href="<?= base_url('index.php/arsip/unduh/' . $data_surat->id_surat) ?>" role="button">Unduh</a>
                                    <a name="" id="" class="btn btn-primary" href="<?= base_url('index.php/arsip/edit/' . $data_surat->id_surat) ?>" role="button">Edit/Ganti File</a>
                                    </a>
                                    <br>
                                
</div>    
                    </div>
                    </div>
                    
                </div>
                
                <!-- /.container-fluid -->