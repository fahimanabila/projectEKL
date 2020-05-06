<style type="text/css" title="currentStyle">
    @import "../datatable/css/demo_page.css";
    @import "../datatable/css/demo_table.css";
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

    .w3-input {
    padding: 8px;
    display: block;
    border: none;
    border-bottom: 1px solid #ccc;
    width: 100%;
}

    </style>
<div id="add_item">
              <h3>Add Item</h3>
              <form name="frm_add" method="post" action="additem_handler.php?type=1" style="width:100%;" class="editor">
                <input type="hidden" name="upload_date" value="<?= $f_date?>">
                <input type="hidden" name="upload_by" value="<?= $login_session?>">

                <div align="left" style="padding:10px; width: 100%; display: block">
                  <div style="width:100%; display:inline-block; padding:10px; border-spacing: 5px 10px;">
                    <label style="width:20%; display: inline-block">Kode Item</label>
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
            </body>
    </html>