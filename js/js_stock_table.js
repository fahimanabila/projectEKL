function addRowToTable(pTblId, frmtbl) {
	//var save = form_submit('frm_popembelian', true);
	//if (!save) {return false;}
		
	if (command_state == "edit") {updateRow(pTblId, buffer_row); return false;}
	var objfrm = document.getElementById(frmtbl);
  	var tbl = document.getElementById(pTblId);
  	var lastRow = tbl.rows.length;
	// if there's no header row in the table, then iteration = lastRow + 1
	var iteration = lastRow;
	var row = tbl.insertRow(lastRow);
	var cell = "";
	var textNode = "";
	var obj_input = "";
	
	obj_input = document.createElement("input");
	obj_input.type = "hidden"; obj_input.id = "h_stockno[]"; obj_input.name = "h_stockno[]";
	obj_input.value = objfrm.f_new_stockno.value;
	row.appendChild(obj_input);
	
	obj_input = document.createElement("input");
	obj_input.type = "hidden"; obj_input.id = "h_qty[]"; obj_input.name = "h_qty[]";
	obj_input.value = objfrm.f_new_qty.value;
	row.appendChild(obj_input);
	
	obj_input = document.createElement("input");
	obj_input.type = "hidden"; obj_input.id = "h_nilai[]"; obj_input.name = "h_nilai[]";
	obj_input.value = objfrm.f_new_nilai.value;
	row.appendChild(obj_input);
	
	obj_input = document.createElement("input");
	obj_input.type = "hidden"; obj_input.id = "h_totnilai[]"; obj_input.name = "h_totnilai[]";
	obj_input.value = objfrm.f_new_nilai.value * objfrm.f_new_qty.value;
	row.appendChild(obj_input);
	
	// left cell
	cell = row.insertCell(0);
	textNode = document.createTextNode(objfrm.f_new_stockno.value);
	cell.id="col_stockno"; cell.name="col_stockno";
	cell.className = "content"; cell.style.textAlign = "left";
	cell.appendChild(textNode);
	
	cell = row.insertCell(1);
	textNode = document.createTextNode(objfrm.r_new_stockname.value);
	cell.id="col_stockname"; cell.name="col_stockname";
	cell.className = "content"; cell.style.textAlign = "left";
	cell.appendChild(textNode);
	
	cell = row.insertCell(2);
	textNode = document.createTextNode(objfrm.f_new_qty.value);
	cell.id="col_qty"; cell.name="col_qty";
	cell.className = "content"; cell.style.textAlign = "right";
	cell.setAttribute("style", "text-align:right;");
	cell.appendChild(textNode);
	
	cell = row.insertCell(3);
	textNode = document.createTextNode(objfrm.r_new_nilai.value);
	cell.id="col_nilai"; cell.name="col_nilai";
	cell.className = "content"; cell.style.textAlign = "right";
	cell.setAttribute("style", "text-align:right;");
	cell.appendChild(textNode);
	
	cell = row.insertCell(4);
	textNode = document.createTextNode(objfrm.f_new_nilai.value);
	cell.id="col_nilai_beli"; cell.name="col_nilai_beli";
	cell.className = "content"; cell.style.textAlign = "right";
	cell.setAttribute("style", "text-align:right;");
	cell.appendChild(textNode);
	
	cell = row.insertCell(5);
	textNode = document.createTextNode(objfrm.f_new_nilai.value * objfrm.f_new_qty.value);
	cell.id="col_totnilai_beli"; cell.name="col_totnilai_beli";
	cell.className = "content"; cell.style.textAlign = "right";
	cell.setAttribute("style", "text-align:right;");
	cell.appendChild(textNode);
	
	cell = row.insertCell(6);
	cell.id="col_action"; cell.name="col_action";
	cell.className = "content"; cell.style.textAlign = "center";
	cell.setAttribute("style", "text-align:center;");
	textNode = document.createTextNode("[edit] [del]");
	
	cell.appendChild(textNode);
	cell.innerHTML = "[<a href='#' border='0' onclick='editRow(\"tbl_stock_table\", this);'>edit</a>]&nbsp;[<a href='#' border='0' onclick='removeRowFromTable(\"tbl_stock_table\", this);'>del</a>]";
	
//	alert(row.innerHTML);
	
	//Reset Input Element
	objfrm.f_new_stockno.value = "";
	objfrm.r_new_stockname.value = "";
	objfrm.f_new_nilai.value = 0;
	objfrm.f_new_qty.value = 1;
	
	row_count = parseInt(row_count) + 1;
	}
	
