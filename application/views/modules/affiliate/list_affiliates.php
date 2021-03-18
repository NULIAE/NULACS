<main class="user">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
               <div class="col t-r"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
			</div>
			
			<?php if ($this->session->flashdata('message') !== NULL){
				echo '<div class="alert alert-success text-center p-2 m-4" role="alert">'.$this->session->flashdata('message').'</div>';
			} ?>

			<div class="rel">
				<form id="filter-form" class="filter" action="<?php echo base_url('module/affiliate/filter'); ?>">
					<div class="row align-items-end">
						<div class="col-lg-4 col-md-6 col-sm-24 ">
							<label for="region">Region</label>
							<select name="region" data-placeholder="Region" data-type="selector">
							<option value="">All Regions</option>
							<?php foreach($regions as $region): ?>
								<option value="<?php echo $region['region_id']; ?>">
									<?php echo $region['name']; ?>
								</option>
							<?php endforeach;?>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-24">
							<label for="aname">Affiliate Name/Location</label>
							<input type="text" class="form-control" name="aname" id="aname" value="" />
						</div>
					
						<div class="col-lg-3 col-md-3 col-sm-24 ">
							<div class="t-c"><button id="search-btn" type="submit" class="btn btn-primary btn-rounded min w-100px">SEARCH</button> </div>
						</div>
					</div>
					<input type="hidden" id="page-items" name="page_items" value="">
				</form>
				<a  href="<?php echo base_url('module/affiliate/add'); ?>" class="btn btn-primary m-l-auto btn-rounded btn-action btn-fix"><i class="i i-add"></i></a>
			</div>

			<div class="head">
				<div class="row">
					<div class="col-10"><span class="sub">NAME</span></div>
					<div class="col-6"><span class="sub">LOCATION</span></div>
					<div class="col-6"><span class="sub">REGION</span></div>
				</div>
			</div>

			<div class="cdnWrap">
            	<div class="accordion" id="accordionUsers">
					<style>
					.action::after{display:none !important;}
					</style>
					<div class="card">
						<div class="card-header">
							<div class="mb-0">
								<a class="btn action disabled">
								<div class="row ">
									<div class="col-24"><span class="sub text-center">Loading Affiliates!</span></div>
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="p-a-15 p-b-0">
							<span class="ib-m p-r-10">Show</span>
							<div class="ib-m">
								<select id="select-page-items" name="pages">
									<option value="10">10 Rows</option>
									<option value="25">25 Rows</option>
									<option value="50">50 Rows</option>
									<option value="100">100 Rows</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="p-a-15 p-b-0 ">
							<nav id="page-links"></nav>
						</div>
					</div>
				</div>
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
<script id="template-affiliate" type="x-tmpl-mustache">
{{#affiliates}}
<div class="card">
	<div class="card-header" id="heading{{affiliate_id}}">
		<div class="mb-0">
			<a class="btn action" data-toggle="collapse" data-target="#collapse{{affiliate_id}}" aria-expanded="false" aria-controls="collapse{{affiliate_id}}">
			<div class="row ">
				<div class="col-24 col-md-10"><span class="sub text-primary link">{{organization}}</span></div>
				<div class="col-12 col-md-6"><span class="sub">{{city}}, {{stateabbreviation}}</span></div>
				<div class="col-12 col-md-6"><span class="sub">{{region}}</span></div>
			</div>
			</a>
		</div>
	</div>

	<div id="collapse{{affiliate_id}}" class="collapse " aria-labelledby="heading{{affiliate_id}}" data-parent="#accordionUsers">
		<div class="acc-body">
			<form id="update-form{{affiliate_id}}" class="update-form w-100" method="post" action="<?php echo base_url('module/affiliate/update/'); ?>">
            	<div class="row">
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Name</label>
							<input type="text" class="form-control" name="organization" placeholder="Name" value="{{organization}}" disabled />
						</div>
					</div>
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Region</label>
							<select name="region_id" id="region{{affiliate_id}}" data-placeholder="East" data-type="selector" disabled>
								<option value="">Select Region</option>
								<?php foreach($regions as $region): ?>
									<option value="<?php echo $region['region_id'];?>"><?php echo $region['name'];?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Year ending date?</label>
							<input type="text" class="form-control" name="year_end" placeholder="YYYY-MM-DD" value="{{year_end}}" disabled />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Location</label>
							<input type="text" class="form-control" name="location" placeholder="City" value="{{city}},{{stateabbreviation}}" disabled />
						</div>
					</div>

					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Phone</label>
							<input type="text" class="form-control" name="phone" placeholder="Phone" value="{{phone}}" disabled />
						</div>
					</div>

					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Frequency of Board Meeting?</label>
							<input type="text" class="form-control" name="board_meeting_frequency" value="{{board_meeting_frequency}}" disabled />
						</div>
					</div>
					
                </div>
                <div class="bg-light">
					<div class="row">

                        <div class="col-lg-8 col-md-8 form-group">
							<div>
								<label>Board Chair</label>
								<input type="text" class="form-control" name="board_chair" id="board_chair{{affiliate_id}}" value="" disabled />
							</div>
                        </div>

						<div class="col-lg-8 col-md-8 form-group">
							<div>
								<label>Email</label>
								<input type="email" class="form-control" name="email" placeholder="Email" value="{{email}}" disabled />
							</div>
						</div>

						<div class="col-lg-8 col-md-8 form-group">
							<div>
								<label>Term Expiration</label>
								<input type="text" class="form-control" placeholder="Term Expiration" disabled />
							</div>
						</div>

                    </div>
                </div>

                <div class="row">
					
				
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Compliance Dues</label>
							<select name="compliance_dues" id="compliance_dues{{affiliate_id}}" data-placeholder="Compliance Dues" data-type="selector" disabled>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>

					<div class="col-lg-8 col-md-8 form-group">
						<label>Current Compliance Status</label>
						<input type="text" class="form-control" placeholder="Current Compliance Status" disabled>
					</div>
					<div class="col-lg-8 col-md-8 form-group">
						<label>Last site visit</label>
						<input type="text" class="form-control" placeholder="Last site visit" disabled>
					</div>
                </div>
                <div class="row">
					
					<div class="col-lg-8 col-md-8 form-group">
						<label>Performance Score</label>
						<input type="text" class="form-control" placeholder="Performance Score" disabled>
					</div>
					<div class="col-lg-8 col-md-8 form-group">
						<span class="label">Report Available</span>
						
						<div>
						<label class="checkbox switch bool disabled" for="report-label{{affiliate_id}}">
							<input id="report-label{{affiliate_id}}" type="checkbox" name="px-1" disabled>
						</label>
						</div>
					</div>

					<div class="col-lg-8 col-md-8 form-group">
						<span class="label">Active</span>
						<div>
						<label class="checkbox switch bool disabled" id="status-label{{affiliate_id}}">
						<input id="status{{affiliate_id}}" type="checkbox" name="affiliate_status" value="1" disabled />
						</label>
						</div>
					</div>
                </div>

				<div class="foot">
					<a class="btn btn-dark btn-rounded min w-100px update-btn" href="{{update_url}}">UPDATE</a>
					<a  class="btn btn-primary btn-rounded min w-100px" data-toggle="collapse" data-target="#collapse{{affiliate_id}}" aria-expanded="true" aria-controls="collapse{{affiliate_id}}">CANCEL</a>
				</div>
				<input type="hidden" name="affiliate_id" value="{{affiliate_id}}" />
			</form>
			<table class="table table-bordered table-striped my-5">
			<thead>
				<tr class="bg-primary">
					<th scope="col">USER ID</th>
					<th scope="col" class="text-center">USER NAME</th>
					<th  scope="col" class="text-center">ROLE</th>
				</tr>
			</thead>
			<tbody>
			{{#users}}
				<tr>
					<td>{{name}}</td>
					<td class="text-center">{{prifix}}{{first_name}} {{last_name}}</td>
					<td class="text-center">{{role_description}}</td>
				</tr>
			{{/users}}
			</tbody>
			</table>
		</div>
	</div>
</div>
{{/affiliates}}
{{^affiliates}}
<style>
.action::after{display:none !important;}
</style>
<div class="card">
	<div class="card-header">
		<div class="mb-0">
			<a class="btn action disabled">
			<div class="row ">
				<div class="col-24"><span class="sub text-center">No affiliates found!</span></div>
			</div>
			</a>
		</div>
	</div>
</div>
{{/affiliates}}
</script>
