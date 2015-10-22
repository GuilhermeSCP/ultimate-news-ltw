function validarRegisto(form)
{
	if(form.nome.value.length<=3)
	{
		return focusElement(form.nome,"O nome de utilizador tem de ter pelo menos 4 caracteres.");
	}
	if(form.pass.value.length<=5)
	{
		return focusElement(form.pass, "A password tem de ter pelo menos 6 caracteres.");
	}
	if(form.pass.value!=form.pass2.value)
	{
		return focusElement(form.pass, "As passwords introduzidas nos dois campos são diferentes.");
	}
	return true;
};

function focusElement(element, errorMessage)
{
    alert(errorMessage);

    if (element.select) element.select();
    if (element.focus) element.focus();
  
    return false;
};

function validarEmail(entered, alertbox)
{
	with (entered)
	{
		apos=value.indexOf("@"); 
		dotpos=value.lastIndexOf(".");
		lastpos=value.length-1;
		if (apos<1 || dotpos-apos<2 || lastpos-dotpos>3 || lastpos-dotpos<2) 
		{
			if (alertbox) {alert(alertbox);}
			return false;
		}
		else {return true;}
	}
};

function ajudatags()
{
alert("As Etiquetas, tambem conhecidas como tags, ajudam a identificar o assunto de uma noticia assim como facilitam a pesquisa de conteudos relacionados.\n \nIMPORTANTE: AS ETIQUETAS DEVEM SER SEPARARADAS POR UM CARACTER 'ESPACO'.");
}

function pesquisanoticias()
{	
	var string=$('input#pesquisa').val();//jQuery
	if(string != ''){
		$.ajax(
		{
			type: "POST",
			url: "stringpesquisa.php",
			data: {pesquisa: string},
			success: function(json){
				$('ul#lista').html('');
				for(var i=0;i<json.size;i++){
					html_antigo = $('ul#lista').html();
					novo_html = '<li><img src="images/arrow1.gif"/><h3><a href="noticia.php?id='+json.data[i].id+'">'+json.data[i].titulo+'</a></h3>'+json.data[i].intro+'</li>';
					$('ul#lista').html(html_antigo + novo_html);
				}
			}
		}
		);
	}
	else
		$('ul#lista').html('');
};

function utf8_decode (str_data) {
  var tmp_arr = [],
    i = 0,
    ac = 0,
    c1 = 0,
    c2 = 0,
    c3 = 0;

  str_data += '';

  while (i < str_data.length) {
    c1 = str_data.charCodeAt(i);
    if (c1 < 128) {
      tmp_arr[ac++] = String.fromCharCode(c1);
      i++;
    } else if (c1 > 191 && c1 < 224) {
      c2 = str_data.charCodeAt(i + 1);
      tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
      i += 2;
    } else {
      c2 = str_data.charCodeAt(i + 1);
      c3 = str_data.charCodeAt(i + 2);
      tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
      i += 3;
    }
  }

  return tmp_arr.join('');
}


function adcoment(id){
	var texto=$('textarea#coment').val();//jQuery
	
	$.ajax({
		type: "POST",
		url: "submeter_comentario.php",
		data: {text: texto, id: id},
		success: function(json){
			antigo = $('#coments').html();
			novo_html = '<p>'+json.data+'<br>Por: '+utf8_decode(json.autor)+'<br>'+utf8_decode(json.coment)+'</p>';
			$('#coments').html(novo_html+antigo);			
            //$('#coments .p').hide().slideDown('slow');
			$('textarea#coment').val('');
			}
		});

};
/*
function digitvalidation(entered, min, alertbox, datatype)
{
	with (entered)
	{
		checkvalue=parseFloat(value);
		if (datatype)
		{
			smalldatatype=datatype.toLowerCase();
			if (smalldatatype.charAt(0)=="i") 
			{
				checkvalue=parseInt(value); if (value.indexOf(".")!=-1) {checkvalue=checkvalue+1}};
			}
			if ((parseFloat(min)==min && value.length<min) || value!=checkvalue)
			{
				if (alertbox!="")
				{
					alert(alertbox);
				}
				return false;
			}
		else
		{
			return true;
		}
	}
};

*/