function updateRow(p_TblId, p_rowObj) {
	var objfrm = document.frm_popembelian;
	var save = form_submit('frm_popembelian', true);
	if (!save) {return false;}
	
	var td = getParent(p_rowObj, "td");
	var tr = getParent(td, "tr");
  	var tbl = document.getElementById(p_TblId);
  	var col_td = "";
  	var input_element = "";
  	var a = 0;
  	var b = 0;
  	
		
  	for (a = 0; a < tbl.rows.length; a++) {
  		if (tbl.rows[a] == p_rowObj) {
  			col_td = tbl.rows[a].getElementsByTagName("td");
  			for (b = 0; b < col_td.length; b++) {
  				if (col_td[b].id == "col_stockno") {col_td[b].innerHTML = objfrm.f_new_stockno.value;}
  				if (col_td[b].id == "col_stockname") {col_td[b].innerHTML = objfrm.r_new_stockname.value;}
  				if (col_td[b].id == "col_qty") {col_td[b].innerHTML = objfrm.f_new_qty.value;}
  				if (col_td[b].id == "col_nilai_beli") {col_td[b].innerHTML = objfrm.f_new_nilai.value;}
  				if (col_td[b].id == "col_totnilai_beli") {col_td[b].innerHTML = objfrm.f_new_nilai.value * objfrm.f_new_qty.value;}
  				}
  			
  			input_element = tbl.rows[a].getElementsByTagName("input");
  			
  			for (b = 0; b < input_element.length; b++) {
  				if (input_element[b].id == "h_stockno") {input_element[b].value = objfrm.f_new_stockno.value;}
  				if (input_element[b].id == "h_qty'") {input_element[b].value = objfrm.f_new_qty.value;}
  				if (input_element[b].id == "h_nilai'") {input_element[b].value = objfrm.f_new_nilai.value;}
  				if (input_element[b].id == "h_totnilai'") {input_element[b].value = objfrm.f_new_nilai.value * objfrm.f_new_qty.value;}
  				}

  			}
  		}
  		
  	//Reset Input Element
	objfrm.f_new_stockno.value = "";
	objfrm.r_new_stockname.value = "";
	objfrm.f_new_qty.value = "";
	objfrm.r_new_nilai.value = "";
	objfrm.f_new_nilai.value = "";
	
	command_state = "add";
	buffer_row = "";
	
	cancel_edit_stock_table();
	}
	
function removeRowFromTable(pTblId, p_pointObj) {
	var td = getParent(p_pointObj, "td");
	var tr = getParent(td, "tr");
  	var tbl = document.getElementById(pTblId);
  	var a = 0;
  	
  	for (a = 0; a < tbl.rows.length; a++) {
  		if (tbl.rows[a] == tr) {tbl.deleteRow(a);}
  		}
  		
  	row_count = parseInt(row_count) - 1;
  	}
  	
function editRow(pTblId, p_pointObj) {
	var objfrm = document.frm_popembelian;
	var td = getParent(p_pointObj, "td");
	var tr = getParent(td, "tr");
  	var tbl = document.getElementById(pTblId);
  	var obj_col = "";
  	var a = 0;
  	
  	buffer_row = tr;
  	obj_col = tr.getElementsByTagName("td");
  	for (a = 0; a < obj_col.length; a++) {
  		if (obj_col[a].id == "col_stockno") {objfrm.f_new_stockno.value = obj_col[a].innerHTML;}
  		if (obj_col[a].id == "col_stockname") {objfrm.r_new_stockname.value = obj_col[a].innerHTML;}
  		if (obj_col[a].id == "col_qty") {objfrm.f_new_qty.value = obj_col[a].innerHTML;}
  		if (obj_col[a].id == "col_nilai") {objfrm.r_new_nilai.value = obj_col[a].innerHTML;}
  		if (obj_col[a].id == "col_nilai_beli") {objfrm.f_new_nilai.value = obj_col[a].innerHTML;}
  		}
  		
  	command_state = "edit";
  	var new_stock_table = document.getElementById("tr_edit_stock_table");
  	new_stock_table.style.display = "";
	objfrm.f_new_stockno.focus();
	}