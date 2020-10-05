<?php
    require_once(APPPATH."views/parts/Header.php");
    require_once(APPPATH."views/parts/Sidebar.php");
    $active = 'dashboard';
?>
<style type="text/css">
  .select2-container {
  width: 100% !important;
  }
  ::ng-deep .dx-row.dx-data-row.dx-column-lines.dx-state-hover td {  
    background: red!important;  
  }  
</style>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Penerimaan Barang</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="post_" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Transaksi <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="NoTransaksi" id="NoTransaksi" required="" placeholder="Kode Item" class="form-control" readonly="" value="<AUTO>">
                          <input type="hidden" name="formtype" id="formtype" value="add">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Transaksi <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="date" name="TglTransaksi" id="TglTransaksi" required="" placeholder="Tanggal Transaksi" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <textarea class="form-control" id="Keterangan" name="Keterangan"></textarea>
                          <!-- <input type="date" name="TglTransaksi" id="TglTransaksi" required="" placeholder="Tanggal Transaksi" class="form-control "> -->
                        </div>
                      </div>
                      <div class="dx-viewport demo-container">
                        <div id="data-grid-demo">
                          <div id="gridContainerItem">
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="item" form-group>
                        <button class="btn btn-primary" id="btn_Save">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Penerimaan Barang</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                        <label class="col-form-label label-align" for="first-name">Tanggal <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3  form-group">
                          <input type="date" placeholder="dd-mm-yyyy" dateformat="dd-mm-yyyy" class="form-control" value="<?php echo date("Y-m-d");?>">
                        </div>
                         <label class="col-form-label label-align" for="first-name">s/d </label>
                         <!-- end -->
                        <div class="col-md-3 col-sm-3  form-group">
                          <input type="date" placeholder=".col-md-12" class="form-control" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="form-group">
                          <!-- <input type="date" placeholder=".col-md-12" class="form-control"> -->
                          <button name="filterbutton" id="filterbutton" class="form-control btn btn-primary">Search</button>
                        </div>
                      </div>
                      <div class="dx-viewport demo-container">
                        <div id="data-grid-demo">
                          <div id="gridContainerHeader">
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="dx-viewport demo-container">
                        <div id="data-grid-demo">
                          <div id="gridContainerDetail">
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

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_Lookup">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Item Master Data</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <table class="table table-bordered data-table" id="ItemLookup">
                  <thead>
                      <tr>
                        <th>Kode Item</th>
                        <th>Nama Item</th>
                        <th>Article</th>
                        <th>Stok Akhir</th>
                      </tr>
                    </thead>
                    <tbody id="load_Lookup">
                      
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
<?php
  require_once(APPPATH."views/parts/Footer.php");
