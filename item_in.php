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