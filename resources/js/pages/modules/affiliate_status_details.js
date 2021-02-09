$(function () {
	var key_indicators_status = $('#key_indicators_status').val();

	if(key_indicators_status == '1'){

		$('#key_indicators_save_btn').prop('disabled', true);
		$('.key_indicators_approve_btn').prop('disabled', true);
		document.getElementById("fieldset_disable").disabled = true;
	}else{
		document.getElementById("fieldset_disable").disabled = false;
	}

	if($('.chatBoxinn').length){
	$('.chatBoxinn').scrollTop($('.chatBoxinn')[0].scrollHeight);
	}
	var toastConfig = {
		timeout: 5000,
		position: 'top',
		actionText: 'OK',
		message: ''
	};

	initCommentBox();

	initStatusSelectBoxes();

	initReUploadDocuments();

	//----Filter result using month, quarter and year
	var $btnYear = $('#btn-year-pick');
	var $btnMonth = $('#btn-month-pick');
	openTab($("#input-interval").val());

	$('#yearpicker').datetimepicker({
		widgetParent: $btnYear,
		format: 'YYYY',
		viewMode: 'years',
		icons: {
			previous: 'i i-keyboard_arrow_left',
			next: 'i i-keyboard_arrow_right',
		},
		widgetPositioning: {
			horizontal: 'right'
		}
	}).on('dp.hide', function (e) {
		$('#yearpicker').val(e.date.format('YYYY'));
	});

	$('#monthpicker').datetimepicker({
		widgetParent: $btnMonth,
		format: 'M',
		viewMode: 'months',
		icons: {
			previous: 'i i-keyboard_arrow_left',
			next: 'i i-keyboard_arrow_right',
		},
		widgetPositioning: {
			horizontal: 'right'
		}
	}).on('dp.hide', function (e) {
		$('#monthpicker').val(e.date.format('M'));
	});

	$btnYear.click(function () {
		$('#yearpicker').data('DateTimePicker').toggle();
	});

	$btnMonth.click(function () {
		$('#monthpicker').data('DateTimePicker').toggle();
	});

	$('#btn-filter-date').on('click', function (e) {
		e.preventDefault();
		$('#filter-date').submit();
	});

	$('.yearpick').datetimepicker({
		format: 'YYYY',
		icons: {
			previous: 'i i-keyboard_arrow_left',
			next: 'i i-keyboard_arrow_right',
		}
	});
	//------End filter

	$("#quarter-dropdown button.dropdown-item").on('click', function(){
		$("#quarter-dropdown button.dropdown-item").removeClass('active');
		$(this).addClass('active');
		$("#quarterpicker").val($(this).data('quarter'));
	});


	//----- Update compliance status of an affiliate
	$('.update-status .btn-lbl').on('click', function () {
		$(this).siblings('a.btn-primary').removeClass('btn-primary');
		$(this).toggleClass('btn-primary');

		var updateButton = $(this).siblings('button');
		var compliance = $(updateButton).data('compliance');
		if ($(updateButton).siblings('a.btn-primary').length == 1 && $(this).data('status') != compliance)
			$(updateButton).removeAttr('disabled');
		else{
			$(updateButton).siblings('[data-status="'+compliance+'"]').addClass('btn-primary');
			$(updateButton).attr('disabled', 'disabled');
		}
	});

	$('.status-update-btn').on('click', function () {
		var statusBtn = $(this);
		var selectedStatusElement = statusBtn.siblings('a.btn-primary');
		if (selectedStatusElement.length == 1) {
			var inputData = {
				interval: $(this).data('interval'),
				affiliate_id: $(this).data('affiliate'),
				month: $('#monthpicker').val(),
				quarter: $('#quarterpicker').val(),
				year: $('#yearpicker').val(),
				status: $(selectedStatusElement).data('status')
			}
			$.ajax({
				type: 'POST',
				url: base_url + 'module/affiliate/compliance/update',
				data: inputData,
				dataType: 'json'
			}).done(function (data) {
				if (data.success) {
					$(selectedStatusElement).removeClass('btn-primary');
					statusBtn.attr('disabled', 'disabled');
				}
				toastConfig.message = data.message;
				$('#snackbar').NitroToast(toastConfig);
			});
		} else {
			toastConfig.message = "Please select a status";
			$('#snackbar').NitroToast(toastConfig);
		}
	});
	//---End compliance status updation

	//---Show re-upload form
	function initReUploadDocuments(){
		$('a.reupload').on('click', function(e){
			e.preventDefault();
			var id = $(this).data('document');
			var interval = $(this).data('interval');
			$("#doc-status-" + id).toggleClass("d-none");
			$("#chat-box-" + id).toggleClass("d-none");
			var segment = $("#" + interval + "-segment-" + id);
			$(segment).next('button').toggleClass('d-none');
			$(segment).toggleClass('d-none');

		});
	}
	//---End re-upload form

	//---Document upload using Dropzone JS
	$("form.dropzone").each(function () {
		var formElement = $(this);
		formElement.dropzone({
			autoProcessQueue: false,
			url: base_url + 'module/affiliate/document/upload',
			paramName: "document",
			acceptedFiles: formElement.data('doctype'),
			maxFiles: 1,
			init: function () {

				var myDropzone = this;
				var elemId = formElement.data('document');
				// Update selector to match your button
				$("#btn-upload-" + elemId).click(function (e) {
					e.preventDefault();
					if ($("#form-upload-" + elemId).valid())
						myDropzone.processQueue();
				});

				$("#btn-upload-self-assessment-doc").click(function (e) {
					e.preventDefault();
					var check = true;
					if($('#assessment_from_year').val() == ""){ 
						$('#assessment_from_year').parent('.yearPick').addClass("invalid-input"); 
						
					} else {
						$('#assessment_from_year').parent('.yearPick').removeClass("invalid-input"); 
					}
					if($('#assessment_end_year').val() == ""){ 
						$('#assessment_end_year').parent('.yearPick').addClass("invalid-input");
						check = false;
					} else {
						$('#assessment_end_year').parent('.yearPick').removeClass("invalid-input"); 
					}
					if($('#assessment_document_name').val() == ""){ 
						$('#assessment_document_name').addClass("invalid-input");
						check = false;
					} else {
						$('#assessment_document_name').removeClass("invalid-input"); 
					}
					if(check)
						myDropzone.processQueue();
				});

				this.on("addedfile", function (file) {
					$('#collapse' + elemId).collapse('show');
				});

				this.on("removedfile", function (file) {
					$('#collapse' + elemId).collapse('hide');
				});

				this.on('sending', function (file, xhr, formData) {
					// Append all form inputs to the formData Dropzone will POST
					if(elemId == "self-assessment"){ 
						//Append data for Self Assessment Document
						formData.append("assessment_start_year", $('#assessment_from_year').val());
						formData.append("assessment_end_year", $('#assessment_end_year').val());
						formData.append("document_name", $('#assessment_document_name').val());
						formData.append("affiliate_id", formElement.data('affiliate'));
						formData.append("interval", elemId);
					} else {
						//Append data for all other Documents
						var data = $('#form-upload-' + elemId).serializeArray();
						$.each(data, function (key, el) {
							formData.append(el.name, el.value);
						});					
					}
				});

				this.on("success", function (file, data) {
					var response = JSON.parse(data);
					if (!response.success) {
						file.status = Dropzone.QUEUED;
					} else {
						myDropzone.removeFile(file);

						var interval = response.upload_data.interval;

						if(interval != "self-assessment"){ 
							$('#collapse' + elemId).collapse('hide');
							var segment = $("#" + interval + "-segment-" + elemId);
							$(segment).next('button').toggleClass('d-none');
							$(segment).toggleClass('d-none');

							if (interval == "month" || interval == "quarter" || interval == "year") {
								$('#submitted-' + elemId).html('<span class="sub">' + moment().format("MM/DD/YYYY") + '</span>');
								var docName = $('#document-name-' + elemId + ' span').html();
								$('#document-name-' + elemId).html('<a href="' + base_url + response.upload_data.full_path + '" class="float-left"><span class="sub text-primary link">' + docName + '</span></a> <a href="#" data-document="'+elemId+'" data-interval="'+interval+'" class="reupload"><span class="sub"><i class="i i-create"></i></span></a>');
								
								if($("#doc-status-" + elemId).length){
									$("#doc-status-" + elemId).toggleClass("d-none");
									$("#chat-box-" + elemId).toggleClass("d-none");
									var chatBox = $("#chat-box-" + elemId).find(".chatBoxinn");
									$(chatBox).append(Mustache.render($("#template-comment").html(), {
										"comment": response.comment,
										"avatar": function () {
											return this.city.charAt(0) + this.state.charAt(0);
										},
										"commentTime": function () {
											return moment().format("Do MMM YYYY | HH:mm");
										}
									}));
								} else {
									console.log(response);
									$("#" + interval + "-row-" + elemId).append(Mustache.render($("#template-submitted").html(), { 
										document: response.upload_data,
										"comment": response.comment,
										"avatar": function () {
											return this.city.charAt(0) + this.state.charAt(0);
										},
										"commentTime": function () {
											return moment().format("Do MMM YYYY | HH:mm");
										}
									}));

									//Re-initialize comment box
									initCommentBox();
									//Re-initialize status select box
									initStatusSelectBoxes();
								}

								initReUploadDocuments();
								
								if($("#" + interval + "-row-" + elemId + ' select.selG').length){
									$("#" + interval + "-row-" + elemId + ' select.selG').val(5);
								} else {
									$("#doc-status-" + elemId).html('<span class="sub"><a href="javascript:(0)" class="btn btn-lbl" data-rel="tooltip" data-placement="bottom" title="Review Pending"><i class="i i-review-pending r-pending"></i> </a></span>');
								}
								$('[data-rel="tooltip"]').tooltip();

							} else {
								$("#name-row-" + elemId).removeClass("col-md-8").addClass("col-md-6");
								$("#" + interval + "-row-" + elemId).append(Mustache.render($("#template-performance").html(), {
									document: response.upload_data,
									"documentPath": function () {
										return base_url + response.upload_data.full_path;
									},
									"submittedTime": function () {
										return moment().format("MM/DD/YYYY");
									}
								}));
								$('.yearpick').datetimepicker({
									format: 'YYYY',
									icons: {
										previous: 'i i-keyboard_arrow_left',
										next: 'i i-keyboard_arrow_right',
									}
								});
							}
						}else{
							var key = 1;
							$("#self-assessment-list").html(Mustache.render($("#template-self-assessment").html(), {
								documents: response.upload_data.self_assessment_documents,
								"key": function(){
									return key++;
								},
								"documentPath": function () {
									return base_url + this.document_path;
								},
								"createdDate": function () {
									return moment(this.created_date).format("MM/DD/YYYY");
								}
							}));

							$('#assessment_from_year').val('');
							$('#assessment_end_year').val('');
							$('#assessment_document_name').val('');
						}
					}

					toastConfig.message = response.message;
					$('#snackbar').NitroToast(toastConfig);
				});

				this.on("error", function (file, errorMessage, xhr) {
					myDropzone.removeFile(file);
					alert(errorMessage);
				});
			}
		});
	});
	//---- End of Document upload

	//---- Form validation for metadata inputs
	$('form.form-metadata').each(function () {
		$(this).validate({
			errorElement: "div",
			errorPlacement: function (error, element) {
				error.insertAfter(element.parent()).addClass('invalid-feedback');
				$(element).addClass('is-invalid');
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid').removeClass(validClass);
				//$(element).next().addClass('invalid-feedback').removeClass(validClass);
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid').addClass(validClass);
				//$(element).next().removeClass('invalid-feedback').addClass(validClass);
			}
		});
	});
	//---End form validation


	//---Search performance documents by year
	$('.input-search-year').on("blur", function () {
		var inputElem = $(this);
		var inputData = {
			affiliate_id: inputElem.data('affiliate'),
			document_id: inputElem.data('document'),
			interval: inputElem.data('interval'),
			year: inputElem.val()
		}

		$.ajax({
			type: 'POST',
			url: base_url + 'module/affiliate/filter-performance-documents',
			data: inputData,
			dataType: 'json'
		}).done(function (data) {
			var parentElem = inputElem.closest('.intab');
			parentElem.find('span.year-lbl').html(inputData.year);
			parentElem.children('.row').remove();
			parentElem.append(Mustache.render($("#template-performance-filter").html(), { 
				documents: data,
				"documentPath": function () {
					return base_url + this.filepath;
				},
				"submittedTime": function () {
					return moment(this.submitted).format("MM/DD/YYYY");
				}
			}));
		});

	});
	//---End of Search by year

	//Key indicators search form submit
	$("#form-search-key-indicators").submit(function (e) {
		e.preventDefault();
		var form = $(this);
		$("#form-key-indicators").find("input[type=text]").val("");
		var inputData = {
			affiliate_id: form.data('affiliate'),
			quarter: $("#key-quarter").val(),
			year: $("#key-year").val()
		}

		$.ajax({
			type: 'POST',
			url: base_url + 'module/affiliate/key-indicators/search',
			data: inputData,
			dataType: 'json'
		}).done(function (data) {
			if (data != null) {
				$.each(data.key_indicators, function (key, value) {
				
					if(data.status == '1'){
						$('.key_indicators_approve_btn').val('Approved');
						$(".key_indicators_approve_btn").addClass("btn btn-success");
						$('.key_indicators_approve_btn').prop('disabled', true);
						$('#key_indicators_save_btn').prop('disabled', true);
						document.getElementById("fieldset_disable").disabled = true;
					}else{
						$('.key_indicators_approve_btn').val('Approve');
						$(".key_indicators_approve_btn").removeClass("btn btn-success");
						$(".key_indicators_approve_btn").addClass("btn btn-primary");
						$('.key_indicators_approve_btn').removeAttr('disabled');
						$('#key_indicators_save_btn').removeAttr('disabled');
						document.getElementById("fieldset_disable").disabled = false;
					}

					if(key=='liquidity' && value){
						$("#form-key-indicators-approve").addClass("d-block");
					}
					$("input[name='" + key + "']").val(value);
				});
				if (data.key_indicators.is_net_assets_positive != null) {
					$("#pu-dx").attr("checked", "checked");
					$("#pu-dx").parent("label").addClass("checked");
				} else {
					$("#pu-dx").removeAttr("checked");
					$("#pu-dx").parent("label").removeClass("checked");
				}
			} else {
				$('.key_indicators_approve_btn').val('Approve');
				$(".key_indicators_approve_btn").removeClass("btn btn-success");
				$(".key_indicators_approve_btn").addClass("btn btn-primary");
				$('.key_indicators_approve_btn').removeAttr('disabled');
				$('#key_indicators_save_btn').removeAttr('disabled');
				document.getElementById("fieldset_disable").disabled = false;
				$("#form-key-indicators-approve").removeClass("d-block");
				$("#form-key-indicators-approve").addClass(" d-none");
				$("#pu-dx").removeAttr("checked");
				$("#pu-dx").parent("label").removeClass("checked");
			}
		});
	});

	//End of search

	//Key indicators form submit
	$("#form-key-indicators").submit(function (e) {
		e.preventDefault();
		var form = $(this);
		var formValues = form.serializeArray();
		var values = {}
		$.each(formValues, function (key, el) {
			values[el.name] = el.value;
		});
		var inputData = {
			affiliate_id: form.data('affiliate'),
			quarter: $("#key-quarter").val(),
			year: $("#key-year").val(),
			indicators: JSON.stringify(values)
		}

		$.ajax({
			type: 'POST',
			url: base_url + 'module/affiliate/key-indicators/save',
			data: inputData,
			dataType: 'json'
		}).done(function (data) {
			toastConfig.message = data.message;
			setTimeout(function () {
				$('#snackbar').NitroToast(toastConfig);
			}, 2000);
		});
	});

	//End of form submit

		//Key indicators form approve
		$("#form-key-indicators-approve").click( function() {
	
		
			var inputData = {
				affiliate_id: $('#affiliate_id_val').val(),
				quarter: $("#key-quarter").val(),
				year: $("#key-year").val(),
				status: 1,			
			}
	
			$.ajax({
				type: 'POST',
				url: base_url + 'module/affiliate/key-indicators/approve',
				data: inputData,
				dataType: 'json'
			}).done(function (data) {
				toastConfig.message = data.message;
				document.getElementById("fieldset_disable").disabled = true;
				$('.key_indicators_approve_btn').val('Approved');
				$(".key_indicators_approve_btn").addClass("btn btn-success");
				$('.key_indicators_approve_btn').prop('disabled', true);
				$('#key_indicators_save_btn').prop('disabled', true);
				setTimeout(function () {
					$('#snackbar').NitroToast(toastConfig);
				}, 2000);
			});
		});
	
		//End of form approve

	//Initialize comment box for the document
	function initCommentBox() {
		$(".search a").click(function () {
			$(this).parent(".search").toggleClass("collapsed");
			$(this).parent().siblings('label').fadeToggle();
		});

		$('.input-comment').keydown(function (e) {
			var inputElem = $(this);
			if (e.keyCode == 13 && inputElem.val() != "") {
				var inputData = {
					document_id: inputElem.data('document'),
					document_type_id: inputElem.data('doctype'),
					affiliate_id: inputElem.data('affiliate'),
					notification: inputElem.val()
				}

				$.ajax({
					type: 'POST',
					url: base_url + 'module/affiliate/document/add-comment',
					data: inputData,
					dataType: 'json'
				}).done(function (data) {
					if (data.success) {
						inputElem.val("");
						var chatBox = inputElem.parent().parent().children(".chatBoxinn");
						$(chatBox).append(Mustache.render($("#template-comment").html(), {
							"comment": data.comment,
							"avatar": function () {
								return this.city.charAt(0) + this.state.charAt(0);
							},
							"commentTime": function () {
								return moment().format("Do MMM YYYY | HH:mm");
							}
						}));
					} else {
						toastConfig.message = data.message;
						setTimeout(function () {
							$('#snackbar').NitroToast(toastConfig);
						}, 2000);
					}
				});
			}
		});
	}

	//initialize Select boxes for updating the status
	function initStatusSelectBoxes() {
		var previousValue;
		$('.selG').on('focus', function () {
			previousValue = $(this).val();
		}).on('change', function () {
			var input = $(this);
			var inputData = {
				interval: input.data('interval'),
				document_id: input.data('documentid'),
				document_type_id: input.data('doctype'),
				affiliate_id: input.data('affiliate'),
				status: input.val()
			}

			$('#dialog').NitroDialog({
				action: "open",
				backdrop: true,
				message: '<h4 class="bold m-b-15"><i class="i i-warning text-warning m-r-10"></i>Confirm</h4><p>Do you want to change the document status?</p>',
				buttons: [
					{
						label: 'Proceed',
						class: "btn btn-primary mr-1",
						action: function () {
							$('#dialog').NitroDialog({ action: "close" });
							$.ajax({
								type: 'POST',
								url: base_url + 'module/affiliate/document/update',
								data: inputData,
								dataType: 'json'
							}).done(function (data) {
								toastConfig.message = data.message;
								setTimeout(function () {
									$('#snackbar').NitroToast(toastConfig);
								}, 2000);
							});
						}
					},
					{
						label: 'Cancel',
						class: "btn btn-secondary",
						action: function () {
							input.val(previousValue);
							$('#dialog').NitroDialog({ action: "close" });
						}
					}
				]
			});
		});
	}

	//Dropzone.autoDiscover = false;

	$("form.l_dZUpload").each(function () {
		var formElement = $(this);
		formElement.dropzone({	
			autoProcessQueue: false,
			url: base_url + 'module/affiliate/document/doupload',
			addRemoveLinks: true,
			init: function () {
				var myDropzone = this;
				$(".btn-upload-l").click(function (e) {
					e.preventDefault();
				
						myDropzone.processQueue();
				});
				this.on("addedfile", function (file) {
					$('.collapsedoc').collapse('show');
				});

			},
			success: function (file, response) {
				// myDropzone.removeFile(file);
				this.removeAllFiles(true);
				var toastConfig = {
					timeout: 1000,
					position: 'top',
					actionText: 'OK',
					message: ''
				};
				toastConfig.message = "Uploaded";
				setTimeout(function () {
					$('#snackbar').NitroToast(toastConfig);
				}, 1000);

				var resp = JSON.parse(response);

				var count = 1;
				$('#legal_loop').html(Mustache.render($("#template-legal").html(), {
					documents: resp,
					"count": function(){
						return count++;
					},
					"documentPath": function () {
						return base_url + this.quarterly_upload_file+this.quarterly_upload_file_name;
					},
					"comments": this.comments,
					"avatar": function () {
						return this.city.charAt(0) + this.state.charAt(0);
					},
					"commentTime": function () {
						return moment().format("Do MMM YYYY | HH:mm");
					}
				}));

				initCommentBox();

			},
			error: function (file, response) {
				file.previewElement.classList.add("dz-error");
			},
			sending: function(file, xhr, formData){
				//Append data for all other Documents
				var data = formElement.serializeArray();
				$.each(data, function (key, el) {
					formData.append(el.name, el.value);
				});
			}
		});
	});
	
	
	$("form.o_dZUpload").each(function () {
		var formElement = $(this);
		formElement.dropzone({
			autoProcessQueue: false,
			url: base_url + 'module/affiliate/document/doupload',
			addRemoveLinks: true,
			init: function () {
				var myDropzone = this;
				$(".btn-upload-o").click(function (e) {
					e.preventDefault();
				
						myDropzone.processQueue();
				});
				this.on("addedfile", function (file) {
					$('.collapsedoc').collapse('show');
				});

			},
			success: function (file, response) {
				// myDropzone.removeFile(file);
				this.removeAllFiles(true);
				var toastConfig = {
					timeout: 1000,
					position: 'top',
					actionText: 'OK',
					message: ''
				};
				toastConfig.message = "Uploaded";
				setTimeout(function () {
					$('#snackbar').NitroToast(toastConfig);
				}, 1000);

				var resp = JSON.parse(response);
				

				var docType = formElement.find('input[name="document_type"]').val();
				var notification = formElement.find('input[name="notification"]').val();

				if(docType == "other_compliance_document"){
					var containerElem = '#com_other_loop';
				} else {
					var containerElem = '#per_other_loop';
				}

				var count = 1;
				$(containerElem).html(Mustache.render($("#template-other").html(), {
					documents: resp,
					"count": function(){
						return count++;
					},
					"documentPath": function () {
						return base_url + this.other_upload_file+this.other_upload_file_name;
					},
					"documentType": function(){
						return docType;
					},
					"notifyMessage": function(){
						return notification;
					},
					"comments": this.comments,
					"avatar": function () {
						return this.city.charAt(0) + this.state.charAt(0);
					},
					"commentTime": function () {
						return moment().format("Do MMM YYYY | HH:mm");
					}
					
				}));
				
				initCommentBox();
			},
			error: function (file, response) {
				file.previewElement.classList.add("dz-error");
			},
			sending: function(file, xhr, formData){
				var data = formElement.serializeArray();
				$.each(data, function (key, el) {
					formData.append(el.name, el.value);
				});
			}
		});
	});
});

