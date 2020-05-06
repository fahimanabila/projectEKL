//Javascript collection used most in form editing platform

function form_submit(pFormId, pSubmitFlag) {
	//@5 November 2006 (created)
	//Purpose	: To do global validation on all standard form validation of empty input element
	//Used		: in standard form validation
	var objfrm = document.getElementById(pFormId);
	var objinput = document.getElementsByTagName("input");
	var objreplacement = "";
	var strtmp = ""; var objinherit = ""; var inherit_value = "";
	for (a = 0; a < objinput.length; a++) {
		with (objinput[a]) {
			if (type == "text" || type == "hidden" || type == "password") {
				if (getAttribute("flag_vio") == "1") {
					if (value == "" || value.length == 0) {
						alert(getAttribute("err_msg"));
						if (type == "hidden") {
//							objreplacement = document.getElementById(name + "_pilih"); 
//							objreplacement.style.background = "#E1F0FF";
//							objreplacement.focus();
//							objreplacement[0].onblur=new Function('if (eval("' + id + '_pilih").value.length > 0) {eval("' + id + '_pilih").style.background="#ffffff";}');)
							}
						else {
							style.background = "#E1F0FF";
							focus();
							onblur=new Function('if (document.getElementById("' + id + '").value.length > 0) {document.getElementById("' + id + '").style.background="#ffffff";}');
							//alert(style.background);
							}
						return false;
						}
					}
				else if (getAttribute("flag_vio") == "2") {
					strtmp = getAttribute("field_inherit").split(":");
					objinherit = document.getElementById(strtmp[0]);
					inherit_value = strtmp[1];
//					alert("objinherit.value : " + objinherit.value + " - inherit_value : " + inherit_value); return false;
					if (objinherit.value == inherit_value) {
						if (value == "" || value.length == 0) {
							alert(getAttribute("err_msg"));
							if (type == "hidden") {
								}
							else {
								style.background = "#E1F0FF";
								focus();
								onblur=new Function('if (document.getElementById("' + id + '").value.length > 0) {document.getElementById("' + id + '").style.background="#ffffff";}');
								//alert(style.background);
								}
							return false;
							}
						}
					}
				else if (getAttribute("flag_vio") == "3") {
					if (value == "" || value.length == 0) {
						alert(getAttribute("err_msg")); return false;}
					}
				else if (getAttribute("flag_vio") == "4") {
					if (value == "" || value.length == 0) {
						alert(getAttribute("err_msg"));
						if (type == "hidden") {
//							objreplacement = document.getElementById(name + "_pilih"); 
//							objreplacement.style.background = "#E1F0FF";
//							objreplacement.focus();
//							objreplacement[0].onblur=new Function('if (eval("' + id + '_pilih").value.length > 0) {eval("' + id + '_pilih").style.background="#ffffff";}');)
							}
						else {
							style.background = "#E1F0FF";
							focus();
							onblur=new Function('if (document.getElementById("' + id + '").value.length > 0) {document.getElementById("' + id + '").style.background="#ffffff";}');
							//alert(style.background);
							}
						return false;
						}
					else {
						var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
						if (filter.cek(value)) {
							alert("Penulidan E-mail Salah!!");}
							style.background = "#E1F0FF";
							focus();
							onblur=new Function('if (document.getElementById("' + id + '").value.length > 0) {document.getElementById("' + id + '").style.background="#ffffff";}');
							return false;
						}
					}
				}
			}
		}
	var objselect = document.getElementsByTagName("select");
	for (a = 0; a < objselect.length; a++) {
		with (objselect[a]) {
			if (getAttribute("flag_vio") == "1") {
				if (value == "" || value.length == 0) {
					alert(getAttribute("err_msg"));
					style.background = "#E1F0FF";
					focus();
					onblur=new Function('if (document.getElementById("' + id + '").value.length > 0) {document.getElementById("' + id + '").style.background="#ffffff";}');
					return false;
					}
				}
			}
		}
	var objtextarea = document.getElementsByTagName("textarea");
	for (a = 0; a < objtextarea.length; a++) {
		with (objtextarea[a]) {
			if (getAttribute("flag_vio") == "1") {
				if (value == "" || value.length == 0) {
					alert(getAttribute("err_msg"));
					style.background = "#E1F0FF";
					focus();
					onblur=new Function('if (document.getElementById("' + id + '").value.length > 0) {document.getElementById("' + id + '").style.background="#ffffff";}');
					return false;
					}
				}
			}
		}
	if (!pSubmitFlag) {
		objfrm.submit(); disableFormSubmit();}
	else {
		return true;}
	}

function disableSubmit(){
	//@5 November 2006
	//Purpose	: To alert te user not to post/submit the form because its being submit already
	//Used		: related with disableFormSubmit
	//alert('this form is being submitted');
	return false;
	}

function disableFormSubmit() {
	//@5 November 2006 (added)
	//Purpose	: To discrete user from trying to post/submit a form in multiple times on a row proses
	//Used		: in all submit form function
	var theForm;
	var countOfForms = document.forms.length;
	var intTabIndex;

	for (z = 0 ; z < countOfForms ; z++) {
		theForm = document.forms[z];
		if (typeof(theForm)!='object') {
			return false;}
		theForm.onsubmit=disableSubmit;
		}
	}