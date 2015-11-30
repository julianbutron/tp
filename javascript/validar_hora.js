function FormatoHora(evt,str) 
{ 
var nav4 = window.Event ? true : false; 
var key = nav4 ? evt.which : evt.keyCode; 
hora=str.value 

if(hora.length==0) 
{ 
return ((key >= 48 && key <= 50)); 
} 
if(hora.length==1) 
{ 
if(hora.charAt(0)==2) 
{return ((key >= 48 && key <= 51));	} 
else{return ((key >= 48 && key <= 57));} 
} 
if(hora.length==2) 
{ 
return ((key == 58)); 
} 
if(hora.length==3) 
{ 
return ((key >= 48 && key <= 53)); 
} 
if(hora.length==4) 
{ 
return ((key >= 48 && key <= 57)); 
} 
if(hora.length>4) 
{ 
return false; 
} 
} 