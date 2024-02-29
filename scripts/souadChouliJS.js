/*
some few javascript instructions to change language, some colors, ...
if you don't use javascript, it's your problem, i wont make a specific website per user.
*/

function changeLang(language) {
	fullPath = new String();
	if (location.pathname.substring(location.pathname.lastIndexOf('.') + 1)=='html'){
		fullPath = '../' + language + '/' + location.pathname.substring(location.pathname.lastIndexOf('/') + 1); 				
	}else {
		fullPath = '../' + language + '/index.html'; 	
	}
	window.location.href = fullPath;
}