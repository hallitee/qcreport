/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('#side-menu').metisMenu();
});

 $(document).ready(function(){	
 i = 1;
 change = 0;
 console.log(" qc ready");
 //	$("#finished").hide();
 /*$('#sfgType').on('change', function(e){
if($(this).val()=='FINISHED PRODUCT'){
	$("#finished").removeClass("col-md-6 col-lg-6").addClass("col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2").show();
	$("#fpsubmit").show();
	$("#inprocess").hide();
}
else if($(this).val()=='ALL'){
	$("#finished").removeClass("col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2").addClass("col-md-6 col-lg-6").show();
	$("#inprocess").removeClass("col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2").addClass("col-md-6 col-lg-6").show();
	$("#fpsubmit").hide();
}
else{
	
	$("#finished").removeClass("col-md-6 col-lg-6").hide();
	$("#fpsubmit").hide();
	$("#inprocess").removeClass("col-md-6 col-lg-6").addClass("col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2").show();
}
}); */
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
$("#add_rowe").click(function(){

	if($("#tbody tr").length>1 && change<1){
		i = $("#tbody tr").length;
		console.log(" i now "+i);
		change=10;
	}
	
	$('#tbody').append('<tr id="addr'+(i)+'"></tr>');  
      $('#addr'+i).html("<td class='text-center'>"+(i+1)+"</td><td><input type='text' name='items["+i+"][prop]'  placeholder='' class='form-control' required>	</td><td><input  type='text' name='items["+i+"][unit]' placeholder='' class='form-control' required></td><td><input type='text' name='items["+i+"][method]' placeholder='' class='form-control' required></td><td><select type='text' name='items["+i+"][type]' placeholder='' class='form-control'><option value='FIXED'>FIXED</option><option value='RANGE'>RANGE</option></select></td><td><input type='text' name='items["+i+"][target]' placeholder='' class='form-control' required></td><td><input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='0' max='10000' name='items["+i+"][min]' placeholder='' class='form-control' required></td><td>		<input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='0' max='10000' name='items["+i+"][max]' placeholder='' class='form-control'  required></td><td><input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items["+i+"][tol]' placeholder='' class='form-control'/></td>");


    i++; 
	$('#row_value').val(i);
	var g = $('#row_value').val();

	console.log(g);
  });
$("#add_row").click(function(){

      $('#addr'+i).html("<td class='text-center'>"+(i+1)+"</td><td><input type='text' name='items["+i+"][prop]'  placeholder='' class='form-control' required>	</td><td><input  type='text' name='items["+i+"][unit]' placeholder='' class='form-control' required></td><td><input type='text' name='items["+i+"][method]' placeholder='' class='form-control' required></td><td><select type='text' name='items["+i+"][type]' placeholder='' class='form-control'><option value='FIXED'>FIXED</option><option value='RANGE'>RANGE</option></select></td><td><input type='text' name='items["+i+"][target]' placeholder='' class='form-control' required></td><td><input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='0' max='10000' name='items["+i+"][min]' placeholder='' class='form-control' required></td><td>		<input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='0' max='10000' name='items["+i+"][max]' placeholder='' class='form-control'  required></td><td><input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items["+i+"][tol]' placeholder='' class='form-control'/></td>");

	$('#tbody').append('<tr id="addr'+(i+1)+'"></tr>');      i++; 
	$('#row_value').val(i);
	var g = $('#row_value').val();

	console.log(g);
  });
  $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

 $("body").on('change', '#procs', function(){
	proc = $(this).val();
	console.log(proc);
			$.ajax({
					type: 'GET',
					url: "/spec/create",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"proc":proc,
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
					console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log("success "+ data);
					CList=$("#prods");				
					//var datas = JSON.parse(data);
					CList.empty();
					$.each(data, function(i, list){
					   console.log(list.itemname);
						CList.append(new Option(list.itemname, list.itemname));
					}); 

					}
				});
	console.log($(this).val());
	if(proc=='FG'){$("#fgForm").show(); $("#sfgForm").hide(); }
	else{$("#sfgForm").show(); $("#fgForm").hide(); }
 }); 

 });
//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});
