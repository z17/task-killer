$(document).ready(function(){
	console.log('hey');
	$( "#datepicker" ).datepicker();
	if ($('#datepicker').val() == '')
	{
	}
	else{
	    $.ajax({
                    url:     "/ajax", //����� ������������ ��������
                    type:     "POST", //��� �������
                    dataType: "JSON", //��� ������
                    data: $(".ajax_form").serialize(), 
                    success: function(response) { //���� ��� ���������
						var sum = response;
						$("font span#sum").html(sum);
					},
					error: function(response) { //���� ������
					
					}
             });
        return false;
	});
});