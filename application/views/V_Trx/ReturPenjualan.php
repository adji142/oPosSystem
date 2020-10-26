<?php
    require_once(APPPATH."views/parts/Header.php");
    require_once(APPPATH."views/parts/Sidebar.php");
    $active = 'dashboard';
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Retur Penjualan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="item form-group">
              <div class="row col-md-12 col-sm-12">
                <label class="col-md-3 col-sm-12" for="first-name">Jenis Retur <span class="required">*</span>
                </label>
                <div class="col-md-3 col-sm-12  form-group">
                  <select class="js-states form-control" id="JenisTransaksi" name="JenisTransaksi" >
                    <option value = ''>Pilih Jenis Retur</option>
                    <option value="1">Tukar Barang</option>
                    <option value="2">Kembali Uang</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="item form-group">
              <div class="row col-md-12 col-sm-12">
                <label class="col-md-3 col-sm-12" for="first-name">Nomer Penjualan <span class="required">*</span>
                </label>
                <div class="col-md-3 col-sm-12  form-group">
                  <input type="text" id="BaseRef" name="BaseRef" class="form-control" readonly="">
                </div>
                <div class="col-md-1 col-sm-12  form-group">
                  <button class="form-control btn btn-warning">...</button>
                </div>
              </div>
            </div>
            <div class="dx-viewport demo-container">
              <div id="data-grid-demo">
                <div id="gridContainer">
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
<?php
  require_once(APPPATH."views/parts/Footer.php");
?>
<script type="text/javascript">
  $(function () {
    $(document).ready(function () {

      $.ajax({
        type: "post",
        url: "<?=base_url()?>C_General/getDummy",
        dataType: "json",
        success: function (response) {
          bindGrid(response.data);
        }
      });
    });
    $('#post_').submit(function (e) {
      $('#btn_Save').text('Tunggu Sebentar.....');
      $('#btn_Save').attr('disabled',true);

      e.preventDefault();
      var me = $(this);

      $.ajax({
        type    :'post',
        url     : '<?=base_url()?>C_Atribut/CRUD',
        data    : me.serialize(),
        dataType: 'json',
        success : function (response) {
          if(response.success == true){
            $('#modal_').modal('toggle');
            Swal.fire({
              type: 'success',
              title: 'Horay..',
              text: 'Data Berhasil disimpan!',
              // footer: '<a href>Why do I have this issue?</a>'
            }).then((result)=>{
              location.reload();
            });
          }
          else{
            $('#modal_').modal('toggle');
            Swal.fire({
              type: 'error',
              title: 'Woops...',
              text: response.message,
              // footer: '<a href>Why do I have this issue?</a>'
            }).then((result)=>{
              $('#modal_').modal('show');
              $('#btn_Save').text('Save');
              $('#btn_Save').attr('disabled',false);
            });
          }
        }
      });
    });
    $('.close').click(function() {
      location.reload();
    });
    function bindGrid(data) {
      var isEnable = false;
      if ($('#JenisTransaksi').val() == 1) {
        isEnable = true;
      }
      else{
        isEnable = false;
      }
      $("#gridContainer").dxDataGrid({
        allowColumnResizing: true,
            dataSource: data,
            keyExpr: "KodeItemLama",
            showBorders: true,
            allowColumnReordering: true,
            allowColumnResizing: true,
            columnAutoWidth: true,
            showBorders: true,
            paging: {
                enabled: false
            },
            editing: {
                mode: "row",
                allowAdding:true,
                allowUpdating: true,
                allowDeleting: true,
                texts: {
                    confirmDeleteMessage: ''  
                }
            },
            searchPanel: {
                visible: true,
                width: 240,
                placeholder: "Search..."
            },
            export: {
                enabled: true,
                fileName: "Daftar Penyakit"
            },
            columns: [
                {
                    dataField: "KodeItemLama",
                    caption: "Kode Item Lama",
                    allowEditing:false
                },
                {
                    dataField: "NamaItemLama",
                    caption: "Nama Item Lama",
                    allowEditing:false
                },
                {
                    dataField: "KodeItemBaru",
                    caption: "Nama Item Baru",
                    allowEditing:false
                },
                {
                    dataField: "NamaItemBaru",
                    caption: "Nama Item Baru",
                    allowEditing:false
                },
                {
                    dataField: "QtyRetur",
                    caption: "Qty",
                    allowEditing:true
                },
                {
                    dataField: "Price",
                    caption: "Harga",
                    allowEditing:false
                },
            ],
            onEditingStart: function(e) {
            },
            onInitNewRow: function(e) {
            },
            onRowInserting: function(e) {
                // logEvent("RowInserting");
            },
            onRowInserted: function(e) {
                // logEvent("RowInserted");
                // alert('');
                // console.log(e.data.onhand);
                // var index = e.row.rowIndex;
            },
            onRowUpdating: function(e) {
                // logEvent("RowUpdating");
                
            },
            onRowUpdated: function(e) {
                // logEvent(e);
            },
            onRowRemoving: function(e) {
            },
            onRowRemoved: function(e) {
              // console.log(e);
            },
            onEditorPrepared: function (e) {
              // console.log(e);
            }
        });
    }
    function bindGridPenjualan(data) {
      $("#gridContainerPenjualan").dxDataGrid({
        allowColumnResizing: true,
            dataSource: data,
            keyExpr: "KodeAtribut",
            showBorders: true,
            allowColumnReordering: true,
            allowColumnResizing: true,
            columnAutoWidth: true,
            showBorders: true,
            paging: {
                enabled: false
            },
            editing: {
                mode: "row",
                allowAdding:true,
                allowUpdating: true,
                allowDeleting: true,
                texts: {
                    confirmDeleteMessage: ''  
                }
            },
            searchPanel: {
                visible: true,
                width: 240,
                placeholder: "Search..."
            },
            export: {
                enabled: true,
                fileName: "Daftar Penyakit"
            },
            columns: [
                {
                    dataField: "NoTransaksi",
                    caption: "No Transaksi",
                    allowEditing:false
                },
                {
                    dataField: "TglTransaksi",
                    caption: "Tanggal Transaksi",
                    allowEditing:false
                },
                {
                    dataField: "NamaCustomer",
                    caption: "NamaCustomer",
                    allowEditing:false
                },
                {
                    dataField: "Total",
                    caption: "TotalBelanja",
                    allowEditing:false
                },
            ],
            onEditingStart: function(e) {
            },
            onInitNewRow: function(e) {
            },
            onRowInserting: function(e) {
                // logEvent("RowInserting");
            },
            onRowInserted: function(e) {
                // logEvent("RowInserted");
                // alert('');
                // console.log(e.data.onhand);
                // var index = e.row.rowIndex;
            },
            onRowUpdating: function(e) {
                // logEvent("RowUpdating");
                
            },
            onRowUpdated: function(e) {
                // logEvent(e);
            },
            onRowRemoving: function(e) {
            },
            onRowRemoved: function(e) {
              // console.log(e);
            },
            onEditorPrepared: function (e) {
              // console.log(e);
            }
        });
    }
  });
</script>