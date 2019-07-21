var branch= ["Bio-technology","Chemical Engg.","Civil Engg.","Comp. Sc.","Electronics & Comm.","Electrical & Electronics","Electrical & Instrumentation","Industrial Engg. & Mgmt.","Information Sc.","Mechanical Engg.","Medical Electronics","Telecommunication"];
var sub=document.getElementById("op_branch");
var branch_code=document.getElementById("op_usn").value.substring(5,7);
switch(branch_code)
{
	case "BT": sub.value=branch[0]; break;
	case "CH": sub.value=branch[1]; break;
	case "CV": sub.value=branch[2]; break;
	case "CS": sub.value=branch[3]; break;
	case "EC": sub.value=branch[4]; break;
	case "EE": sub.value=branch[5]; break;
	case "EI": sub.value=branch[6]; break;
	case "IM": sub.value=branch[7]; break;
	case "IS": sub.value=branch[8]; break;
	case "ME": sub.value=branch[9]; break;
	case "ML": sub.value=branch[10]; break;
	case "TE": sub.value=branch[11]; break;
}//end of switch

var curr_display="sem1";
var select_box_id;
function select_box(sem){
	if(sem==1)
		select_box_id="sem"+sem;
	else
		select_box_id="sem"+sem+branch_code;
	document.getElementById(curr_display).style.display="none";
	document.getElementById(curr_display).removeAttribute("required");
	document.getElementById(select_box_id).style.display="block";
	document.getElementById(select_box_id).required="required";
	curr_display=document.getElementById(select_box_id).id;
}

function select_op()
{
	if(document.getElementById(select_box_id).selectedIndex==-1)
	{
		alert("Choose a course from the dropdown menu !!");
		return false;
	}
	return true;
}