var hostname = $(location).attr('origin') + "/ompharmacy/administrator/"; //Localpath

function prescriptionFeedback(id,userId){
   $('.feedback').fadeIn('slow');
   $('#prescriptionId').val(id);
   $('#userId').val(userId);
}

$('.closebtn').on('click', function () {
    $('.feedback').fadeOut('slow');
});

$('#prescriptionForm').submit(function(e){
	e.preventDefault();
	var note = $('#note').val();
	if(note == ''){
		$('#note').css({"background":"rgba(229, 50, 45, 0.05)","border":"1px solid rgb(229, 50, 45)"});
		$('#note').focus();
	}else{
		$.ajax({
			url: hostname + "feedback",
			type: "POST",
			data:  $("#prescriptionForm").serialize(),
			dataType: 'json',
			beforeSend: function () {
				$("#feedbackSubmit").html('Please Wait...');
			},
			success: function(data) {
			  if (data.response == "success") {
			  		$("#prescriptionForm").before("<p class='succ-msg'>"+data.msg+"</p>");
					$("#feedbackSubmit").html('Submit');
					$("#note").val('');
					setTimeout(function() { location.reload(); }, 1000);
				}else{
					$("#prescriptionForm").before("<p>"+data.msg+"</p>");
					$("#feedbackSubmit").html('Submit');
				}
			}
		});
	}
});

/************************************************/

function adminTransfer(id,userId,transfer_id){
   $('.adminTransfer').fadeIn('slow');
   $('#transaction_id').val(id);
   $('#userId').val(userId);
   $('#transfer_id').val(transfer_id);
}

$('.closebtn').on('click', function () {
    $('.adminTransfer').fadeOut('slow');
    $('.transferDetails').fadeOut('slow');
});

$('#admintransfer').submit(function(e){
	e.preventDefault();
	var note = $('#note').val();
	if(note == ''){
		$('#note').css({"background":"rgba(229, 50, 45, 0.05)","border":"1px solid rgb(229, 50, 45)"});
		$('#note').focus();
	}else{
		$.ajax({
			url: hostname + "adminTransfer",
			type: "POST",
			data:  $("#admintransfer").serialize(),
			dataType: 'json',
			beforeSend: function () {
				$("#adminTransferSubmit").html('Please Wait...');
			},
			success: function(data) {
			  if (data.response == "success") {
			  		$("#admintransfer").before("<p class='succ-msg'>"+data.msg+"</p>");
					$("#adminTransferSubmit").html('Submit');
					$("#note").val('');
					setTimeout(function() { location.reload(); }, 1000);
				}else{
					$("#admintransfer").before("<p>"+data.msg+"</p>");
					$("#adminTransferSubmit").html('Submit');
				}
			}
		});
	}
});

function transferDetails(id,userId){
	$('.transferDetails').fadeIn('slow');
	if(id != '' && userId != ''){
		$.ajax({
			url: hostname + "transferDetails",
			type: "POST",
			data: {id:id,userId:userId},
			dataType: 'json',
			success: function(data){
				//console.log(data); return false;
				if(data.response == "success"){
					$("#trandferDetail").html(data.msg.transaction_id);
				}else{
					alert("Something want wrong!");
				}
			}
		});
	}else{
		alert('Something want wrong!');
	}
}