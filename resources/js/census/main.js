function showDivifYes() {

	if ($("input:radio[class='hide_fields']").is(":checked")) {
		var checked = $("input[name='field_do_you_offer_programs_of_t']:checked").val();
		var myDiv = document.querySelector(".clearfix");
		if (checked == 1) {
			$("#hide_div_if_no").show();
			$("#hide_div_div2").show();
			myDiv.style.display = "block";
		} else {
			//$("#hide_div_if_no").hide();
			$("#hide_div_div2").hide();
			myDiv.style.display = "none";
		}
	} else {
		//$("#hide_div_if_no").hide();
		$("#hide_div_div2").hide();
	}

}

var i = 1;

function addServicearea(buttonid) {

	//console.log("buttonid"+buttonid);
	buttonid ++ ;
	var html = [];
  html.push('<div class="tabilCard NulCard EmployeeCard m-t-20" id="row' + buttonid + '"><div class="table-responsive" id="table' + buttonid + '"><div class="messages error d-none" id="percent-error' + buttonid + '"> <i class="i i-warning"></i>&nbsp; &nbsp;Sum of composition percentage should be 100%.</div><table class="table"><thead><tr><th colspan="3">Service area</th></tr></thead><tbody><tr><th class="p-t-25">City/Country</th><td><input type="text" class="form-control w-280px" id="" name="new-' + buttonid +'-field_service_area_city_county"></td></tr><tr><th class="p-t-25">Population</th><td><input type="text" class="form-control w-200px" id="" name="new-' + buttonid +'-field_service_area_population"></td></tr><tr class="interTitle"><th>Race/Ethincity</th><th>Composition %</th></tr><tr><th class="p-t-25">White</th><td><div class="row align-items-center"><div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="" name="new-' + buttonid +'-field_service_area_white"> &nbsp;<span>%</span></div></div></td></tr><tr><th class="p-t-25">Hispanic/Latino</th><td><div class="row align-items-center"><div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="" name="new-' + buttonid +'-field_service_area_hispanic"> &nbsp;<span>%</span></div></div></td></tr><tr><th class="p-t-25">Asian American</th><td><div class="row align-items-center"><div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="" name="new-' + buttonid +'-field_service_area_asian_am"> &nbsp;<span>%</span></div></div></td></tr><tr><th class="p-t-25">Native American</th><td><div class="row align-items-center"><div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="" name="new-' + buttonid +'-field_service_area_native_am"> &nbsp;<span>%</span></div></div></td></tr><tr><th class="p-t-25">African American</th><td><div class="row align-items-center"><div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="" name="new-' + buttonid +'-field_service_area_african_am"> &nbsp;<span>%</span></div></div></td></tr><tr><th class="p-t-25">Others</th><td><div class="row align-items-center"><div class="d-flex justify-content-start align-items-center"><input type="text" class="form-control w-200px input-check-100" id="" name="new-' + buttonid +'-field_service_area_other"> &nbsp;<span>%</span></div></div></td></tr></tbody></table></div></div><button class="btn btn-danger m-r-15 btn-rounded btn_remove m-t-20" type="button" id="' + buttonid + '" >Remove</button>');
	$('#product').append(html);
	$(".servicearea").attr("id", buttonid);
}


  $(function() {
		$('.AmountEarnedforCalculate').on('input', function() {
		var total = calcwithcomma('.AmountEarnedforCalculate');
		var total_nine_field = calcwithcomma('.edit-field-revenue-input');
		grand_total = Number(total) + Number(total_nine_field);
		$('.otherTottal').val(total);
		$('.total_output').val(grand_total);
		});
  });