function reupload(type, docId){
	var elem = "#"+type+'-row-'+docId;
	$(elem).find('.chatBox').toggleClass("d-none");
	$(elem).find('.upload').toggleClass("d-none");
}
function openTab(val) {
	$('#tab-inner a[href="#' + val + '"]').tab('show');
	if(val == 'nav-y1'){
		$("#monthpicker").removeAttr('disabled');
		$("#btn-month-pick").removeClass('d-none').addClass('d-inline');
		$("#quarter-dropdown").removeClass('d-inline').addClass('d-none');
		$("#quarterpicker").attr('disabled', 'disabled');
		$("#yearpicker").attr('name', 'monthly_year');
	} else if(val == 'nav-y2'){
		$("#btn-month-pick").removeClass('d-inline').addClass('d-none');
		$("#monthpicker").attr('disabled', 'disabled');
		$("#quarterpicker").removeAttr('disabled');
		$("#quarter-dropdown").removeClass('d-none').addClass('d-inline');
		$("#yearpicker").attr('name', 'quarterly_year');
	} else {
		$("#btn-month-pick").removeClass('d-inline').addClass('d-none');
		$("#quarter-dropdown").removeClass('d-inline').addClass('d-none');
		$("#monthpicker").attr('disabled', 'disabled');
		$("#quarterpicker").attr('disabled', 'disabled');
		$("#yearpicker").attr('name', 'yearly_year');
	}
	$("#input-interval").val(val);
  }
