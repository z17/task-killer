$(document).ready(function(){
	console.log('hey');
	$( "#datepicker" ).datepicker();
	if ($('#datepicker').val() == '')
	{
	}
	else{
	    $.ajax({
                    url:     "/ajax", //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "JSON", //Тип данных
                    data: $(".ajax_form").serialize(), 
                    success: function(response) { //Если все нормально
						var sum = response;
						$("font span#sum").html(sum);
					},
					error: function(response) { //Если ошибка
					
					}
             });
        return false;
	});
});