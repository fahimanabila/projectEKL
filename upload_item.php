<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("zapplerepair_serviceform", $connection);
session_start();// Starting Session
// Storing Session
// $user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
// $ses_sql=mysql_query("select username, user_role from login where username='$user_check'", $connection);
// $row = mysql_fetch_assoc($ses_sql);
// $login_session =$row['username'];
// $user_role =$row['user_role'];

// if(!isset($login_session) || is_null($login_session) || $login_session == ''){
// mysql_close($connection); // Closing Connection
// header('Location: admin.php'); // Redirecting To Home Page
// }

// if($user_role == 5){
//   $_SESSION['alert'] = 'warning';
//   $_SESSION['message'] = "Anda tidak memiliki hak akses !";
//   header('Location: trn_service_list.php');
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
  <title>Upload Item</title>
  
  <META http-equiv="expires" content="0">
    <meta name="robots" content="no index, no follow" />
    <!--carousel-->
  </head>
  <body>
  <!--   <?php

    if (!isset($f_date)) { $f_date = date("Y-m-d H:i:s"); }

    ?> -->
    <link rel="stylesheet" type="text/css" href="../zapple/css/subModal.css" />
    <link rel="stylesheet" type="text/css" href="../zapple/css/style0.css" />
    <link rel="stylesheet" type="text/css" href="../zapple/css/w3.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <link href="../zapple/css/my_css.css" rel="stylesheet" type="text/css">
    <link href="../zapple/css/modal-message.css" rel="stylesheet" type="text/css">


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
    $(document).ready(function() {
      $('#example').dataTable();
    });
    function onDownload() {
      window.open("trn_service_pdf.php");
    }

    function onPrint(id) {
      window.open("trn_service_print.php?cmd=2&id="+id);
    }

     function openCity(evt, cityName) {
          // Declare all variables
          var i, tabcontent, tablinks;

          // Get all elements with class="tabcontent" and hide them
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }

          // Get all elements with class="tablinks" and remove the class "active"
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }

          // Show the current tab, and add an "active" class to the button that opened the tab
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
  $('.edit_btn').click(function() {
          $('#row_edit').show(500);
          var id            = $(this).attr("data-id");
          var item          = $(this).attr("data-item");
          var price         = $(this).attr("data-price");
          var currency      = $(this).attr("data-currency");
          var warranty      = $(this).attr("data-warranty");
          var warranty_type = $(this).attr('data-warranty_type');
          var desc          = $(this).attr('data-desc');

          $('#selected_id').val(id);
          $('#selected_item').val(item);
          $('#selected_price').val(price);
          $('#selected_currency').val(currency);
          $('#selected_warranty').val(warranty);
          $('#selected_warranty_type').val(warranty_type);
          $('#selected_desc').text(desc);
        });
        $('#cancel').click(function() {
            $('#row_edit').hide(500);
        });
     
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
      <?php 
      $login_session = 'fahima';
      ?>

      <?php 
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if($pesan == "input"){
      echo "Data Data has been inserted successfully";
    }else if($pesan == "update"){
      echo "Data has been updated successfully.";
      
    }else if($pesan == "delete"){
      echo "Data has been deleted successfully";
     
    }
  }
  ?>
      <table border="0" bgcolor="#FEF9ED" align="center" cellpadding="0" cellspacing="0" width="75%" style="border:1px solid #cccccc; margin-bottom:0px; padding-bottom:0px; margin-top:20px; text-align:center">
        <tr><td colspan="2" class="form_title" style="padding:7px">Add Item</td></tr>
        <tr>
          <td width="50%">
            <div align="left" style="width: 100%; display: table-row">
              <div align="left" style="padding: 10px; width:60%; display: table-cell">
                <a href="stock_sparepart.php" >Stock Sparepart</a>
                &nbsp;&nbsp;&nbsp;
              </div>
            </div>
          </td>
          <td width="20%">
            <div align="right" style="padding: 10px; display: inline-block">
               <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
              &nbsp;<span>|</span>&nbsp;<b id="logout"><a href="admin_logout.php">Log Out</a></b>
            </div>
          </td>
        </tr>
        <tr style="padding:10px">
          <td colspan="2" style="border:1px solid #cccccc; background:#FEF9ED">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'list_items')">List Items</button>
              <button class="tablinks" onclick="openCity(event, 'add_item')">Add Item</button>
              <button class="tablinks" onclick="openCity(event, 'upload_items')">Upload Items</button>
            </div>

            <!-- Tab content -->
            <div id="add_item" class="tabcontent">
              <h3>Add Item</h3>
              <form name="frm_add" method="post" action="aksi_uploaditem.php?type=1" style="width:100%;" class="editor">
                <input type="hidden" name="upload_date" value="<?= $date = date('Y-m-d H:i:s');?>">
                <input type="hidden" name="upload_by" value="<?= $login_session?>">
                <div align="left" style="padding:10px; width: 100%; display: block">
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Code Item</label>
                    <input class="w3-input" style="width:20%; display: inline-block" type="text" name="name_item">
                  </div>

                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Cost Price</label>
                    <input class="w3-input" style="width:10%; display: inline-block" type="text" name="cost_price" >
                    <select class="w3-input" style="width:10%; display: inline-block" name="currency">
                      <option value="sgd">SGD</option>
                      <option value="idr">IDR</option>
                    </select>
                  </div>

                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Price</label>
                    <input class="w3-input" style="width:10%; display: inline-block" type="text" name="price_item" >
                    <select class="w3-input" style="width:10%; display: inline-block" name="currency">
                      <option value="sgd">SGD</option>
                      <option value="idr">IDR</option>
                    </select>
                  </div>

                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Warranty</label>
                    <input class="w3-input" style="width:10%; display: inline-block" type="text" name="warranty_item">
                    <select class="w3-input" style="width:10%; display: inline-block" name="warranty_type">
                      <option value="days">Day</option>
                      <option value="month">Month</option>
                      <option value="year">Year</option>
                    </select>
                  </div>
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Desc</label>
                    <textarea class="w3-input" style="width:20%; display: inline-block" name="desc_item"></textarea>
                  </div>
                </div>
                <div align="right" style="padding:10px; display: inline-block;">
                  <button class="w3-button w3-green" style="float: right;" type="submit" id="submit" name="submit" value="upload"> Add </button>
                </div>
              </form>
            </div>

            <div id="upload_items" class="tabcontent">
              <h3>Upload Items</h3>
              <form id="frm_upload" name="frm_upload" method="post" action="additem_handler.php?type=2" enctype="multipart/form-data" style="width:100%;" class="editor">
                <input type="hidden" name="upload_date" value="<?= $f_date?>">
                <input type="hidden" name="upload_by" value="<?= $login_session?>">
                <div align="left" style="padding:10px; width: 100%; display: block">
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Choose CSV File</label>
                    <input style="display: inline-block" type="file" name="file" id="file">
                  </div>
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label id="labelError" style="width:20%; display: inline-block"></label>
                  </div>
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="color:#ff9800; display: inline-block">**Format CSV : item/product name , price , currency , warranty[duration] , warranty_type[days/months/years] , desc item</label>
                  </div>
                </div>
                <div align="right" style="padding:10px; display: inline-block;">
                  <button class="w3-button w3-green" style="float: right;" type="submit" id="submit2" name="submit2" value="upload2"> Upload </button>
                </div>
              </form>
            </div>

            <div id="list_items" class="tabcontent">
              <h3>List Items</h3>
              <div id="row_edit" style="display:none">
                <form name="frm_add" method="post" action="additem_handler.php?type=4" style="width:100%;" class="editor">
                  <input type="hidden" name="id" id="selected_id">
                  <input type="hidden" name="upload_date" value="<?= $f_date?>">
                  <input type="hidden" name="upload_by" value="<?= $login_session?>">
                  <div align="left" style="padding:10px; width: 100%; display: block">
                    <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                      <label style="width:20%; display: inline-block">Name Product/Item</label>
                      <input class="w3-input" style="width:20%; display: inline-block" type="text" name="name_item" id="selected_item">
                    </div>
                    <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                      <label style="width:20%; display: inline-block">Price</label>
                      <input class="w3-input" style="width:10%; display: inline-block" type="text" name="price_item" id="selected_price">
                      <select class="w3-input" style="width:10%; display: inline-block" name="currency" id="selected_currency">
                        <option value="sgd">SGD</option>
                        <option value="idr">IDR</option>
                      </select>
                    </div>
                    <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                      <label style="width:20%; display: inline-block">Warranty</label>
                      <input class="w3-input" style="width:10%; display: inline-block" type="text" name="warranty_item" id="selected_warranty">
                      <select class="w3-input" style="width:10%; display: inline-block" name="warranty_type" id="selected_warranty_type">
                        <option value="days">Day</option>
                        <option value="month">Month</option>
                        <option value="year">Year</option>
                      </select>
                    </div>
                    <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                      <label style="width:20%; display: inline-block">Desc</label>
                      <textarea class="w3-input" style="width:20%; display: inline-block" name="desc_item" id="selected_desc"></textarea>
                    </div>
                  </div>
                  <div align="right" style="padding:10px; display: inline-block;">
                    <button class="w3-button w3-red" style="float: right;" type="button" id="cancel"> Cancel </button>
                    <button class="w3-button w3-green" style="float: right;" type="submit" id="submit" name="submit" value="upload"> Update </button>
                  </div>
                </form>
              </div>
              <table class="display" id="example" style="margin-top:10px;">
                <thead>
                  <tr style="background:#eee;">
                    <th width="10"></th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Warranty</th>
                    <th>Desc Item</th>
                    <th>Upload Date</th>
                    <th>Upload By</th>
                    <th>Update Date</th>
                    <th>Update By</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // opendb();
                  include 'koneksi.php';
                  $sql = mysql_query("select * from `invoice_detail` order by `id` asc ");
                  // $qry = querydb($sql);
                  $no = 1;
                  while($rst = mysql_fetch_array($sql))
                  { ?>
                    <tr>
                      <td width="10"><?= $no ?></td>
                      <td><?=$rst["name_item"]?></td>
                      <td><?=$rst["price"]?> <?= strtoupper($rst["currency"])?></td>
                      <td><?=$rst["warranty"]?> <?=strtoupper($rst["warranty_type"])?></td>
                      <td><?=$rst["desc_item"] ?></td>
                      <td><?=$rst["upload_date"]?></td>
                      <td><?=$rst["upload_by"]?></td>
                      <td><?=(is_null($rst["update_date"]) ? '-' : $rst["update_date"])?></td>
                      <td><?=(is_null($rst["update_by"]) ? '-' : $rst["update_by"])?></td>
                      <td>
                        <button type='button' class='edit_btn' data-id="<?=$rst["id"]?>" data-item="<?=$rst["name_item"]?>" data-price="<?=$rst["price"]?>" data-currency="<?=$rst["currency"]?>" data-warranty="<?=$rst["warranty"]?>" data-warranty_type="<?=$rst["warranty_type"]?>" data-desc="<?=$rst["desc_item"]?>"> Edit </button>
                     <form name="frm_add" method="post" action="aksi_uploaditem.php?type=2" style="width:100%;" class="editor">
                        <a onclick="return confirm('Are you sure?')"><button name="btnDelete" value="<?=$rst['id']?>" type="submit"> Delete </button></a>
                      </form>
                      </td>
                    </tr>
                    <?php $no++; }
                    // closedb();
                     ?>
                  </tbody>
                </table>
            </div>
            <!-- Tab content -->
            </td>
          </tr>
        </table>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

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

        function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
          return true;
        }

        function openCity(evt, cityName) {
          // Declare all variables
          var i, tabcontent, tablinks;

          // Get all elements with class="tabcontent" and hide them
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }

          // Get all elements with class="tablinks" and remove the class "active"
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }

          // Show the current tab, and add an "active" class to the button that opened the tab
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }

      
        </script>
        </script>
      </div>
    </body>
    </html>