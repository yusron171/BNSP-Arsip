<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Arsip Surat >> Ganti Data</h1>
                    <p class="mb-4">Unggah surat yang telah terbit di form ini untuk diarsipkan<br>
                    Catatan:
                    <li>Gunakan file berformat pdf.</li>
                    </p>    
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <form action="<?= base_url('index.php/arsip/upd/') . $data_surat->id_surat ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="nomor_surat">Nomor Surat</label>
                            <input type="text"  value="<?= $data_surat->nomor_surat ?>"id="nomor_surat" name="nomor_surat" class="form-control" required><br>
                        </div>
                        <label for="id_kategori">Kategori</label>
								<select name="id_kategori" id="id_kategori" class="form-control" required>
									<?php foreach ($kategori as $i) : ?>
										<option value="<?= $i->id_kategori ?>"><?= $i->kategori?></option>
									<?php endforeach; ?>
								</select><br>
                        <div class="form-group">
                        <label for="judul">Judul</label>
                            <input type="text" value="<?= $data_surat->judul ?>" id="judul" name="judul" class="form-control" required><br>
                            <label id="jdlsuid" class="form-text">File Sebelumnya : <?= $data_surat->file ?></label>            
                        </div>
                        <div class="form-group">
                        <label for="file">File Surat (pdf)</label>
                        <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="fileid" required>
                    </div>
                           </div>
                           <div class="py-4">
                           <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="submit" class="btn btn-danger">Kembali</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    
                </div>
                
                <!-- /.container-fluid -->