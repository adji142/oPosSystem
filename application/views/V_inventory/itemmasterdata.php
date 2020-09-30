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
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Item Master Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="post_" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Item <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="ItemCode" id="ItemCode" required="" placeholder="Kode Item" class="form-control" readonly="" value="<AUTO>">
                          <input type="hidden" name="formtype" id="formtype" value="add">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Item Lama <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="KodeItemLama" id="KodeItemLama" required="" placeholder="Kode Item Lama" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Item <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="ItemName" id="ItemName" required="" placeholder="Nama Item" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Article <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <div class="row">
                            <div class="col-md-3 col-sm-8  form-group">
                              <!-- <input type="text" placeholder=".col-md-6" class="form-control"> -->
                              <select class="js-states form-control" id="A_Warna" name="A_Warna" >
                                <option value = ''>Pilih Warna</option>
                                <?php
                                  $rs = $this->db->query("select * from articlewarna where isActive = 1")->result();
                                  foreach ($rs as $key) {
                                    echo "<option value = '".$key->ArticleCode."'>".$key->ArticleName."</option>";
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="col-md-3 col-sm-8  form-group">
                              <select class="js-states form-control" id="A_Motif" name="A_Motif" >
                                <option value = ''>Pilih Motif</option>
                                <?php
                                  $rs = $this->db->query("select * from articlemotif where isActive = 1")->result();
                                  foreach ($rs as $key) {
                                    echo "<option value = '".$key->ArticleCode."'>".$key->ArticleName."</option>";
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="col-md-3 col-sm-8  form-group">
                              <select class="js-states form-control" id="A_Size" name="A_Size" >
                                <option value = ''>Pilih Size</option>
                                <?php
                                  $rs = $this->db->query("select * from articlesize where isActive = 1")->result();
                                  foreach ($rs as $key) {
                                    echo "<option value = '".$key->ArticleCode."'>".$key->ArticleName."</option>";
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="col-md-3 col-sm-8  form-group">
                              <select class="js-states form-control" id="A_Sex" name="A_Sex" >
                                <option value = ''>Pilih Sex</option>
                                <?php
                                  $rs = $this->db->query("select * from articlesex where isActive = 1")->result();
                                  foreach ($rs as $key) {
                                    echo "<option value = '".$key->ArticleCode."'>".$key->ArticleName."</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Default Price <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="Number" name="DefaultPrice" id="DefaultPrice" required="" placeholder="Default Price" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Item Group <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 ">
                          <select class="form-control col-md-6" id="ItemGroup" name="ItemGroup" >
                            <!-- 1: Penjualan,2:Pembelian,3:ATK -->
                            <option value="1">Penjualan</option>
                            <option value="2">Pembelian</option>
                            <option value="3">ATK</option>
                          </select>
                        </div>
                      </div>
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
                    <h2>Daftar Item</h2>
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
        <!-- /page content -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Item Master Data</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                
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
        url: "<?=base_url()?>C_Article/Read",
        data: {'id':'','ArticleTable':'articlewarna'},
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
    function GetData(id) {
      var where_field = 'id';
      var where_value = id;
      var table = 'users';
      $.ajax({
            type: "post",
            url: "<?=base_url()?>C_Atribut/read",
            data: {'id':id},
            dataType: "json",
            success: function (response) {
              $.each(response.data,function (k,v) {
                console.log(v.KelompokUsaha);
                // $('#KodePenyakit').val(v.KodePenyakit).change;
                $('#ArticleCode').val(v.ArticleCode);
                $('#ArticleName').val(v.ArticleName);
                // $('#Nilai').val(v.Nilai);

                $('#formtype').val("edit");

                $('#modal_').modal('show');
              });
            }
          });
    }
    function bindGrid(data) {

      $("#gridContainer").dxDataGrid({
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
                    dataField: "ArticleCode",
                    caption: "Kode Artikel",
                    allowEditing:false
                },
                {
                    dataField: "ArticleName",
                    caption: "Nama Artikel",
                    allowEditing:false
                }
            ],
            onEditingStart: function(e) {
                GetData(e.data.ArticleCode);
            },
            onInitNewRow: function(e) {
                // logEvent("InitNewRow");
                $('#modal_').modal('show');
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
              id = e.data.ArticleCode;
              Swal.fire({
                title: 'Apakah anda yakin?',
                text: "anda akan menghapus data di baris ini !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                  var table = 'app_setting';
                  var field = 'id';
                  var value = id;

                  $.ajax({
                      type    :'post',
                      url     : '<?=base_url()?>C_Article/CRUD',
                      data    : {'ArticleCode':id,'formtype':'delete'},
                      dataType: 'json',
                      success : function (response) {
                        if(response.success == true){
                          Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      ).then((result)=>{
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
                            location.reload();
                          });
                        }
                      }
                    });
                  
                }
                else{
                  location.reload();
                }
              })
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
</script>