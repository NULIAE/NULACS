<?php
$quarterArray = array(
	'1' => 'JAN '.$quarterly_year.' - '.'MAR '.$quarterly_year,
	'2' => 'APR '.$quarterly_year.' - '.'JUN '.$quarterly_year,
	'3' => 'JUL '.$quarterly_year.' - '.'SEP '.$quarterly_year,
	'4' => 'OCT '.$quarterly_year.' - '.'DEC '.$quarterly_year,
);
?>
<style>
#btn-year-pick .bootstrap-datetimepicker-widget, #btn-month-pick .bootstrap-datetimepicker-widget
{
	top:35px !important;
	right:0 !important;
}
/* #btn-month-pick .picker-switch, #btn-month-pick .prev, #btn-month-pick .next
{
  display: none !important;
} */
.yearPick i{
	z-index: 999;
}
.invalid-input
{
 border-color: red !important;
}
.btn-round-ib{
  background-color: #fff;
}
.btn-round-ib.active{
  box-shadow : 0 0 0px 0.2rem #a10707 !important;
}
</style>
<main class="user">
    <div class="container">
      	<div class="Wrapper">
			<div class="row justify-content-end date">
				<div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
			</div>

			<div class="document-mdata">
				<div class="mnHead">
					<h3><?php echo $affiliate['organization'].' - '.$affiliate['city'].', '.$affiliate['stateabbreviation']; ?></h3>
				</div>
			</div>

			<?php if ($this->session->flashdata('error') !== NULL){
				echo '<div class="alert alert-danger text-center p-2 m-3" role="alert">'.$this->session->flashdata('error').'</div>';
			} ?>

			<?php $tabSelected = isset($_GET["tab"]) ? $_GET["tab"] : 1; ?>
			<div class="mainTab mb-5">
				<nav>
					<div class="nav justify-content-center" id="nav-tab" role="tablist">
						<a class="nav-item nav-link <?php if($tabSelected==1) echo 'active'; ?>" id="nav-x1-tab" data-toggle="tab" href="#nav-x1" role="tab"
							aria-controls="nav-x1" aria-selected="<?= ($tabSelected==1) ? 'true' : 'false'; ?>">Compliance Documents</a>
						<a class="nav-item nav-link <?php if($tabSelected==2) echo 'active'; ?>" id="nav-x2-tab" data-toggle="tab" href="#nav-x2" role="tab"
							aria-controls="nav-x2" aria-selected="<?= ($tabSelected==2) ? 'true' : 'false'; ?>">Performance Assessment Documents</a>
						<a class="nav-item nav-link <?php if($tabSelected==3) echo 'active'; ?>" id="nav-x3-tab" data-toggle="tab" href="#nav-x3" role="tab"
							aria-controls="nav-x3" aria-selected="<?= ($tabSelected==3) ? 'true' : 'false'; ?>">Key Indicators</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade <?php if($tabSelected==1) echo 'show active'; ?>" id="nav-x1" role="tabpanel" aria-labelledby="nav-x1-tab">
						<nav>
							<div class="nav b-b-1 p-b-0" id="tab-inner" role="tablist">
								<a class="nav-item nav-link active" id="nav-y1-tab" data-toggle="tab" href="#nav-y1" role="tab"
									aria-controls="nav-y1" aria-selected="true" onclick="openTab('nav-y1')"><i class="i i-month-o"></i> Monthly</a>
								<a class="nav-item nav-link" id="nav-y2-tab" data-toggle="tab" href="#nav-y2" role="tab"
									aria-controls="nav-y2" aria-selected="false" onclick="openTab('nav-y2')"><i class="i i-quater"></i> Quarterly</a>
								<a class="nav-item nav-link" id="nav-y3-tab" data-toggle="tab" href="#nav-y3" role="tab"
									aria-controls="nav-y3" aria-selected="false" onclick="openTab('nav-y3')"><i class="i i-date-o"></i> Yearly</a>
								<a class="nav-item nav-link" id="nav-y4-tab" data-toggle="tab" href="#nav-y4" role="tab"
									aria-controls="nav-y4" aria-selected="false" onclick="openTab('nav-y4')"><i class="i i-legal"></i> Legal</a>
								<a class="nav-item nav-link" id="nav-y5-tab" data-toggle="tab" href="#nav-y5" role="tab"
									aria-controls="nav-y5" aria-selected="false" onclick="openTab('nav-y5')"><i class="i i-other"></i> Others</a>

								<div class="ml-auto" id="view-past-documents">
									<span>View past documents</span>
									<div class="btn btn-secondary  btn-rounded btn-action-sm position-relative d-inline" id="btn-year-pick" data-rel="tooltip" data-placement="top" title="Year"><i class="i i-date-o"></i></div>
									<div class="btn btn-secondary  btn-rounded btn-action-sm position-relative d-inline" id="btn-month-pick" data-rel="tooltip" data-placement="top" title="Month"><i class="i i-month-31"></i></div>
									<div id="quarter-dropdown" class="dropdown d-inline">
										<button class="btn btn-secondary btn-rounded dropdown-toggle ml-2" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-rel="tooltip" data-placement="top" title="Quarter">
											<i class="i i-month-31"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
											<button class="dropdown-item <?php if($quarter == 1) echo "active"; ?>" data-quarter="1">Q1</button>
											<button class="dropdown-item <?php if($quarter == 2) echo "active"; ?>" data-quarter="2">Q2</button>
											<button class="dropdown-item <?php if($quarter == 3) echo "active"; ?>" data-quarter="3">Q3</button>
											<button class="dropdown-item <?php if($quarter == 4) echo "active"; ?>" data-quarter="4">Q4</button>
										</div>
									</div>
									<?php $interval = isset($_GET['interval'])?$_GET['interval']:"nav-y1"; ?>
									<input type="hidden" id="tempyearpicker" name="tempyear" value="<?php echo ($interval == 'nav-y2') ? $quarterly_year : $yearly_year; ?>" />
									<input type="hidden" id="tempmonthpicker" name="tempmonth" value="<?php echo $month.'/'.$monthly_year; ?>" />
									<input type="hidden" id="tempquarterpicker" name="tempquarter" value="<?php echo $quarter; ?>" />
									<a href="javascript:;" class="btn btn-primary btn-rounded btn-action-sm" id="btn-filter-date" data-rel="tooltip" data-placement="top" title="Search"><i class="i i-search"></i><span class="sr-only">Filter</span></a>
									<form id="filter-date" class="d-none" action="<?php echo current_url(); ?>">
										<input type="hidden" id="input-interval" name="interval" value="<?php echo $interval; ?>" />
										<input type="hidden" id="monthyearpicker" name="monthly_year" value="<?php echo $monthly_year; ?>" />
										<input type="hidden" id="quarteryearpicker" name="quarterly_year" value="<?php echo $quarterly_year; ?>" />
										<input type="hidden" id="yearpicker" name="yearly_year" value="<?php echo $yearly_year; ?>" />
										<input type="hidden" id="monthpicker" name="month" value="<?php echo $month; ?>" />
										<input type="hidden" id="quarterpicker" name="quarter" value="<?php echo $quarter; ?>" />
									</form>
								</div>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent-nner">
							<div class="tab-pane fade show active" id="nav-y1" role="tabpanel" aria-labelledby="nav-y1-tab">

								<div class=" m-y-20">
									<?php $monthly_date = mktime(0, 0, 0, $month, 1, $monthly_year); ?>
									<?php $previous_date = explode("-", date("m-Y", strtotime("-1 months", $monthly_date))); ?>
									<?php $next_date = explode("-", date("m-Y", strtotime("+1 months", $monthly_date))); ?>
									<div class="h5 t-c f-bold">
										<a class="mr-3" href="<?php echo current_url().'?interval=nav-y1&month='.$previous_date[0].'&monthly_year='.$previous_date[1]; ?>" data-rel="tooltip" data-placement="top" title="Previous"><i class="i i-arrow_back"></i></a>
										MONTHLY (<?php echo strtoupper(date('M Y', $monthly_date)); ?>)
										<a class="ml-3" href="<?php echo current_url().'?interval=nav-y1&month='.$next_date[0].'&monthly_year='.$next_date[1]; ?>" data-rel="tooltip" data-placement="top" title="Next"><i class="i i-arrow_forward"></i></a>
										<!-- <div class="h6">Due Date: 01/31/2021</div> -->
									</div>
								</div>

								<div class="head">
									<div class="row">
									<div class="col-2"><span class="sub">NO</span></div>
									<div class="col-6"><span class="sub">DOCUMENT NAME</span></div>
									<div class="col-4"><span class="sub">SUBMITTED ON</span></div>
									<div class="col-5"><span class="sub">STATUS</span></div>
									<div class="col-7"><span class="sub">COMMENTS</span></div>

									</div>
								</div>

								<div class="cdnWrap ">
									<div class="accordion" id="accordionExample">
										<?php foreach($monthly_documents as $key => $document): ?>
											
											<?php $currentDoc = isset($monthly_status[$document['document_id']]) ? $monthly_status[$document['document_id']] : NULL; ?>
											<div class="card">
												<div class="card-header" id="heading<?php echo $key+1; ?>">
													<div class="mb-0">
														<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
															<div class="row  align-items-center" id="month-row-<?php echo $document['document_id']; ?>">
																<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
																<div class="col-14 col-md-6" id="document-name-<?php echo $document['document_id']; ?>">
																	<?php if(isset($currentDoc)) : ?>
																		<a href="<?php echo base_url($currentDoc['monthly_upload_file']); ?>" class="float-left" target="_blank"><span class="sub text-primary link"><?php echo $document['document_name']; ?></span></a> 
																		<a href="#" data-document="<?php echo $document['document_id']; ?>" data-interval="month" class="reupload float-left pl-1"><span class="sub"><i class="i i-create"></i></span></a> 
																		<?php if($currentDoc['monthly_compliance_status'] == 5): ?><a href="#" data-document="<?php echo $document['document_id']; ?>" data-interval="month" data-uploadid="<?php echo $currentDoc['monthly_document_id']; ?>" class="deletedoc float-left pl-1"><span class="sub pl-1"><i class="i i-delete"></i></span><?php endif; ?></a>
																	<?php else: ?>
																		<span class="sub"><?php echo $document['document_name']; ?></span>
																	<?php endif; ?>
																</div>
																<div class="col-7 col-md-4" id="submitted-<?php echo $document['document_id']; ?>"><span class="sub"><?php if(isset($currentDoc)) echo date('m/d/Y', strtotime($currentDoc['monthly_submitted_date'])); ?></span></div>
																<?php if(isset($currentDoc)): ?>
																	
																	<div class="col-24 col-md-5" id="doc-status-<?php echo $document['document_id']; ?>">
																		<span class="sub">
																			<?php if($this->session->role_id == 1): ?>
																				<select class="form-control selG" data-interval="month" data-documentid="<?php echo $currentDoc['monthly_document_id'] ?>" data-doctype="<?php echo $currentDoc['document_type_id'] ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>">
																					<?php foreach($document_status as $status): ?>
																						<option value="<?php echo $status['id']; ?>" <?php if($status['id']==$currentDoc['monthly_compliance_status']) echo "selected"; ?>><?php echo $status['name']; ?></option>
																					<?php endforeach; ?>
																				</select>
																			<?php else: ?>
																				<a href="javascript:(0)" class="btn btn-lbl" data-rel="tooltip" data-placement="bottom" title="<?php echo $currentDoc['status_name']; ?>"><?php echo $currentDoc['icon']; ?> </a>
																			<?php endif; ?>
																		</span>
																	</div>

																	<div class="col-24 col-md-7" id="chat-box-<?php echo $document['document_id']; ?>">

																		<div class="chatBox">
																			<div class="chatBoxinn">
																				<?php if(isset($currentDoc['comments'])): ?>
																					<?php foreach($currentDoc['comments'] as $comment): ?>
																					<div class="chatrow">
																						<span class="user <?php echo ($comment['created_by'] === $this->session->userdata('user_id')) ? 'send' : 'rec'; ?>"><?php echo strtoupper($comment['first_name'][0].$comment['last_name'][0]); ?></span>
																						<div class="chatline">
																							<div class="h6"><?php echo $comment['notification']; ?></div>
																							<span class="text-primary">
																								<?php echo $comment['first_name'].' '.$comment['last_name']; ?>
																							</span>
																							<span class="ml-auto text-secondary">
																							<?php echo date("jS M,Y | H:i", strtotime($comment['created'])); ?>
																							</span>
																						</div>
																					</div>
																					<?php endforeach; ?>
																				<?php endif; ?>
																			</div>

																			<div class="search collapsed">
																				<input type="text" class="input-comment" data-doctypecustom="monthly" id="month-comment-<?php echo $key+1; ?>" data-document="<?php echo $currentDoc['monthly_document_id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="<?php echo $currentDoc['document_type_id']; ?>"placeholder="Type here" />
																				<a class="btn btn-secondary btn-rounded btn-action-sm "><i
																				class="i i-chat-box"></i><span class="sr-only">Add</span></a>
																			</div>
																			<label class="mt-2 ml-3 small" for="month-comment-<?php echo $key+1; ?>" style="display:none;">Hit 'Enter' to send.</label>
																		</div>

																	</div>
																<?php endif; ?>
																<div class="col-20 col-md-10 <?php if(isset($currentDoc)) echo "d-none"; ?>" id="month-segment-<?php echo $document['document_id']; ?>">
																	<span class="sub">
																		<div id="dropzone-<?php echo $document['document_id']; ?>">
																			<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="<?php echo $document['document_id']; ?>"  data-doctype="<?php echo $document['document_file_extension']; ?>">
																				<div class="dz-message needsclick">
																				<span class="text">
																					<i class="i i-file_upload"></i>
																					Click here or Drop Files

																				</span>

																				</div>
																			</form>
																		</div>
																	</span>
																	<p class="text-center m-0"><small><i>
																	<?php if(isset($currentDoc['monthly_upload_file_name'])): ?>
																		<?php echo $currentDoc['monthly_upload_file_name']; ?>
																	<?php endif; ?>
																	<?php if($document['document_file_extension'] != ""): ?>
																	(Supports only <?php echo $document['document_file_extension']; ?> files)
																	<?php endif; ?>
																	</i></small></p>
																</div>

																<button id="btn-collapse-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded btn-add ml-auto <?php if(isset($currentDoc)) echo "d-none"; ?>" data-toggle="collapse"
																data-target="#collapse<?php echo $document['document_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $document['document_id']; ?>"><i
																	class="i i-add"></i> <span class="sr-only">Add</span></button>
															</div>
														</div>
													</div>
												</div>

												<?php //if(!isset($currentDoc)): ?>
													<div id="collapse<?php echo $document['document_id']; ?>" class="collapse " aria-labelledby="heading<?php echo $key+1; ?>" data-parent="#accordionExample">
														<div class="acc-body">
															<form id="form-upload-<?php echo $document['document_id']; ?>" class="row align-items-end form-metadata">
																<?php if(isset($document['metadata'])): ?>
																	<?php $metadata_fields = json_decode($document['metadata']);?>
																	<?php foreach($metadata_fields as $index => $field): ?>
																	<div class="col-lg-7 col-md-12 form-group">
																		<div>
																			<label for="metafield-<?php echo $document['document_id'].$index; ?>"><?php echo $field->metadata; ?></label>
																			<input type="<?php echo $field->datatype; ?>" name="metadata[<?php echo $field->metadata; ?>]" class="form-control" id="metafield-<?php echo $document['document_id'].$index; ?>" placeholder="<?php echo $field->metadata; ?>" required />
																		</div>
																	</div>
																	<?php endforeach; ?>
																<?php endif; ?>
																<div class="col-lg-3 col-md-12 form-group">
																	<button type="submit" id="btn-upload-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
																</div>
																<input type="hidden" name="interval" value="month" />
																<input type="hidden" name="document_id" value="<?php echo $document['document_id']; ?>" />
																<input type="hidden" name="document_type_id" value="<?php echo $document['document_type_id']; ?>" />
																<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																<input type="hidden" name="year" value="<?php echo $monthly_year; ?>" />
																<input type="hidden" name="month" value="<?php echo $month; ?>" />
															</form>
														</div>
													</div>
												<?php //endif; ?>

											</div>
										<?php endforeach; ?>
										<!--Monthly other files-->
										<?php $key++; ?>
										<div class="card">
											<div class="card-header" id="heading<?php echo $key+1; ?>">
												<div class="mb-0">
													<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
														<div class="row  align-items-center" id="month-row-6">
															<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
															<div class="col-14 col-md-6" id="document-name-6">
																<span class="sub float-left">Others</span> 
																<a href="#" data-document="6" data-interval="month" class="other-reupload float-left"><span class="sub pl-1"><i class="i i-create"></i></span></a>
															</div>
															<div class="col-24 col-md-16 <?php if(empty($monthly_other)) echo "d-none"; ?>" id="other-list-6">
																<div class="intab" >
																<?php foreach($monthly_other as $index => $ref): ?>
																	<div class="row w-100" <?php if($index==0) echo 'style="border-top:0;"'; ?>>
																		<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['monthly_upload_file']);?>" target="_blank"><?php echo $ref['monthly_upload_file_name']; ?></a></span></div>
																		<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['monthly_submitted_date'])); ?></span></div>
																	</div>
																<?php endforeach; ?>
																</div>
															</div>
															<div class="col-20 col-md-10 <?php if(!empty($monthly_other)) echo "d-none"; ?>" id="month-segment-6">
																<span class="sub">
																	<div id="dropzone-6">
																		<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="6"  data-doctype="">
																			<div class="dz-message needsclick">
																			<span class="text">
																				<i class="i i-file_upload"></i>
																				Click here or Drop Files

																			</span>

																			</div>
																		</form>
																	</div>
																</span>
															</div>

															<button id="btn-collapse-6" class="btn btn-primary btn-rounded btn-add ml-auto <?php if(!empty($monthly_other)) echo "d-none"; ?>" data-toggle="collapse"
															data-target="#collapse6" aria-expanded="false" aria-controls="collapse6"><i
																class="i i-add"></i> <span class="sr-only">Add</span></button>
														</div>
													</div>
												</div>
											</div>

											<?php //if(!isset($currentDoc)): ?>
												<div id="collapse6" class="collapse " aria-labelledby="heading<?php echo $key+1; ?>" data-parent="#accordionExample">
													<div class="acc-body">
														<form id="form-upload-6" class="row align-items-end form-metadata">
															<div class="col-lg-3 col-md-12 form-group">
																<button type="submit" id="btn-upload-6" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
															</div>
															<input type="hidden" name="interval" value="month" />
															<input type="hidden" name="document_id" value="6" />
															<input type="hidden" name="document_type_id" value="1" />
															<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
															<input type="hidden" name="year" value="<?php echo $monthly_year; ?>" />
															<input type="hidden" name="month" value="<?php echo $month; ?>" />
														</form>
													</div>
												</div>
											<?php //endif; ?>

										</div>
										<!--Monthly other files end-->
									</div>
									
									
										<div class="row align-items-center ">

											<div class="col-lg-12">
												<div class="p-a-15 text-lg-right">
												<span class="h5">Affiliate monthly compliance for <?php echo strtoupper(date('M Y', $monthly_date)); ?></span>
												</div>
											</div>
											<div class="col-lg-12 <?php if($this->session->role_id == 1) echo "update-status"; ?>">
												<a class="btn btn-round-ib btn-lbl ml-3 <?php if($monthly_compliance == 8) echo "active"; ?>" data-status="8" data-rel="tooltip" data-placement="bottom" title="Compliance"><i class="i i-compliant cmplt"></i><span class="sr-only">Compliance</span></a>
												<a class="btn btn-round-ib btn-lbl <?php if($monthly_compliance == 9) echo "active"; ?>" data-status="9" data-rel="tooltip" data-placement="bottom" title="Non Compliance"><i class="i i-non-compliant n-cmplt"></i><span class="sr-only">Non Compliance</span></a>
												<a class="btn btn-round-ib btn-lbl <?php if($monthly_compliance == 10) echo "active"; ?>" data-status="10" data-rel="tooltip" data-placement="bottom" title="Waiting"><i class="i i-waiting wait"></i><span class="sr-only">Waiting</span></a>
												<a class="btn btn-round-ib btn-lbl <?php if($monthly_compliance == 11) echo "active"; ?>" data-status="11" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i><span class="sr-only">Indeterminate</span></a>
												<?php if($this->session->role_id == 1): ?>
													<button class="btn btn-primary btn-rounded min w-100px status-update-btn mt-2" data-compliance="<?php echo $monthly_compliance; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-interval="month" disabled>UPDATE</button>
												<?php endif; ?>
								
											</div>
										</div>
								</div>

							</div>
							<div class="tab-pane fade" id="nav-y2" role="tabpanel" aria-labelledby="nav-y2-tab">

								<div class=" m-y-20">
									<?php $quarterly_date = mktime(0, 0, 0, $quarter*3, 1, $quarterly_year); ?>
									<?php $previous_date = explode("-", date("m-Y", strtotime("-3 months", $quarterly_date))); ?>
									<?php $prev_quarter = ceil($previous_date[0]/3); ?>
									<?php $next_date = explode("-", date("m-Y", strtotime("+3 months", $quarterly_date))); ?>
									<?php $next_quarter = ceil($next_date[0]/3); ?>
									<div class="h5 t-c f-bold">
										<a class="mr-3" href="<?php echo current_url().'?interval=nav-y2&quarter='.$prev_quarter.'&quarterly_year='.$previous_date[1]; ?>" data-rel="tooltip" data-placement="top" title="Previous"><i class="i i-arrow_back"></i></a>
										Q<?php echo $quarter; ?> (<?php echo $quarterArray[$quarter]; ?>)
										<a class="ml-3" href="<?php echo current_url().'?interval=nav-y2&quarter='.$next_quarter.'&quarterly_year='.$next_date[1]; ?>" data-rel="tooltip" data-placement="top" title="Next"><i class="i i-arrow_forward"></i></a>
										<!-- <div class="h6">Due Date: 01/31/2021</div> -->
									</div>
								</div>

								<div class="head">
									<div class="row">
									<div class="col-2"><span class="sub">NO</span></div>
									<div class="col-6"><span class="sub">DOCUMENT NAME</span></div>
									<div class="col-4"><span class="sub">SUBMITTED ON</span></div>
									<div class="col-5"><span class="sub">STATUS</span></div>
									<div class="col-7"><span class="sub">COMMENTS</span></div>

									</div>
								</div>

								<div class="cdnWrap">
									<div class="accordion">
										<?php foreach($quarterly_documents as $key => $document): ?>
											<?php $currentDoc = isset($quarterly_status[$document['document_id']]) ? $quarterly_status[$document['document_id']] : NULL; ?>
											<div class="card">
												<div class="card-header" id="heading<?php echo $key+1; ?>">
													<div class="mb-0">
														<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
															<div class="row  align-items-center" id="quarter-row-<?php echo $document['document_id']; ?>">
																<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
																<div class="col-14 col-md-6" id="document-name-<?php echo $document['document_id']; ?>">
																<?php if(isset($currentDoc)) : ?>
																		<a href="<?php echo base_url($currentDoc['quarterly_upload_file']); ?>" class="float-left" target="_blank"><span class="sub text-primary link"><?php echo $document['document_name']; ?></span></a> 
																		<a href="#" data-document="<?php echo $document['document_id']; ?>" data-interval="quarter" class="reupload float-left pl-1"><span class="sub pl-1"><i class="i i-create"></i></span></a>
																		<?php if($currentDoc['quarterly_compliance_status'] == 5): ?><a href="#" data-document="<?php echo $document['document_id']; ?>" data-interval="quarter" data-uploadid="<?php echo $currentDoc['quarterly_id']; ?>" class="deletedoc float-left pl-1"><span class="sub pl-1"><i class="i i-delete"></span></i><?php endif; ?></a>
																	<?php else: ?>
																		<span class="sub"><?php echo $document['document_name']; ?></span>
																	<?php endif; ?>
																</div>
																<div class="col-7 col-md-4" id="submitted-<?php echo $document['document_id']; ?>"><span class="sub"><?php if(isset($currentDoc)) echo date('m/d/Y', strtotime($currentDoc['quarterly_submitted_date'])); ?></span></div>
																<?php if(isset($currentDoc)): ?>
																<div class="col-24 col-md-5" id="doc-status-<?php echo $document['document_id']; ?>">
																	<span class="sub">
																		<?php if($this->session->role_id == 1): ?>
																			<select class="form-control selG" data-interval="quarter" data-documentid="<?php echo $currentDoc['quarterly_id'] ?>" data-doctype="<?php echo $currentDoc['document_type_id'] ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>">
																				<?php foreach($document_status as $status): ?>
																					<option value="<?php echo $status['id']; ?>" <?php if($status['id']==$currentDoc['quarterly_compliance_status']) echo "selected"; ?>><?php echo $status['name']; ?></option>
																				<?php endforeach; ?>
																			</select>
																		<?php else: ?>
																			<a href="javascript:(0)" class="btn btn-lbl" data-rel="tooltip" data-placement="bottom" title="<?php echo $currentDoc['status_name']; ?>"><?php echo $currentDoc['icon']; ?> </a>
																		<?php endif; ?>
																	</span>
																</div>

																<div class="col-24 col-md-7" id="chat-box-<?php echo $document['document_id']; ?>">

																	<div class="chatBox">
																		<div class="chatBoxinn">
																			<?php if(isset($currentDoc['comments'])): ?>
																				<?php foreach($currentDoc['comments'] as $comment): ?>
																				<div class="chatrow">
																					<span class="user <?php echo ($comment['created_by'] === $this->session->userdata('user_id')) ? 'send' : 'rec'; ?>"><?php echo strtoupper($comment['first_name'][0].$comment['last_name'][0]); ?></span>
																					<div class="chatline">
																						<div class="h6"><?php echo $comment['notification']; ?></div>
																						<span class="text-primary">
																							<?php echo $comment['first_name'].' '.$comment['last_name']; ?>
																						</span>
																						<span class="ml-auto text-secondary">
																						<?php echo date("jS M,Y | H:i", strtotime($comment['created'])); ?>
																						</span>
																					</div>
																				</div>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</div>

																		<div class="search collapsed">
																			<input type="text" class="input-comment" data-doctypecustom="quarter" id="quarter-comment-<?php echo $key+1; ?>" data-document="<?php echo $currentDoc['quarterly_id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="<?php echo $currentDoc['document_type_id']; ?>"placeholder="Type here" />
																			<a class="btn btn-secondary btn-rounded btn-action-sm "><i
																			class="i i-chat-box"></i><span class="sr-only">Add</span></a>
																		</div>
																		<label class="mt-2 ml-3 small" for="quarter-comment-<?php echo $key+1; ?>" style="display:none;">Hit 'Enter' to send.</label>
																	</div>

																</div>
																<?php endif; ?>
																<div class="col-20 col-md-10 <?php if(isset($currentDoc)) echo "d-none"; ?>" id="quarter-segment-<?php echo $document['document_id']; ?>">
																	<span class="sub">
																		<div id="dropzone-<?php echo $document['document_id']; ?>">
																			<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="<?php echo $document['document_id']; ?>"  data-doctype="<?php echo $document['document_file_extension']; ?>">
																				<div class="dz-message needsclick">
																				<span class="text">
																					<i class="i i-file_upload"></i>
																					Click here or Drop Files

																				</span>

																				</div>
																			</form>
																		</div>
																	</span>
																	<p class="text-center m-0"><small><i>
																	<?php if(isset($currentDoc['quarterly_upload_file_name'])): ?>
																		<?php echo $currentDoc['quarterly_upload_file_name']; ?>
																	<?php endif; ?>
																	<?php if($document['document_file_extension'] != ""): ?>
																	(Supports only <?php echo $document['document_file_extension']; ?> files)
																	<?php endif; ?>
																	</i></small></p>
																</div>

																<button id="btn-collapse-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded btn-add ml-auto <?php if(isset($currentDoc)) echo "d-none"; ?>" data-toggle="collapse"
																	data-target="#collapse<?php echo $document['document_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $document['document_id']; ?>"><i
																		class="i i-add"></i> <span class="sr-only">Add</span></button>
															</div>
														</div>
													</div>
												</div>

												<div id="collapse<?php echo $document['document_id']; ?>" class="collapse " aria-labelledby="heading<?php echo $key+1; ?>" data-parent="#accordionExample">
													<div class="acc-body">
														<form id="form-upload-<?php echo $document['document_id']; ?>" class="row align-items-end form-metadata">
															<?php if(isset($document['metadata'])): ?>
																<?php $metadata_fields = json_decode($document['metadata']);?>
																<?php foreach($metadata_fields as $index => $field): ?>
																<div class="col-lg-7 col-md-12 form-group">
																	<div>
																		<label for="metafield-<?php echo $document['document_id'].$index; ?>"><?php echo $field->metadata; ?></label>
																		<input type="<?php echo $field->datatype; ?>" name="metadata[<?php echo $field->metadata; ?>]" class="form-control" id="metafield-<?php echo $document['document_id'].$index; ?>" placeholder="<?php echo $field->metadata; ?>" required />
																	</div>
																</div>
																<?php endforeach; ?>
															<?php endif; ?>
															<div class="col-lg-3 col-md-12 form-group">
																<button type="submit" id="btn-upload-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
															</div>
															<input type="hidden" name="interval" value="quarter" />
															<input type="hidden" name="document_id" value="<?php echo $document['document_id']; ?>" />
															<input type="hidden" name="document_type_id" value="<?php echo $document['document_type_id']; ?>" />
															<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
															<input type="hidden" name="year" value="<?php echo $quarterly_year; ?>" />
															<input type="hidden" name="quarter" value="<?php echo $quarter; ?>" />
														</form>
													</div>
												</div>

											</div>
										<?php endforeach; ?>
										<!--Quarterly other files-->
										<?php $key++; ?>
										<div class="card">
											<div class="card-header" id="heading<?php echo $key+1; ?>">
												<div class="mb-0">
													<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
														<div class="row  align-items-center" id="quarter-row-8">
															<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
															<div class="col-14 col-md-6" id="document-name-8">
																<span class="sub float-left">Others</span><a href="#" data-document="8" data-interval="quarter" class="other-reupload d-inline float-left"><span class="sub pl-1"><i class="i i-create"></i></span></a>
															</div>
															<div class="col-24 col-md-16 <?php if(empty($quarterly_other)) echo "d-none"; ?>" id="other-list-8" >
																<div class="intab">
																<?php foreach($quarterly_other as $index => $ref): ?>
																	<div class="row w-100" <?php if($index==0) echo 'style="border-top:0;"'; ?>>
																		<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['quarterly_upload_file']);?>" target="_blank"><?php echo $ref['quarterly_upload_file_name']; ?></a></span></div>
																		<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['quarterly_submitted_date'])); ?></span></div>
																	</div>
																<?php endforeach; ?>
																</div>
															</div>
															<div class="col-20 col-md-10 <?php if(!empty($quarterly_other)) echo "d-none"; ?>" id="quarter-segment-8">
																<span class="sub">
																	<div id="dropzone-8">
																		<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="8"  data-doctype="">
																			<div class="dz-message needsclick">
																			<span class="text">
																				<i class="i i-file_upload"></i>
																				Click here or Drop Files

																			</span>

																			</div>
																		</form>
																	</div>
																</span>
															</div>

															<button id="btn-collapse-8" class="btn btn-primary btn-rounded btn-add ml-auto <?php if(!empty($quarterly_other)) echo "d-none"; ?>" data-toggle="collapse"
															data-target="#collapse8" aria-expanded="false" aria-controls="collapse8"><i
																class="i i-add"></i> <span class="sr-only">Add</span></button>
														</div>
													</div>
												</div>
											</div>

											<?php //if(!isset($currentDoc)): ?>
												<div id="collapse8" class="collapse " aria-labelledby="heading<?php echo $key+1; ?>" data-parent="#accordionExample">
													<div class="acc-body">
														<form id="form-upload-8" class="row align-items-end form-metadata">
															<div class="col-lg-3 col-md-12 form-group">
																<button type="submit" id="btn-upload-8" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
															</div>
															<input type="hidden" name="interval" value="quarter" />
															<input type="hidden" name="document_id" value="8" />
															<input type="hidden" name="document_type_id" value="2" />
															<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
															<input type="hidden" name="year" value="<?php echo $quarterly_year; ?>" />
															<input type="hidden" name="quarter" value="<?php echo $quarter; ?>" />
														</form>
													</div>
												</div>
											<?php //endif; ?>

										</div>
										<!--Quarterly other files end-->
									</div>
									<div class="row align-items-center ">

										<div class="col-lg-12">
											<div class="p-a-15 text-lg-right">
											<span class="h5">Affiliate quarterly compliance for <?php echo $quarterArray[$quarter]; ?></span>
											</div>
										</div>
										<div class="col-lg-12 <?php if($this->session->role_id == 1) echo "update-status"; ?>">
											<a class="btn btn-round-ib btn-lbl ml-3 <?php if($quarterly_compliance == 8) echo "active"; ?>" data-status="8" data-rel="tooltip" data-placement="bottom" title="Compliance"><i class="i i-compliant cmplt"></i><span class="sr-only">Compliance</span></a>
											<a class="btn btn-round-ib btn-lbl <?php if($quarterly_compliance == 9) echo "active"; ?>" data-status="9" data-rel="tooltip" data-placement="bottom" title="Non Compliance"><i class="i i-non-compliant n-cmplt"></i><span class="sr-only">Non Compliance</span></a>
											<a class="btn btn-round-ib btn-lbl <?php if($quarterly_compliance == 10) echo "active"; ?>" data-status="10" data-rel="tooltip" data-placement="bottom" title="Waiting"><i class="i i-waiting wait"></i><span class="sr-only">Waiting</span></a>
											<a class="btn btn-round-ib btn-lbl <?php if($quarterly_compliance == 11) echo "active"; ?>" data-status="11" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i><span class="sr-only">Indeterminate</span></a>

											<?php if($this->session->role_id == 1): ?>
												<button class="btn btn-primary btn-rounded min w-100px mt-2 status-update-btn" data-compliance="<?php echo $quarterly_compliance; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-interval="quarter" disabled>UPDATE</button>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="nav-y3" role="tabpanel" aria-labelledby="nav-y3-tab">
								<div class=" m-y-20">
									<?php $endMonth = date('m', strtotime($affiliate['year_end'])); ?>
									<div class="h5 t-c f-bold">
										<a class="mr-3" href="<?php echo current_url().'?interval=nav-y3&yearly_year='.($yearly_year-1); ?>" data-rel="tooltip" data-placement="top" title="Previous"><i class="i i-arrow_back"></i></a>
										YEARLY (<?php echo strtoupper(date('M Y', strtotime("+1 month", mktime(0, 0, 0, $endMonth, 1, $yearly_year)))); ?> - <?php echo strtoupper(date('M Y', strtotime("+12 month", mktime(0, 0, 0, $endMonth, 1, $yearly_year)))); ?>)
										<a class="ml-3" href="<?php echo current_url().'?interval=nav-y3&yearly_year='.($yearly_year+1); ?>" data-rel="tooltip" data-placement="top" title="Next"><i class="i i-arrow_forward"></i></a>
										<!-- <div class="h6">Due Date: 01/31/2021</div> -->
									</div>
								</div>

								<div class="head">
									<div class="row">
									<div class="col-2"><span class="sub">NO</span></div>
									<div class="col-6"><span class="sub">DOCUMENT NAME</span></div>
									<div class="col-4"><span class="sub">SUBMITTED ON</span></div>
									<div class="col-5"><span class="sub">STATUS</span></div>
									<div class="col-7"><span class="sub">COMMENTS</span></div>

									</div>
								</div>

								<div class="cdnWrap">
									<div class="accordion">
										<?php foreach($yearly_documents as $key => $document): ?>
											<?php $currentDoc = isset($yearly_status[$document['document_id']]) ? $yearly_status[$document['document_id']] : NULL; ?>
											<div class="card">
												<div class="card-header" id="heading<?php echo $key+1; ?>">
													<div class="mb-0">
														<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
															<div class="row  align-items-center" id="year-row-<?php echo $document['document_id']; ?>">
																<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
																<div class="col-14 col-md-6" id="document-name-<?php echo $document['document_id']; ?>">
																	<?php if(isset($currentDoc)) : ?>
																		<a href="<?php echo base_url($currentDoc['yearly_upload_file']); ?>" class="float-left" target="_blank"><span class="sub text-primary link"><?php echo $document['document_name']; ?></span></a> 
																		<a href="#" data-document="<?php echo $document['document_id']; ?>" data-interval="year" class="reupload float-left pl-1"><span class="sub pl-1"><i class="i i-create"></i></span></a> 
																		<?php if($currentDoc['yearly_compliance_status'] == 5): ?><a href="#" data-document="<?php echo $document['document_id']; ?>" data-interval="year" data-uploadid="<?php echo $currentDoc['yearly_d_id']; ?>" class="deletedoc float-left pl-1"><span class="sub pl-1"><i class="i i-delete"></i></span><?php endif; ?></a>
																	<?php else: ?>
																		<span class="sub"><?php echo $document['document_name']; ?></span>
																	<?php endif; ?>
																</div>
																<div class="col-7 col-md-4" id="submitted-<?php echo $document['document_id']; ?>"><span class="sub"><?php if(isset($currentDoc)) echo date('m/d/Y', strtotime($currentDoc['yearly_submitted_date'])); ?></span></div>
																<?php if(isset($currentDoc)): ?>
																	
																	<div class="col-24 col-md-5" id="doc-status-<?php echo $document['document_id']; ?>">
																		<span class="sub">
																			<?php if($this->session->role_id == 1): ?>
																				<select class="form-control selG" data-interval="year" data-documentid="<?php echo $currentDoc['yearly_d_id'] ?>" data-doctype="<?php echo $currentDoc['document_type_id'] ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>">
																					<?php foreach($document_status as $status): ?>
																						<option value="<?php echo $status['id']; ?>" <?php if($status['id']==$currentDoc['yearly_compliance_status']) echo "selected"; ?>><?php echo $status['name']; ?></option>
																					<?php endforeach; ?>
																				</select>
																			<?php else: ?>
																				<a href="javascript:(0)" class="btn btn-lbl" data-rel="tooltip" data-placement="bottom" title="<?php echo $currentDoc['status_name']; ?>"><?php echo $currentDoc['icon']; ?> </a>
																			<?php endif; ?>
																		</span>
																	</div>

																	<div class="col-24 col-md-7" id="chat-box-<?php echo $document['document_id']; ?>">

																		<div class="chatBox">
																			<div class="chatBoxinn">
																				<?php if(isset($currentDoc['comments'])): ?>
																					<?php foreach($currentDoc['comments'] as $comment): ?>
																					<div class="chatrow">
																						<span class="user <?php echo ($comment['created_by'] === $this->session->userdata('user_id')) ? 'send' : 'rec'; ?>"><?php echo strtoupper($comment['first_name'][0].$comment['last_name'][0]); ?></span>
																						<div class="chatline">
																							<div class="h6"><?php echo $comment['notification']; ?></div>
																							<span class="text-primary">
																								<?php echo $comment['first_name'].' '.$comment['last_name']; ?>
																							</span>
																							<span class="ml-auto text-secondary">
																							<?php echo date("jS M,Y | H:i", strtotime($comment['created'])); ?>
																							</span>
																						</div>
																					</div>
																					<?php endforeach; ?>
																				<?php endif; ?>
																			</div>

																			<div class="search collapsed">
																				<input type="text" class="input-comment" data-doctypecustom="year" id="year-comment-<?php echo $key+1; ?>" data-document="<?php echo $currentDoc['yearly_d_id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="<?php echo $currentDoc['document_type_id']; ?>"placeholder="Type here" />
																				<a class="btn btn-secondary btn-rounded btn-action-sm "><i
																				class="i i-chat-box"></i><span class="sr-only">Add</span></a>
																			</div>
																			<label class="mt-2 ml-3 small" for="year-comment-<?php echo $key+1; ?>" style="display:none;">Hit 'Enter' to send.</label>
																		</div>

																	</div>
																<?php endif; ?>
																<div class="col-20 col-md-10 <?php if(isset($currentDoc)) echo "d-none"; ?>" id="year-segment-<?php echo $document['document_id']; ?>">
																	<span class="sub">
																		<div id="dropzone-<?php echo $document['document_id']; ?>">
																		<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="<?php echo $document['document_id']; ?>"  data-doctype="<?php echo $document['document_file_extension']; ?>">
																				<div class="dz-message needsclick">
																				<span class="text">
																					<i class="i i-file_upload"></i>
																					Click here or Drop Files

																				</span>

																				</div>
																			</form>
																		</div>
																	</span>
																	<p class="text-center m-0"><small><i>
																	<?php if(isset($currentDoc['yearly_upload_file_name'])): ?>
																		<?php echo $currentDoc['yearly_upload_file_name']; ?>
																	<?php endif; ?>
																	<?php if($document['document_file_extension'] != ""): ?>
																	(Supports only <?php echo $document['document_file_extension']; ?> files)
																	<?php endif; ?>
																	</i></small></p>
																</div>

																<button id="btn-collapse-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded btn-add ml-auto  <?php if(isset($currentDoc)) echo "d-none"; ?>" data-toggle="collapse"
																data-target="#collapse<?php echo $document['document_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $document['document_id']; ?>"><i
																	class="i i-add"></i> <span class="sr-only">Add</span></button>
															</div>
														</div>
													</div>
												</div>

												<?php //if(!isset($currentDoc)): ?>
													<div id="collapse<?php echo $document['document_id']; ?>" class="collapse " aria-labelledby="heading<?php echo $key+1; ?>" data-parent="#accordionExample">
														<div class="acc-body">
															<form id="form-upload-<?php echo $document['document_id']; ?>" class="row align-items-end form-metadata">
																<?php if(isset($document['metadata'])): ?>
																	<?php $metadata_fields = json_decode($document['metadata']);?>
																	<?php foreach($metadata_fields as $index => $field): ?>
																	<div class="col-lg-7 col-md-12 form-group">
																		<div>
																			<label for="metafield-<?php echo $document['document_id'].$index; ?>"><?php echo $field->metadata; ?></label>
																			<input type="<?php echo $field->datatype; ?>" name="metadata[<?php echo $field->metadata; ?>]" class="form-control" id="metafield-<?php echo $document['document_id'].$index; ?>" placeholder="<?php echo $field->metadata; ?>" required />
																		</div>
																	</div>
																	<?php endforeach; ?>
																<?php endif; ?>
																<div class="col-lg-3 col-md-12 form-group">
																	<button type="submit" id="btn-upload-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
																</div>
																<input type="hidden" name="interval" value="year" />
																<input type="hidden" name="document_id" value="<?php echo $document['document_id']; ?>" />
																<input type="hidden" name="document_type_id" value="<?php echo $document['document_type_id']; ?>" />
																<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																<input type="hidden" name="year" value="<?php echo $yearly_year; ?>" />
																<!--<input type="hidden" name="month" value="<?php echo isset($_GET['month']) ? $_GET['month'] : $month; ?>" />-->
															</form>
														</div>
													</div>
												<?php //endif; ?>

											</div>
										<?php endforeach; ?>
										<!--Yearly other files-->
										<?php $key++; ?>
										<div class="card">
											<div class="card-header" id="heading<?php echo $key+1; ?>">
												<div class="mb-0">
													<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
														<div class="row  align-items-center" id="year-row-6">
															<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
															<div class="col-14 col-md-6" id="document-name-14">
																<span class="sub float-left">Others</span><a href="#" data-document="14" data-interval="year" class="other-reupload float-left"><span class="sub pl-1"><i class="i i-create"></i></span></a>
															</div>
															<div class="col-24 col-md-16 <?php if(empty($yearly_other)) echo "d-none"; ?>" id="other-list-14">
																<div class="intab">
																<?php foreach($yearly_other as $index => $ref): ?>
																	<div class="row w-100" <?php if($index==0) echo 'style="border-top:0;"'; ?>>
																		<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['yearly_upload_file']);?>" target="_blank"><?php echo $ref['yearly_upload_file_name']; ?></a></span></div>
																		<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['yearly_submitted_date'])); ?></span></div>
																	</div>
																<?php endforeach; ?>
																</div>
															</div>
															<div class="col-20 col-md-10 <?php if(!empty($yearly_other)) echo "d-none"; ?>" id="year-segment-14">
																<span class="sub">
																	<div id="dropzone-14">
																		<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="14"  data-doctype="">
																			<div class="dz-message needsclick">
																			<span class="text">
																				<i class="i i-file_upload"></i>
																				Click here or Drop Files

																			</span>

																			</div>
																		</form>
																	</div>
																</span>
															</div>

															<button id="btn-collapse-14" class="btn btn-primary btn-rounded btn-add ml-auto <?php if(!empty($yearly_other)) echo "d-none"; ?>" data-toggle="collapse"
															data-target="#collapse14" aria-expanded="false" aria-controls="collapse14"><i
																class="i i-add"></i> <span class="sr-only">Add</span></button>
														</div>
													</div>
												</div>
											</div>

											<?php //if(!isset($currentDoc)): ?>
												<div id="collapse14" class="collapse " aria-labelledby="heading<?php echo $key+1; ?>" data-parent="#accordionExample">
													<div class="acc-body">
														<form id="form-upload-14" class="row align-items-end form-metadata">
															<div class="col-lg-3 col-md-12 form-group">
																<button type="submit" id="btn-upload-14" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
															</div>
															<input type="hidden" name="interval" value="year" />
															<input type="hidden" name="document_id" value="14" />
															<input type="hidden" name="document_type_id" value="3" />
															<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
															<input type="hidden" name="year" value="<?php echo $yearly_year; ?>" />
														</form>
													</div>
												</div>
											<?php //endif; ?>

										</div>
										<!--Yearly other files end-->
									</div>
									<div class="row align-items-center ">

										<div class="col-lg-12">
											<div class="p-a-15 text-lg-right">
											<span class="h5">Affiliate yearly compliance for <?php echo strtoupper(date('M Y', strtotime("+1 month", mktime(0, 0, 0, $endMonth, 1, $yearly_year)))); ?> - <?php echo strtoupper(date('M Y', strtotime("+12 month", mktime(0, 0, 0, $endMonth, 1, $yearly_year)))); ?></span>
											</div>
										</div>
										<div class="col-lg-12 <?php if($this->session->role_id == 1) echo "update-status"; ?>">
											<a class="btn btn-round-ib btn-lbl ml-3 <?php if($yearly_compliance == 8) echo "active"; ?>" data-status="8" data-rel="tooltip" data-placement="bottom" title="Compliance"><i class="i i-compliant cmplt"></i><span class="sr-only">Compliance</span></a>
											<a class="btn btn-round-ib btn-lbl <?php if($yearly_compliance == 9) echo "active"; ?>" data-status="9" data-rel="tooltip" data-placement="bottom" title="Non Compliance"><i class="i i-non-compliant n-cmplt"></i><span class="sr-only">Non Compliance</span></a>
											<a class="btn btn-round-ib btn-lbl <?php if($yearly_compliance == 10) echo "active"; ?>" data-status="10" data-rel="tooltip" data-placement="bottom" title="Waiting"><i class="i i-waiting wait"></i><span class="sr-only">Waiting</span></a>
											<a class="btn btn-round-ib btn-lbl <?php if($yearly_compliance == 11) echo "active"; ?>" data-status="11" data-rel="tooltip" data-placement="bottom" title="Indeterminate"><i class="i i-Indeterminate inter"></i><span class="sr-only">Indeterminate</span></a>

											<?php if($this->session->role_id == 1): ?>
												<button class="btn btn-primary btn-rounded min w-100px mt-2 status-update-btn" data-compliance="<?php echo $yearly_compliance; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-interval="year" disabled>UPDATE</button>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<!--  UPLOAD SECTION -->
							<div class="tab-pane fade" id="nav-y4" role="tabpanel" aria-labelledby="nav-y4-tab">
							
								<div class="head m-t-30">
									<div class="row">
										<div class="col-24">
											<span class="sub ">
											<div class="t-c">LEGAL</div>
											</span>
										</div>
									</div>
								</div>
								<div class="cdnWrap ">
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header" id="headingOne">
											<div class="mb-0">
												<div class="btn wrdiv odd">
													<div class="row  align-items-center">
														<div class="col-3 col-md-2"><span class="sub">1</span></div>
														<div class="col-14 col-md-6"><span class="sub ">Legal Compliance Document</span></div>
														<div class="col-7 col-md-4"><span class="sub"></span></div>
														<div class="col-20 col-md-10">
														<span class="sub">
															<div class="dropzone">
																<form action="/upload" class="l_dZUpload needsclick">
																	<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																	<input type="hidden" name="notification" value="Compliance legal document is uploaded" />
																	<input type="hidden" name="document_type_id" value="10" />
																	<input type="hidden" name="document_type" value="legal_compliance_document" />
																	
																	<div class="dz-default dz-message">
																	<span class="text">
																	<i class="i i-file_upload"></i>
																	Click here or Drop Files
																	</span>
																	</div>
																</form>
															</div>
														</span>
														</div>
														<button class="btn btn-primary btn-rounded btn-add ml-auto " data-toggle="collapse"
														data-target=".collapsedoc" aria-expanded="false" aria-controls="collapsedoc"><i
														class="i i-add"></i> </button>
													</div>
												</div>
											</div>
											</div>
											<div id="collapselegal" class="collapse collapsedoc" aria-labelledby="headingOne"
											data-parent="#accordionExample">
											<div class="acc-body">
												<div class="row align-items-end">
													<div class="col-lg-3 col-md-12 form-group">
														<a class="btn btn-primary btn-rounded min w-100px btn-upload-l" id="btn-upload-l">UPLOAD</a>
													</div>
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>

								<!-- END UPLOAD SECTION -->
								<!--<div class="tab-pane fade show active" id="nav-z1" role="tabpanel" aria-labelledby="nav-z1-tab">-->
									<div class="head">
										<div class="row align-items-center">
											<div class="col-3 col-md-3"><span class="sub">NO</span></div>
											<div class="col-10 col-md-10"><span class="sub">DOCUMENT NAME</span></div>
											<div class="col-3 col-md-3"><span class="sub">DETAILS</span></div>
										</div>
									</div>
									<div class="cdnWrap">
										<div class="accordion"  id="legal_loop">
											<?php
											$i=1;  
											foreach ($legal_document as $legal){ ?>
											<div class="card">
												<div class="card-header">
													<div class="mb-0">
														<div class="btn wrdiv <?php if($i%2==0) echo "odd"; ?>">
															<div class="row  align-items-center">
																<div class="col-3 col-md-3"><span class="sub"><?=$i++?></span></div>
																<div class="col-24 col-md-10"><span class="sub"><a href="<?= base_url().$legal['quarterly_upload_file']?>" target="_blank"><?=isset($legal['quarterly_upload_file_name'])?$legal['quarterly_upload_file_name']:''?></a>
																	<a href="javascript:reupload('legal', <?php echo $legal['legal_d_id']; ?>);">
																	<span><i class="i i-create"></i> 
																	</span>
																	</a>
																	
																	 <a href="#" class="delete_upload" doc_type="legal_compliance_document" del_document_id="<?=$legal['legal_d_id']?> " a_id_document="<?=$legal['affiliate_id']?>" doc_type_id="<?=$legal['document_id']?>">
																	 <span><i class="i i-delete"></i> </span></a>
																	
																	</span>
																</div>
																<div class="col-24 col-md-10" id="legal-row-<?php echo $legal['legal_d_id']; ?>">
																	<div class="chatBox">
																		<div class="chatBoxinn">
																			<?php if(isset($legal['comments'])): ?>
																				<?php foreach($legal['comments'] as $comment): ?>
																				<div class="chatrow">
																					<span class="user <?php echo ($comment['created_by'] === $this->session->userdata('user_id')) ? 'send' : 'rec'; ?>"><?php echo strtoupper($comment['first_name'][0].$comment['last_name'][0]); ?></span>
																					<div class="chatline">
																						<div class="h6"><?php echo $comment['notification']; ?></div>
																						<span class="text-primary">
																							<?php echo $comment['first_name'].' '.$comment['last_name']; ?>
																						</span>
																						<span class="ml-auto text-secondary">
																						<?php echo date("jS M,Y | H:i", strtotime($comment['created'])); ?>
																						</span>
																					</div>
																				</div>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</div>
																		<div class="search collapsed">
																			<input type="text" class="input-comment" data-doctypecustom="legal"  data-document="<?php echo $legal['legal_d_id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="<?php echo $legal['document_id']; ?>" placeholder="Type here" />
																			<a class="btn btn-secondary   btn-rounded btn-action-sm "><i
																			class="i i-chat-box"></i> </a>
																		</div>
																		<label class="mt-2 ml-3 small" style="display:none;">Hit 'Enter' to send.</label>
																	</div>
																	<div class="upload d-none">
																		<div class="card">
																			<div class="card-header" id="headingOne">
																			<div class="mb-0">
																				<div class="btn wrdiv border-0">
																					<div class="row  align-items-center">
																						<div class="col-20 col-md-16">
																						<span class="sub">
																							<div class="dropzone">
																								<form action="/upload" class="l_dZUpload needsclick">
																									<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																									<input type="hidden" name="notification" value="Compliance legal document is uploaded" />
																									<input type="hidden" name="document_type_id" value="10" />
																									<input type="hidden" name="legal_id" value="<?php echo $legal['legal_d_id']; ?>" />
																									<input type="hidden" name="document_type" value="legal_compliance_document" />
																									<div class="dz-default dz-message">
																									<span class="text">
																									<i class="i i-file_upload"></i>
																									Click here or Drop Files
																									</span>
																									</div>
																								</form>
																							</div>
																						</span>
																						</div>
																						<div class="col-lg-3 col-md-8">
																						<a class="btn btn-primary btn-rounded min w-100px btn-upload-l" id="btn-upload-l">UPLOAD</a>
																						</div>
																					</div>
																				</div>
																			</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								<!--</div>-->
							</div>

							
							<div class="tab-pane fade" id="nav-y5" role="tabpanel" aria-labelledby="nav-y5-tab">

								<div class="head m-t-30">
									<div class="row">
									<div class="col-24"><span class="sub ">
										<div class="t-c">OTHERS</div>
										</span></div>


									</div>
								</div>

								<div class="cdnWrap ">
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header" id="headingOne">
												<div class="mb-0">
													<div class="btn wrdiv odd">
														<div class="row  align-items-center">
															<div class="col-3 col-md-2"><span class="sub">1</span></div>
															<div class="col-14 col-md-6"><span class="sub ">Other Compliance Document</span></div>
															<div class="col-7 col-md-4"><span class="sub"></span></div>
															<div class="col-20 col-md-10">
															<span class="sub">
																<div class="dropzone">
																	<form action="/upload" class="o_dZUpload needsclick">
																		<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																		<input type="hidden" name="notification" value="Compliance other document is uploaded " />
																		<input type="hidden" name="document_type_id" value="11" />
																		<input type="hidden" name="document_type" value="other_compliance_document" />
																		
																		<div class="dz-default dz-message">
																		<span class="text">
																		<i class="i i-file_upload"></i>
																		Click here or Drop Files
																		</span>
																		</div>
																	</form>
																</div>
															</span>
															</div>
															<button class="btn btn-primary btn-rounded btn-add ml-auto " data-toggle="collapse"
															data-target=".collapselegal" aria-expanded="false" aria-controls="collapsedoc"><i
															class="i i-add"></i> </button>
														</div>
													</div>
												</div>
											</div>
											<div id="collapselegal" class="collapse collapsedoc" aria-labelledby="headingOne"
											data-parent="#accordionExample">
												<div class="acc-body">
													<div class="row align-items-end">
														<div class="col-lg-3 col-md-12 form-group">
															<a class="btn btn-primary btn-rounded min w-100px btn-upload-o" id="btn-upload-o">UPLOAD</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!--<div class="tab-pane fade show active" id="nav-z22" role="tabpanel" aria-labelledby="nav-z1-tab">-->
									<div class="head">
										<div class="row align-items-center">
											<div class="col-3 col-md-3"><span class="sub">NO</span></div>
											<div class="col-10 col-md-10"><span class="sub">DOCUMENT NAME</span></div>
											<div class="col-3 col-md-3"><span class="sub">DETAILS</span></div>
										</div>
									</div>
									<div class="cdnWrap">
										<div class="accordion"  id="com_other_loop">
											<?php
											$i=1;  
											foreach ($compliance_other as $other){ ?>
											<div class="card">
												<div class="card-header">
													<div class="mb-0">
														<div class="btn wrdiv <?php if($i%2==0) echo "odd"; ?>">
															<div class="row  align-items-center">
																<div class="col-3 col-md-3"><span class="sub"><?=$i++?></span></div>
																<div class="col-24 col-md-10"><span class="sub"><a href="<?= base_url().$other['other_upload_file']?>" target="_blank"><?=isset($other['other_upload_file_name'])?$other['other_upload_file_name']:''?></a>
																	<a href="javascript:reupload('com-other', <?php echo $other['id']; ?>);">
																	<span><i class="i i-create"></i>
																	</span></a>
															
																	<a href="#" class="delete_upload" doc_type="other_compliance_document" del_document_id="<?=$other['id']?> " a_id_document="<?=$other['affiliate_id']?>" doc_type_id="<?=$other['document_type_id']?>" >

																	<span><i class="i i-delete"></i> </span></a>
																	</span>
																	</span>
																</div>
																<div class="col-24 col-md-10" id="com-other-row-<?php echo $other['id']; ?>">
																	<div class="chatBox">
																		<div class="chatBoxinn">
																			<?php if(isset($other['comments'])): ?>
																				<?php foreach($other['comments'] as $comment): ?>
																				<div class="chatrow">
																					<span class="user <?php echo ($comment['created_by'] === $this->session->userdata('user_id')) ? 'send' : 'rec'; ?>"><?php echo strtoupper($comment['first_name'][0].$comment['last_name'][0]); ?></span>
																					<div class="chatline">
																						<div class="h6"><?php echo $comment['notification']; ?></div>
																						<span class="text-primary">
																							<?php echo $comment['first_name'].' '.$comment['last_name']; ?>
																						</span>
																						<span class="ml-auto text-secondary">
																						<?php echo date("jS M,Y | H:i", strtotime($comment['created'])); ?>
																						</span>
																					</div>
																				</div>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</div>
																		<div class="search collapsed">
																			<input type="text" class="input-comment"  data-doctypecustom="other_compliance_document" data-document="<?php echo $other['id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="<?php echo $other['document_type_id']; ?>" placeholder="Type here" />
																			<a class="btn btn-secondary   btn-rounded btn-action-sm "><i
																			class="i i-chat-box"></i> </a>
																		</div>
																		<label class="mt-2 ml-3 small" style="display:none;">Hit 'Enter' to send.</label>
																	</div>
																	<div class="upload d-none">
																		<div class="card">
																			<div class="card-header" id="headingOne">
																			<div class="mb-0">
																				<div class="btn wrdiv border-0">
																					<div class="row  align-items-center">
																						<div class="col-20 col-md-16">
																						<span class="sub">
																							<div class="dropzone">
																								<form action="/upload" class="l_dZUpload needsclick">
																									<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																									<input type="hidden" name="notification" value="Compliance other document is uploaded" />
																									<input type="hidden" name="document_type_id" value="11" />
																									<input type="hidden" name="other_id" value="<?php echo $other['id']; ?>" />
																									<input type="hidden" name="document_type" value="other_compliance_document" />
																									<div class="dz-default dz-message">
																									<span class="text">
																									<i class="i i-file_upload"></i>
																									Click here or Drop Files
																									</span>
																									</div>
																								</form>
																							</div>
																						</span>
																						</div>
																						<div class="col-lg-3 col-md-8">
																						<a class="btn btn-primary btn-rounded min w-100px btn-upload-l" id="btn-upload-l">UPLOAD</a>
																						</div>
																					</div>
																				</div>
																			</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								<!-- </div> -->

							</div>
						</div>
					</div>
					<div class="tab-pane fade <?php if($tabSelected==2) echo 'show active'; ?>" id="nav-x2" role="tabpanel" aria-labelledby="nav-x2-tab">
						<?php $interval = strpos($interval, "nav-z") !== FALSE ? $interval: "nav-z1"; ?>	
						<nav>
							<div class="nav b-b-1 p-b-0" id="tab-inner-z" role="tablist">
								<a class="nav-item nav-link <?php if($interval=='nav-z1') echo 'active'; ?>" id="nav-z1-tab" data-toggle="tab" href="#nav-z1" role="tab"
									aria-controls="nav-z1" aria-selected="true"><i class="i i-self-assessment"></i> Self Assessment</a>
								<a class="nav-item nav-link <?php if($interval=='nav-z2') echo 'active'; ?>" id="nav-z2-tab" data-toggle="tab" href="#nav-z2" role="tab"
									aria-controls="nav-z2" aria-selected="false"><i class="i i-org"></i> Organizational Soundness</a>
								<a class="nav-item nav-link <?php if($interval=='nav-z3') echo 'active'; ?>" id="nav-z3-tab" data-toggle="tab" href="#nav-z3" role="tab"
									aria-controls="nav-z3" aria-selected="false"><i class="i i-vitality"></i> Organizational
									Vitality</a>
								<a class="nav-item nav-link <?php if($interval=='nav-z4') echo 'active'; ?>" id="nav-z4-tab" data-toggle="tab" href="#nav-z4" role="tab"
									aria-controls="nav-z4" aria-selected="false"><i class="i i-mission"></i> Implementation of
									Mission</a>
								<a class="nav-item nav-link <?php if($interval=='nav-z5') echo 'active'; ?>" id="nav-z5-tab" data-toggle="tab" href="#nav-z5" role="tab"
									aria-controls="nav-z5" aria-selected="false"><i class="i i-other"></i> Others</a>
							</div>
						</nav>
						<form action="<?php echo base_url('module/assessment/add_self_assessment_data'); ?>" method="POST">

						<div class="tab-content" id="nav-tabContent-nner-z">
							<div class="tab-pane fade <?php if($interval=='nav-z1') echo 'show active'; ?>" id="nav-z1" role="tabpanel" aria-labelledby="nav-z1-tab">
								<?php //if($this->session->role_id == 2): ?>
									<div class="row m-y-20 justify-content-center align-items-center">
										<span class="col-md-6">Assessment Year: Period covered from</span>
										<span class="col-md-3"><div class="yearPick">
											<i class="i i-year-pick"></i>
											<input id="assessment_from_year" name="assessment_from_year" class="yearpick form-control" placeholder="From" type="text" required>
										</div></span>
										<span class="col-md-1">to</span>
										<span class="col-md-3"><div class="yearPick">
											<i class="i i-year-pick"></i>
											<input id="assessment_end_year" name="assessment_end_year" class="yearpick form-control" placeholder="To" type="text" required>
											<input name="affiliate_id"  type="hidden" value="<?=$affiliate['affiliate_id'];?>">

										</div>
					
										</span>
										<button  class="btn btn-primary  btn-rounded btn-action" data-rel="tooltip" data-placement="top" title="Add"><i class="i i-add"></i></button>
									</div>
								</form>
							
									<!-- <div class="row m-y-20 justify-content-center align-items-center">
										<div class="col-10 col-md-6">
											<input type="text" id="assessment_document_name" class="form-control" placeholder="Document Name" required />
										</div>
										<div class="col-14 col-md-6"><span class="sub">
											<div id="dropzone-5">
												<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="self-assessment" data-doctype="" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>">
													<div class="dz-message needsclick">
														<span class="text">
															<i class="i i-file_upload"></i> Click here or Drop Files
														</span>
														
													</div>
												</form>
											</div></span>
										</div>
									</div> -->
									<!-- <div class="row m-y-20 justify-content-center">
										<div class="col-14 col-md-6 text-center">
											<a id="btn-upload-self-assessment-doc" class="btn btn-primary btn-rounded min w-100px">UPLOAD</a>
										</div>
									</div> -->
								<?php //endif; ?>

								<div class="head d-block">
									<div class="row align-items-center">
										<div class="col-3 "><span class="sub text-center">NO</span></div>
									
										<div class="col-5 "><span class="sub text-center">ASSESSMENT PERIOD START</span></div>
										<div class="col-4 "><span class="sub text-center">ASSESSMENT PERIOD END</span></div>
										<div class="col-4 "><span class="sub text-center">LAST EDITED</span></div>
										<div class="col-4 "><span class="sub text-center">SELF ASSESSMENT</span></div>

										<div class="col-4"><span class="sub text-center">FINAL ASSESSMENT </span></div>

									</div>
								</div>

								<div class="cdnWrap">
									<div class="accordion" id="self-assessment-list">
										<?php $key = 1; ?>
										<?php
									
									 $def_icon ='';
									if(isset($this->session->role_id ) && $this->session->role_id == 3 || $this->session->role_id == 2 ){ 
										$def_icon = 'i i-remove_red_eye';
									}else{
										$def_icon = 'i i i-create';
									} 
									
										foreach($assessment_listing as $listing): 
	
										?>
											<div class="card">
												<div class="card-header">
													<div class="mb-0">
														<div class="btn wrdiv">
															<div class="row  align-items-center">
																<div class="col-3"><span class="sub text-center"><?php echo $key++; ?></span></div>
										
																<div class="col-5"><span class="sub text-center"><?=isset($listing['assessment_start_year'])?$listing['assessment_start_year']:''?></span></div>
																<div class="col-4"><span class="sub text-center"><?=isset($listing['assessment_end_year'])?$listing['assessment_end_year']:''?></span></div>
																<div class="col-4"><span class="sub text-center"><?=isset($listing['last_update'])?$listing['last_update']:''?></span></div>
																<div class="col-4"><span class="sub text-center">
																<a class="link m-x-10 text-dark" data-rel="tooltip" data-placement="bottom" title="Edit" href="<?php echo base_url('module/assessment/assessment?sid='.$listing['sid'].'&aid='.$listing['affiliate_id'].'&uid='.$listing['user_id_check']); ?>"><i class="i i i-create"></i></a>
																</span></div>
																<div class="col-4 "><span class="sub text-center"> 
																<?php if(isset($listing['answers']) && !empty($listing['answers'] )){ 
																	if(isset($listing['flag']) && ($listing['flag'] ==1 )){ ?>
                    												 <a class="link m-x-10 text-dark" href="<?php echo base_url('module/assessment/assessment?sid='.$listing['sid'].'&aid='.$listing['affiliate_id']); ?>"><i class="i i-remove_red_eye"></i></a>
                    
                    											 <?php } } ?></span></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
										<?php if($key == 1): ?>
											<div class="card">
												<div class="card-header">
													<div class="mb-0">
														<div class="btn wrdiv">
															<div class="row  align-items-center">
																<div class="col-24"><span class="sub text-center">No documents found!</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>

							</div>
							<div class="tab-pane fade <?php if($interval=='nav-z2') echo 'show active'; ?>" id="nav-z2" role="tabpanel" aria-labelledby="nav-z2-tab">
								<div class="head">
									<div class="row">
										<div class="col-2"><span class="sub">NO</span></div>
										<div class="col-8"><span class="sub">DOCUMENT NAME</span></div>
										<div class="col-4"><span class="sub">SUBMITTED ON</span></div>
									</div>
								</div>

								<div class="cdnWrap">
									<div class="accordion" id="accordionq">
										<?php foreach($soundness_documents as $key => $document): ?>
											<?php $currentDoc = isset($soundness_document_status[$document['document_id']]) ? $soundness_document_status[$document['document_id']] : NULL; ?>
											<div class="card">
												<div class="card-header" id="headingq<?php echo $document['document_id']; ?>">
													<div class="mb-0">
														<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
															<div class="row  align-items-center" id="soundness-row-<?php echo $document['document_id']; ?>">
																<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
																<div id="name-row-<?php echo $document['document_id']; ?>" class="col-14 col-md-6"><span class="sub "><?php echo $document['document_name']; ?></span></div>
																<?php /*if(!empty($currentDoc['document'])): ?>
																<div class="col-7 col-md-4"><span class="sub"><?php echo date('m/d/Y', strtotime($currentDoc['document'][0]['performance_org_doc_submitted_date'])); ?></span></div>
																<?php endif;*/ ?>
																<div class="col-24 col-md-15">
																	<div class="intab ">
																		<div class="d-flex header">
																			<span class="year-lbl"><?php echo $year; ?></span>
																			<div class="m-l-auto">
																				<div class="yearPick" >
																				<i class="i i-year-pick"></i>
																				<input class="yearpick form-control input-search-year" placeholder="<?php echo $year; ?>" type="text" value="<?php echo $year; ?>" data-document="<?php echo $document['document_id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-interval="soundness" />
																				</div>
																			</div>
																		</div>
																		<?php $check_flag = false; ?>
																		<?php if(!empty($currentDoc['document'])): ?>
																			<?php $check_flag = true; ?>
																			<?php foreach($currentDoc['document'] as $ref): ?>
																				<div class="row">
																					<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['performance_org_doc_upload_file']);?>" target="_blank"><?php echo $ref['performance_org_doc_upload_file_name']; ?></a></span></div>
																					<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['performance_org_doc_submitted_date'])); ?></span></div>
																				</div>
																			<?php endforeach; ?>
																		<?php endif; ?>
																		<?php if(!empty($currentDoc['ref_documents'])): ?>
																			<?php $check_flag = true; ?>
																			<?php foreach($currentDoc['ref_documents'] as $ref): ?>
																				<?php if($document['document_name'] == "Board Roster"): ?>
																				<div class="row">
																					<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['yearly_upload_file']);?>" target="_blank"><?php echo $ref['yearly_upload_file_name']; ?></a></span></div>
																					<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['yearly_submitted_date'])); ?></span></div>
																				</div>
																				<?php else: ?>
																					<div class="row">
																						<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['monthly_upload_file']);?>" target="_blank"><?php echo $ref['monthly_upload_file_name']; ?></a></span></div>
																						<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['monthly_submitted_date'])); ?></span></div>
																					</div>
																				<?php endif; ?>
																			<?php endforeach; ?>
																		<?php endif; ?>
																		<?php if(!$check_flag): ?>
																			<div class="row">
																				<div class="col-24 text-center">No documents found!</div>
																			</div>
																		<?php endif; ?>
																		<?php if($document['ref_document'] == NULL) : ?>
																			<div class="row upload-row">
																				<div class="col-10 col-md-14" id="soundness-segment-<?php echo $document['document_id']; ?>">
																					<span class="sub">
																						<div id="dropzone-<?php echo $document['document_id']; ?>">
																							<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="<?php echo $document['document_id']; ?>"  data-doctype="<?php echo $document['document_file_extension']; ?>">
																								<div class="dz-message needsclick">
																								<span class="text">
																									<i class="i i-file_upload"></i> Click here or Drop Files
																								</span>

																								</div>
																							</form>
																						</div>
																					</span>
																					<?php if($document['document_file_extension'] != ""): ?>
																					<p class="text-center m-0"><small><i>Supports only <?php echo $document['document_file_extension']; ?> files</i></small></p>
																					<?php endif; ?>
																				</div>
																				<div class="yearPick" >
																					<i class="i i-year-pick"></i>
																					<input class="yearpick form-control input-upload-year" placeholder="<?php echo $year; ?>" type="text" value="<?php echo $year; ?>" data-document="<?php echo $document['document_id']; ?>" />
																				</div>
																				<button id="btn-collapse-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded btn-add ml-auto " data-toggle="collapse"
																				data-target="#collapse<?php echo $document['document_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $document['document_id']; ?>"><i
																					class="i i-add"></i> </button>
																			</div>
																		<?php endif; ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php if($document['ref_document']==NULL) : ?>
													<div id="collapse<?php echo $document['document_id']; ?>" class="collapse " aria-labelledby="headingq<?php echo $document['document_id']; ?>" data-parent="#accordionq">
														<div class="acc-body">
															<form id="form-upload-<?php echo $document['document_id']; ?>" class="row align-items-end form-metadata">
																<div class="row align-items-end">
																	<?php if(isset($document['metadata'])): ?>
																		<?php $metadata_fields = json_decode($document['metadata']);?>
																		<?php foreach($metadata_fields as $index => $field): ?>
																		<div class="col-lg-7 col-md-12 form-group">
																			<div>
																				<label for="metafield-<?php echo $document['document_id'].$index; ?>"><?php echo $field->metadata; ?></label>
																				<input type="<?php echo $field->datatype; ?>" name="metadata[<?php echo $field->metadata; ?>]" class="form-control" id="metafield-<?php echo $document['document_id'].$index; ?>" placeholder="<?php echo $field->metadata; ?>" required />
																			</div>
																		</div>
																		<?php endforeach; ?>
																	<?php endif; ?>
																	<div class="col-lg-3 col-md-12 form-group">
																		<button type="submit" id="btn-upload-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
																	</div>
																</div>
																<input type="hidden" name="interval" value="soundness" />
																<input type="hidden" name="document_id" value="<?php echo $document['document_id']; ?>" />
																<input type="hidden" name="document_type_id" value="<?php echo $document['document_type_id']; ?>" />
																<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																<input type="hidden" name="year" value="<?php echo $year; ?>" />
															</form>
														</div>
													</div>
												<?php endif; ?>
											</div>
										<?php endforeach; ?>
									</div>

								</div>
							</div>

							<div class="tab-pane fade <?php if($interval=='nav-z3') echo 'show active'; ?>" id="nav-z3" role="tabpanel" aria-labelledby="nav-z3-tab">
								<div class="head">
									<div class="row">
										<div class="col-2"><span class="sub">NO</span></div>
										<div class="col-8"><span class="sub">DOCUMENT NAME</span></div>
										<div class="col-4"><span class="sub">SUBMITTED ON</span></div>
									</div>
								</div>

								<div class="cdnWrap">
									<div class="accordion" id="accordionn">
										<?php foreach($vitality_documents as $key => $document): ?>
											<?php $currentDoc = isset($vitality_document_status[$document['document_id']]) ? $vitality_document_status[$document['document_id']] : NULL; ?>
											<div class="card">
												<div class="card-header" id="headingn<?php echo $document['document_id']; ?>">
													<div class="mb-0">
														<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
															<div class="row  align-items-center" id="vitality-row-<?php echo $document['document_id']; ?>">
																<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
																<div id="name-row-<?php echo $document['document_id']; ?>" class="col-14 col-md-6"><span class="sub "><?php echo $document['document_name']; ?></span></div>
																<!-- <div class="col-7 col-md-4"><span class="sub">12/31/2020</span></div> -->
																
																	<div class="col-24 col-md-15">
																		<div class="intab ">
																			<div class="d-flex header">
																				<span class="year-lbl"><?php echo $year; ?></span>
																				<div class="m-l-auto">
																					<div class="yearPick" >
																					<i class="i i-year-pick"></i>
																					<input class="yearpick form-control input-search-year" placeholder="<?php echo $year; ?>" type="text" value="<?php echo $year; ?>" data-document="<?php echo $document['document_id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-interval="vitality" />
																					</div>
																				</div>
																			</div>
																			<?php $check_flag = false;?>
																			<?php if(!empty($currentDoc['document'])): ?>
																				<?php $check_flag = true;?>
																				<?php foreach($currentDoc['document'] as $ref): ?>
																					<div class="row">
																						<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['performance_vitality_upload_file']);?>" target="_blank"><?php echo $ref['performance_vitality_upload_file_name']; ?></a></span></div>
																						<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['performance_vitality_submitted_date'])); ?></span></div>
																					</div>
																				<?php endforeach; ?>
																			<?php endif; ?>
																			<?php if(!empty($currentDoc['ref_documents'])): ?>
																				<?php $check_flag = true;?>
																				<?php foreach($currentDoc['ref_documents'] as $ref): ?>
																					<?php if($document['document_name'] == "Form 990" || $document['document_name'] == "Current Operating Budget"): ?>
																					<div class="row">
																						<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['yearly_upload_file']);?>" target="_blank"><?php echo $ref['yearly_upload_file_name']; ?></a></span></div>
																						<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['yearly_submitted_date'])); ?></span></div>
																					</div>
																					<?php elseif($document['document_name'] == "Form 941" || $document['document_name'] == "Audited Financial Statements"): ?>
																					<div class="row">
																						<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['quarterly_upload_file']);?>" target="_blank"><?php echo $ref['quarterly_upload_file_name']; ?></a></span></div>
																						<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['quarterly_submitted_date'])); ?></span></div>
																					</div>
																					<?php else: ?>
																						<div class="row">
																							<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['monthly_upload_file']);?>" target="_blank"><?php echo $ref['monthly_upload_file_name']; ?></a></span></div>
																							<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['monthly_submitted_date'])); ?></span></div>
																						</div>
																					<?php endif; ?>
																				<?php endforeach; ?>
																			<?php endif; ?>
																			<?php if(!$check_flag): ?>
																				<div class="row">
																					<div class="col-24 text-center">No documents found!</div>
																				</div>
																			<?php endif; ?>
																			<?php if($document['ref_document']==NULL) : ?>
																			<div class="row upload-row">
																				<div class="col-10 col-md-14" id="vitality-segment-<?php echo $document['document_id']; ?>">
																					<span class="sub">
																						<div id="dropzone-<?php echo $document['document_id']; ?>">
																							<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="<?php echo $document['document_id']; ?>"  data-doctype="<?php echo $document['document_file_extension']; ?>">
																								<div class="dz-message needsclick">
																								<span class="text">
																									<i class="i i-file_upload"></i> Click here or Drop Files
																								</span>
																								</div>
																							</form>
																						</div>
																					</span>
																					<?php if($document['document_file_extension'] != ""): ?>
																					<p class="text-center m-0"><small><i>Supports only <?php echo $document['document_file_extension']; ?> files</i></small></p>
																					<?php endif; ?>
																				</div>
																				<div class="yearPick" >
																					<i class="i i-year-pick"></i>
																					<input class="yearpick form-control input-upload-year" placeholder="<?php echo $year; ?>" type="text" value="<?php echo $year; ?>" data-document="<?php echo $document['document_id']; ?>" />
																				</div>
																				<button id="btn-collapse-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded btn-add ml-auto " data-toggle="collapse"
																				data-target="#collapse<?php echo $document['document_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $document['document_id']; ?>"><i
																					class="i i-add"></i> </button>
																			</div>
																			<?php endif; ?>
																		</div>
																	</div>
															</div>
														</div>
													</div>
												</div>
												<?php if($document['ref_document']==NULL) : ?>
												<div id="collapse<?php echo $document['document_id']; ?>" class="collapse " aria-labelledby="headingn<?php echo $document['document_id']; ?>" data-parent="#accordionn">
													<div class="acc-body">
														<form id="form-upload-<?php echo $document['document_id']; ?>" class="row align-items-end form-metadata">
															<div class="row align-items-end">
																<?php if(isset($document['metadata'])): ?>
																	<?php $metadata_fields = json_decode($document['metadata']);?>
																	<?php foreach($metadata_fields as $index => $field): ?>
																	<div class="col-lg-7 col-md-12 form-group">
																		<div>
																			<label for="metafield-<?php echo $document['document_id'].$index; ?>"><?php echo $field->metadata; ?></label>
																			<input type="<?php echo $field->datatype; ?>" name="metadata[<?php echo $field->metadata; ?>]" class="form-control" id="metafield-<?php echo $document['document_id'].$index; ?>" placeholder="<?php echo $field->metadata; ?>" required />
																		</div>
																	</div>
																	<?php endforeach; ?>
																<?php endif; ?>
																<div class="col-lg-3 col-md-12 form-group">
																	<button type="submit" id="btn-upload-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
																</div>
															</div>
															<input type="hidden" name="interval" value="vitality" />
															<input type="hidden" name="document_id" value="<?php echo $document['document_id']; ?>" />
															<input type="hidden" name="document_type_id" value="<?php echo $document['document_type_id']; ?>" />
															<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
															<input type="hidden" name="year" value="<?php echo $year; ?>" />
														</form>
													</div>
												</div>
												<?php endif; ?>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>

							<div class="tab-pane fade <?php if($interval=='nav-z4') echo 'show active'; ?>" id="nav-z4" role="tabpanel" aria-labelledby="nav-z4-tab">

								<div class="head">
									<div class="row">
										<div class="col-2"><span class="sub">NO</span></div>
										<div class="col-8"><span class="sub">DOCUMENT NAME</span></div>
										<div class="col-4"><span class="sub">SUBMITTED ON</span></div>
									</div>
								</div>

								<div class="cdnWrap">
									<div class="accordion" id="accordionm">
										<?php foreach($mission_documents as $key => $document): ?>
											<?php $currentDoc = isset($mission_document_status[$document['document_id']]) ? $mission_document_status[$document['document_id']] : NULL; ?>
											<div class="card">
												<div class="card-header" id="headingm<?php echo $document['document_id']; ?>">
													<div class="mb-0">
														<div class="btn wrdiv <?php  echo ($key%2 != 0)? "odd": ""; ?>">
															<div class="row  align-items-center" id="mission-row-<?php echo $document['document_id']; ?>">
																<div class="col-3 col-md-2"><span class="sub"><?php echo $key+1; ?></span></div>
																<div id="name-row-<?php echo $document['document_id']; ?>" class="col-14 col-md-6"><span class="sub "><?php echo $document['document_name']; ?></span></div>
																<!-- <div class="col-7 col-md-4"><span class="sub">12/31/2020</span></div> -->
																	
																<div class="col-24 col-md-15">
																	<div class="intab ">
																		<div class="d-flex header">
																			<span class="year-lbl"><?php echo $year; ?></span>
																			<div class="m-l-auto">
																				<div class="yearPick" >
																				<i class="i i-year-pick"></i>
																				<input class="yearpick form-control input-search-year" placeholder="<?php echo $year; ?>" type="text" value="<?php echo $year; ?>" data-document="<?php echo $document['document_id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-interval="mission" />
																				</div>
																			</div>
																		</div>
																		<?php if(!empty($currentDoc['document'])): ?>
																			<?php foreach($currentDoc['document'] as $ref): ?>
																				<div class="row">
																					<div class="col-14 col-md-18"><span class="text-primary"><a href="<?php echo base_url($ref['performance_im_mi_upload_file']);?>" target="_blank"><?php echo $ref['performance_im_mi_upload_file_name']; ?></a></span></div>
																					<div class="col-10 col-md-6"><span class="statround"><?php echo date('m/d/Y', strtotime($ref['performance_im_mi_submitted_date'])); ?></span></div>
																				</div>
																			<?php endforeach; ?>
																		<?php else: ?>
																			<div class="row">
																				<div class="col-24 text-center">No documents found!</div>
																			</div>
																		<?php endif; ?>
																		<div class="row upload-row">
																			<div class="col-10 col-md-14" id="mission-segment-<?php echo $document['document_id']; ?>">
																				<span class="sub">
																					<div id="dropzone-<?php echo $document['document_id']; ?>">
																						<form action="<?php echo base_url('module/affiliate/document/upload'); ?>" class="dropzone needsclick" data-document="<?php echo $document['document_id']; ?>"  data-doctype="<?php echo $document['document_file_extension']; ?>">
																							<div class="dz-message needsclick">
																								<span class="text">
																									<i class="i i-file_upload"></i> Click here or Drop Files
																								</span>
																							</div>
																						</form>
																					</div>
																				</span>
																				<?php if($document['document_file_extension'] != ""): ?>
																				<p class="text-center m-0"><small><i>Supports only <?php echo $document['document_file_extension']; ?> files</i></small></p>
																				<?php endif; ?>
																			</div>
																			<div class="yearPick" >
																				<i class="i i-year-pick"></i>
																				<input class="yearpick form-control input-upload-year" placeholder="<?php echo $year; ?>" type="text" value="<?php echo $year; ?>" data-document="<?php echo $document['document_id']; ?>" />
																			</div>
																			<button id="btn-collapse-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded btn-add ml-auto " data-toggle="collapse"
																			data-target="#collapse<?php echo $document['document_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $document['document_id']; ?>"><i
																				class="i i-add"></i> </button>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>
												</div>
												<div id="collapse<?php echo $document['document_id']; ?>" class="collapse " aria-labelledby="headingm<?php echo $document['document_id']; ?>" data-parent="#accordionm">
													<div class="acc-body">
														<form id="form-upload-<?php echo $document['document_id']; ?>" class="row align-items-end form-metadata">
															<div class="row align-items-end">
																<?php if(isset($document['metadata'])): ?>
																	<?php $metadata_fields = json_decode($document['metadata']);?>
																	<?php foreach($metadata_fields as $index => $field): ?>
																	<div class="col-lg-7 col-md-12 form-group">
																		<div>
																			<label for="metafield-<?php echo $document['document_id'].$index; ?>"><?php echo $field->metadata; ?></label>
																			<input type="<?php echo $field->datatype; ?>" name="metadata[<?php echo $field->metadata; ?>]" class="form-control" id="metafield-<?php echo $document['document_id'].$index; ?>" placeholder="<?php echo $field->metadata; ?>" required />
																		</div>
																	</div>
																	<?php endforeach; ?>
																<?php endif; ?>
																<div class="col-lg-3 col-md-12 form-group">
																	<button type="submit" id="btn-upload-<?php echo $document['document_id']; ?>" class="btn btn-primary btn-rounded min w-100px">UPLOAD</button>
																</div>
															</div>
															<input type="hidden" name="interval" value="mission" />
															<input type="hidden" name="document_id" value="<?php echo $document['document_id']; ?>" />
															<input type="hidden" name="document_type_id" value="<?php echo $document['document_type_id']; ?>" />
															<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
															<input type="hidden" name="year" value="<?php echo $year; ?>" />
														</form>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>

							<!-- <div class="tab-pane fade " id="nav-z5" role="tabpanel" aria-labelledby="nav-z5-tab">Otherssss</div> -->

							<div class="tab-pane fade <?php if($interval=='nav-z5') echo 'show active'; ?>" id="nav-z5" role="tabpanel" aria-labelledby="nav-y5-tab">

								<div class="head m-t-30">
									<div class="row">
									<div class="col-24"><span class="sub ">
										<div class="t-c">OTHERS</div>
										</span></div>


									</div>
								</div>

								<div class="cdnWrap ">
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header" id="headingOne">
												<div class="mb-0">
													<div class="btn wrdiv odd">
														<div class="row  align-items-center">
															<div class="col-3 col-md-2"><span class="sub">1</span></div>
															<div class="col-14 col-md-6"><span class="sub ">Other Performance Assessment Documents</span></div>
															<div class="col-7 col-md-4"><span class="sub"></span></div>
															<div class="col-20 col-md-10">
															<span class="sub">
																<div class="dropzone">
																	<form action="/upload" class="o_dZUpload needsclick">
																		<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																		<input type="hidden" name="notification" value="Performance Assessment other document is uploaded" />
																		<input type="hidden" name="document_type_id" value="9" />
																		<input type="hidden" name="document_type" value="other_performance_assessment_documents" />
																		
																		<div class="dz-default dz-message">
																		<span class="text">
																		<i class="i i-file_upload"></i>
																		Click here or Drop Files
																		</span>
																		</div>
																	</form>
																</div>
															</span>
															</div>
															<button class="btn btn-primary btn-rounded btn-add ml-auto " data-toggle="collapse"
															data-target=".collapselegal" aria-expanded="false" aria-controls="collapsedoc"><i
															class="i i-add"></i> </button>
														</div>
													</div>
												</div>
											</div>
											<div id="collapselegal" class="collapse collapsedoc" aria-labelledby="headingOne"
											data-parent="#accordionExample">
												<div class="acc-body">
													<div class="row align-items-end">
														<div class="col-lg-3 col-md-12 form-group">
															<a class="btn btn-primary btn-rounded min w-100px btn-upload-o" id="btn-upload-o-p">UPLOAD</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- <div class="tab-pane fade show active" id="nav-z23" role="tabpanel" aria-labelledby="nav-z23-tab"> -->
									<div class="head">
										<div class="row align-items-center">
											<div class="col-3 col-md-3"><span class="sub">NO</span></div>
											<div class="col-10 col-md-10"><span class="sub">DOCUMENT NAME</span></div>
											<div class="col-3 col-md-3"><span class="sub">DETAILS</span></div>
										</div>
									</div>
									<div class="cdnWrap">
										<div class="accordion"  id="per_other_loop">
											<?php
											$i=1;  
											foreach ($performance_other as $other){ ?>
											<div class="card">
												<div class="card-header">
													<div class="mb-0">
														<div class="btn wrdiv <?php if($i%2==0) echo "odd"; ?>">
															<div class="row  align-items-center">
																<div class="col-3 col-md-3"><span class="sub"><?=$i++?></span></div>
																<div class="col-24 col-md-10"><span class="sub"><a href="<?= base_url().$other['performance_other_upload_file']?>" target="_blank"><?=isset($other['performance_other_upload_file_name'])?$other['performance_other_upload_file_name']:''?></a>
																	<a href="javascript:reupload('per-other', <?php echo $other['performance_o_id']; ?>);">
																	<span><i class="i i-create"></i> 
																	</span>
																	</a>
																	
																	 <a href="#" class="delete_upload" doc_type="other_performance_assessment_documents" del_document_id="<?=$other['performance_o_id']?>" a_id_document="<?=$other['affiliate_id']?>" doc_type_id="<?=$other['document_id']?>">
																	 <span><i class="i i-delete"></i> </span></a>
																	
																	</span>
																</div>
																<div class="col-24 col-md-10" id="per-other-row-<?php echo $other['performance_o_id']; ?>">
																	<div class="chatBox">
																		<div class="chatBoxinn">
																			<?php if(isset($other['comments'])): ?>
																				<?php foreach($other['comments'] as $comment): ?>
																				<div class="chatrow">
																					<span class="user <?php echo ($comment['created_by'] === $this->session->userdata('user_id')) ? 'send' : 'rec'; ?>"><?php echo strtoupper($comment['first_name'][0].$comment['last_name'][0]); ?></span>
																					<div class="chatline">
																						<div class="h6"><?php echo $comment['notification']; ?></div>
																						<span class="text-primary">
																							<?php echo $comment['first_name'].' '.$comment['last_name']; ?>
																						</span>
																						<span class="ml-auto text-secondary">
																						<?php echo date("jS M,Y | H:i", strtotime($comment['created'])); ?>
																						</span>
																					</div>
																				</div>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</div>
																		<div class="search collapsed">
																			<input type="text" class="input-comment" data-doctypecustom="other_performance_assessment_documents" data-document="<?php echo $other['performance_o_id']; ?>" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="<?php echo $other['document_id']; ?>" placeholder="Type here" />
																			<a class="btn btn-secondary   btn-rounded btn-action-sm "><i
																			class="i i-chat-box"></i> </a>
																		</div>
																		<label class="mt-2 ml-3 small" style="display:none;">Hit 'Enter' to send.</label>
																	</div>
																	<div class="upload d-none">
																		<div class="card">
																			<div class="card-header" id="headingOne">
																			<div class="mb-0">
																				<div class="btn wrdiv border-0">
																					<div class="row  align-items-center">
																						<div class="col-20 col-md-16">
																						<span class="sub">
																							<div class="dropzone">
																								<form action="/upload" class="l_dZUpload needsclick">
																									<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
																									<input type="hidden" name="notification" value="Performance Assessment other document is uploaded" />
																									<input type="hidden" name="document_type_id" value="9" />
																									<input type="hidden" name="other_id" value="<?php echo $other['performance_o_id']; ?>" />
																									<input type="hidden" name="document_type" value="other_performance_assessment_documents" />
																									<div class="dz-default dz-message">
																									<span class="text">
																									<i class="i i-file_upload"></i>
																									Click here or Drop Files
																									</span>
																									</div>
																								</form>
																							</div>
																						</span>
																						</div>
																						<div class="col-lg-3 col-md-8">
																						<a class="btn btn-primary btn-rounded min w-100px btn-upload-l" id="btn-upload-l">UPLOAD</a>
																						</div>
																					</div>
																				</div>
																			</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								<!-- </div> -->

							</div>
							
						</div>

					</div>
					<div class="tab-pane fade <?php if($tabSelected==3) echo 'show active'; ?>" id="nav-x3" role="tabpanel" aria-labelledby="nav-x3-tab">
						<form id="form-search-key-indicators" method="post" action="#" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>">
							<div class="row m-y-20 align-items-center">

								<div class="col-lg-15 col-md-6 col-sm-24">
									<?php
									if($key_quarter == 1)
										$quarterName = 'JAN - MAR '.$key_year;
									else if($key_quarter == 2)
										$quarterName = 'APR - JUN '.$key_year;
									else if($key_quarter == 3)
										$quarterName = 'JUL - SEP '.$key_year;
									else
										$quarterName = 'OCT - DEC '.$key_year;
									?>
									<div id="label-duration" class="h5 f-bold"><?php echo $quarterName; ?></div>
								</div>
								
								<div class="col-12 col-md-6 col-lg-3"><span class="sub">
									<select id="key-quarter" name="quarter" class="form-control selectp-r">
										<option value="1" <?php if($key_quarter == "1") echo "selected"; ?>>Q 1</option>
										<option value="2" <?php if($key_quarter == "2") echo "selected"; ?>>Q 2</option>
										<option value="3" <?php if($key_quarter == "3") echo "selected"; ?>>Q 3</option>
										<option value="4" <?php if($key_quarter == "4") echo "selected"; ?>>Q 4</option>
									</select>
								</span></div>
								<div class="col-12 col-md-6 col-lg-3">
									<div class="yearPick">
										<i class="i i-year-pick"></i>
										<input id="key-year" class="yearpick form-control" name="year" type="text" value="<?php echo $key_year; ?>" />
									</div>
								</div>

								<div class="col-24  col-md-6 col-lg-3 t-c">
									<button class="btn btn-primary btn-rounded min w-100px" type="submit">SEARCH</button>
								</div>
							</div>
						</form>
						<?php $key_indicators = isset($key_indicators_details['key_indicators']) ? $key_indicators_details['key_indicators'] : NULL; ?>
						<?php $key_indicators_id = isset($key_indicators_details['key_indicators_id']) ? $key_indicators_details['key_indicators_id'] : NULL; ?>
						<form id="form-key-indicators" method="post" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>">
							<div class="cdnWrap round">
								<input type="hidden" id="key_indicators_status" value="<?=isset($key_indicators_details['status'])?$key_indicators_details['status']:''?>">
							<fieldset id='fieldset_disable' style="padding: 0px;border-radius: 0px;border: none;">
								<ul class="altUl">
									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div>Liquidity $</div>
											<div class="innControll"><input type="text" name="liquidity" id="liquidity_v" class="form-control liquidity_v_blur" value="<?php echo (isset($key_indicators['liquidity']) && $key_indicators['liquidity'] != "") ? number_format($key_indicators['liquidity'], 0, '.', ',') : ""; ?>" readonly/> </div>
										</div>
										<div class="d-flex align-items-center">
											<div>(Definition of Liquidity - Financial assets available to meet cash needs for general expenditures within one year).</div>
										</div>
										<div class="d-flex align-items-center">
											<div>Financial assets $ </div>
											<div class="innControll"><input type="text" name="liquidity_assets_available" id="liquidity_assets_available_v" class="form-control liquidity_v_blur" value="<?php echo isset($key_indicators['liquidity_assets_available']) ? $key_indicators['liquidity_assets_available'] : ""; ?>" /> </div>
										</div>
										<div class="d-flex align-items-center">
											<div>Less those unavailable for general expenditures within one year, due to: </div>
										</div>

										<div class="d-flex align-items-center">
											<div>(1) Contractual or donor-imposed restrictions: $</div>
											<div class="innControll"><input type="text" name="liquidity_contractual_restrictions" id="liquidity_contractual_restrictions_v" class="form-control liquidity_v_blur" value="<?php echo isset($key_indicators['liquidity_contractual_restrictions']) ? $key_indicators['liquidity_contractual_restrictions'] : ""; ?>" /> </div>
										</div>

										<div class="d-flex align-items-center">
											<div>(2) Restricted by donor with time or purpose restrictions: $</div>
											<div class="innControll"><input type="text" name="liquidity_restrictions_by_donor" id="liquidity_restrictions_by_donor_v" class="form-control liquidity_v_blur" value="<?php echo isset($key_indicators['liquidity_restrictions_by_donor']) ? $key_indicators['liquidity_restrictions_by_donor'] : ""; ?>" /> </div>
										</div>
										<div class="d-flex flex-column justify-content-start">
											<div class="d-flex flex-row align-items-center">
											<span>Qualitative Narrative</span>
											<a class="ml-2 h4 text-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
											<i class="i i i-chat-line"></i>
											</a>
											</div>
											<div class="collapse" id="collapseExample">
											<div class="card card-body">
												<input type="text" class="form-control" id="qualitative_narrative" value="<?php echo isset($key_indicators['qualitative_narrative']) ? $key_indicators['qualitative_narrative'] : ""; ?>" name="qualitative_narrative" placeholder="comment" style="height:60px;border-radius:6px;" />
											</div>
											</div>
										</div>
									</li>
									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div>Current Ratio</div>
											<div class="innControll"><input type="text" name="current_ratio" id="current_ratio_v" class="form-control current_ratio_blur" value="<?php echo isset($key_indicators['current_ratio']) ? $key_indicators['current_ratio'] : ""; ?>" readonly/> </div>
											<div> (Current Assets $</div>
											<div class="innControll"><input type="text" name="current_assets" id="current_assets_v" class="form-control current_ratio_blur" value="<?php echo isset($key_indicators['current_assets']) ? $key_indicators['current_assets'] : ""; ?>" /> </div>
											<div>/ Current Liabilities $</div>
											<div class="innControll"><input type="text" name="current_liabilities" id="current_liabilities_v" class="form-control current_ratio_blur" value="<?php echo isset($key_indicators['current_liabilities']) ? $key_indicators['current_liabilities'] : ""; ?>" /> </div>)
										</div>
									</li>

									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div>Current Debt Ratio (Compared to LYYTD) - </div>
											<div class="innControll"><input type="text" name="current_debt_ratio" id="current_debt_ratio_v" class="form-control current_debt_ratio_blur" value="<?php echo isset($key_indicators['current_debt_ratio']) ? $key_indicators['current_debt_ratio'] : ""; ?>" readonly/></div>
											<div> (Total Liabilities $</div>
											<div class="innControll"><input type="text" name="total_liabilities" id="total_liabilities_v" class="form-control current_debt_ratio_blur" value="<?php echo isset($key_indicators['total_liabilities']) ? $key_indicators['total_liabilities'] : ""; ?>" /></div>
											<div>/ Total Assets $</div>
											<div class="innControll"><input type="text" name="total_assets"  id="total_assets_v" class="form-control current_debt_ratio_blur" value="<?php echo isset($key_indicators['total_assets']) ? $key_indicators['total_assets'] : ""; ?>" /></div>)
										</div>
									</li>

									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div>Change in Cash YTD	$</div>
											<div class="innControll"><input type="text" name="change_in_cash_ytd" id="change_in_cash_ytd_v" class="form-control change_in_cash_ytd_blur" value="<?php echo (isset($key_indicators['change_in_cash_ytd']) && $key_indicators['change_in_cash_ytd'] != "") ? number_format($key_indicators['change_in_cash_ytd'], 0, '.', ',') : ""; ?>" readonly/></div>
										</div>
										<div class="d-flex align-items-center">
											<div>From Operations: $</div>
											<div class="innControll"><input type="text" name="from_operations" id="from_operations_v" class="form-control change_in_cash_ytd_blur" value="<?php echo isset($key_indicators['from_operations']) ? $key_indicators['from_operations'] : ""; ?>" /></div>
										</div>
										<div class="d-flex align-items-center">
											<div>From Financing: $</div>
											<div class="innControll"><input type="text" name="from_financing" id="from_financing_v" class="form-control change_in_cash_ytd_blur" value="<?php echo isset($key_indicators['from_financing']) ? $key_indicators['from_financing'] : ""; ?>" /></div>
										</div>
										<div class="d-flex align-items-center">
											<div>From Investing: $</div>
											<div class="innControll"><input type="text" name="from_investing" id="from_investing_v" class="form-control change_in_cash_ytd_blur" value="<?php echo isset($key_indicators['from_investing']) ? $key_indicators['from_investing'] : ""; ?>" /></div>
										</div>
									</li>
									
									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div class="p-t-5">Operating Efficiency </div>
										</div>
										<div class="d-flex align-items-center">
											<div>Program</div>
											<div class="innControll"><input type="text" name="operating_efficiency_program_value" id="operating_efficiency_program_value_v" class="form-control operating_efficiency_program_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_program_value']) ? $key_indicators['operating_efficiency_program_value'] : ""; ?>" readonly/> </div>
											<div>% (Program Expense $</div>
											<div class="innControll"><input type="text" name="operating_efficiency_program_expense" id="operating_efficiency_program_expense_v" class="form-control operating_efficiency_program_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_program_expense']) ? $key_indicators['operating_efficiency_program_expense'] : ""; ?>" /> </div>
											<div>/ Total Expense $ </div>
											<div class="innControll"><input type="text" name="operating_efficiency_program_total_expense" id="operating_efficiency_program_total_expense_v" class="form-control operating_efficiency_program_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_program_total_expense']) ? $key_indicators['operating_efficiency_program_total_expense'] : ""; ?>" /> </div>)
										</div>
										<div class="d-flex align-items-center">
											<div>Admin</div>
											<div class="innControll"><input type="text" name="operating_efficiency_admin_value" id="operating_efficiency_admin_value_v" class="form-control operating_efficiency_admin_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_admin_value']) ? $key_indicators['operating_efficiency_admin_value'] : ""; ?>" readonly/> </div>
											<div>% (Admin Expense $</div>
											<div class="innControll"><input type="text" name="operating_efficiency_admin_expense" id="operating_efficiency_admin_expense_v" class="form-control operating_efficiency_admin_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_admin_expense']) ? $key_indicators['operating_efficiency_admin_expense'] : ""; ?>" /> </div>
											<div>/ Total Expense $ </div>
											<div class="innControll"><input type="text" name="operating_efficiency_admin_total_expense" id="operating_efficiency_admin_total_expense_v" class="form-control operating_efficiency_admin_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_admin_total_expense']) ? $key_indicators['operating_efficiency_admin_total_expense'] : ""; ?>" /> </div>)
										</div>
										<div class="d-flex align-items-center">
											<div>Fundraising</div>
											<div class="innControll"><input type="text" name="operating_efficiency_fundraising_value" id="operating_efficiency_fundraising_value_v" class="form-control operating_efficiency_fundraising_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_fundraising_value']) ? $key_indicators['operating_efficiency_fundraising_value'] : ""; ?>" readonly/> </div>
											<div>% (Fundraising Expense $</div>
											<div class="innControll"><input type="text" name="operating_efficiency_fundraising_expense" id="operating_efficiency_fundraising_expense_v" class="form-control operating_efficiency_fundraising_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_fundraising_expense']) ? $key_indicators['operating_efficiency_fundraising_expense'] : ""; ?>" /> </div>
											<div>/ Total Expense $ </div>
											<div class="innControll"><input type="text" name="operating_efficiency_fundraising_total_expense" id="operating_efficiency_fundraising_total_expense_v" class="form-control operating_efficiency_fundraising_value_blur" value="<?php echo isset($key_indicators['operating_efficiency_fundraising_total_expense']) ? $key_indicators['operating_efficiency_fundraising_total_expense'] : ""; ?>" /> </div>)
										</div>
									</li>

									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div>Change in N/A without donor restrictions (Quarter) $</div>
											<div class="innControll"><input type="text" name="change_in_net_assets_in_quarter" id="change_in_net_assets_in_quarter_v" class="form-control change_in_net_assets_in_quarter_blur" value="<?php echo (isset($key_indicators['change_in_net_assets_in_quarter']) && $key_indicators['change_in_net_assets_in_quarter'] != "") ? number_format($key_indicators['change_in_net_assets_in_quarter'], 0, '.', ',') : ""; ?>" readonly/> </div>
										</div>

										<div class="d-flex align-items-center">
											<div>Net Assets w/o donor restrictions at last quarter</div>
											<div class="innControll">
												<!-- <div class="yearPick">
													<i class="i i-year-pick"></i>
													<input class="yearpick form-control" placeholder="2019" type="text" name="net_assets_in_last_quarter_year" value="<?php echo isset($key_indicators['net_assets_in_last_quarter_year']) ? $key_indicators['net_assets_in_last_quarter_year'] : ""; ?>" />
												</div> -->
											</div>
											<div>$</div>
											<div class="innControll"><input type="text" class="form-control change_in_net_assets_in_quarter_blur" name="net_assets_in_last_quarter_value" id="net_assets_in_last_quarter_value_v" value="<?php echo isset($key_indicators['net_assets_in_last_quarter_value']) ? $key_indicators['net_assets_in_last_quarter_value'] : ""; ?>" /> </div>
											<div>,Less</div>
										</div>

										<div class="d-flex align-items-center">
											<div>Net Assets w/o donor restrictions at this quarter</div>
											<div class="innControll">
												<!-- <div class="yearPick">
													<i class="i i-year-pick"></i>
													<input class="yearpick form-control" placeholder="2019" type="text" name="less_net_assets_in_last_quarter_year" value="<?php echo isset($key_indicators['less_net_assets_in_last_quarter_year']) ? $key_indicators['less_net_assets_in_last_quarter_year'] : ""; ?>" />
												</div> -->
											</div>
											<div>$</div>
											<div class="innControll"><input type="text" class="form-control change_in_net_assets_in_quarter_blur" name="less_net_assets_in_last_quarter_value" id="less_net_assets_in_last_quarter_value_v" value="<?php echo isset($key_indicators['less_net_assets_in_last_quarter_value']) ? $key_indicators['less_net_assets_in_last_quarter_value'] : ""; ?>" /> </div>
										</div>
									</li>

									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div>Days in Cash</div>
											<div class="innControll"><input type="text" class="form-control days_in_cash_blur" id="days_in_cash_v" name="days_in_cash" value="<?php echo isset($key_indicators['days_in_cash']) ? $key_indicators['days_in_cash'] : ""; ?>" readonly/> </div>
											<div>days.</div>
										</div>
										<div class="d-flex align-items-center">
											<div> Unrestricted Cash and Equivalents 
											</div>
											<div class="innControll">
											<input type="text" class="form-control days_in_cash_blur" name="Equivalents" id="Equivalents_v" value="<?php echo isset($key_indicators['Equivalents']) ? $key_indicators['Equivalents'] : ""; ?>" />
											 </div>
											<div>/ Avg. Daily Cost of Operations </div>
											<div class="innControll"><input type="text" class="form-control days_in_cash_blur" id="daily_cost_operation_v" name="daily_cost_operation" value="<?php echo isset($key_indicators['daily_cost_operation']) ? $key_indicators['daily_cost_operation'] : ""; ?>" /> </div>
											
											<div> (excluding depreciation)</div>
										</div>
									</li>

									<li class="wrapIn">
										<div class="d-flex align-items-center">
										<div>Current Grants TY YTD</div>
										<div class="innControll"><input type="text" class="form-control" name="change_in_grant_ty_ytd" value="<?php echo isset($key_indicators['change_in_grant_ty_ytd']) ? $key_indicators['change_in_grant_ty_ytd'] : ""; ?>"/> </div>
										<div>and $</div>
										<div class="innControll"><input type="text" class="form-control" name="change_in_grant_ty_ytd_value" value="<?php echo isset($key_indicators['change_in_grant_ty_ytd_value']) ? $key_indicators['change_in_grant_ty_ytd_value'] : ""; ?>" /> </div>
										<div>VS LY YTD</div>
										<div class="innControll"><input type="text" class="form-control" name="change_in_grant_ly_ytd" value="<?php echo isset($key_indicators['change_in_grant_ly_ytd']) ? $key_indicators['change_in_grant_ly_ytd'] : ""; ?>" /> </div>
										<div>and $</div>
										<div class="innControll"><input type="text" class="form-control" name="change_in_grant_ly_ytd_value" value="<?php echo isset($key_indicators['change_in_grant_ly_ytd_value']) ? $key_indicators['change_in_grant_ly_ytd_value'] : ""; ?>" /> </div>
										</div>
									</li>
									<li class="wrapIn">
										<div class="d-flex align-items-center">
										<div>Net Assets, without donor restrictions Positive?</div>
										<div class="innControll">
											<div>
											<label class="checkbox switch bool mb-0 <?php if(isset($key_indicators['is_net_assets_positive'])) echo "checked"; ?>" for="pu-dx">
												<input id="pu-dx" type="checkbox" name="is_net_assets_positive" value="Y" <?php if(isset($key_indicators['is_net_assets_positive'])) echo "checked"; ?>>
											</label>
											</div>
										</div>

										</div>
									</li>

									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div>Board Giving </div>
											<div class="innControll"><input type="text" name="borad_giving" id="borad_giving_v" class="form-control borad_giving_blur" value="<?php echo isset($key_indicators['borad_giving']) ? $key_indicators['borad_giving'] : ""; ?>" readonly/> </div>
											<div>% YTD Direct Board Contributions $</div>
											<div class="innControll"><input type="text" name="direct_borad_giving" id="direct_borad_giving_v" class="form-control borad_giving_blur" value="<?php echo isset($key_indicators['direct_borad_giving']) ? $key_indicators['direct_borad_giving'] : ""; ?>" /> </div>
											<div>/ Total Annual Board Commitment $</div>
											<div class="innControll"><input type="text" name="borad_commitment" id="borad_commitment_v" class="form-control borad_giving_blur" value="<?php echo isset($key_indicators['borad_commitment']) ? $key_indicators['borad_commitment'] : ""; ?>" /> </div>
										</div>
									</li>
									<li class="wrapIn">
										<div class="d-flex align-items-center">
											<div>Operating Reserves </div>
											<div class="innControll"><input type="text" name="operating_reserves_percentage" id="operating_reserves_percentage_v" class="form-control operating_reserves_percentage_blur" value="<?php echo isset($key_indicators['operating_reserves_percentage']) ? $key_indicators['operating_reserves_percentage'] : ""; ?>" readonly/> </div>
											<div class="after">%</div>
										</div>
										<div class="d-flex align-items-center">
											<div>Operating Reserves $</div>
											<div class="innControll"><input type="text" name="operating_reserves_amount" id="operating_reserves_amount_v" class="form-control operating_reserves_percentage_blur" value="<?php echo isset($key_indicators['operating_reserves_amount']) ? $key_indicators['operating_reserves_amount'] : ""; ?>" /> </div>
											<div> / Three Months of annual expenses $</div>
											<div class="innControll"><input type="text" name="three_months_annual_expenses" id="three_months_annual_expenses_v" class="form-control operating_reserves_percentage_blur" value="<?php echo isset($key_indicators['three_months_annual_expenses']) ? $key_indicators['three_months_annual_expenses'] : ""; ?>" /> </div>
										</div>
									</li>
								</ul>
							</div>

							</fieldset>

							<?php if(isset($key_indicators_details['status']) && $key_indicators_details['status'] == 1){ 
										$btn_s = "btn btn-success";
										$btn_s_name="Approved"; 
									}else{
										$btn_s = "btn btn-primary";
										$btn_s_name="SAVE"; 
									}?>
							<div class="d-flex p-b-20">
							<?php if($this->session->role_id != 1 ){ ?>
								<button class="<?=$btn_s?> btn-rounded min w-100px ml-auto" type="submit" id='key_indicators_save_btn_u'><span class ="key_indicators_save_btn_u_s"><?=$btn_s_name?></span></button>
							<?php }else{ ?>
								<button class="btn btn-primary btn-rounded min w-100px ml-auto" type="submit" id='key_indicators_save_btn'>SAVE</button>
							<?php } ?>
								<input type="hidden" id="affiliate_id_val" value="<?php echo $affiliate['affiliate_id']; ?>" />
								<?php if($this->session->role_id == 1 ){ ?>

									<?php if(isset($key_indicators_details['status']) && $key_indicators_details['status'] == 1){ 
										$btn = "btn btn-success";
										$btn_name="Approved"; 
									}else{
										$btn = "btn btn-primary";
										$btn_name="Approve"; 
									}?>
									<input type="button"  class="<?=isset($key_indicators['liquidity'])?'d-block':'d-none'?> <?=$btn?>  btn-rounded min w-100px m-l-10 key_indicators_approve_btn" 
									value="<?=$btn_name?>" id="form-key-indicators-approve">
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>

      	</div>
    </div>
</main>
<script id="template-comment" type="x-tmpl-mustache">
{{#comment}}
<div class="chatrow">
	<span class="user send">{{avatar}}</span>
	
	<div class="chatline">
		<div class="h6">{{notification}}</div>
		<span class="text-primary">{{first_name}} {{last_name}}</span>
		<span class="ml-auto text-secondary">{{commentTime}}</span>
	</div>
</div>
{{/comment}}
</script>
<script id="template-submitted" type="x-tmpl-mustache">
<div class="col-24 col-md-5" id="doc-status-{{document.document_id}}">
	<span class="sub">
		<?php if($this->session->role_id == 1): ?>
			<select class="form-control selG" data-interval="{{document.interval}}" data-documentid="{{document.added_document_id}}">
				<?php foreach($document_status as $status): ?>
					<option value="<?php echo $status['id']; ?>"><?php echo $status['name']; ?></option>
				<?php endforeach; ?>
			</select>
		<?php else: ?>
			<a href="javascript:(0)" class="btn btn-lbl" data-rel="tooltip" data-placement="bottom" title="Review Pending"><i class="i i-review-pending r-pending"></i> </a>
		<?php endif; ?>
	</span>
</div>

<div class="col-24 col-md-7" id="chat-box-{{document.document_id}}">

	<div class="chatBox">
		<div class="chatBoxinn">
			{{#comment}}
			<div class="chatrow">
				<span class="user send">{{avatar}}</span>
				
				<div class="chatline">
					<div class="h6">{{notification}}</div>
					<span class="text-primary">{{first_name}} {{last_name}}</span>
					<span class="ml-auto text-secondary">{{commentTime}}</span>
				</div>
			</div>
			{{/comment}}
		</div>

		<div class="search collapsed">
			<input type="text" class="input-comment" id="{{document.interval}}-comment-{{document.added_document_id}}" data-document="{{document.added_document_id}}" data-affiliate="{{document.affiliate_id}}" data-doctype="{{document.document_type_id}}" placeholder="Type here" />
			<a class="btn btn-secondary btn-rounded btn-action-sm "><i
			class="i i-chat-box"></i><span class="sr-only">Add</span></a>
		</div>
		<label class="mt-2 ml-3 small" for="{{document.interval}}-comment-{{document.added_document_id}}" style="display:none;">Hit 'Enter' to send.</label>
	</div>

</div>
</script>
<script id="template-other-row" type="x-tmpl-mustache">
<div class="row w-100" {{#isEmpty}}style="border-top:0;"{{/isEmpty}}>
	<div class="col-14 col-md-18"><span class="text-primary"><a href="{{documentPath}}" target="_blank">{{filename}}</a></span></div>
	<div class="col-10 col-md-6"><span class="statround">{{submittedTime}}</span></div>
</div>
</script>
<script id="template-performance" type="x-tmpl-mustache">
<!-- <div class="col-24 col-md-15">
	<div class="intab ">
		<div class="d-flex header">
			<span class="year-lbl">{{document.year}}</span>
			<div class="m-l-auto">
				<div class="yearPick" >
				<i class="i i-year-pick"></i>
				<input class="yearpick form-control input-search-year" placeholder="<?php echo $year; ?>" type="text" value="{{document.year}}" data-document="{{document.document_id}}" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-interval="{{document.interval}}" />
				</div>
			</div>
		</div> -->
		<div class="row">
			<div class="col-14 col-md-18"><span class="text-primary"><a href="{{documentPath}}" target="_blank">{{document.file_name}}</a></span></div>
			<div class="col-10 col-md-6"><span class="statround">{{submittedTime}}</span></div>
		</div>
<!-- 	</div>
</div> -->
</script>
<script id="template-performance-filter" type="x-tmpl-mustache">
{{#documents}}
<div class="row">
	<div class="col-14 col-md-18"><span class="text-primary"><a href="{{documentPath}}" target="_blank">{{filename}}</a></span></div>
	<div class="col-10 col-md-6"><span class="statround">{{submittedTime}}</span></div>
</div>
{{/documents}}
{{^documents}}
<div class="row">
	<div class="col-24 text-center">No documents found!</div>
</div>
{{/documents}}
</script>
<script id="template-self-assessment" type="x-tmpl-mustache">
{{#documents}}
<div class="row">
	<div class="col-14 col-md-18"><span class="text-primary"><a href="{{documentPath}}" target="_blank">{{filename}}</a></span></div>
	<div class="col-10 col-md-6"><span class="statround">{{submittedTime}}</span></div>
</div>
<div class="card">
	<div class="card-header">
		<div class="mb-0">
			<div class="btn wrdiv">
				<div class="row  align-items-center">
					<div class="col-3 col-md-3"><span class="sub">{{key}}</span></div>
					<div class="col-10 col-md-10"><span class="sub "><a href="{{documentPath}}" target="_blank">{{document_name}}</a></span></div>
					<div class="col-3 col-md-3"><span class="sub">{{assessment_start_year}}</span></div>
					<div class="col-3 col-md-3"><span class="sub">{{assessment_end_year}}</span></div>
					<div class="col-4 col-md-4"><span class="sub">{{createdDate}}</span></div>
				</div>
			</div>
		</div>
	</div>
</div>
{{/documents}}
</script>

<script id="template-legal" type="x-tmpl-mustache">
{{#documents}}
<div class="card">
	<div class="card-header">
		<div class="mb-0">
			<div class="btn wrdiv">
				<div class="row  align-items-center">
					<div class="col-3 col-md-3"><span class="sub" >{{count}}</span></div>
					<div class="col-10 col-md-10"><span class="sub"><a href="{{documentPath}}" target="_blank">{{quarterly_upload_file_name}}</a>
					<a href="javascript:reupload('legal', {{legal_d_id}});">
																	<span><i class="i i-create"></i>
																	</span>
																	</a>
																	<a href="#" class="delete_upload" doc_type="legal_compliance_document" del_document_id="{{legal_d_id}}" a_id_document="<?php echo $affiliate['affiliate_id']; ?>" doc_type_id="{{document_id}}">
																	 <span><i class="i i-delete"></i> </span></a>
																	</span></div>
					<div class="col-24 col-md-10" id="legal-row-{{legal_d_id}}">
						<div class="chatBox">
							<div class="chatBoxinn">
								{{#comments}}
								<div class="chatrow">
									<span class="user send">{{avatar}}</span>
									
									<div class="chatline">
										<div class="h6">{{notification}}</div>
										<span class="text-primary">{{first_name}} {{last_name}}</span>
										<span class="ml-auto text-secondary">{{commentTime}}</span>
									</div>
								</div>
								{{/comments}}
							</div>
							<div class="search collapsed">
								<input type="text" class="input-comment"  data-document="{{legal_d_id}}" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="{{document_id}}" placeholder="Type here" />
								<a class="btn btn-secondary   btn-rounded btn-action-sm "><i
								class="i i-chat-box"></i> </a>
							</div>
							<label class="mt-2 ml-3 small" style="display:none;">Hit 'Enter' to send.</label>
						</div>
						<div class="upload d-none">
							<div class="card">
								<div class="card-header" id="headingOne">
								<div class="mb-0">
									<div class="btn wrdiv border-0">
										<div class="row  align-items-center">
											<div class="col-20 col-md-16">
											<span class="sub">
												<div class="dropzone">
													<form action="/upload" class="l_dZUpload needsclick">
														<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
														<input type="hidden" name="notification" value="Compliance legal document is uploaded" />
														<input type="hidden" name="document_type_id" value="10" />
														<input type="hidden" name="legal_id" value="{{legal_d_id}}" />
														<input type="hidden" name="document_type" value="legal_compliance_document" />
														<div class="dz-default dz-message">
														<span class="text">
														<i class="i i-file_upload"></i>
														Click here or Drop Files
														</span>
														</div>
													</form>
												</div>
											</span>
											</div>
											<div class="col-lg-3 col-md-8">
											<a class="btn btn-primary btn-rounded min w-100px btn-upload-l" id="btn-upload-l">UPLOAD</a>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
{{/documents}}
</script>
<script id="template-other" type="x-tmpl-mustache">
{{#documents}}
<div class="card">
	<div class="card-header">
		<div class="mb-0">
			<div class="btn wrdiv">
				<div class="row  align-items-center">
					<div class="col-3 col-md-3"><span class="sub" >{{count}}</span></div>
					<div class="col-10 col-md-10"><span class="sub"><a href="{{documentPath}}" target="_blank">{{other_upload_file_name}}</a>
					<a href="javascript:reupload('com-other', {{id}});">
																	<span><i class="i i-create"></i>
																	</span>
																	</a>
																	<a href="#" class="delete_upload" doc_type="other_compliance_document" del_document_id="{{id}}" a_id_document="<?php echo $affiliate['affiliate_id']; ?>" doc_type_id="{{document_type_id}}">
																	 <span><i class="i i-delete"></i> </span></a>
																	</span></div>
					<div class="col-24 col-md-10" id="com-other-row-{{id}}">
						<div class="chatBox">
							<div class="chatBoxinn">
								{{#comments}}
								<div class="chatrow">
									<span class="user send">{{avatar}}</span>
									
									<div class="chatline">
										<div class="h6">{{notification}}</div>
										<span class="text-primary">{{first_name}} {{last_name}}</span>
										<span class="ml-auto text-secondary">{{commentTime}}</span>
									</div>
								</div>
								{{/comments}}
							</div>
							<div class="search collapsed">
								<input type="text" class="input-comment"  data-document="{{id}}" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="{{document_type_id}}" placeholder="Type here" />
								<a class="btn btn-secondary   btn-rounded btn-action-sm "><i
								class="i i-chat-box"></i> </a>
							</div>
							<label class="mt-2 ml-3 small" style="display:none;">Hit 'Enter' to send.</label>
						</div>
						<div class="upload d-none">
							<div class="card">
								<div class="card-header" id="headingOne">
								<div class="mb-0">
									<div class="btn wrdiv border-0">
										<div class="row  align-items-center">
											<div class="col-20 col-md-16">
											<span class="sub">
												<div class="dropzone">
													<form action="/upload" class="l_dZUpload needsclick">
														<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
														<input type="hidden" name="notification" value="{{notifyMessage}}" />
														<input type="hidden" name="document_type_id" value="11" />
														<input type="hidden" name="other_id" value="{{id}}" />
														<input type="hidden" name="document_type" value="{{documentType}}" />
														<div class="dz-default dz-message">
														<span class="text">
														<i class="i i-file_upload"></i>
														Click here or Drop Files
														</span>
														</div>
													</form>
												</div>
											</span>
											</div>
											<div class="col-lg-3 col-md-8">
											<a class="btn btn-primary btn-rounded min w-100px btn-upload-l" id="btn-upload-l">UPLOAD</a>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
{{/documents}}
</script>
<script id="template-per-other" type="x-tmpl-mustache">
{{#documents}}
<div class="card">
	<div class="card-header">
		<div class="mb-0">
			<div class="btn wrdiv">
				<div class="row  align-items-center">
					<div class="col-3 col-md-3"><span class="sub" >{{count}}</span></div>
					<div class="col-10 col-md-10"><span class="sub"><a href="{{documentPath}}" target="_blank">{{performance_other_upload_file_name}}</a>
					<a href="javascript:reupload('com-other', {{id}});">
																	<span><i class="i i-create"></i>
																	</span>
																	</a>
																	<a href="#" class="delete_upload" doc_type="other_performance_assessment_documents" del_document_id="{{performance_o_id}}" a_id_document="<?php echo $affiliate['affiliate_id']; ?>" doc_type_id="{{document_id}}">
																	 <span><i class="i i-delete"></i> </span></a>
																	</span></div>
					<div class="col-24 col-md-10" id="com-other-row-{{id}}">
						<div class="chatBox">
							<div class="chatBoxinn">
								{{#comments}}
								<div class="chatrow">
									<span class="user send">{{avatar}}</span>
									
									<div class="chatline">
										<div class="h6">{{notification}}</div>
										<span class="text-primary">{{first_name}} {{last_name}}</span>
										<span class="ml-auto text-secondary">{{commentTime}}</span>
									</div>
								</div>
								{{/comments}}
							</div>
							<div class="search collapsed">
								<input type="text" class="input-comment"  data-document="{{id}}" data-affiliate="<?php echo $affiliate['affiliate_id']; ?>" data-doctype="{{document_id}}" placeholder="Type here" />
								<a class="btn btn-secondary   btn-rounded btn-action-sm "><i
								class="i i-chat-box"></i> </a>
							</div>
							<label class="mt-2 ml-3 small" style="display:none;">Hit 'Enter' to send.</label>
						</div>
						<div class="upload d-none">
							<div class="card">
								<div class="card-header" id="headingOne">
								<div class="mb-0">
									<div class="btn wrdiv border-0">
										<div class="row  align-items-center">
											<div class="col-20 col-md-16">
											<span class="sub">
												<div class="dropzone">
													<form action="/upload" class="l_dZUpload needsclick">
														<input type="hidden" name="affiliate_id" value="<?php echo $affiliate['affiliate_id']; ?>" />
														<input type="hidden" name="notification" value="{{notifyMessage}}" />
														<input type="hidden" name="document_type_id" value="11" />
														<input type="hidden" name="other_id" value="{{id}}" />
														<input type="hidden" name="document_type" value="{{documentType}}" />
														<div class="dz-default dz-message">
														<span class="text">
														<i class="i i-file_upload"></i>
														Click here or Drop Files
														</span>
														</div>
													</form>
												</div>
											</span>
											</div>
											<div class="col-lg-3 col-md-8">
											<a class="btn btn-primary btn-rounded min w-100px btn-upload-l" id="btn-upload-l">UPLOAD</a>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
{{/documents}}
</script>
