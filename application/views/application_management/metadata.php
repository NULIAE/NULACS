<main class="Meta-data document-search">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date align-items-center">
				<i class="i i-date ib-m p-r-5"></i> <span class="ib-m mr-3"><?php echo date('l F d, Y'); ?></span>
			</div>
			<div class="row mainOuter">
				<div class="row headOuter">
					<div class="head userHead">
						<h3>DOCUMENT META DATA</h3>
					</div>
				</div>	
				<div class="row document-section">
					<div class="d-Section">
						<form id="document-metadata-form" method="post" action="<?php echo base_url('document/metadata/update'); ?>">
							<div class="settingWrap">
								<div class="row justify-content-around">
									<div class="col-lg-11 col-md-12 col-sm-24 form-group">
										<p class="font-weight-bold">Document Type</p>
										<select id="select-document-type" name="select-document-type" data-type="selector" data-class="nulSelector"
										required>
											<option value="">Select document type</option>
											<?php foreach ($document_types as $type): ?>
												<option value="<?php echo $type['document_type_id']; ?>"><?php echo $type['document_type']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-lg-11 col-md-12 col-sm-24 form-group">
										<p class="font-weight-bold">Document Name</p>
										<select id="select-document" name="select-document" data-type="selector" data-class="nulSelector" required>
											<option value="">Select document Name</option>
										</select>
									</div>
								</div>
							</div>

							<div class="appending-section">
								
								<div id="dynamic_fields">
									<div class="outer-wrap w-100">
											<button type="button" name="add" id="add" class="btn btn-success btn-rounded add-btn ml-auto" title="Add Metadata Field"><i class="i i-add"></i></button>
									</div>
									<span class="appending" id="row1">
										<div class="col-lg-8 col-md-12 form-group nulselect">
										<select data-placeholder="data type" class="data-type" name="data-type[1]" data-type="selector" data-class="CaptionCont">
											<option value="">Data type</option>
											<option value="text">Text</option>
											<option value="nummber">Number</option>
										</select>
										</div>
										<input type="text" name="metadata[1]" class="col-20 form-control meta-data-value" placeholder="Meta Data" required>
										<button name="remove" id="1" class="btn btn_remove"><i class="i i-minus"></i></button>
									</span>
								</div>
								<div class="row justify-content-center mt-2">
									<button type="submit" class="btn btn-submit">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="Maincontent">
					<input type="hidden" id="selected-document"  value=""/>
					<div id="documents-list">
						<div class="contentData">
							<div class="col-lg-4 innerColumn"><b>NO.</b></div>
							<div class="col-lg-8 innerColumn"><b>DOCUMENT NAME</b></div>
							<div class="col-lg-5 innerColumn"><b>DOCUMENT TYPE</b></div>
							<div class="col-lg-5 innerColumn"></div>
						</div>
						<?php if(isset($documents_list)): ?>
							<?php foreach($documents_list as $key => $row): ?>
								<div class="contentData">
									<div class="col-lg-4 innerColumn"><?php echo $key + 1; ?></div>
									<div class="col-lg-8 innerColumn"><?php echo $row['document_name']; ?></div>
									<div class="col-lg-5 innerColumn"><?php echo $row['document_type']; ?></div>
									<div class="col-lg-5 innerColumn">
										<a href="javascript:show_metadata(<?php echo $row['document_type_id']; ?>,<?php echo $row['document_id']; ?>);">
											<i class="i i-remove_red_eye"></i>
										</a>

									</div>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<div class="contentData">
								<div class="col-lg-24 innerColumn text-center">No Document found with metadata.</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</main>
