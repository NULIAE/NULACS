<main class="Meta-data">
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
									<button type="submit" class="btn btn-submit">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
