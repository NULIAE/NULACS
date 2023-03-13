<main>
	<div class="mainWrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="sideBar">
						<?=$left_tabs; ?>
					</div>
				</div>
				<div class="col-md-18">

				<div class="card formCard">
				<div class="h3 tittleS "><?= $tab_title; ?></div>
						<div class="h5 Subtittle text-primary"><b><?= $report_data[0]['title']; ?></b></div>
						<nav class="innerTab">
							<div class="nav nav-pills" id="nav-tab" role="tablist">
								<button type="button" id="nav-sync-tab" data-bs-toggle="tab" class="btn btn-primary btnRound" data-bs-target="#nav-sync"><i class="i i-edit"></i></button>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade" id="nav-sync" role="tabpanel" aria-labelledby="nav-admin-tab">
    							<form id="edit-prg-frm" method="post" action="<?php echo base_url('module/forms_update/view_prg/update'); ?>">
        							<div class="full_form">
                                    <div class="form-group t-c formclassbtn" style="float: right;">
                    							<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                    							<!-- <button class="btn btn-danger m-r-15 btn-rounded" type="button">DELETE</button> -->
                    							<button class="btn btn-accent m-r-15 btn-rounded " id="cancel1"   type="button">CANCEL</button>
                							</div>
                                        <br/><br/><br/><br/>
									<div class="row g-4 align-items-end p-b-20">
										<div class="col-md-12">
											<div class="form-group">
												<label for="edit-title" class="form-label">Name of Program <span>*</span></label>
												<input type="text" id="edit-title" name="title" value="<?=$report_data[0]['title'];?>" size="60" class="form-control required" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="edit-field-program-nul-funded" class="form-label">Is this program funded by NUL?<span>*</span>
												</label>
												<br>
												<label class="radio">
													<input type="radio" name="field_program_nul_funded" id="edit-field-program-nul-funded-0" value="0" <?php if ($content['report_data'][0]['field_program_nul_funded'] == 0) echo 'checked="checked"';?> required>
													<label class="label p-r-10" for="edit-field-program-nul-funded-0">NO</label>
												</label>
												<label class="radio">
													<input type="radio" name="field_program_nul_funded" id="edit-field-program-nul-funded-1" value="1" <?php if ($content['report_data'][0]['field_program_nul_funded'] == 1) echo 'checked="checked"';?>>
													<label class="label p-r-10" for="edit-field-program-nul-funded-1">YES</label>
												</label>
											</div>
										</div>                                        
                                        <div class="col-md-12">
											<div class="form-group">
												<label for="edit-field-program-nul-funded" class="form-label">Is there a civic engagement component to this program?<span>*</span>
												</label>
												<br>
												<label class="radio">
													<input type="radio" name="field_civic_engage_comp" id="edit-field-civic-engage-comp-0" value="0" class="hide_desc" onclick="HideDescifNo()" <?php if ($content['report_data'][0]['field_civic_engage_comp'] == 0) echo 'checked="checked"';?> required>
													<label class="label p-r-10" for="edit-field-civic-engage-comp-0">NO</label>
												</label>
												<label class="radio">
													<input type="radio" name="field_civic_engage_comp" id="edit-field-civic-engage-comp-1" value="1" class="hide_desc" onclick="HideDescifNo()" <?php if ($content['report_data'][0]['field_civic_engage_comp'] == 1) echo 'checked="checked"';?>>
													<label class="label p-r-10" for="edit-field-civic-engage-comp-1">YES</label>
												</label>
											</div>
										</div>
                                        <div id="hide_desc_if_no">
                                            <div class="col-md-24">
                                                <div class="form-group">
                                                    <label for="edit-field-civic-engage-purpose" class="form-label">If yes, please describe :</label>
                                                    <textarea id="edit-field-civic-engage-purpose" rows="4" class="form-control" cols="106"
                                                        name="field_civic_engage_purpose"><?=$report_data[0]['field_civic_engage_purpose'];?></textarea>
                                                </div>
                                            </div>                                            
                                        </div>
									</div>
<?php $count_fs = 1; ?>

