/************************************************************************
 *
 *	phpAbstracts
 *  http://www.phpabstracts.com
 *
 *  Copyright (c) 2008 Omar Qazi
 *
 *  phpAbstracts is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  phpAbstracts is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with phpAbstracts.  If not, see <http://www.gnu.org/licenses/>. 
 *
************************************************************************/




//SUBMIT ABSTRACT FORM - ADD ANOTHER AUTHOR
function add_author(next) {
	document.getElementById(next).style.display="block";
	document.getElementById(next).style.visibility="visible";
	document.getElementById(next + 'add').style.display="none";
	document.getElementById(next + 'add').style.visibility="hidden";
}




//SUBMIT ABSTRACT FORM - CHECK NUMBER OF WORDS
function CheckFieldLength(fn,rn,mc) {
	var len = fn.value.length;
	if (len > mc) {
		fn.value = fn.value.substring(0,mc);
		len = mc;
	}
	document.getElementById(rn).innerHTML = mc - len;
}
function check_length(obj) {
    var total = obj.words = obj.value.getWordCount();
    var x, len = arguments.length;
    for(x=1; x<len-1; ++x) {
        if(arguments[x].words) total += arguments[x].words;
    }
	document.getElementById(obj.name + countsuffix).firstChild.data = obj.words;
    document.getElementById(remainingwords).firstChild.data = total;
	document.getElementById('word_count').value = total;
	word_limit = arguments[len-1];
	if (obj.words > word_limit) {
		document.getElementById(obj.name + '_your_words').style.color = "red";
	}
	else {
		document.getElementById(obj.name + '_your_words').style.color = "#009900";
	}
	if (total > total_limit) {
		document.getElementById('total_words_remaining').style.color = "red";
	}
	else {
		document.getElementById('total_words_remaining').style.color = "#009900";
	}	
	return true;
}
String.prototype.getWordCount = function() {
    return this.replace(/\s+/g, " ")
               .replace(/^\s*/, "")
               .replace(/\s*$/, "")
               .split(" ").length;
}




//SUBMIT ABSTRACT FORM - FORM VALIDATION
function validate(form) {
	//Check for title
	if ( document.abstract_submit_form.title.value == "" ) {
			alert ( "Please enter a Title" );
			document.abstract_submit_form.title.focus();
			return false;
	}
	//Check for author1
	if ( document.abstract_submit_form.author1.value == "" ) {
			alert ( "Please enter an Author" );
			document.abstract_submit_form.author1.focus();
			return false;
	}
	//Check for background
	if ( document.abstract_submit_form.background.value == "" ) {
			alert ( "Please enter the abstract Background" );
			document.abstract_submit_form.background.focus();
			return false;
	}
	//Check for purpose
	if ( document.abstract_submit_form.purpose.value == "" ) {
			alert ( "Please enter the abstract Purpose" );
			document.abstract_submit_form.purpose.focus();
			return false;
	}
	//Check for methods
	if ( document.abstract_submit_form.methods.value == "" ) {
			alert ( "Please enter the abstract Methods" );
			document.abstract_submit_form.methods.focus();
			return false;
	}
	//Check for findings
	if ( document.abstract_submit_form.findings.value == "" ) {
			alert ( "Please enter the abstract Findings" );
			document.abstract_submit_form.findings.focus();
			return false;
	}
	
	//Check for conclusion
	if ( document.abstract_submit_form.conclusion.value == "" ) {
			alert ( "Please enter the abstract Conclusion" );
			document.abstract_submit_form.conclusion.focus();
			return false;
	}
	// Check for e-mail address
	var emailID=document.abstract_submit_form.email1;
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please enter your e-mail address in E-mail #1");
		emailID.focus();
		return false;
	}
	if (echeck(emailID.value)==false){
		emailID.value="";
		emailID.focus();
		return false;
	}
	// Check for terms and conditions 
	if (!document.abstract_submit_form.agree.checked) {
		alert("You must check the box agreeing to the terms and conditions.");
		return false; 
	}
	document.getElementById('submitform').disabled = "true";
	document.getElementById('submitform').value = "Processing...";
	return true;
}




//E-mail validation script. Courtesy of SmartWebby.com.
function echeck(str) {
	var at="@";
	var dot=".";
	var lat=str.indexOf(at);
	var lstr=str.length;
	var ldot=str.indexOf(dot);
	if (str.indexOf(at)==-1){
	   alert("Please enter your e-mail address in E-mail #1");
	   return false;
	}
	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
	   alert("Please enter your e-mail address in E-mail #1");
	   return false;
	}
	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		alert("Please enter your e-mail address in E-mail #1");
		return false;
	}
	if (str.indexOf(at,(lat+1))!=-1){
		alert("Please enter your e-mail address in E-mail #1");
		return false;
	}
	 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		alert("Please enter your e-mail address in E-mail #1");
		return false;
	 }
	 if (str.indexOf(dot,(lat+2))==-1){
		alert("Please enter your e-mail address in E-mail #1");
		return false;
	 }
	 if (str.indexOf(" ")!=-1){
		alert("Please enter your e-mail address in E-mail #1");
		return false;
	 }
	 return true;				
}