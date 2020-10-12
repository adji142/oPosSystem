<?php
    require_once(APPPATH."views/parts/Header.php");
    require_once(APPPATH."views/parts/Sidebar.php");
    $active = 'dashboard';
?>
<style type="text/css">
  .select2-container {
  width: 100% !important;
  }
</style>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>TRANSAKSI PENJUALAN - POS</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Point Of Sales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Transaction History</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="form-label-left input_mask">

                    <div class="row col-md-12 col-sm-12">
                      <div class="col-md-2 col-sm-12 form-group">
                        <label class="col-form-label label-align" for="first-name">Trx Date <span class="required">*</span>
                        </label>
                      </div>
                      <div class="col-md-5 col-sm-12 form-group">
                        <input type="date" name="TglTransaksi" id="TglTransaksi" class="form-control" value="<?php echo date("Y-m-d") ?>">
                      </div>
                      <div class="col-md-5 col-sm-12 form-group">
                        <select class="js-states form-control" id="KodeSales" name="KodeSales" >
                          <option value = ''>Sales / Agen</option>
                          <?php
                            $rs = $this->db->query("select * from tsales where isActive = 1")->result();
                            foreach ($rs as $key) {
                              echo "<option value = '".$key->KodeSales."'>".$key->NamaSales."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="row col-md-12 col-sm-12">
                      <div class="col-md-2 col-sm-12 form-group">
                        <label class="col-form-label label-align" for="first-name">Customer <span class="required">*</span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-12 form-group">
                        <select class="js-states form-control" id="KodeCustomerPOS" name="KodeCustomerPOS" >
                          <option value = ''>Customer</option>
                        </select>
                        <a href="#" id="AddCust">Customer Baru</a>
                      </div>
                      <div class="col-md-3 col-sm-12 form-group">
                        <select class="js-states form-control" id="TransactionType" name="TransactionType" >
                          <option value = ''>Pilih Tipe Transaksi</option>
                          <option value="1">Ecommerce</option>
                          <option value="2">Direct Sales</option>
                          <option value="3">Dropship</option>
                          <option value="4">Reseller</option>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-12 form-group">
                        <select class="js-states form-control" id="PaymentTerm" name="PaymentTerm" >
                          <option value = ''>Jenis Pembayaran</option>
                          <?php
                            $rs = $this->db->query("select * from tpayment")->result();
                            foreach ($rs as $key) {
                              echo "<option value = '".$key->id."'>".$key->PaymentTerm."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk aliquip
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Article - Warna</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="post_" data-parsley-validate class="form-horizontal form-label-left">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Article <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="ArticleCode" id="ArticleCode" required="" placeholder="Kode Artikel" class="form-control " readonly="">
              <input type="hidden" name="formtype" id="formtype" value="add">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Article <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="ArticleName" id="ArticleName" required="" placeholder="Nama Artikel" class="form-control ">
            </div>
          </div>
          <div class="item" form-group>
            <button class="btn btn-primary" id="btn_Save">Save</button>
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div> -->

    </div>
  </div>
</div>

<!-- Modal Customer -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_AddCust">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Customer</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="post_Cust" data-parsley-validate class="form-horizontal form-label-left">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Customer <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="KodeCustomer" id="KodeCustomer" required="" placeholder="Kode Customer" class="form-control " readonly="">
              <input type="hidden" name="formtype" id="formtype" value="add">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Customer <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="NamaCustomer" id="NamaCustomer" required="" placeholder="Nama Customer" class="form-control ">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="mail" name="Email" id="Email" required="" placeholder="Email" class="form-control ">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NoTlp <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="NoTlp" id="NoTlp" required="" placeholder="NoTlp" class="form-control ">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NoWA <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="NoWA" id="NoWA" required="" placeholder="NoWA" class="form-control ">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Customer Group <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select name="CustGroup" id="CustGroup" class="form-control">
                <option value="">Pilih Group</option>
                <option value="1">Ecommerce</option>
                <option value="2">Direct Sales</option>
                <option value="3">Dropship</option>
                <option value="4">Reseller</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Provinsi <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="js-states form-control" id="provinsi" name="provinsi" >
                <option value = ''>Pilih Provinsi</option>
                <?php
                  $rs = $this->db->query("select * from ro_provinces")->result();
                  foreach ($rs as $key) {
                    echo "<option value = '".$key->id."'>".$key->name."</option>";
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kota <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="js-states form-control" id="Kota" name="Kota" >
                <option value = ''>Pilih Kota</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kecamatan <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="js-states form-control" id="Kecamatan" name="Kecamatan" >
                <option value = ''>Pilih Kecamatan</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kelurahan <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="js-states form-control" id="Kelurahan" name="Kelurahan" >
                <option value = ''>Pilih Kelurahan</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode POS <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="KodePos" id="KodePos" class="form-control" placeholder="Kode Pos" required="">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat Lengkap <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea id="AlamatCustomer" name="AlamatCustomer" class="form-control"></textarea>
            </div>
          </div>
          <div class="item" form-group>
            <button class="btn btn-primary" id="btn_Save_Cust">Save</button>
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div> -->

    </div>
  </div>
</div>
<?php
  require_once(APPPATH."views/parts/Footer.php");
?>
<script type="text/javascript">
  $(function () {
    $(document).ready(function () {
      // Initialize Select 2
      $('#KodeSales').select2({
        width : 'resolve',
        placeholder: 'Sales / Agen'
      });

      $('#KodeCustomerPOS').select2({
        width : 'resolve',
        placeholder: 'Customer'
      });

      $('#TransactionType').select2({
        width : 'resolve',
        placeholder: 'Pilih Tipe Transaksi'
      });

      $('#PaymentTerm').select2({
        width : 'resolve',
        placeholder: 'Jenis Pembayaran'
      });

      $('#provinsi').select2({
        width : 'resolve',
        placeholder: 'Pilih Provinsi'
      });

      $('#Kota').select2({
        width : 'resolve',
        placeholder: 'Pilih Kota'
      });

      $('#Kecamatan').select2({
        width : 'resolve',
        placeholder: 'Pilih Kecamatan'
      });

      $('#Kelurahan').select2({
        width : 'resolve',
        placeholder: 'Pilih Kecamatan'
      });


      // Call Function Form Load
      GetCustomer();
    });

    $('#provinsi').change(function () {
      var idaddr = $('#provinsi').val();
      var link = 'kota';


      $.ajax({
        async: false,
        type: "post",
        url: "<?=base_url()?>C_General/GetInfoAddr",
        data: {link:link,idaddr:idaddr},
        dataType: "json",
        success: function (response) {
          if(response.success == true){
            $('#Kota').empty();
            $('#Kota').append(""+
              "<option value='0'>Pilih Kota</option>"
            );
            $.each(response.data,function (k,v) {
              $('#Kota').append(""+
                "<option value='"+v.id+"'>"+v.name+"</option>"
              );
            });
          }
        }
      });
    });

    $('#Kota').change(function () {
      var idaddr = $('#Kota').val();
      var link = 'kec';

      $.ajax({
        async: false,
        type: "post",
        url: "<?=base_url()?>C_General/GetInfoAddr",
        data: {link:link,idaddr:idaddr},
        dataType: "json",
        success: function (response) {
          if(response.success == true){
            $('#Kecamatan').empty();
            $('#Kecamatan').append(""+
              "<option value='0'>Pilih Kecamatan</option>"
            );
            $.each(response.data,function (k,v) {
              $('#Kecamatan').append(""+
                "<option value='"+v.id+"'>"+v.name+"</option>"
              );
            });
            
          }
        }
      });
    });

    $('#Kecamatan').change(function () {
      var idaddr = $('#Kecamatan').val();
      var link = 'kel';

      $.ajax({
        async: false,
        type: "post",
        url: "<?=base_url()?>C_General/GetInfoAddr",
        data: {link:link,idaddr:idaddr},
        dataType: "json",
        success: function (response) {
          if(response.success == true){
            $('#Kelurahan').empty();
            $('#Kelurahan').append(""+
              "<option value='0'>Pilih Kelurahan</option>"
            );
            $.each(response.data,function (k,v) {
              $('#Kelurahan').append(""+
                "<option value='"+v.id+"'>"+v.name+"</option>"
              );
            });
          }
        }
      });
    });

    $('#AddCust').click(function () {
      // $('#post_Cust').reset();
      document.getElementById("post_Cust").reset();
      
      $('#modal_AddCust').modal('show');
      $.ajax({
        type: "post",
        url: "<?=base_url()?>C_Customer/Getindex",
        dataType: "json",
        success: function (response) {
          if (response.success == true) {
            $('#KodeCustomer').val(response.Nomor);
          }
        }
      });
    });
    $('.close').click(function() {
      GetCustomer();
    });
    $('#post_Cust').submit(function (e) {
      $('#btn_Save_Cust').text('Tunggu Sebentar.....');
      $('#btn_Save_Cust').attr('disabled',true);

      e.preventDefault();
      var me = $(this);

      $.ajax({
        async   : false,
        type    :'post',
        url     : '<?=base_url()?>C_Customer/CRUD',
        data    : me.serialize(),
        dataType: 'json',
        success : function (response) {
          if(response.success == true){
            $('#modal_AddCust').modal('toggle');
            Swal.fire({
              type: 'success',
              title: 'Horay..',
              text: 'Data Berhasil disimpan!',
              // footer: '<a href>Why do I have this issue?</a>'
            }).then((result)=>{
              GetCustomer();
              $('#KodeCustomerPOS').val($('#KodeCustomer').val()).change();
              $('#post_Cust').reset();
              document.getElementById("post_Cust").reset();
            });
          }
          else{
            $('#modal_AddCust').modal('toggle');
            Swal.fire({
              type: 'error',
              title: 'Woops...',
              text: response.message,
              // footer: '<a href>Why do I have this issue?</a>'
            }).then((result)=>{
              $('#modal_AddCust').modal('show');
              $('#btn_Save_Cust').text('Save');
              $('#btn_Save_Cust').attr('disabled',false);
            });
          }
        }
      });
    });
    // ================================= FUNCTION =================================

    function GetCustomer() {
      $.ajax({
        async: false,
        type: "post",
        url: "<?=base_url()?>C_Customer/Read",
        data: {'id':''},
        dataType: "json",
        success: function (response) {
          if(response.success == true){
            $('#KodeCustomerPOS').empty();
            $('#KodeCustomerPOS').append(""+
              "<option value=''>Customer</option>"
            );
            $.each(response.data,function (k,v) {
              $('#KodeCustomerPOS').append(""+
                "<option value='"+v.KodeCustomer+"'>"+v.NamaCustomer+"</option>"
              );
            });
          }
        }
      });

    }
  });
</script>