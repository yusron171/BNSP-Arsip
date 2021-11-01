<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Arsip Surat</h1>
                    <p class="mb-4">Berikut adalah surat-surat yang telah terbit dan diarsipkan<br>
                    Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
                    <section class="header-main border-bottom bg-white">
                    <div class="container-fluid">
                        <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
                            <div class="col-md-8">Cari Surat : </div>
                            <form action="<?= base_url('index.php/welcome/') ?>" style="float: right;" method="get">
                            <input type="text" name="keyword" placeholder="search">
							<input type="submit" name="search_submit">
						</form>
                        </div>
                        
                    </div>
                </section>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Waktu Pengarsipan</th>
                                            <th>Aksi</th>
                                            
                                       </tr>
                                    </thead>
                                    <tbody>
										<?php
										$no =0;
										foreach ($data_surat as $dt) {
                                        echo '<tr>
										<td>' . $dt->nomor_surat . '</td>
                                        <td>' . $dt->kategori . '</td>
                                        <td>' . $dt->judul . '</td>
                                        <td>' . $dt->createdAt . '</td>
										<td>
                                        
										<a href="' . base_url('index.php/Arsip/hapus/' . $dt->id_surat) . '" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Hapus</a>
                                        <a href="' . base_url('index.php/Arsip/unduh/' . $dt->id_surat) . '" class="btn btn-warning" ' . $dt->id_surat. '"  data-popup="tooltip" data-placement="top" >Unduh</a> 
										<a href="' . base_url('index.php/Arsip/detail/' . $dt->id_surat) . '" class="btn btn-primary" ' . $dt->id_surat. '"  data-popup="tooltip" data-placement="top" >Lihat</a></td>					
									  </tr>';
							}
							?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                                <div class="d-flex d-none d-md-flex flex-row align-items-center">
                                    <a href="<?=base_url()?>index.php/Arsip/index" class="btn btn-success btn-icon-split">
                                        <span class="text">Arsipkan Surat</span>
                                    </a></div>
                                </div>
                            </div>
                </div>
                
                <!-- /.container-fluid -->