?>
<script type="text/javascript">
  var row_validate = 0;
  var items_data;
  $(function () {
    $(document).ready(function () {
      $('#A_Warna').select2({
        width : 'resolve',
        placeholder: 'Pilih Warna'
      });
      $('#A_Motif').select2({
        width : 'resolve',
        placeholder: 'Pilih Motif'
      });
      $('#A_Size').select2({
        width : 'resolve',
        placeholder: 'Pilih Size'
      });
      $('#A_Sex').select2({
        width : 'resolve',
        placeholder: 'Pilih Sex'
      });
      var where_field = '';
      var where_value = '';
      var table = 'users';

      $.ajax({
        type: "post",
        url: "<?=base_url()?>C_ItemMasterData/Read",
        data: {'id':'','ArticleTable':'articlewarna'},
        dataType: "json",
        success: function (response) {
          bindGridHeader(response.data);
          bindGridDetail(response.data);
        }
      });
      // dummy

      $.ajax({
        type    :'post',
        url     : '<?=base_url()?>C_MutasiBarang/getDummy',
        dataType: 'json',
        success:function (response) {
          if(response.success == true){
          // console.log(response);
            // returnjson = response.data;
            items_data = response.data;
            bindGridItem(items_data);
          }
        }
      });
    });
    $('#ItemLookup').on('click','tr',function () {
      var ItemCode = $(this).find("#ItemCode").text();
      var ItemName = $(this).find("#ItemName").text();
      var Stok = $(this).find("#Stok").text();

      items_data.push({
        ItemCode : ItemCode,
        ItemName : ItemName,
        Qty : 0,
        Price:0,
        OnHand:Stok
      });
      row_validate +=1;
      validation(row_validate);
      bindGridItem(items_data);
    });
    $('#post_').submit(function (e) {
      $('#btn_Save').text('Tunggu Sebentar.....');
      $('#btn_Save').attr('disabled',true);

      var prefix = '';

      if ($('#ItemGroup').val() == 1) {
        prefix = '101.'
      }
      else if ($('#ItemGroup').val() == 1) {
        prefix = '201.'
      }

      if ($('#formtype').val() == 'ad') {
        $.ajax({
          async : false,
          type: "post",
          url: "<?=base_url()?>C_ItemMasterData/Getindex",
          data: {'Kolom':'ItemCode','Table':'itemmasterdata','Prefix' : prefix},
          dataType: "json",
          success: function (response) {
            // bindGrid(response.data);
            $('#ItemCode').val(response.nomor);
          }
        });
      }

      e.preventDefault();
      var me = $(this);

      $.ajax({
        async : false,
        type    :'post',
        url     : '<?=base_url()?>C_ItemMasterData/CRUD',
        data    : me.serialize(),
        dataType: 'json',
        success : function (response) {
          if(response.success == true){
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
            Swal.fire({
              type: 'error',
              title: 'Woops...',
              text: response.message,
              // footer: '<a href>Why do I have this issue?</a>'
            }).then((result)=>{
              $('#btn_Save').text('Save');
              $('#btn_Save').attr('disabled',false);
            });
          }
        }
      });
    });
    function GetData(id) {
      var where_field = 'id';
      var where_value = id;
      var table = 'users';
      $.ajax({
        type: "post",
        url: "<?=base_url()?>C_ItemMasterData/read",
        data: {'id':id},
        dataType: "json",
        success: function (response) {
          $.each(response.data,function (k,v) {
            $('#ItemCode').val(v.ItemCode);
            $('#KodeItemLama').val(v.KodeItemLama);
            $('#ItemName').val(v.ItemName);
            $('#A_Warna').val(v.A_Warna).change();
            $('#A_Motif').val(v.A_Motif).change();
            $('#A_Size').val(v.A_Size).change();
            $('#A_Sex').val(v.A_Sex).change();
            $('#DefaultPrice').val(v.DefaultPrice);
            $('#ItemGroup').val(v.ItemGroup).change();
            // $('#Nilai').val(v.Nilai);

            $('#formtype').val("edit");

            // $(window).scrollTop(0);
            $('html').animate({scrollTop:0}, 'slow');//IE, FF
            $('body').animate({scrollTop:0}, 'slow');//chrome, don't know if Safari works
            $('.popupPeriod').fadeIn(1000, function(){
                setTimeout(function(){$('.popupPeriod').fadeOut(2000);}, 3000);
            });
          });
        }
      });
    }

    function bindGridItem(data) {
      var store = new DevExpress.data.ArrayStore(data);
      $("#gridContainerItem").dxDataGrid({
            dataSource: store,
            showBorders: true,
            allowColumnReordering: false,
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
            columns: [
                {
                    dataField: "ItemCode",
                    caption: "Kode Item",
                    allowEditing:true,
                    allowSorting: false
                },
                {
                    dataField: "ItemName",
                    caption: "Nama Item",
                    allowEditing:false,
                    allowSorting: false
                },
                {
                    dataField: "Qty",
                    caption: "Jumlah",
                    allowEditing:true,
                    allowSorting: false
                },
                {
                    dataField: "Price",
                    caption: "Price",
                    allowEditing:true,
                    allowSorting: false
                },
                {
                    dataField: "OnHand",
                    caption: "OnHand",
                    allowEditing:false,
                    allowSorting: false
                },
            ],
            onEditingStart: function(e) {
                GetData(e.data.ItemCode);
            },
            onInitNewRow: function(e) {
            },
            onRowInserting: function(e) {
                // logEvent("RowInserting");
                var grid = $("#gridContainerItem").dxDataGrid("instance");

                var index = 0;
            },
            onRowInserted: function(e) {
              console.log(e);
                // if (e.data.onhand >= e.data.Qty && e.data.Qty > 0) {
                //   row_validate += 1;
                //   validation(row_validate);
                // }
                // else{
                // Swal.fire({
                //     type: 'error',
                //     title: 'Woops...',
                //     text: 'Jumlah Tersedia Lebih kecil dari jumlah yang di Keluarkan',
                //     // footer: '<a href>Why do I have this issue?</a>'
                //   }).then((result)=>{
                //     $('#basicExampleModal').modal('show');
                //     row_validate = 0;
                //     validation($('#tgltrans').val(),$('#fasyankes').val(),$('#nama').val(),$('#petugas').val(),$('#tujuan').val(),row_validate);
                //   });
                // }
                var gridItems = $("#gridContainerItem").dxDataGrid('instance')._controllers.data._dataSource._items;
                var grid = $("#gridContainerItem").dxDataGrid("instance");

                var index = 0;
                // grid.deleteRow(1);
                // grid.getRowIndexByKey();
                // console.log(grid.getRowIndexByKey(e.key.__KEY__));
                $.each(gridItems,function (k,v) {
                  if (v.ItemCode == e.data.ItemCode && gridItems.length > 1) {
                    grid.cellValue(k, "Qty", parseInt(grid.cellValue(k, "Qty"))+parseInt(e.data.Qty));
                    store.remove(e.data);
                    // grid.refresh();
                    // console.log(gridItems.length);
                    if (index === gridItems.length - 1) {
                      
                    }
                    console.log(store);
                  }
                  index += 1;
                });

                if (e.data.Qty > 0) {
                  row_validate += 1;
                  validation(row_validate);
                }
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
              row_validate = row_validate - 1;
              validation(row_validate);
              // console.log(e);
            },
            onEditorPrepared: function (e) {
              if (e.dataField == "ItemCode") {
                $(e.editorElement).dxTextBox("instance").on("valueChanged", function (args) {                           
                  var grid = $("#gridContainerItem").dxDataGrid("instance");
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
                              grid.cellValue(index, "ItemCode", v.ItemCode);
                              grid.cellValue(index, "ItemName", v.ItemName);
                              grid.cellValue(index, "OnHand", v.Stok);
                            });
                            grid.cellValue(index, "Qty", 0);
                            grid.cellValue(index, "Price", 0);
                          }
                          else{
                            var html = '';
                            var i;
                            var j = 1;
                            for (i = 0; i < response.data.length; i++) {
                              html += '<tr>' +
                                      '<td id = "ItemCode">' + response.data[i].ItemCode+'</td>' +
                                      '<td id = "ItemName">' + response.data[i].ItemName + '</td>' +
                                      '<td id = "Article">' + response.data[i].Article + '</td>' +
                                      '<td id = "Stok">' + response.data[i].Stok + '</td>' +
                                      '<tr>';
                               j++;
                            }
                            $('#load_Lookup').html(html);
                            items_data = $("#gridContainerItem").dxDataGrid('instance')._controllers.data._dataSource._items;
                            console.log(items_data);
                            $('#modal_Lookup').modal('show');
                          }
                        }
                        else{
                          Swal.fire({
                              type: 'error',
                              title: 'Woops...',
                              text: response.message,
                              // footer: '<a href>Why do I have this issue?</a>'
                            })
                        }
                      }
                    });
                });
              }
            },
            onRowValidating:function(e) {
            },
            onCellPrepared:function (e) {
              // console.log(e.row)
              if(e.rowType === "data" && e.column.command === "edit") {  
                  var isEditing = e.row.isEditing,  
                      $links = e.cellElement.find(".dx-link");  
                  if(isEditing){  

                      $links.filter(".dx-link-cancel").on("click", function(args) {  console.log("cancel_clicked");  });  
                  }  
              }
            }
        });

        // add dx-toolbar-after
        // $('.dx-toolbar-after').append('Tambah Alat untuk di pinjam ');
    }

    function bindGridHeader(data) {

      $("#gridContainerHeader").dxDataGrid({
        allowColumnResizing: true,
            dataSource: {
                store: {
                  type: "array",
                  key: "ItemCode",
                  data: data
                  // Other LocalStore options go here
              },
              select: [
                'ItemCode',
                'KodeItemLama',
                'ItemName',
                'Warna',
                'Motif',
                'Size',
                'Sex'
              ]
            },
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
                    dataField: "ItemCode",
                    caption: "Kode Item",
                    allowEditing:false
                },
                {
                    dataField: "KodeItemLama",
                    caption: "Kode Item Lama",
                    allowEditing:false
                },
                {
                    dataField: "ItemName",
                    caption: "Nama Item",
                    allowEditing:false
                },
                {
                    dataField: "Warna",
                    caption: "Warna",
                    allowEditing:false
                },
                {
                    dataField: "Motif",
                    caption: "Motif",
                    allowEditing:false
                },
                {
                    dataField: "Size",
                    caption: "Size",
                    allowEditing:false
                },
                {
                    dataField: "Sex",
                    caption: "Sex",
                    allowEditing:false
                },
            ],
            focusedRowEnabled: true,
            focusedRowKey: 0,
            onEditingStart: function(e) {
                GetData(e.data.ItemCode);
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

        // add dx-toolbar-after
        // $('.dx-toolbar-after').append('Tambah Alat untuk di pinjam ');
    }

    function bindGridDetail(data) {

      $("#gridContainerDetail").dxDataGrid({
        allowColumnResizing: true,
            dataSource: data,
            keyExpr: "ItemCode",
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
                allowUpdating: true,
                allowDeleting: true,
                texts: {
                    confirmDeleteMessage: ''  
                }
            },
            columns: [
                {
                    dataField: "ItemCode",
                    caption: "Kode Item",
                    allowEditing:false
                },
                {
                    dataField: "KodeItemLama",
                    caption: "Kode Item Lama",
                    allowEditing:false
                },
                {
                    dataField: "ItemName",
                    caption: "Nama Item",
                    allowEditing:false
                },
                {
                    dataField: "Warna",
                    caption: "Warna",
                    allowEditing:false
                },
                {
                    dataField: "Motif",
                    caption: "Motif",
                    allowEditing:false
                },
                {
                    dataField: "Size",
                    caption: "Size",
                    allowEditing:false
                },
                {
                    dataField: "Sex",
                    caption: "Sex",
                    allowEditing:false
                },
            ],
            onEditingStart: function(e) {
                GetData(e.data.ItemCode);
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

        // add dx-toolbar-after
        // $('.dx-toolbar-after').append('Tambah Alat untuk di pinjam ');
    }

  });
function validation(rowvalidate) {
  if (rowvalidate == 0) {
    $('#btn_Save').attr('disabled',true);
  }
  else{
    $('#btn_Save').attr('disabled',false);  
  }
}
</script>