<?php foreach ( $funding_sources as $fs ) { ?>
    <div class="tabilCard NulCard EmployeeCard m-t-15" id="<?=$count_fs;?>">
    <div class="contact-table table-responsive">
        <p class="m-t-10">Funding Source type: Funding Source</p>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4">Funding</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Organization Name</th>
                    <th>Sector</th>
                    <th>Funding Vehicle</th>
                    <th>Amount Funded</th>
                </tr>
                <tr>
                    <td><select class="form-select w-200px select2" aria-label="Status" id=""
                            name="new-<?=$count_fs;?>-field_funding_organization_tid">
                            <option value>None</option>
                            <?php foreach ( $funding_organizations as $fo ) { ?>
                            <option value="<?=$fo['id'];?>" <?php if ( $fo['id'] == $fs['field_funding_organization_tid'] ) echo 'selected="selected"'; ?>><?=$fo['name'];?></option>
                            <?php } ?>
                            </select></td>
                    <td> <select class="form-select w-200px" aria-label="Status" id=""
                            name="new-<?=$count_fs;?>-field_funding_sector_tid">
                            <option value>None</option>
                            <?php foreach ( $funding_sectors as $fsec ) { ?>
                            <option value="<?=$fsec['id'];?>" <?php if ( $fsec['id'] == $fs['field_funding_sector_tid'] ) echo 'selected="selected"'; ?>><?=$fsec['name'];?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td> <select class="form-select w-200px" aria-label="Status" id=""
                            name="new-<?=$count_fs;?>-field_funding_vehicle_tid">
                            <option value>None</option>
                            <?php foreach ( $funding_vehicles as $fveh ) { ?>
                            <option value="<?=$fveh['id'];?>" <?php if ( $fveh['id'] == $fs['field_funding_vehicle_tid'] ) echo 'selected="selected"'; ?> ><?=$fveh['name'];?></option>
                            <?php } ?>
                        </select></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center"> <span>$</span> &nbsp;<input
                                type="text" class="form-control" id="field_funding_amount_value"
                                name="new-<?=$count_fs;?>-field_funding_amount_value" placeholder="" value="<?= number_format($fs['amount'], 2);?>"> </div>
                    </td>
                </tr>
                <tr>
                    <td><button class="btn btn-danger m-r-15 btn-rounded btn_remove" id="<?=$count_fs;?>"
                            type="button">Remove</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $count_fs++;} ?>

<div id="funding_source"></div>

<br>
<script>
    var get_funding_organizations = <?php echo json_encode($funding_organizations); ?>;
    var get_funding_sectors = <?php echo json_encode($funding_sectors); ?>;
    var get_funding_vehicles = <?php echo json_encode($funding_vehicles); ?>;
</script>
<button class="btn btn-primary m-r-15 btn-rounded program_add_fund_source" data-sourceid="<?=count($funding_sources)+1;?>" onclick="addFundingSource(get_funding_organizations,get_funding_sectors,get_funding_vehicles,this.getAttribute('data-sourceid'));" type="button">+ Add Funding Source</button><br><br>


<div class="col-md-12">
    <div class="form-group">
        <label for="edit-field-program-types" class="form-label">Program Type</label>
        <select class="form-select" aria-label="edit-field-parent-census" id="edit-field-program-types"
            name="field_program_types">
            <option value="_none">- None -</option>
            <?php foreach ($program_type as $pt) {?>
            <option value="<?=$pt['id'];?>" <?php if($pt['id']==$report_data[0]['field_program_types']) echo 'selected="selected"'; ?>>
                <?=$pt['name'];?>
            </option>
            <?php }?>
        </select>
    </div>
</div>

    <?php 
    $count = 1;
    foreach ( $program_services as $ps ) { ?>
    <div class="tabilCard NulCard EmployeeCard m-t-15" id="<?=$count;?>">
    <div class="contact-table table-responsive">
        <p class="m-t-10">Service Provided type: Program Services</p>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4">Funding</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Service Provided</th>
                    <th>People Served</th>
                    <th>Hours</th>
                    <th>Dollars</th>
                </tr>
                <tr>
                    <td> <select class="form-select w-200px" aria-label="Status" id=""
                            name="newser-<?=$count;?>-field_program_service_provided_tid">
                            <option value>None</option>
                            <?php foreach ( $services_provided_all as $all) { ?>
                            <option value="<?=$all['id'];?>" <?php if( $all['id'] == $ps['field_program_service_provided_tid']) echo 'selected="selected"'; ?> ><?=$all['name'];?></option>
                            <?php } ?>
                        </select></td>
                    <td> <input type="text" class="form-control w-200px" id="" placeholder=""
                            name="newser-<?=$count;?>-field_program_service_served_value" value="<?=$ps['people_served'];?>"></td>
                    <td> <input type="text" class="form-control w-200px" id="" placeholder=""
                            name="newser-<?=$count;?>-field_program_service_hours_value" value="<?=$ps['hour'];?>"></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center"> <span>$</span> &nbsp;<input
                                type="text" class="form-control" id="edit-field-revenue-investment"
                                name="newser-<?=$count;?>-field_program_service_dollars_value" placeholder="" value="<?= number_format($ps['dollar'], 2);?>"> </div>
                    </td>
                </tr>
                <tr>
                    <td><button class="btn btn-danger m-r-15 btn-rounded btn_remove" id="<?=$count;?>">Remove</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
        <?php $count++;} ?>
<div id="program_services"></div>


<br>
<script>
    var services_provided_all = <?php echo json_encode($services_provided_all); ?>;
</script>
<button class="btn btn-primary m-r-15 btn-rounded program_add_program_service" data-serviceid="<?=count($program_services)+1;?>"
    onclick="addProgramServices(services_provided_all,this.getAttribute('data-serviceid'));" type="button">+ Add Program
    Services</button><br><br>

<div class="row g-4 align-items-end p-b-20">
    <div class="col-md-24">
        <div class="form-group">
            <label for="edit-field-program-purpose" class="form-label"> Purpose of Program</label>
            <textarea id="edit-field-program-purpose" rows="4" class="form-control" cols="106"
                name="field_program_purpose"><?=$report_data[0]['field_program_purpose'];?></textarea>
        </div>
    </div>
</div>
<div class="row g-4 align-items-end p-b-20">
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-program-budget" class="form-label">Total Program Budget Funded</label>
            <div class="d-flex justify-content-start align-items-center">
                <span>$</span> &nbsp; <input type="text" class="form-control w-200px" id="edit-field-program-budget"
                    name="field_program_budget" placeholder="" value="<?= number_format($report_data[0]['field_program_budget'],2);?>">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-program-served-total" class="form-label">Number of People Served Annually
                <span>*</span></label>
            <input type="text" id="edit-field-program-served-total" name="field_program_served_total" size="60"
                class="form-control required" value="<?= number_format($report_data[0]['field_program_served_total']);?>">
        </div>
    </div>
</div>
<div class="h6 tittle text-start ">Health Programs</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="edit-field-program-percent-black" class="form-label">% Black/African American</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-black"
                    name="field_program_percent_black" placeholder="" value="<?=$report_data[0]['field_program_percent_black'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="edit-field-program-percent-white" class="form-label">% White</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-white"
                    name="field_program_percent_white" placeholder="" value="<?=$report_data[0]['field_program_percent_white'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="edit-field-program-percent-asian" class="form-label">% Asian American</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-asian"
                    name="field_program_percent_asian" placeholder="" value="<?=$report_data[0]['field_program_percent_asian'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 align-items-end p-b-20">
    <div class="col-md-8">
        <div class="form-group">
            <label for="edit-field-program-percent-native" class="form-label">% Native American</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-native"
                    name="field_program_percent_native" placeholder="" value="<?=$report_data[0]['field_program_percent_native'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="edit-field-program-percent-immigrant" class="form-label">Immigrant Population %</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-immigrant"
                    name="field_program_percent_immigrant" placeholder="" value="<?=$report_data[0]['field_program_percent_immigrant'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="edit-field-program-percent-newcomer" class="form-label">Newcomer Population %</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-newcomer"
                    name="field_program_percent_newcomer" placeholder="" value="<?=$report_data[0]['field_program_percent_newcomer'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
</div>

<div class="h6 tittle text-start ">Ethnicity</div>
<div class="row g-4 align-items-end p-b-20">
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-program-percent-hispanic" class="form-label">% Hispanic</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-hispanic"
                    name="field_program_percent_hispanic" placeholder="" value="<?=$report_data[0]['field_program_percent_hispanic'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-program-percent-non-hispan" class="form-label">% Non-Hispanic</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-non-hispan"
                    name="field_program_percent_non_hispan" placeholder="" value="<?=$report_data[0]['field_program_percent_non_hispan'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
</div>
<div class="h6 tittle text-start ">Gender</div>
<div class="row g-4 align-items-end p-b-20">
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-program-percent-male" class="form-label">% Male</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-male"
                    name="field_program_percent_male" placeholder="" value="<?=$report_data[0]['field_program_percent_male'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-program-percent-female" class="form-label">% Female</label>
            <div class="d-flex justify-content-start align-items-center">
                <input type="text" class="form-control" id="edit-field-program-percent-female"
                    name="field_program_percent_female" placeholder="" value="<?=$report_data[0]['field_program_percent_female'];?>">
                &nbsp; &nbsp;<span>%</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="field_program_duration_type" class="form-label">Program Length Type </label>
        <br>
        <label class="radio">
            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-none" value="N" <?php if ($content['report_data'][0]['field_program_duration_type'] == 'N') echo 'checked="checked"';?>>
            <label class="label p-r-10" for="edit-field-program-duration-type-none">N/A</label>
        </label>
        <label class="radio">
            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-days" value="D" <?php if ($content['report_data'][0]['field_program_duration_type'] == 'D') echo 'checked="checked"';?>>
            <label class="label p-r-10" for="edit-field-program-duration-type-days">Days</label>
        </label>
        <label class="radio">
            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-weeks"
                value="W" <?php if ($content['report_data'][0]['field_program_duration_type'] == 'W') echo 'checked="checked"';?>>
            <label class="label p-r-10" for="edit-field-program-duration-type-weeks">Weeks</label>
        </label>
        <label class="radio">
            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-summer"
                value="S" <?php if ($content['report_data'][0]['field_program_duration_type'] == 'S') echo 'checked="checked"';?>>
            <label class="label p-r-10" for="edit-field-program-duration-type-summer">Summer</label>
        </label>
        <label class="radio">
            <input type="radio" name="field_program_duration_type" id="edit-field-program-duration-type-year" value="Y" <?php if ($content['report_data'][0]['field_program_duration_type'] == 'Y') echo 'checked="checked"';?>> 
            <label class="label p-r-10" for="edit-field-program-duration-type-year">Year-round</label>
        </label>
    </div>
</div>
<div class="row g-4 align-items-end p-b-20">
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-program-duration-amount" class="form-label">Program Length Amount</label>
            <input type="text" id="edit-field-program-duration-amount" name="field_program_duration_amount" value="<?= number_format($report_data[0]['field_program_duration_amount']);?>"
                size="60" class="form-control">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-program-target-age" class="form-label">Target age range</label>
            <input type="text" id="edit-field-program-target-age" name="field_program_target_age" value="<?= number_format($report_data[0]['field_program_target_age']);?>" size="60"
                class="form-control">
        </div>
    </div>
</div>


<label for="edit-field-what-kinds-of-supports-and" class="form-label">Target Group(s) Served</label><br>
<div class="row g-4 align-items-end p-b-20 ">
    <?php $loop_val = 1; ?>
    <?php foreach ( $content['target_groups_served_all'] as $t ) { 
		if ( in_array($t['tid'],$tidlist) ){
			 $ch = 'checked="checked"';
			 $lbl = 'checked focus';
			}
		else {
			$ch = '';
			$lbl = '';
		}
                                if ( $loop_val%2 == 0 ) { ?>
    <div class="col-md-12">
        <div class="form-group ">
            <label class="checkbox <?=$lbl?>">
                <input type="checkbox" id="edit-field-program-target-group-<?= $t['tid']; ?>"
                    name="field_program_target_group[]" value="<?= $t['tid']; ?>" class="form-checkbox" <?=$ch?>>
                <label class="option" for="edit-field-program-target-group-<?= $t['tid']; ?>">
                    <?=$t['name'];?>
                </label>
            </label>
        </div>
    </div>
    <?php } else { ?>
    <div class="col-md-12">
        <div class="form-group ">
            <label class="checkbox <?=$lbl?>">
                <input type="checkbox" id="edit-field-program-target-group-<?= $t['tid']; ?>"
                    name="field_program_target_group[]" value="<?= $t['tid']; ?>" class="form-checkbox" <?=$ch?>>
                <label class="option" for="edit-field-program-target-group-<?= $t['tid']; ?>">
                    <?=$t['name']; ?>
                </label>
            </label>
        </div>
    </div>
    <?php } } ?>
</div>

<div class="row g-4 align-items-end p-b-20 " <?php if ( $this->session->role_id!=1 ) echo 'style="visibility:hidden;max-height:0;"';?>>
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-legacy-program-id" class="form-label">legacy program id</label>
            <input type="text" id="edit-field-legacy-program-id" name="field_legacy_program_id" value="<?=$report_data[0]['field_legacy_program_id'];?>" size="60"
                class="form-control w-200px">
        </div>
    </div>
</div>

<div class="row g-4 align-items-end p-b-20" <?php if ( $this->session->role_id!=1 ) echo 'style="visibility:hidden;max-height:0;"';?>>
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-parent-census" class="form-label">Parent census *</label>
            <select class="form-select" aria-label="edit-field-parent-census" id="edit-field-parent-census"
                name="field_parent_census">
                <option value="">- None -</option>
                <?php foreach ($parent_census as $parent) {?>
                <option value="<?=$parent['report_id'];?>" <?php if( $parent['report_id']==$report_id ){ ?>
                    selected="selected"
                    <?php } ?> >
                    <?=$parent['organization'] . " " . $parent['field_year'] . " census";?>
                </option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="edit-field-legacy-target-group" class="form-label">legacy target group</label>
            <input type="text" id="edit-field-legacy-target-group" name="field_legacy_target_group" value="<?=$report_data[0]['field_legacy_target_group'];?>" size="60"
                class="form-control">
        </div>
    </div>
</div>
<hr>

            							<div class="">
                							<div class="form-group t-c formclassbtn">
                    							<button class="btn btn-primary m-r-15 btn-rounded" type="submit">SAVE</button>
                    							<button class="btn btn-danger m-r-15 btn-rounded" type="button" data-table_name="programs"  id="delete_button" data-pk_id="<?= $content['report_data'][0]['pk_id']; ?>" value="<?php echo $content['report_data'][0]['field_parent_census'] ?>">DELETE</button>
                    							<button class="btn btn-accent m-r-15 btn-rounded" id="cancel" type="button"  >CANCEL</button>
                							</div>
            							</div>
        							</div>
        							<input type="hidden" value="<?= $content['report_data'][0]['field_parent_census']; ?>" id="hid_parent_census">
        							<input type="hidden" value="<?= $content['report_data'][0]['pk_id']; ?>" name="pk_id" id="pk_id">
    							</form>
							</div>
							<div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
								<h4 class="title-head"></h4>
								<div class="tabilCard inner NulCard">
									<div class="contact-table table-responsive">
										<table class="table table-striped">
											<tbody class="align1">
				
												<tr>
													<td>Program Area: </td>
													<td><span><?= $report_data[0]['programarea']; ?> </span></td>
												</tr>
												<tr>
													<td>Purpose of Program:</td>
													<td><span><?= $report_data[0]['field_program_purpose']; ?></span></td>
												
												</tr>

												<tr>
													<td>Total Program Budget Funded:</td>
													<td><span><?= isset($report_data[0]['field_program_budget'])?"$".number_format($report_data[0]['field_program_budget'],2):$report_data[0]['field_program_budget']; ?></span></td>
												</tr>
												<tr>
													<td>Number of People Served Annually: </td>
													<td><span><?= number_format($report_data[0]['field_program_served_total']); ?></span></td>
												</tr>
												<tr>
													<td>Is this program funded by NUL?: </td>
													<td><span>   <?php if($report_data[0]['field_program_nul_funded']==1 && $report_data[0]['field_program_nul_funded']!=''){echo "Yes";}elseif($report_data[0]['field_program_nul_funded']==0 && $report_data[0]['field_program_nul_funded']!=''){ echo "No";} else{ echo $report_data[0]['field_program_nul_funded'];}?></span></td>
												</tr>
												<tr>
													<td>Is there a civic engagement component to this program?: </td>
													<td><span>   <?php if($report_data[0]['field_civic_engage_comp']==1 && $report_data[0]['field_civic_engage_comp']!=''){echo "Yes";}elseif($report_data[0]['field_civic_engage_comp']==0 && $report_data[0]['field_civic_engage_comp']!=''){ echo "No";} else{ echo $report_data[0]['field_civic_engage_comp'];}?></span></td>
												</tr>
                                                <tr>
                                                    <td>Please Describe :</td>
                                                    <td><span><?= $content['report_data'][0]['field_civic_engage_purpose']; ?></span></td>
                                                </tr>
												<tr>
                                                <?php if(!empty($funding_sources) ) { ?>
                                             
                                                    <td colspan="2" >
													<table class="table table-striped" >
                                                        <thead>
                                                            <tr>
                                                                <th colspan="4">Funding</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="align">
                                                    
                                                            <tr>
                                                                <th>Organization Name</th>
                                                                <th>Sector</th>
                                                                <th>Funding Vehicle</th>
                                                                <th>Amount Funded</th>
                                                            </tr>
                                                            <?php foreach ( $funding_sources as $source ) { ?>
                                                            <tr>
                                                                <td><?=$source['org'];?></td>
                                                                <td><?=$source['sector'];?></td>
                                                                <td><?=$source['vehicle'];?></td>
                                                                <td><?= number_format($source['amount'], 2);?></td>
                                                            </tr>
                                                            <?php } ?>	
                                                        </tbody>
												    </table>
												</td>
                                                <?php }else{  } ?>
												
												</tr>
												<tr>
													<td colspan="2"><span class="text-primary">Demographics</span> </td>
												</tr>
												<tr>
												<td >% Black/African American: </td>	
												<td><span><?= isset($report_data[0]['field_program_percent_black'])?number_format($report_data[0]['field_program_percent_black'],2)."%":$report_data[0]['field_program_percent_black'] ?></span></td>												
												</tr>
												<tr>
												<td >% White: </td>	
												<td><span><?= isset($report_data[0]['field_program_percent_white'])?number_format($report_data[0]['field_program_percent_white'],2)."%":$report_data[0]['field_program_percent_white'] ?></span></td>												
												</tr>
												<tr>
												<td >% Asian American:  </td>	
												<td><span><?= isset($report_data[0]['field_program_percent_asian'])?number_format($report_data[0]['field_program_percent_asian'],2)."%":$report_data[0]['field_program_percent_asian'] ?></span></td>												
												</tr>
												<tr>
												<td >% Native American: </td>
												<td><span><?= isset($report_data[0]['field_program_percent_native'])?number_format($report_data[0]['field_program_percent_native'],2)."%":$report_data[0]['field_program_percent_native'] ?></span></td>													
												</tr>
												<tr>
												<td >Immigrant Population %: </td>	
												<td><span><?= isset($report_data[0]['field_program_percent_immigrant'])?number_format($report_data[0]['field_program_percent_immigrant'],2)."%":$report_data[0]['field_program_percent_immigrant'] ?></span></td>												
												</tr>
												<tr>
												<td >Newcomer Population %: </td>
												<td><span><?= isset($report_data[0]['field_program_percent_newcomer'])?number_format($report_data[0]['field_program_percent_newcomer'],2)."%":$report_data[0]['field_program_percent_newcomer'] ?></span></td>													
												</tr>
												<tr>
													<td colspan="2"><span class="text-primary">Ethnicity</span> </td>
												</tr>
												<tr>
												<td >% Hispanic:  </td>	
												<td><span><?= isset($report_data[0]['field_program_percent_hispanic'])?number_format($report_data[0]['field_program_percent_hispanic'],2)."%":$report_data[0]['field_program_percent_hispanic'] ?></span></td>												
												</tr>
												<tr>
												<td >% Non-Hispanic: </td>	
												<td><span><?= isset($report_data[0]['field_program_percent_non_hispan'])?number_format($report_data[0]['field_program_percent_non_hispan'],2)."%":$report_data[0]['field_program_percent_non_hispan'] ?></span></td>												
												</tr>
												<tr>
												<td colspan="2"><span class="text-primary">Gender</span> </td>												
												</tr>
												<tr>
												<td >% Male:  </td>	
												<td><span><?= isset($report_data[0]['field_program_percent_male'])?number_format($report_data[0]['field_program_percent_male'],2)."%":$report_data[0]['field_program_percent_male'] ?></span></td>												
												</tr>
												<tr>
												<td >% Female:  </td>	
												<td><span><?= isset($report_data[0]['field_program_percent_female'])?number_format($report_data[0]['field_program_percent_female'],2)."%":$report_data[0]['field_program_percent_female'] ?></span></td>												
												</tr>
												<tr>
												<td>Program Type:  </td>
												<td><span><?= isset($report_data[0]['program_type_name'])?$report_data[0]['program_type_name']:$report_data[0]['program_type_name'] ?></span></td>													
												</tr>

                                                <tr>
                                                <?php if(!empty($program_services) ) { ?>
                                                    <td colspan="2"   >
                                                        <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="4">Program Services</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="align">
                                                    
                                                            <tr>
                                                                <th>Service Provided</th>
                                                                <th>People Served</th>
                                                                <th>Hours</th>
                                                                <th>Dollars</th>
                                                            </tr>
                                                            <?php foreach ( $program_services as $services ) { ?>
                                                            <tr>
                                                                <td><?=$services['servic'];?></td>
                                                                <td><?=$services['people_served'];?></td>
                                                                <td><?=$services['hour'];?></td>
                                                                <td><?= number_format($services['dollar'], 2);?></td>
                                                            </tr>
                                                            <?php } ?>	
                                                        </tbody>
                                                    </table>
                                                    </td>
                                                <?php }?>
												</tr>

												<tr>
													<td>Program Length Type:  </td>
													<td><span><?php if($report_data[0]['field_program_duration_type']=='D') echo "Days";elseif($report_data[0]['field_program_duration_type']=='W') echo "Weeks";elseif($report_data[0]['field_program_duration_type']=='S') echo "Summer";elseif($report_data[0]['field_program_duration_type']=='Y') echo "Year-round";else echo "N/A"; ?></span></td>
												</tr>
												<tr>
													<td>Program Length Amount:   </td>
													<td><span><?= number_format($report_data[0]['field_program_duration_amount']) ?></span></td>
												</tr>
												<tr>
												<td >Target age range:  </td>
												<td><span><?= number_format($report_data[0]['field_program_target_age']) ?></span></td>													
												</tr>
												<tr>
												<td>Target Group(s) Served:  </td>	
												<td><span>
												<?php
												$i=0; 
												foreach($tgs as $tg){
													if($i==count($tgs)-1) $sep = ''; else $sep = ', ';
													echo $tg['name'].''.$sep;
													$i++;
												} ?>
												</span></td>												
												</tr>
                                                <?php if ($this->session->role_id == 1) { ?>
												<tr>
												<td >legacy program id:  </td>
												<td><span><?= $report_data[0]['field_legacy_program_id'] ?></span></td>													
												</tr>
												<tr>
												<td >parent census:  </td>
												<td><span><?=$content['report_data'][0]['organization']." ". $content['report_data'][0]['field_year']." census"; ?></span></td>													
												</tr>

												<tr>
													<td>legacy target group: </td>
													<td><span><?= $report_data[0]['field_legacy_target_group'] ?></span></td>
												</tr>

                                                <?php } ?>
											</tbody>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
