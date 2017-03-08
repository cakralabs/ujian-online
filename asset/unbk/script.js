var qn=0;
var myArray = [];

function changesoal(no){
	akhir = $('#jumlah_soal').text();
	if (no==0) {
		
	} else 
	if (no==akhir) {
		$('#nomor span').html(no);
		$('.no').removeClass('active');
		$('.no.no-'+no).addClass('active');
		$('#next-soal').hide();
		$('#last-soal').show();
	} else
	{
		$('#nomor span').html(no);
		$('.no').removeClass('active');
		$('.no.no-'+no).addClass('active');
		$('#next-soal').show();
		$('#last-soal').hide();
	}
	
	$('.ragu-check').removeClass('glyphicon-check');
	$('.ragu-check').removeClass('glyphicon-unchecked');
	if ($('.no.active').hasClass('ragu-ragu')){
		$('.ragu-check').addClass('glyphicon-check');
	} else {
		$('.ragu-check').addClass('glyphicon-unchecked');
	}
	
}

function setIndividual_time(cqn){
	if(cqn==undefined || cqn == null ){
		var cqn='0';
	}
		  if(cqn=='0'){
		ind_time[qn]=parseInt(ind_time[qn])+parseInt(ctime);	
		 
		  }else{
			  
			ind_time[cqn]=parseInt(ind_time[cqn])+parseInt(ctime);	
		  
		  }
	
	ctime=0;
	  
	 document.getElementById('individual_time').value=ind_time.toString();
	 
	 var iid=document.getElementById('individual_time').value;
	 
	 	 
	var formData = {individual_time:iid};
	$.ajax({
		 type: "POST",
		 data : formData,
			url: base_url + "index.php/quiz/set_ind_time",
		success: function(data){
	 	console.log(data);
			},
		error: function(xhr,status,strErr){
			//alert(status);
			console.log(status);
			}	
		});
		
}

function save_time(){
	
	var formData = {temp_time:TotalSeconds};
	$.ajax({
		type:"POST",
		data:formData,
		url:base_url+"index.php/quiz/set_temp_time",
		success: function(data){
			console.log(data);
		},
		error: function(xhr,status,strErr){
			console.log(status);
		}
	});
}

$(document).ready(function(){

	$('.option').click(function(){
		$(this).closest('.options-group').find('.option').each(function(){
			$(this).removeClass('checked');
		})
		$(this).addClass('checked');
 		nomor = $('.soal.active').find('.nomor').text(); 		
		$('.no.no-'+nomor+' span').html($('#option-'+$(this).val()).html());
		$('.no.no-'+nomor).addClass('done');		
		var no = nomor-1;
		nomor = $(this).closest('.active').attr('id');
		nomor = nomor.replace('nomor-asli-','');
		ragu = $('.btn-warning.ragu span').hasClass('glyphicon-check');
		if (ragu) {
			ragu = 'YA';
		} else {
			ragu = 'TIDAK';
		}
		
		var soal = $('input[name="question_type[]"]').map(function(){ 
        	return this.value; 
		}).get();
		var jawab = $('input[name="answer['+no+'][]"]:checked').map(function(){ 
        	return this.value; 
		}).get();		
		
		myArray[no] = jawab;		
		$.post('../save_answer/',{
			// no : nomor,
			// option : $(this).text(),
			// ragu : ragu
			rid : $('#rid').val(),
			noq : $('#noq').val(),
			individual_time : $('#individual_time').val(),
			question_type : soal,
			answer : myArray,
		},function(s){
			//alert (s);
		})
	})
	
	$('.ragu').click(function(){
		a = $(this).find('.ragu-check');
		if (a.hasClass('glyphicon-unchecked')){
			a.removeClass('glyphicon-unchecked');
			a.addClass('glyphicon-check');
			nomor = $('.soal.active').find('.nomor').text();
			$('.no.no-'+nomor).addClass('ragu-ragu');
		} else {
			a.removeClass('glyphicon-check');
			a.addClass('glyphicon-unchecked');
			nomor = $('.soal.active').find('.nomor').text();
			$('.no.no-'+nomor).removeClass('ragu-ragu');
		}
		$('.soal.active .option.checked').click();
	})
	
	$('.no').click(function(){
		nomor = $(this).find('p').html();
		$('.soal').removeClass('active');
		$('.soal.nomor-'+nomor).addClass('active');
		changesoal(nomor);
	})
	
	$('#summary-button').click(function(){
		if ($(this).hasClass('show')){
			$('#summary').hide();
			$(this).css('right',0);
			$(this).find('button').html('<span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="position:relative; top:10px"></span> Daftar <br/>Soal');
			$(this).removeClass('show');
		} else {
			$('#summary').show();
			$(this).css('right',299);
			$(this).find('button').html('<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>');
			$(this).addClass('show');
		}
	})
	
	$('#next-soal').click(function(){
		$('.soal.active').next().addClass('active');
		$('.soal.active').eq(0).removeClass('active');
 		nomor = $('.soal.active').find('.nomor').text();
		changesoal (nomor);
	})
	$('#prev-soal').click(function(){
		$('.soal.active').prev().addClass('active');
		$('.soal.active').eq(1).removeClass('active');
 		nomor = $('.soal.active').find('.nomor').text();
		changesoal (nomor);
	})
	
	$('#summary-button').click();
	
})
