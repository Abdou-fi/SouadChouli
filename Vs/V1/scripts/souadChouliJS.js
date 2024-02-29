/*

some few javascript instructions to change language, some colors, ...
if you don't use javascript, it's your problem, i wont make a specific website per user.


*/

function changeLang(language){
	fullPath =new String();
	fullPath = '../' + language + '/' + location.pathname.substring(location.pathname.lastIndexOf('/') + 1); 	
	window.location.href = fullPath;
}