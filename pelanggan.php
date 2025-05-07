<?php
         require 'prosesp.php';
         $page = isset($_GET['page']) ? $_GET['page'] : 'pelanggan';
         if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Barang berhasil ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        }
        
        if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case '1':
                    $msg = 'Gagal menambahkan produk. Silakan cek koneksi atau input.';
                    break;
                case '2':
                    $msg = 'Produk sudah ada di database.';
                    break;
                default:
                    $msg = 'Terjadi kesalahan.';
            }
        
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                ' . $msg . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
         ?>
                    
                       <div class="card shadow mb-4"> 
                        <div class="card-header py-3">
                        
    <div class="my-2"></div>
    <div class="row">
        <div class="col-xl-3 col-md-4">
            <div class="card bg-success text-white mb-4" style="font-size:18px">
                <div class="card-body">Jumlah Pelanggan:</div>
            </div>

        </div>
    </div>
  
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Tambah Data Pelanggan
    </button>
    <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pelanggan Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="post">
        <!-- Modal body -->
        <div class="modal-body">
         <input type="text" name="nama_pelanggan" id="" class="form-control mt-2" placeholder="Nama Pelanggan:">
         <input type="num" name="no_tlp" id="" class="form-control mt-2" placeholder="No Telpon:">
         <input type="text" name="alamat" id="" class="form-control mt-2" placeholder="Alamat:">
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="tambahpelanggan">Tambah</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>
</div>
    </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="font-size:15px" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                         $get = mysqli_query($koneksi, "SELECT * from penjualan");
                                        
                                         while($produk=mysqli_fetch_array($get)){
                                         $idpenjualan=$produk['id_penjualan'];
                                         $tanggal=$produk['tanggal_penjualan'];
                                   
                                     
                                        ?>
                                        <tr>
                                            <td><?=$idpenjualan;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td>Total Harga</td>
                                            <td>Tampilkan Delete</td>
                                        </tr>
                                      
                                        
                                        <?php
                                      };
                                      ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
     
                </div>
                <!-- /.container-fluid -->
