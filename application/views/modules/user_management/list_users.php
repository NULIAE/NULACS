<main class="user">
	<div class="container">
		<div class="Wrapper">
			<div class="row date">
            	<div class="col text-md-right"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
            	<a class="btn btn-link btn-filter"><i class="i i-filter_list_alt"></i> </a>
            </div>

			<?php if ($this->session->flashdata('message') !== NULL){
				echo '<div class="alert alert-success text-center p-2 m-3" role="alert">'.$this->session->flashdata('message').'</div>';
			} ?>
			<div class="rel">
				<form class="filter" id="filter-form" action="<?php echo base_url('module/user/filter'); ?>">
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
						<div class="col-lg-4 col-md-6 col-sm-24 ">
							<label for="role">Role</label>
							<select name="role" data-placeholder="Role" data-type="selector">
								<option value="">All Roles</option>
								<?php foreach($roles as $role): ?>
									<option value="<?php echo $role['role_id']; ?>">
										<?php echo $role['role_description']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-24 ">
							<label for="user">User</label>
							<select name="status" data-placeholder="User" data-type="selector">
								<option value="">All Users</option>
								<option value="1">Active Users</option>
								<option value="0">Inactive Users</option>
							</select>
						</div>
						<input type="hidden" id="page-items" name="page_items" value="">
						<div class="col-lg-3 col-md-3 col-sm-12 ">
						<div class="t-c"><button id="search-btn" type="submit" class="btn btn-primary btn-rounded min w-100px">SEARCH</button> </div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 mt-2">
						<div class="t-c"><button id="export-btn" class="btn btn-primary btn-rounded min w-100px">EXPORT</button> </div>
						</div>
					
					</div>
				</form>
				<a  href="<?php echo base_url('module/user/add'); ?>" class="btn btn-primary m-l-auto btn-rounded btn-action btn-fix"><i class="i i-add"></i></a>
			</div>
			<div class="head">
            	<div class="row">
					<div class="col-8"><span class="sub">USER ID</span></div>
					<div class="col-5"><span class="sub">USER NAME</span></div>
					<div class="col-5"><span class="sub">LOCATION</span></div>
					<div class="col-5"><span class="sub">ROLE</span></div>
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
									<div class="col-24"><span class="sub text-center">Loading Users!</span></div>
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
<script id="template-user" type="x-tmpl-mustache">
{{#users}}
<div class="card">
	<div class="card-header" id="heading{{user_id}}">
		<div class="mb-0">
			<a class="btn action" data-toggle="collapse" data-target="#collapse{{user_id}}" aria-expanded="false" aria-controls="collapse{{user_id}}">
			<div class="row ">
				<div class="col-24 col-md-8"><span class="sub text-primary">{{user_email_address_1}}</span></div>
				<div class="col-8 col-md-5"><span class="sub">{{prifix}} {{first_name}} {{last_name}}</span></div>
				<div class="col-8 col-md-5"><span class="sub">{{city}},{{stateabbreviation}}</span></div>
				<div class="col-8 col-md-5"><span class="sub">{{role_description}}</span></div>
			</div>
			</a>
		</div>
	</div>

	<div id="collapse{{user_id}}" class="collapse " aria-labelledby="heading{{user_id}}" data-parent="#accordionUsers">
		<div class="acc-body">
			<form id="update-form{{user_id}}" class="update-form w-100" method="post" action="<?php echo base_url('user/profile/update/'); ?>">
				<div class="row">
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>User ID</label>
							<input type="text" class="form-control" placeholder="User ID" name="name" value="{{name}}" disabled />
						</div>
					</div>
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Name</label>
							<input type="text" class="form-control" placeholder="Name" name="name" value="{{prifix}}{{first_name}} {{last_name}}" disabled />
						</div>
					</div>
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Role</label>
							<input type="text" class="form-control" placeholder="Role" name="role" value="{{role_description}}" disabled />
						</div>
					</div>
				</div>
				<div class="row">
					
					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Title</label>
							<input type="text" class="form-control" placeholder="First Title" name="user_title" value="{{user_title}}" disabled />
						</div>
					</div>

					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Email</label>
							<input type="email" class="form-control" placeholder="Email" name="user_email_address_1" value="{{user_email_address_1}}" disabled />
						</div>
					</div>

					<div class="col-lg-8 col-md-8 form-group">
						<div>
							<label>Phone</label>
							<input type="text" class="form-control" placeholder="Phone" name="user_phone" value="{{user_phone}}" disabled />
						</div>
					</div>
				</div>
				<div class="bg-light">
					<div class="row">
					<div class="col-lg-6 col-md-12 form-group">
							<div>
								<label>Is ADM Uploader?</label>
								<div>
									<label class="checkbox switch bool disabled" id="isadm-label{{user_id}}">
									<input type="checkbox" name="is_adm_uploader" id="isadm{{user_id}}" value="1" disabled />
									</label>
								</div>
							</div>
						</div>
						
                        <div class="col-lg-6 col-md-12 form-group">
							<div>
								<label>Is user super administrator?</label>
								<div>
									<label class="checkbox switch bool disabled" id="issuper-label{{user_id}}">
									<input type="checkbox" name="isuser_super_administrator" id="issuper{{user_id}}" value="1" disabled />
									</label>
								</div>
							</div>
						</div>

						<div class="col-lg-8 col-md-8 form-group">
							<label>Active</label>
							<div>
							<label class="checkbox switch bool disabled" id="status-label{{user_id}}">
								<input type="checkbox" name="user_status" id="status{{user_id}}"  value="1" disabled />
							</label>
							</div>
						</div>	
					</div>
				</div>
				<div class="foot">
					<a class="btn btn-dark btn-rounded min w-100px update-btn" href="{{update_url}}">UPDATE</a>
					<a  class="btn btn-primary btn-rounded min w-100px" data-toggle="collapse" data-target="#collapse{{user_id}}" aria-expanded="true" aria-controls="collapse{{user_id}}">CANCEL</a>
				</div>
			</form>
		</div>
	</div>
</div>
{{/users}}
{{^users}}
<style>
.action::after{display:none !important;}
</style>
<div class="card">
	<div class="card-header">
		<div class="mb-0">
			<a class="btn action disabled">
			<div class="row ">
				<div class="col-24"><span class="sub text-center">No users found!</span></div>
			</div>
			</a>
		</div>
	</div>
</div>
{{/users}}
</script>
