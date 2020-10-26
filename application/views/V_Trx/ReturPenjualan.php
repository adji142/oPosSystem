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
                  <button class="form-control btn btn-warning" id="btnLookup">...</button>
                </div>
              </div>
            </div>
            <div class="item form-group">
              <div class="row col-md-12 col-sm-12">
                <label class="col-md-3 col-sm-12" for="first-name">Catatan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-12  form-group">
                  <input type="text" id="Keterangan" name="Keterangan" class="form-control">
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_lookup">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Pilih Transaksi Penjualan</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="dx-viewport demo-container">
          <div id="data-grid-demo">
            <div id="gridContainerPenjualan">
            </div>
          </div>
          <br>
          <button class="btn btn-primary" id="btn_chose">Chose</button>
        </div>
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
    var NoPenjualan = '';
    var itemsData = [];
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
    $('#btnLookup').click(function () {
      var TglAwal = '2020-01-02';
      
      var d = new Date(new Date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();

      if (month.length < 2) 
          month = '0' + month;
      if (day.length < 2) 
          day = '0' + day;

        TglAkhir = [year, month, day].join('-');
      $.ajax({
        type: "post",
        url: "<?=base_url()?>C_POS/ReadHeader",
        data : {'TglAwal' : TglAwal,'TglAkhir':TglAkhir},
        dataType: "json",
        success: function (response) {
          bindGridPenjualan(response.data);
          $('#modal_lookup').modal('show')
        }
      });
    });
    $('#btn_chose').click(function () {
      if (typeof NoPenjualan == 'undefined') {
        $('#modal_lookup').modal('toggle');
        Swal.fire({
          type: 'error',
          title: 'Woops...',
          text: 'Pilih Data Penjualan terlebih dahulu',
          // footer: '<a href>Why do I have this issue?</a>'
        }).then((result)=>{
          $('#modal_lookup').modal('show');
        });
      }
      else{
        $('#BaseRef').val(NoPenjualan);
        $('#modal_lookup').modal('toggle');

        $.ajax({
          async: false,
          type: "post",
          url: "<?=base_url()?>C_POS/ReadDetail",
          data : {'HeaderID' : NoPenjualan,},
          dataType: "json",
          success: function (response) {
            // bindGridPenjualan(response.data);
            var arr = {"KodeItemLama":"","NamaItemLama":"","KodeItemBaru":"","NamaItemBaru":"","QtyRetur":0,"Price":0}
            itemsData = [];
            for (var i = 0; i < response.data.length; i++) {
              var KodeItemBaru = '';
              var NamaItemBaru = '';
              if ($('#JenisTransaksi').val() == 1) {
                KodeItemBaru = '';
                NamaItemBaru = '';
              }
              else{
                KodeItemBaru = response.data[i]['KodeItem'];
                NamaItemBaru = response.data[i]['Article'];
              }
              itemsData.push({
                KodeItemLama :response.data[i]['KodeItem'],
                NamaItemLama :response.data[i]['Article'],
                KodeItemBaru :KodeItemBaru,
                NamaItemBaru :NamaItemBaru,
                QtyRetur     :response.data[i]['Qty'],
                Price        :response.data[i]['Harga']
              });
              bindGrid(itemsData)
            }
          }
        });
      }
    });
    $('#JenisTransaksi').on('change',function () {
      // console.log($('#btnlookup').val());
      if ($('#JenisTransaksi').val() != '') {
        $('#btnlookup').attr('disabled',false);
      }
      else{
        $('#btnlookup').attr('disabled',true); 
      }
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
                // allowAdding:true,
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
                    caption: "Kode Item Baru",
                    allowEditing:isEnable
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
              if (e.dataField == "KodeItemBaru") {
                $(e.editorElement).dxTextBox("instance").on("valueChanged", function (args) {                           
                  var grid = $("#gridContainer").dxDataGrid("instance");
                  var index = e.row.rowIndex;
                  var result = "new description ";

                  var length = 0;

                  var kode = args.value;
                  $.ajax({
                      type    :'post',
                      url     : '<?=base_url()?>C_ItemMasterData/Read',
                      data    : {'kriteria':kode,'id':'1'},
                      dataType: 'json',
                      success:function (response) {
                        if(response.success == true){
                          length = response.data.length;
                          if (length == 1) {
                            $.each(response.data,function (k,v) {
                              //ClmID
                              grid.cellValue(index, "NamaItemBaru", v.Article);
                            });
                          }
                          else{
                              Swal.fire({
                                type: 'error',
                                title: 'Woops...',
                                text: 'Item Not Found',
                                // footer: '<a href>Why do I have this issue?</a>'
                              })
                          }
                        }
                      }
                    });
                });
              }
            },
        });
    }
    function create_UUID(){
      var dt = new Date().getTime();
      var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
          var r = (dt + Math.random()*16)%16 | 0;
          dt = Math.floor(dt/16);
          return (c=='x' ? r :(r&0x3|0x8)).toString(16);
      });
      return uuid;
    }
    function bindGridPenjualan(data) {
      $("#gridContainerPenjualan").dxDataGrid({
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
                enabled: false
            },
            editing: {
                mode: "row",
                texts: {
                    confirmDeleteMessage: ''  
                }
            },
            searchPanel: {
                visible: true,
                width: 240,
                placeholder: "Search..."
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
                    dataField: "T_GrandTotal",
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
            },
            onFocusedRowChanging: function(e) {
              var rowsCount = e.component.getVisibleRows().length,
                  pageCount = e.component.pageCount(),
                  pageIndex = e.component.pageIndex(),
                  key = e.event && e.event.key;

              if(key && e.prevRowIndex === e.newRowIndex) {
                  if(e.newRowIndex === rowsCount - 1 && pageIndex < pageCount - 1) {
                      e.component.pageIndex(pageIndex + 1).done(function() {
                          e.component.option("focusedRowIndex", 0);
                      });
                  } else if(e.newRowIndex === 0 && pageIndex > 0) {
                      e.component.pageIndex(pageIndex - 1).done(function() {
                          e.component.option("focusedRowIndex", rowsCount - 1);
                      });
                  }
              }
          },
          onFocusedRowChanged: function(e) {
            const row = e.row;
            const rowData = row && row.data;
            const xdata = rowData && rowData.NoTransaksi;
            
            NoPenjualan = xdata;
          }
        }).dxDataGrid("instance");
    }
  });
</script>