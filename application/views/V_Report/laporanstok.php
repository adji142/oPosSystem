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
            <h2>Laporan Stok</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
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
<?php
  require_once(APPPATH."views/parts/Footer.php");
?>
<script type="text/javascript">
  $(function () {
    var NoRefcashflow = '';
    $(document).ready(function () {
      $.ajax({
        type: "post",
        url: "<?=base_url()?>C_Laporan/LaporanStok",
        // data: {'TglAwal':$('#TglAwal').val(),'TglAkhir':$('#TglAkhir').val()},
        dataType: "json",
        success: function (response) {
          bindGrid_A(response.data);  
        }
      });
    });
    function bindGrid_A(data) {

      $("#gridContainer").dxPivotGrid({
        allowColumnResizing: true,
        dataSource: data,
        keyExpr: "NoTransaksi",
        showBorders: true,
        allowColumnReordering: true,
        allowColumnResizing: true,
        columnAutoWidth: true,
        showBorders: true,
        focusedRowEnabled: true,
        focusedRowKey: 0,
        paging: {
            enabled: true
        },
        searchPanel: {
            visible: true,
            width: 240,
            placeholder: "Search..."
        },
        export: {
            enabled: true,
            fileName: "Laporan Penjualan All"
        },
        columns: [
            {
                dataField: "NoTransaksi",
                caption: "No Transaksi",
                allowEditing:false
            },
            {
                dataField: "TglTransaksi",
                caption: "Tgl Transaksi",
                allowEditing:false
            },
            {
                dataField: "num",
                caption: "No",
                allowEditing:false
            },
            {
                dataField: "NamaCustomer",
                caption: "Nama Customer",
                allowEditing:false
            },
            {
                dataField: "NamaSales",
                caption: "Agen",
                allowEditing:false
            },
            {
                dataField: "Brand",
                caption: "Brand",
                allowEditing:false
            },
            {
                dataField: "Alamat_dest",
                caption: "Alamat",
                allowEditing:false
            },
            {
                dataField: "Notlp_dest",
                caption: "No Tlp",
                allowEditing:false
            },
            {
                dataField: "OldItem",
                caption: "Kode Item",
                allowEditing:false
            },
            {
                dataField: "Qty",
                caption: "Qty",
                allowEditing:false
            },
            {
                dataField: "Article",
                caption: "Article",
                allowEditing:false
            },
            {
                dataField: "Warna",
                caption: "Warna",
                allowEditing:false
            },
            {
                dataField: "Expedisi",
                caption: "Expedisi",
                allowEditing:false
            },
            {
                dataField: "noresi",
                caption: "Resi",
                allowEditing:false
            },
            {
                dataField: "T_Ongkir",
                caption: "Ongkir",
                allowEditing:false
            },
            {
                dataField: "Total",
                caption: "Total",
                allowEditing:false
            },
            {
                dataField: "PaymentTerm",
                caption: "PaymentTerm",
                allowEditing:false
            },
            {
                dataField: "Pembayaran",
                caption: "Jumlah Pembayaran",
                allowEditing:false
            },
        ],
    });

        // add dx-toolbar-after
        // $('.dx-toolbar-after').append('Tambah Alat untuk di pinjam ');
    }
  });
</script>