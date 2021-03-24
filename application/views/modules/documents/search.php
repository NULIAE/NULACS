<style>
#input-month-picker, #input-year-picker
{
	width:100% !important;
	max-width:100% !important;
}
#input-month-picker .picker-switch, #input-month-picker .prev, #input-month-picker .next
{
  display: none !important;
}
</style>
<main class="document-search">
    <div class="container">
      	<div class="Wrapper">
			<div class="row justify-content-end date">
				<div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
			</div>

			<div class="row headOuter">
				<div class="head userHead">
					<h3>DOCUMENT SEARCH</h3>
				</div>
			</div>

        	<div class="row nul-settings">
          		<form id="filter-form" class="w-100" method="post" action="<?php echo base_url('module/documents/search-documents'); ?>">
            		<div class="settingWrap">
              			<div class="row w-100 mb-3">
							<div class="col-lg-8 col-md-12 form-group">
								<label for="doctype">Document Type</label>
                  				<select name="doctype" id="doctype" aria-labelledby="doctype" data-placeholder="Document Type" class="SumoSelect CaptionCont">
                    				<option value="">Document Type</option>
									<?php foreach($document_types as $type): ?>
                    					<option value="<?php echo $type['document_type_id']; ?>"><?php echo $type['document_type']; ?></option>
									<?php endforeach; ?>
                  				</select>
                			</div>
                			<div class="col-lg-8 col-md-12 form-group">
								<label for="document">Compliance Document</label>
								<select name="document" id="document" multiple data-all="true" data-search="false" data-action="removeTag" data-search-text="Search..." data-output-to="#multiList" data-placeholder="Select Documents" data-type="selector">
								</select>
                			</div>

                			<div class="col-lg-8 col-md-12 form-group">
								<label for="docstatus">Document Status</label>
								<select name="docstatus" id="docstatus" aria-labelledby="docstatus" class="SumoSelect CaptionCont" data-placeholder="Document Status">
									<option value="">Document Status</option>
									<?php foreach($document_status as $status): ?>
										<option value="<?php echo $status['id']; ?>"><?php echo $status['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
						
              			</div>

              			<div class="row w-100 mb-3 justify-content-center align-items-end">
                			<div class="col-lg-8 col-md-12 form-group">
								<label for="monthpicker">Month</label>
								<div id="input-month-picker" class="yearPick ib-m">
									<i class="i i-year-pick"></i>
									<input class="form-control" name="month" placeholder="Month" type="text" id="monthpicker"
									aria-labelledby="monthpicker" disabled>
								</div>	
							</div>
							<div class="col-lg-8 col-md-12 form-group">
								<label for="quarter">Quarter</label>
								<select name="quarter" id="quarter" aria-labelledby="quarter" class="SumoSelect CaptionCont"data-placeholder="Quarter" disabled>
									<option value="">All Quarters</option>
									<option value="1">Q 1</option>
									<option value="2">Q 2</option>
									<option value="3">Q 3</option>
									<option value="4">Q 4</option>
								</select>
                			</div>
                			<div class="col-lg-8 col-md-12 form-group">
								<label for="yearpicker">Year</label>
								<div id="input-year-picker" class="yearPick ib-m">
									<i class="i i-year-pick"></i>
									<input class="form-control" name="year" placeholder="Year" type="text" id="yearpicker" aria-labelledby="yearpicker" value="<?php echo date('Y'); ?>">
								</div>
                			</div>
						</div>
						<div class="row w-100 mb-3  align-items-end">
						<div class="col-lg-8 col-md-12 form-group">
								<label for="affiliate">Affiliate</label>
								<select name="affiliate" id="affiliate" aria-labelledby="affiliate" data-all="true" data-type="selector" data-search="true" class="SumoSelect CaptionCont d-none" data-placeholder="Affiliate">
									<option value="">Affiliate</option>
									<?php foreach($affiliates as $row): ?>
										<option value="<?php echo $row['affiliate_id']; ?>">
											<?php echo $row['city'].", ".$row['stateabbreviation']; ?>
										</option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="col-lg-8 col-md-12 form-group">
								<label for="affiliate">Meta Data</label>
								<div>
									<input class="form-control" type="text" name="metadata" id="metadata">
								</div>
							</div>
						</div>
						<div class="row w-100 justify-content-center align-items-end">
                			<div class="col-lg-8 col-md-12 form-group text-center">
								<button class="btn btn-primary btn-rounded min w-120px mr-2" type="submit">SEARCH</button>
                			</div>
						</div>
            		</div>
          		</form>
        	</div>
		<form method="post" action="<?php echo base_url('module/documents/export'); ?>">
		<input type="hidden" id="e_doctype" name="doctype">
		<input type="hidden" id="e_document" name="document">
		<input type="hidden" id="e_docstatus" name="docstatus">
		<input type="hidden" id="e_affiliate" name="affiliate">
		<input type="hidden" id="e_metadata" name="metadata">
		<input type="hidden" id="e_monthpicker" name="month">
		<input type="hidden" id="e_quarter" name="quarter">
		<input type="hidden" id="e_yearpicker" name="year">
		<input type="hidden" id="e_select-page-items" name="page_items">



        	<div class="foot fend">
				<label for="docx-pick">From</label>
				<div class="yearPick ib-m">
					<i class="i i-year-pick"></i>
					<input class="datepick form-control" placeholder="Nov 12, 2019" type="text" id="docx-pick"
					aria-labelledby="docx-pick">
				</div>
				<label for="docx-pick1">To</label>
				<div class="yearPick ib-m">
					<i class="i i-year-pick"></i>
					<input class="datepick form-control" placeholder="Nov 12, 2019" type="text" id="docx-pick1"
					aria-labelledby="docx-pick1">
				</div>
				<button type="submit" class="btn btn-dark btn-rounded min w-120px mr-2"  >EXPORT</button>
			</div>
			<form>

        	<div class="row">
          		<div class="Maincontent">
					<div id="documents-list">
						<div class="contentData">
							<div class="col-lg-4 innerColumn">
								<!-- <label class="checkbox" for="docx-1">
									<input type="checkbox" id="docx-1" name="docx-1" aria-labelledby="docx-1">
								</label> -->
								<input type="checkbox" id="docx-1" name="docx-1" aria-labelledby="docx-1" class="checkbox">
							</div>
							<div class="col-lg-6 innerColumn"><b>AFFILIATE NAME</b></div>
							<div class="col-lg-6 innerColumn"><b>DOCUMENT NAME</b></div>
							<div class="col-lg-6 innerColumn"></div>
						</div>
						
						<div class="contentData">
							<div class="col-lg-24 innerColumn text-center">Document list will be shown here.</div>
						</div>
				</div>
				<!-- Pagination Section
				<div class="contentData border-top">
					<div class="col-lg-4 innerColumn">
						Show
						<div class="ib-m">
							<select id="select-page-items" name="pages">
								<option value="10">10 Rows</option>
								<option value="25">25 Rows</option>
								<option value="50">50 Rows</option>
								<option value="100">100 Rows</option>
							</select>
						</div>
					</div>
					<div class="col-lg-7 innerColumn"></div>
					<div class="col-lg-7 innerColumn"></div>
					<div class="col-lg-6 innerColumn">
						<nav id="page-links">
							<ul class="pagination justify-content-end">
								<li class="page-item disabled">
									<a href="#" class="page-link" data-ci-pagination-page="1" rel="prev">First</a>
								</li>
								<li class="page-item disabled">
									<a href="#" class="page-link" data-ci-pagination-page="1" rel="start">1</a>
								</li>
								<li class="page-item disabled">
									<a href="#" class="page-link" data-ci-pagination-page="1" rel="next">Last</a>
								</li>
							</ul>
						</nav>
					</div>
				</div> -->

          	</div>
        </div>

    </div>

</main>
<script id="template-empty-page" type="x-tmpl-mustache">
<ul class="pagination justify-content-end">
	<li class="page-item disabled">
		<a href="#" class="page-link" data-ci-pagination-page="1" rel="prev">First</a>
	</li>
	<li class="page-item disabled">
		<a href="#" class="page-link" data-ci-pagination-page="1" rel="start">1</a>
	</li>
	<li class="page-item disabled">
		<a href="#" class="page-link" data-ci-pagination-page="1" rel="next">Last</a>
	</li>
</ul>
</script>
<script id="template-document-list" type="x-tmpl-mustache">
<div class="contentData">
	<div class="col-lg-4 innerColumn">
		<!-- <label class="checkbox" for="docx-1">
			<input type="checkbox" id="docx-1" name="docx-1" aria-labelledby="docx-1">
		</label> -->
		<input type="checkbox" id="docx-1" name="docx-1" aria-labelledby="docx-1" class="checkbox">
	</div>
	<div class="col-lg-6 innerColumn">
		<b>AFFILIATE NAME</b>
	</div>
	<div class="col-lg-6 innerColumn">
		<b>DOCUMENT NAME</b>
	</div>
	<div class="col-lg-6 innerColumn">

	</div>
</div>
{{#documents}}
	<div class="contentData">
		<div class="col-lg-4 innerColumn">
			<!-- <label class="checkbox" for="docx-2">
				<input type="checkbox" id="docx-2" name="docx-2">
			</label> -->
			<input type="checkbox" id="docx-2" name="docx-2" aria-labelledby="docx-2" class="checkbox">
		</div>
		<div class="col-lg-6 innerColumn">
			{{city}}, {{state}}
		</div>
		<div class="col-lg-6 innerColumn">
			{{document_name}}
		</div>
		<div class="col-lg-6 innerColumn">
			<a href="{{documentPath}}">
				<i class="i i-download-u"></i>
			</a>

		</div>
	</div>
{{/documents}}
{{^documents}}
<div class="contentData">
	<div class="col-lg-24 innerColumn text-center">
				No Documents found on search criteria.
	</div>
</div>
{{/documents}}
</script>
