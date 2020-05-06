<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("zapplerepair_serviceform", $connection);
session_start();// Starting Session
// Storing Session
// $user_check=$_SESSION['login_user'];

// // SQL Query To Fetch Complete Information Of User
// $ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
// $row = mysql_fetch_assoc($ses_sql);
// $login_session =$row['username'];

// if(!isset($login_session) || is_null($login_session) || $login_session == ''){
//   mysql_close($connection); // Closing Connection
//   header('Location: admin.php'); // Redirecting To Home Page
// }

// include_once("../include/config.php");
// include_once("../include/dbfunctions.php");
// //include_once("../include/generate_collection.php");
// include_once("../include/cListPageEngine.php");
// include_once("../include/http_function.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Stock Sparepart</title>
  
  <META http-equiv="expires" content="0">
    <meta name="robots" content="no index, no follow" />
    <!--carousel-->
  </head>
  <body>
    <?php

    if (!isset($f_date)) { $f_date = date("Y-m-d H:i:s"); }

    ?>
    <link rel="stylesheet" type="text/css" href="../zapple/css/subModal.css" />
    <link rel="stylesheet" type="text/css" href="../zapple/css/style0.css" />
    <link rel="stylesheet" type="text/css" href="../zapple/css/w3.css" />
    <link href="../zapple/css/my_css.css" rel="stylesheet" type="text/css">
    <link href="../zapple/css/modal-message.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script language="JavaScript" type="text/javascript" src="../zapple/js/common.js"></script>
    <script language="JavaScript" type="text/javascript" src="../zapple/js/subModal.js"></script>
    <script language="JavaScript" type="text/javascript" src="../zapple/js/javascript_2.js"></script>
    <script language="JavaScript" type="text/javascript" src="../zapple/js/js_stock_table.js"></script>
    <script type="text/javascript" src="../zapple/js/script_java.js"></script>
    <script type="text/javascript" src="../zapple/js/javascript.js"></script>
    <script type="text/javascript" src="../zapple/js/CalendarDateInput.js"></script>
    <script type="text/javascript" src="../zapple/js/ajax.js"></script>
    <script type="text/javascript" src="../zapple/js/modal-message.js"></script>
    <script type="text/javascript" src="../zapple/js/ajax-dynamic-content.js"></script>


    <style type="text/css" title="currentStyle">
    @import "../zapple/datatable/css/demo_page.css";
    @import "../zapple/datatable/css/demo_table.css";
    div.giveHeight {
      /* Stop the controls at the bottom bouncing around */
      min-height: 380px;
    }

    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }

    </style>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      function openCity(evt, cityName) {
        // alert(cityName)
          // Declare all variables
          var i, tabcontent, tablinks;

          // Get all elements with class="tabcontent" and hide them
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }

          // alert(cityName)


          // Get all elements with class="tablinks" and remove the class "active"
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("active", "");
          }
          // alert(cityName)
          // Show the current tab, and add an "active" class to the button that opened the tab
         
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
          // alert(cityName)

        }
    </script>

    <div align="center" style="padding: 10px">
      <?php if(isset($_SESSION['alert']) && isset($_SESSION['message'])):?>
        <div class="w3-alert-<?=$_SESSION['alert']?>" style="margin:10px; width:75%;">
          <span class="w3-closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <?= $_SESSION['message']?>
        </div>
        <?php
        unset($_SESSION['alert']);
        unset($_SESSION['message']);
      endif;?>
      <table border="0" bgcolor="#FEF9ED" align="center" cellpadding="0" cellspacing="0" width="75%" style="border:1px solid #cccccc; margin-bottom:0px; padding-bottom:0px; margin-top:20px; text-align:center">
        <tr><td colspan="2" class="form_title" style="padding:7px">Add Item</td></tr>
        <tr>
          <td width="50%">
            <div align="left" style="width: 100%; display: table-row">
              <div align="left" style="padding: 10px; width:60%; display: table-cell">
              </div>
            </div>
          </td>
          <td width="20%">
            <div align="right" style="padding: 10px; display: inline-block">
              <!-- <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b> -->
              &nbsp;<span>|</span>&nbsp;<b id="logout"><a href="admin_logout.php">Log Out</a></b>
            </div>
          </td>
        </tr>
        <tr style="padding:10px">
          <td colspan="2" style="border:1px solid #cccccc; background:#FEF9ED">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'stock')" id="defaultOpen">Stock Sparepart</button>
              <button class="tablinks" onclick="openCity(event, 'item_in')">Item In</button>
              <button class="tablinks" onclick="openCity(event, 'out_item')">Item Out</button>
              <button class="tablinks" onclick="openCity(event, 'item_retur')">Retur</button>
              <button class="tablinks" onclick="openCity(event, 'adjustment')">Adjustment</button>
            </div>

            <!-- Tab content -->
            <div id="stock" class="tabcontent">
              <h3>Stock Sparepart</h3>
              <div id="row_adjustment" style="display:none">
                <form name="frm_add" method="post" action="additem_handler.php?type=7" style="width:100%;" class="editor">
                  <input type="hidden" name="id_item" id="selected_id">
                  <input type="hidden" name="adjust_id" value="<?= 'AJD'.date('ymdHis')?>">
                  <input type="hidden" name="upload_date" value="<?= $f_date?>">
                  <input type="hidden" name="upload_by" value="<?= $login_session?>">
                  <div align="left" style="padding:10px; width: 100%; display: block">
                    <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                      <label style="width:20%; display: inline-block">Name Product/Item</label>
                      <input class="w3-input" style="width:20%; display: inline-block" type="text" name="name_item" id="selected_item">
                    </div>
                    <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                      <label style="width:20%; display: inline-block">Qty Adjustment</label>
                      <input class="w3-input" style="width:20%; display: inline-block" type="text" name="qty_item">
                    </div>
                    <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                      <label style="width:20%; display: inline-block">Type Adjustment</label>
                      <select class="w3-input" style="width:20%; display: inline-block" name="type_adjustment" >
                        <option value="in">In Stock</option>
                        <option value="out">Out Stock</option>
                      </select>
                    </div>
                    <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                      <label style="width:20%; display: inline-block">Desc</label>
                      <textarea class="w3-input" style="width:20%; display: inline-block" name="desc_item"></textarea>
                    </div>
                  </div>
                  <div align="right" style="padding:10px; display: inline-block;">
                    <button class="w3-button w3-red" style="float: right;" type="button" id="cancel"> Cancel </button>
                    <button class="w3-button w3-green" style="float: right;" type="submit" id="submit" name="submit" value="upload"> Adjust </button>
                  </div>
                </form>
              </div>
              <div class="table-responsive" style="overflow-x:scroll; overflow-y:scroll">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr style="background:#eee;">
                      <th style="text-align: center"></th>
                      <th style="text-align: center">Item</th>
                      <th style="text-align: center">Total QTY In</th>
                      <th style="text-align: center">Total Sold</th>
                      <th style="text-align: center">Total Retur</th>
                      <th style="text-align: center">Ready QTY</th>
                      <th style="text-align: center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // opendb();
                    include 'koneksi.php';
                    $sql = mysql_query("select * from `invoice_detail` order by `id` asc ");
                    // $qry = querydb($sql);
                    $no = 1;
                    $year = date('Y');
                    while($rst = mysql_fetch_array($sql))
                    {
                      $get_qty_in_sql = mysql_query("select coalesce(SUM(qty_in),0) as qty_in from `item_in` where item_id = ".$rst['id']." AND YEAR(date_in) = ".$year);
                      $qty_in = mysql_fetch_array($get_qty_in_sql);
                      // $qty_in = ($qry_get_qty_in);

                      $get_qty_out_sql = mysql_query("select coalesce(SUM(qty_out),0) as qty_out from `item_out` where item_id = ".$rst['id']." AND YEAR(date_out) = ".$year);
                      $qty_out = mysql_fetch_array($get_qty_out_sql);
                      // $qty_out = mysql_fetch_array($qry_get_qty_out);

                      $get_qty_retur_sql = mysql_query("select coalesce(SUM(qty_in),0) as qty_retur from `item_retur` where item_id = ".$rst['id']." AND YEAR(date_in) = ".$year);
                      $qty_retur = mysql_fetch_array($get_qty_retur_sql);
                      // $qty_retur = mysql_fetch_array($qry_get_qty_retur);
                      ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?=$rst["name_item"]?></td>
                        <td><?=$qty_in['qty_in'] ?></td>
                        <td><?=$qty_out['qty_out'] ?></td>
                        <td><?=$qty_retur['qty_retur'] ?></td>
                        <td><?=($qty_in['qty_in'] + $qty_retur['qty_retur']) - $qty_out['qty_out'] ?></td>
                        <td><button type="button" class='edit_btn' data-id="<?=$rst["id"]?>" data-item="<?=$rst["name_item"]?>"> Adjustment </button></td>
                      </tr>
                      <?php $no++;
                    } 
                    // closedb(); 
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="item_in" class="tabcontent">
              <h3>Add Stock In</h3>
              <form name="frm_add" method="post" action="additem_handler.php?type=5" style="width:100%;" class="editor">
                <input type="hidden" name="upload_date" value="<?= $f_date?>">
                <input type="hidden" name="upload_by" value="<?= $login_session?>">
                <input id="item_name" type = "hidden" name = "item_name" value = "" />
                <div align="left" style="padding:10px; width: 100%; display: block">
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Bill ID/No.</label>
                    <input class="w3-input" style="width:20%; display: inline-block" type="text" name="bill_in">
                  </div>
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Item</label>
                    <select <select class="select2" style="width:20%; display: inline-block" name="item_in" onchange="setTextField(this)">
                      <option value=""> -- Select Item -- </option>
                      <?php
                      opendb();
                      $sql ="select * from `invoice_detail` order by `id` asc ";
                      $qry = querydb($sql);
                      while($rst = mysql_fetch_array($qry))
                      { ?>
                        <option value="<?= $rst["id"]?>"><?= $rst["name_item"]?></option>
                      <?php }
                      closedb();?>
                    </select>
                  </div>
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Qty In</label>
                    <input class="w3-input" style="width:20%; display: inline-block" type="text" name="qty_in" onkeypress="return isNumberKey(this);">
                  </div>
                </div>
                <div align="right" style="padding:10px; display: inline-block;">
                  <button class="w3-button w3-green" style="float: right;" type="submit" id="submit" name="submit" value="upload"> Add </button>
                </div>
              </form>
              <hr>
              <div>
                <h3>History Stock In</h3>
                <table class="display" id="example2" style="margin-top:10px;">
                  <thead>
                    <tr style="background:#eee;">
                      <th width="10"></th>
                      <th>Bill ID/No.</th>
                      <th>Item</th>
                      <th>QTY In</th>
                      <th>Date</th>
                      <th>Add By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    opendb();
                    $sql ="select * from `item_in` order by `id` asc ";
                    $qry = querydb($sql);
                    $no = 1;
                    while($rst = mysql_fetch_array($qry))
                    { ?>
                      <tr>
                        <td width="10"><?= $no ?></td>
                        <td><?=$rst["bill_id"]?></td>
                        <td><?=$rst["item_name"]?></td>
                        <td><?=$rst["qty_in"]?></td>
                        <td><?=$rst["date_in"] ?></td>
                        <td><?=$rst["add_by"] ?></td>
                      </tr>
                      <?php $no++;
                    } closedb(); ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="out_item" class="tabcontent">
             <h3>History Stock Out</h3>
               <table class="display" id="example3" style="margin-top:10px;">
                  <thead>
                    <tr style="background:#eee;">
                      <th width="10"></th>
                      <th>Invoice No.</th>
                      <th>Item</th>
                      <th>QTY Out</th>
                      <th>Date</th>
                      <th>Out By</th>
                    </tr>
                  </thead>
                <tbody>
                    <?php
                    opendb();
                    $sql ="select * from `item_out` order by `id` asc ";
                    $qry = querydb($sql);
                    $no = 1;
                    while($rst = mysql_fetch_array($qry))
                    { ?>
                      <tr>
                        <td width="10"><?= $no ?></td>
                        <td><?=$rst["inv_id"]?></td>
                        <td><?=$rst["item_name"]?></td>
                        <td><?=$rst["qty_out"]?></td>
                        <td><?=$rst["date_out"] ?></td>
                        <td><?=$rst["out_by"] ?></td>
                      </tr>
                      <?php $no++;
                    } closedb(); ?>
                  </tbody> 
               </table> 
            </div>

            <div id="item_retur" class="tabcontent">
              <h3>Input Retur Item</h3>
              <!-- <form name="frm_add" method="post" action="additem_handler.php?type=6" style="width:100%;" class="editor">
                <input type="hidden" name="upload_date" value="<?= $f_date?>">
                <input type="hidden" name="upload_by" value="<?= $login_session?>">
                <input id="item_name2" type = "hidden" name = "item_name" value = "" />
                <div align="left" style="padding:10px; width: 100%; display: block">
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Retur ID/No.</label>
                    <input class="w3-input" style="width:20%; display: inline-block" type="text" name="bill_in">
                  </div>
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Item</label>
                    <select <select class="select2" style="width:20%; display: inline-block" name="item_in" onchange="setTextField2(this)">
                      <option value=""> -- Select Item -- </option>
                     <!--  <?php
                      opendb();
                      $sql ="select * from `invoice_detail` order by `id` asc ";
                      $qry = querydb($sql);
                      while($rst = mysql_fetch_array($qry))
                      { ?> -->
                        <option value="<?= $rst["id"]?>"><?= $rst["name_item"]?></option>
                      <!-- <?php }
                      closedb();?> -->
                    </select>
                  </div>
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Qty Retur</label>
                    <input class="w3-input" style="width:20%; display: inline-block" type="text" name="qty_in" onkeypress="return isNumberKey(this);">
                  </div>
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Keterangan</label>
                    <textarea class="w3-input" style="width:20%; display: inline-block" type="text" name="keterangan"></textarea>
                  </div>
                </div>
                <div align="right" style="padding:10px; display: inline-block;">
                  <button class="w3-button w3-green" style="float: right;" type="submit" id="submit" name="submit" value="upload"> Input </button>
                </div>
              <!-- </form> -->
              <!-- <hr>
              <div>
                <h3>History Retur</h3>
                <table class="display" id="example4" style="margin-top:10px;">
                  <thead>
                    <tr style="background:#eee;">
                      <th width="10"></th>
                      <th>Retur ID/No.</th>
                      <th>Item</th>
                      <th>QTY In</th>
                      <th>Keterangan</th>
                      <th>Input Date</th>
                      <th>Input By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <?php
                    opendb();
                    $sql ="select * from `item_retur` order by `id` asc ";
                    $qry = querydb($sql);
                    $no = 1;
                    while($rst = mysql_fetch_array($qry))
                    { ?> -->
                      <tr>
                        <td width="10"><?= $no ?></td>
                        <td><?=$rst["retur_id"]?></td>
                        <td><?=$rst["item_name"]?></td>
                        <td><?=$rst["qty_in"]?></td>
                        <td><?=$rst["keterangan"]?></td>
                        <td><?=$rst["date_in"] ?></td>
                        <td><?=$rst["input_by"] ?></td>
                      </tr>
                      <!-- <?php $no++;
                    } closedb(); ?> -->
                  </tbody>
                </table>
              <!-- </div>  -->
            </div>

            <div id="adjustment" class="tabcontent">
              <h3>History Stock Out</h3>
              <!-- <table class="display" id="example5" style="margin-top:10px;">
                <thead>
                  <tr style="background:#eee;">
                    <th width="10"></th>
                    <th>Adjustment ID</th>
                    <th>Item</th>
                    <th>Adjust Type</th>
                    <th>QTY Adjust</th>
                    <th>Ketrangan</th>
                    <th>Input Date</th>
                    <th>Input By</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- <?php
                  opendb();
                  $year = date('Y');
                  $sql ="select b.item_name as item_in, c.item_name as item_out, a.* from `adjustment_stock` a JOIN `item_in` b ON a.adjust_id LIKE CONCAT ('%',b.bill_id,'%') JOIN `item_out` c ON a.adjust_id LIKE CONCAT ('%',c.inv_id,'%') where YEAR(a.input_date) = '".$year."' order by a.id asc ";
                  $qry = querydb($sql);
                  $no = 1;
                  while($rst = mysql_fetch_array($qry))
                  { ?> -->
                    <tr>
                      <td width="10"><?= $no ?></td>
                      <td><?=$rst["adjust_id"]?></td>
                      <td><?=($rst["adjust_type"] == 'in' ? $rst["item_in"] : $rst["item_out"])?></td>
                      <td style="text-transform: uppercase;"><?=$rst["adjust_type"]?></td>
                      <td><?=$rst["qty_adjust"]?></td>
                      <td><?=$rst["keterangan"]?></td>
                      <td><?=$rst["input_date"] ?></td>
                      <td><?=$rst["input_by"] ?></td>
                    </tr>
                    <?php $no++;
                  } 
                  // closedb();
                   ?>
                </tbody>
              <!-- </table>  -->
            </div>

            <!-- Tab content -->
      </td>
    </tr>
  </table>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
        $('#example2').DataTable();
        $('#example3').DataTable();
        $('#example4').DataTable();
        $('#example5').DataTable();

        $('.select2').select2();
      });
      function onDownload() {
        window.open("trn_service_pdf.php");
      }

      function onPrint(id) {
        window.open("trn_service_print.php?cmd=2&id="+id);
      }
      </script>
      <script type="text/javascript">

      document.getElementById("defaultOpen").click();

      messageObj = new DHTML_modalMessage();    // We only create one object of this class
      messageObj.setShadowOffset(10);    // Large shadow

      function displayMessage(url,width,height) {
        messageObj.setSource(url);
        messageObj.setCssClassMessageBox(false);
        messageObj.setSize(width,height);
        messageObj.setShadowDivVisible(true);    // Enable shadow for these boxes
        messageObj.display();
      }

      function displayStaticMessage(messageContent,cssClass) {
        messageObj.setHtmlContent(messageContent);
        messageObj.setSize(300,150);
        messageObj.setCssClassMessageBox(cssClass);
        messageObj.setSource(false);    // no html source since we want to use a static message here.
        messageObj.setShadowDivVisible(false);    // Disable shadow for these boxes
        messageObj.display();
      }

      function closeMessage() {
        messageObj.close();
      }

      function setTextField(ddl) {
        document.getElementById('item_name').value = ddl.options[ddl.selectedIndex].text;
      }

      function setTextField2(ddl) {
        document.getElementById('item_name2').value = ddl.options[ddl.selectedIndex].text;
      }

      function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
      }

      // function openCity(evt, cityName) {
      //   // Declare all variables
      //   var i, tabcontent, tablinks;

      //   // Get all elements with class="tabcontent" and hide them
      //   tabcontent = document.getElementsByClassName("tabcontent");
      //   for (i = 0; i < tabcontent.length; i++) {
      //     tabcontent[i].style.display = "none";
      //   }

      //   // Get all elements with class="tablinks" and remove the class "active"
      //   tablinks = document.getElementsByClassName("tablinks");
      //   for (i = 0; i < tablinks.length; i++) {
      //     tablinks[i].className = tablinks[i].className.replace(" active", "");
      //   }

      //   // Show the current tab, and add an "active" class to the button that opened the tab
      //   document.getElementById(cityName).style.display = "block";
      //   evt.currentTarget.className += " active";
      // }

      $('.edit_btn').click(function() {
        $('#row_adjustment').show(500);

        var id            = $(this).attr("data-id");
        var item          = $(this).attr("data-item");

        $('#selected_id').val(id);
        $('#selected_item').val(item);
      });
      $('#cancel').click(function() {
        $('#row_adjustment').hide(500);
      });
      </script>
    </script>
  </div>
</body>
</html>