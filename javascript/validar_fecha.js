//valida formato yyyy/mm/dd
function IsNumeric(valor)
{
	var log=valor.length;
	var sw="S";
	for (x=0; x<log; x++)
	{
	   v1=valor.substr(x,1);
	   v2 = parseInt(v1);
		//Compruebo si es un valor numérico
		if (isNaN(v2))
		{
		sw= "N";
		}
	}
	
	if (sw=="S")
	{return true;}
	else
	{return false;}
	}

	var primerslap=false;
	var segundoslap=false;
function formateafecha(fecha)
{
	var long = fecha.length;
	var dia;
	var mes;
	var ano;

	   ano=fecha.substr(0,4);
	   if ((long>=4) && (primerslap==false))
	   {
		   
		   ano=fecha.substr(0,4);
		   //alert("akii" + ano);
		   if ((IsNumeric(ano)== false) || ((ano==0) || (ano<1900) || (ano>2100)))
		   {
		       fecha=""; primerslap=false;
		   }
		   else
		   {
		      fecha=fecha.substr(0,4)+"-"+fecha.substr(5,9); primerslap=true;
		   }
	    }
		else
		{
		    ano=fecha.substr(0,4);
		    if (IsNumeric(ano)==false)
		    {
		        fecha="";
		     }
		     if ((long<=4) && (primerslap=true))
		     {
		        fecha=fecha.substr(0,4); primerslap=false;
		     }
	   }// fin if ((long>=4) && (primerslap==false))
	    
	   
	   if ((long>=7) && (segundoslap==false))
	   {
		   mes=fecha.substr(5,2);
		   if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00"))
		   {
		       fecha=fecha.substr(0,7)+"-"+fecha.substr(8,2); segundoslap=true;
		   }
		   else
		   {
		      fecha=fecha.substr(0,5);; segundoslap=false;
		   }
	    }
	   else
		{
		     if ((long<=7) && (segundoslap=true))
		    {
		       fecha=fecha.substr(0,6); segundoslap=false;
		    }
	   }//if ((long>=7) && (segundoslap==false))
	   
	   
	   if (long>=9)
       {
           dia=fecha.substr(8,5);
           if (IsNumeric(dia)==false)
           {
               fecha=fecha.substr(0,8);
           }
           else
           {
               if (long==10)
               {
				   if ((dia >31) || (dia=="00"))
                  {
                      fecha=fecha.substr(0,8);
                   }
                }
           }
     } //if (long>=7) 
	 
	 
	 if (long>=10)
     {
         fecha=fecha.substr(0,10);
         dia=fecha.substr(8,2);
         mes=fecha.substr(5,2);
         ano=fecha.substr(0,4);
        // Año no biciesto y es febrero y el dia es mayor a 28
		//alert(mes);
        if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) // es año biciesto
        {
		   fecha=fecha.substr(0,4)+"-";
         }
      } 
	   

    return (fecha);
}