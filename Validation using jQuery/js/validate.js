$(document).ready(function() 
{
/** Creating infomsg for the username field **/

	var e = document.createElement("span");
	e.setAttribute("id", "spanuname");
	$(e).insertAfter("#username");

	$("#username").focusin(function()
	{
		$("#spanuname").empty().removeClass("ok").removeClass("error");
		var e = document.getElementById("spanuname");
		var n = document.createTextNode("infoMessage: Input alphanumeric characters only");
		e.appendChild(n);
		$(e).addClass("info");
	});

/** Validation for the username field **/ 

	$("#username").focusout(function()
	{
		$("#spanuname").empty().removeClass("ok").removeClass("info").removeClass("error");
		var username = $("#username");
		if(username.val().length != 0)
		{
			var regex = /^[a-zA-Z0-9]+$/;
			if(username.val().match(regex)){
				var e = document.getElementById("spanuname");
				var n = document.createTextNode("OK");
				e.appendChild(n);
				$(e).addClass("ok");
			}
			else
			{
				var e = document.getElementById("spanuname");
				var n = document.createTextNode("Error");
				e.appendChild(n);
				$(e).addClass("error");
			}
		}
	});

/** Creating infomsg beside the passwrod field **/

	e = document.createElement("span");
	e.setAttribute("id", "spanpwd");
	$(e).insertAfter("#password");

	$("#password").focusin(function(){	
		$("#spanpwd").empty().removeClass("ok").removeClass("error");
		var e = document.getElementById("spanpwd");
		var n = document.createTextNode("infoMessage: Input a minimum of 8 characters");
		e.appendChild(n);
		$(e).addClass("info");
	});

/** Validation for the pasword field **/

	$("#password").focusout(function()
	{
		$("#spanpwd").empty().removeClass("ok").removeClass("info").removeClass("error");
		var pwd = $("#password");
		if(pwd.val().length != 0)
		{	
			if(pwd.val().length >= 8){
				var e = document.getElementById("spanpwd");
				var n = document.createTextNode("OK");
				e.appendChild(n);
				$(e).addClass("ok");
			}
			else
			{
				var e = document.getElementById("spanpwd");
				var n = document.createTextNode("Error");
				e.appendChild(n);
				$(e).addClass("error");
			}
		}
	});


/** creating infomsg besdie email field **/

	e = document.createElement("span");
	e.setAttribute("id", "spanemail");
	$(e).insertAfter("#email");

	$("#email").focusin(function()
	{
		$("#spanemail").empty().removeClass("ok").removeClass("error");
		var e = document.getElementById("spanemail");
		var n = document.createTextNode("infoMessage: abcd@def.xyz");
		e.appendChild(n);
		$(e).addClass("info");
	});

/** Validation for the email field **/

	$("#email").focusout(function()
	{
		$("#spanemail").empty().removeClass("ok").removeClass("info").removeClass("error");
		var email = $("#email");
		if(email.val().length != 0)
		{
			var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z-:]{2,10}$/;
			if(regex.test(email.val())){
				var e = document.getElementById("spanemail");
				var n = document.createTextNode("OK");
				e.appendChild(n);
				$(e).addClass("ok");
			}
			else
			{
				var e = document.getElementById("spanemail");
				var n = document.createTextNode("Error");
				e.appendChild(n);
				$(e).addClass("error");
			}
		}
	});
});