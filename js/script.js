function validate_question() {
	var radio_buttons = document.getElementsByName("choice");
	for(var i=0; i<radio_buttons.length; i++)
	{
		if(radio_buttons[i].checked)
			return true;
	}
	alert("You must check any one answer");
	return false;
}