function addVenturetype(buttonid,venture_type) {
	var arrayLength = venture_type.length;
	var venture = [];
	venture.push('<option value="">None</option>');
	for (var i = 0; i < arrayLength; i++) {
		venture.push('<option value="'+ venture_type[i].id +'">'+ venture_type[i].name +'</option>');
	}

	
	$(function() {
		$('.AmountEarnedforCalculate').on('input', function() {
		var total = calcwithcomma('.AmountEarnedforCalculate');
		var total_nine_field = calcwithcomma('.edit-field-revenue-input');
		grand_total = Number(total) + Number(total_nine_field);
		$('.otherTottal').val(total);
		$('.total_output').val(grand_total);
		});
	});
	  
	  

	

	buttonid ++ ;
  var html='<div class="tabilCard NulCard EmployeeCard m-t-15" id="' + i + '"> <div class="table-responsive p-b-15"> <table class="table"> <thead> <tr> <th colspan="4">Venture type: Ventures </th> </tr></thead> <tbody> <tr> <th>Venture Type</th> <th>Amount Earned</th> <th>Amount Budgeted</th> </tr><tr> <td><select class="form-select w-200px select2" aria-label="Status" id="" name="new-'+buttonid+'-field_venture_type"> '+ venture.join('') + ' </select></td><td><div class="row align-items-center"><div class="col-1"><span>$</span></div><div class="col-11"><input type="text" class="AmountEarnedforCalculate form-control w-200px" id=""  name="new-' + buttonid +'-field_amount_earned"> </div></div></td><td><div class="row align-items-center"><div class="col-1"><span>$</span></div><div class="col-11"><input type="text" class="form-control w-200px" id="" name="new-' + buttonid +'-field_amount_budgeted"> </div></div></td></tr> </tbody> </table> <button class="btn btn-danger btn-rounded m-r-15 m-t-15 m-l-15 btn_remove" id="' + i + '">Remove</button> </div></div>';
	$('#venture_type').append(html);
	$(".venture").attr("id", buttonid);
  i++;
  $(".select2").select2({tags:true});
}
//  <input type="text" class="form-control w-200px" id="" placeholder="" name="new-' + buttonid +'-field_venture_type">

function addBusinesstype(buttonid,type_of_business) {
	var arrayLength = type_of_business.length;
	var output = [];
	output.push('<option value="">None</option>');
	for (var i = 0; i < arrayLength; i++) {
		output.push('<option value="'+ type_of_business[i].id +'">'+ type_of_business[i].name +'</option>');
	}
	buttonid++ ;
	var html = '<div class="tabilCard NulCard EmployeeCard m-t-15" id="row' + i + '"><div class="table-responsive"><p class="m-t-10">Business type:Entrepreneurship and Business Development</p><table class="table"><thead><tr><th colspan="3">Business Table </th></tr></thead><tbody><tr><th class="p-l-15">Business Type</th><th style="padding-left: 20px !important;">Sales</th><th style="padding-left: 40px !important;">Served</th></tr><tr><td><div class="inpgrp"><select class="form-select w-500px" aria-label="Status" id="" name="new-'+buttonid+'-service_buisiness">' + output.join('') + '></select></div></td><td><div class="row align-items-center"><div class="col-1"><span>$</span></div><div class="col-11"><input type="text" class="form-control w-200px entrepreneurship_prg_sale_total" id="" name="new-' + buttonid +'-service_sales" placeholder="0" onkeyup="entrepreneurship_prg_sale_total(this)"> </div></div></td><td><div class="inpgrp row align-items-center"><div class="col-1"><span></span></div><div class="col-11"><input type="text" class="form-control w-200px" id="" placeholder="0" name="new-' + buttonid +'-service_served"> </div></div></td></tr><tr><td><button class="btn btn-danger m-r-15 btn-rounded btn_remove" id="' + i + '">Remove</button></td></tr></tbody></table></div></div>';
	$('#business_type').append(html);
	$(".buisiness").attr("data-sourceid", buttonid);
	i++;
  }
 
  function entrepreneurship_prg_sale_total(e) {
	 var inputs = document.getElementsByClassName("entrepreneurship_prg_sale_total");
	 var total = 0;
	 for (var i = 0; i < inputs.length; i++) {
		 var value = inputs[i].value.replace(/,/g, '');
		 var parsedValue = parseFloat(value);
		 if (!isNaN(parsedValue)) {
		   total += parsedValue;
		 }
	   }
	 var totalField = document.getElementsByClassName("entrepreneurship_prg_sale_add_total")[0];
	 totalField.value = formatNumber(total);
   }
   setInterval(function() {
	 var element = document.querySelector('.entrepreneurship_prg_sale_total'); // Replace '.my-class' with your desired class name
	 if (!element) {
	   var totalField = document.getElementsByClassName("entrepreneurship_prg_sale_add_total")[0];
	   totalField.value = 0;
	 }
	 var inputs = document.getElementsByClassName("entrepreneurship_prg_sale_total");
	 var total = 0;
	 for (var i = 0; i < inputs.length; i++) {
		 var value = inputs[i].value.replace(/,/g, '');
		 var parsedValue = parseFloat(value);
		 if (!isNaN(parsedValue)) {
		   total += parsedValue;
		 }
	   }
	 var totalField = document.getElementsByClassName("entrepreneurship_prg_sale_add_total")[0];
	 totalField.value = formatNumber(total);
   }, 10);
 
   function formatNumber(number) {
	 return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   }
 

 function addFundingSource(get_funding_organizations='',get_funding_sectors='',get_funding_vehicles='',sourceid = '') {
	var fundingorganizationsLength = get_funding_organizations.length;
	var fundingsectorsLength = get_funding_sectors.length;
	var fundingvehiclesLength = get_funding_vehicles.length;
	var funding_orgs=[],funding_sectors=[],funding_vehicles = [];
	funding_orgs.push('<option value="">None</option>');
	funding_sectors.push('<option value="">None</option>');
	funding_vehicles.push('<option value="">None</option>');
	for (var i = 0; i < fundingorganizationsLength; i++) {
		funding_orgs.push('<option value="'+ get_funding_organizations[i].id +'">'+ get_funding_organizations[i].name +'</option>');
	}
	for (var i = 0; i < fundingsectorsLength; i++) {
		funding_sectors.push('<option value="'+ get_funding_sectors[i].id +'">'+ get_funding_sectors[i].name +'</option>');
	}
	for (var i = 0; i < fundingvehiclesLength; i++) {
		funding_vehicles.push('<option value="'+ get_funding_vehicles[i].id +'">'+ get_funding_vehicles[i].name +'</option>');
	}
  var html='<div class="tabilCard NulCard EmployeeCard m-t-15" id="' + i + '"><div class="table-responsive"><p class="m-t-10">Funding Source type: Funding Source</p><table class="table"><thead><tr><th colspan="4">Funding</th></tr></thead><tbody><tr><th>Organization Name</th><th>Sector</th><th>Funding Vehicle</th> <th>Amount Funded</th></tr><tr><td><select class="form-select w-200px select2" aria-label="Status" id="" name="new-'+sourceid+'-field_funding_organization_tid"> '+ funding_orgs.join('') + '</select></td><td> <select class="form-select w-200px" aria-label="Status" id="" name="new-'+sourceid+'-field_funding_sector_tid"> '+ funding_sectors.join('') + '</select></td><td> <select class="form-select w-200px" aria-label="Status" id="" name="new-'+sourceid+'-field_funding_vehicle_tid"> '+ funding_vehicles.join('') + ' </select></td><td> <div class="d-flex justify-content-center align-items-center"> <span>$</span> &nbsp;<input type="text" class="form-control" id="field_funding_amount_value" name="new-'+sourceid+'-field_funding_amount_value" placeholder=""> </div></td></tr><tr><td><button class="btn btn-danger m-r-15 btn-rounded btn_remove" id="' + i + '" type="button">Remove</button></td></tr></tbody></table></div></div>';
  $('#funding_source').append(html);

	sourceid++;
	$(".program_add_fund_source").attr("data-sourceid", sourceid);
	$(".select2").select2({tags:true});
}

 function addProgramServices(service_provider='', service_id='') {
	var arrayLength = service_provider.length;
	var service = [];
	service.push('<option value="">None</option>');
	for (var i = 0; i < arrayLength; i++) {
		service.push('<option value="'+ service_provider[i].id +'">'+ service_provider[i].name +'</option>');
	}
  var html = '<div class="tabilCard NulCard EmployeeCard m-t-15" id="' + i + '"><div class="table-responsive"><p class="m-t-10">Service Provided type: Program Services</p><table class="table"><thead><tr><th colspan="4">Funding</th></tr></thead><tbody><tr><th>Service Provided</th><th>People Served</th><th>Hours</th> <th>Dollars</th></tr><tr> <td> <select class="form-select w-200px" aria-label="Status" id="" name="newser-'+service_id+'-field_program_service_provided_tid"> '+ service.join('') + ' </select></td><td> <input type="text" class="form-control w-200px" id="" placeholder="" name="newser-'+service_id+'-field_program_service_served_value"></td><td> <input type="text" class="form-control w-200px" id="" placeholder="" name="newser-'+service_id+'-field_program_service_hours_value"></td><td> <div class="d-flex justify-content-center align-items-center"> <span>$</span> &nbsp;<input type="text" class="form-control" id="edit-field-revenue-investment" name="newser-'+service_id+'-field_program_service_dollars_value" placeholder=""> </div></td></tr><tr> <td><button class="btn btn-danger m-r-15 btn-rounded btn_remove" id="' + i + '">Remove</button></td></tr></tbody></table></div></div>';
  $('#program_services').append(html);
  i++;
	service_id++;
	$(".program_add_program_service").attr("data-serviceid", service_id);
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

function employee_calc(){

	var field_board_white_total =  parseInt($('#field_board_white_males').val().replace(',','')) + parseInt($('#field_board_white_females').val().replace(',',''));
	var field_board_hispanic_total =  parseInt($('#field_board_hispanic_males').val().replace(',','')) + parseInt($('#field_board_hispanic_females').val().replace(',',''));
	var field_board_asian_am_total =  parseInt($('#field_board_asian_am_males').val().replace(',','')) + parseInt($('#field_board_asian_am_females').val().replace(',',''));
	var field_board_native_am_total =  parseInt($('#field_board_native_am_males').val().replace(',','')) + parseInt($('#field_board_native_am_females').val().replace(',',''));
	var field_board_african_am_total =  parseInt($('#field_board_african_am_males').val().replace(',','')) + parseInt($('#field_board_african_am_females').val().replace(',',''));
	var field_board_other_total =  parseInt($('#field_board_other_males').val().replace(',','')) + parseInt($('#field_board_other_females').val().replace(',',''));

	$('#field_board_white_total').val(numberWithCommas(field_board_white_total));
	$('#field_board_hispanic_total').val(numberWithCommas(field_board_hispanic_total));
	$('#field_board_asian_am_total').val(numberWithCommas(field_board_asian_am_total));
	$('#field_board_native_am_total').val(numberWithCommas(field_board_native_am_total));
	$('#field_board_african_am_total').val(numberWithCommas(field_board_african_am_total));
	$('#field_board_other_total').val(numberWithCommas(field_board_other_total));

	field_board_member_grand_total=parseInt(field_board_white_total)+parseInt(field_board_hispanic_total) + parseInt(field_board_asian_am_total) + parseInt(field_board_native_am_total) + parseInt(field_board_african_am_total)+ parseInt(field_board_other_total);
	$('#field_board_member_grand_total').val(numberWithCommas(field_board_member_grand_total));

}

$(document).on('click', '.btn_remove', function() {
	
	var button_id = $(this).attr("id");
	$('#row' + button_id + '').remove();
	$('#' + button_id).remove();
	$('br', "#row" + button_id).remove();
	$("#row" + button_id).find('br').remove();
});

$(document).ready(function() {
	HideDescifNo();

	$('#btn-logout').on('click', function(e){

		e.preventDefault();
		$('#dialog').NitroDialog({
		  
			action: "open",
			backdrop: true,
			message: '<h4 class="bold m-b-15"><i class="i i-warning text-warning m-r-10"></i>Confirm</h4><p>Do you want to Sign out?</p>',
			buttons: [
				{
					label: 'Proceed',
					class: "btn btn-primary mr-1 m-r-20",
					action: function () {
			window.location = $('#btn-logout').attr('href');
			$('#dialog').NitroDialog({ action: "close" });
					}
				},
				{
					label: 'Cancel',
					class: "btn btn-secondary",
					action: function () {
						$('#dialog').NitroDialog({ action: "close" });
					}
				}
			]
		});
	});

});

//function to check if val is NaN or not
function isset(val){
	if(isNaN(val) && val != ''){
		return 0;
	}else{
		return val;
	}
}

function civic_voter_calc(btnid){
    var btn_value_data = $('#'+btnid.id).val();
    var btn_value= btn_value_data.replace(/,/g, '');
	if(isNaN(btn_value) ){
		$('#'+btnid.id).val(0);
	}
	var field_voter_white_total =  isset(parseInt(($('#field_voter_white_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_voter_white_female').val()).replace(/,/g, '')));
	var field_voter_hispanic_total =  isset(parseInt(($('#field_voter_hispanic_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_voter_hispanic_female').val()).replace(/,/g, '')));
	var field_voter_asian_am_total =  isset(parseInt(($('#field_voter_asian_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_voter_asian_am_female').val()).replace(/,/g, '')));
	var field_voter_native_am_total =  isset(parseInt(($('#field_voter_native_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_voter_native_am_female').val()).replace(/,/g, '')));
	var field_voter_african_am_total =  isset(parseInt(($('#field_voter_african_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_voter_african_am_female').val()).replace(/,/g, '')));
	var field_voter_other_total =  isset(parseInt(($('#field_voter_other_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_voter_other_female').val()).replace(/,/g, '')));

	field_voter_member_grand_total=parseInt(field_voter_white_total)+parseInt(field_voter_hispanic_total) + parseInt(field_voter_asian_am_total) + parseInt(field_voter_native_am_total) + parseInt(field_voter_african_am_total)+ parseInt(field_voter_other_total);
	$('#field_voter_societal_impact').val(field_voter_member_grand_total);

}

function civic_forum_calc(btnid){
	
    var btn_value_data = $('#'+btnid.id).val();
    var btn_value= btn_value_data.replace(/,/g, '');
	if(isNaN(btn_value) ){
		$('#'+btnid.id).val(0);
	}

	var field_forums_white_total =  isset(parseInt(($('#field_forums_white_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_forums_white_female').val()).replace(/,/g, '')));
	var field_forums_hispanic_total =  isset(parseInt(($('#field_forums_hispanic_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_forums_hispanic_female').val()).replace(/,/g, '')));
	var field_forums_asian_am_total =  isset(parseInt(($('#field_forums_asian_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_forums_asian_am_female').val()).replace(/,/g, '')));
	var field_forums_native_am_total =  isset(parseInt(($('#field_forums_native_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_forums_native_am_female').val()).replace(/,/g, '')));
	var field_forums_african_am_total =  isset(parseInt(($('#field_forums_african_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_forums_african_am_female').val()).replace(/,/g, '')));
	var field_forums_other_total =  isset(parseInt(($('#field_forums_other_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_forums_other_female').val()).replace(/,/g, '')));

	field_forums_member_grand_total=parseInt(field_forums_white_total)+parseInt(field_forums_hispanic_total) + parseInt(field_forums_asian_am_total) + parseInt(field_forums_native_am_total) + parseInt(field_forums_african_am_total)+ parseInt(field_forums_other_total);
	$('#field_forums_societal_impact').val(field_forums_member_grand_total);

}

function civic_crja_calc(btnid){

    var btn_value_data = $('#'+btnid.id).val();
    var btn_value= btn_value_data.replace(/,/g, '');
	if(isNaN(btn_value) ){
		$('#'+btnid.id).val(0);
	}

	var field_crja_white_total =  isset(parseInt(($('#field_crja_white_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_crja_white_female').val()).replace(/,/g, '')));
	var field_crja_hispanic_total =  isset(parseInt(($('#field_crja_hispanic_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_crja_hispanic_female').val()).replace(/,/g, '')));
	var field_crja_asian_am_total =  isset(parseInt(($('#field_crja_asian_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_crja_asian_am_female').val()).replace(/,/g, '')));
	var field_crja_native_am_total =  isset(parseInt(($('#field_crja_native_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_crja_native_am_female').val()).replace(/,/g, '')));
	var field_crja_african_am_total =  isset(parseInt(($('#field_crja_african_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_crja_african_am_female').val()).replace(/,/g, '')));
	var field_crja_other_total =  isset(parseInt(($('#field_crja_other_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_crja_other_female').val()).replace(/,/g, '')));

	field_crja_member_grand_total=parseInt(field_crja_white_total)+parseInt(field_crja_hispanic_total) + parseInt(field_crja_asian_am_total) + parseInt(field_crja_native_am_total) + parseInt(field_crja_african_am_total)+ parseInt(field_crja_other_total);
	$('#field_crja_societal_impact').val(field_crja_member_grand_total);

}

function civic_police_calc(btnid){

    var btn_value_data = $('#'+btnid.id).val();
    var btn_value= btn_value_data.replace(/,/g, '');
	if(isNaN(btn_value) ){
		$('#'+btnid.id).val(0);
	}

	var field_police_white_total =  isset(parseInt(($('#field_police_white_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_police_white_female').val()).replace(/,/g, '')));
	var field_police_hispanic_total =  isset(parseInt(($('#field_police_hispanic_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_police_hispanic_female').val()).replace(/,/g, '')));
	var field_police_asian_am_total =  isset(parseInt(($('#field_police_asian_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_police_asian_am_female').val()).replace(/,/g, '')));
	var field_police_native_am_total =  isset(parseInt(($('#field_police_native_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_police_native_am_female').val()).replace(/,/g, '')));
	var field_police_african_am_total =  isset(parseInt(($('#field_police_african_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_police_african_am_female').val()).replace(/,/g, '')));
	var field_police_other_total =  isset(parseInt(($('#field_police_other_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_police_other_female').val()).replace(/,/g, '')));

	field_police_member_grand_total=parseInt(field_police_white_total)+parseInt(field_police_hispanic_total) + parseInt(field_police_asian_am_total) + parseInt(field_police_native_am_total) + parseInt(field_police_african_am_total)+ parseInt(field_police_other_total);
	$('#field_police_societal_impact').val(field_police_member_grand_total);

}

function civic_advocacy_calc(btnid){

    var btn_value_data = $('#'+btnid.id).val();
    var btn_value= btn_value_data.replace(/,/g, '');
	if(isNaN(btn_value) ){
		$('#'+btnid.id).val(0);
	}

	var field_advocacy_white_total =  isset(parseInt(($('#field_advocacy_white_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_advocacy_white_female').val()).replace(/,/g, '')));
	var field_advocacy_hispanic_total =  isset(parseInt(($('#field_advocacy_hispanic_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_advocacy_hispanic_female').val()).replace(/,/g, '')));
	var field_advocacy_asian_am_total =  isset(parseInt(($('#field_advocacy_asian_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_advocacy_asian_am_female').val()).replace(/,/g, '')));
	var field_advocacy_native_am_total =  isset(parseInt(($('#field_advocacy_native_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_advocacy_native_am_female').val()).replace(/,/g, '')));
	var field_advocacy_african_am_total =  isset(parseInt(($('#field_advocacy_african_am_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_advocacy_african_am_female').val()).replace(/,/g, '')));
	var field_advocacy_other_total =  isset(parseInt(($('#field_advocacy_other_male').val()).replace(/,/g, ''))) + isset(parseInt(($('#field_advocacy_other_female').val()).replace(/,/g, '')));

	field_advocacy_member_grand_total=parseInt(field_advocacy_white_total)+parseInt(field_advocacy_hispanic_total) + parseInt(field_advocacy_asian_am_total) + parseInt(field_advocacy_native_am_total) + parseInt(field_advocacy_african_am_total)+ parseInt(field_advocacy_other_total);
	$('#field_advocacy_societal_impact').val(field_advocacy_member_grand_total);

}

// function delete_record(parent_census) {
	
// 	//var table_name = $(elem).attr("id");

// 	console.log(parent_census);
	
// 	$.ajax({
// 		type : 'POST', 
// 		url	 : base_url + 'module/forms_update/delete',
// 		data : {report_id: parent_census}, 
// 		dataType : 'json',
// 		success:function(data){
// 			console.log(data);
// 			if (data) {
// 				window.location.href = base_url + 'module/census_affiliate';
// 			} else {
// 				window.location.href = base_url + 'module/census_affiliate';
				
// 			}                
			
// 		}
// 	});


// };

$('#delete_button').on('click', function(e){
	e.preventDefault();
	var myButton = document.getElementById("delete_button");
	var table_name = myButton.getAttribute("data-table_name");
	var pkid = myButton.getAttribute("data-pk_id");
	var status = myButton.getAttribute("data-status_id");
	$('#dialog').NitroDialog({
		action: "open",
		backdrop: true,
		message: '<h4 class="bold m-b-15"><i class="i i-warning text-warning m-r-10"></i>Confirm</h4><p>Are you sure you want to delete this report? This action cannot be undone.</p>',
		buttons: [
			{
				label: 'Proceed',
				class: "btn btn-primary m-r-15",
				action: function () {
							$.ajax({
								type : 'POST', 
								url	 : base_url + 'module/forms_update/delete_tabwise',
								data : {report_id: $('#delete_button').val(), table: table_name, pk_id: pkid, status: status}, 
								dataType : 'json',
								success:function(data){
									if(table_name=='programs'){
										history.back(-2)
									}else{
										location.reload();
									}

									// if (data.data) {
									// 	window.location.href = base_url + 'module/census_affiliate';
									// } else {
										
										
									// }                
									
								}
							});
		$('#dialog').NitroDialog({ action: "close" });
				}
			},
			{
				label: 'Cancel',
				class: "btn btn-secondary",
				action: function () {
					$('#dialog').NitroDialog({ action: "close" });
				}
			}
		]
	});
});

function HideDivifNo() {

	/* if ($("input:radio[class='hide_fields']").is(":checked")) {
		var checked = $("input[name='field_program_nul_funded']:checked").val();
		if (checked == 1) {
			$("#hide_div_if_no").show();
		} else {
			$("#hide_div_if_no").hide();
		}
	} else {
		$("#hide_div_if_no").hide();
	} */
	$("#hide_div_if_no").show();

}


function HideDescifNo() {

	if ($("input:radio[class='hide_desc']").is(":checked")) {
		var checked = $("input[name='field_civic_engage_comp']:checked").val();
		if (checked == 1) {
			$("#hide_desc_if_no").show();
		} else {
			$("#hide_desc_if_no").hide();
		}
	} else {
		$("#hide_desc_if_no").hide();
	}

}

$('.editbtn').on('click', function(e){
	e.preventDefault();	
	$('.markbtn').addClass('hidemarkbtn');
	$('.markbtn').removeAttr('style');

});

$('#cancel').on('click', function(e){
	e.preventDefault();	
	$('.markbtn').removeClass('hidemarkbtn');
});

