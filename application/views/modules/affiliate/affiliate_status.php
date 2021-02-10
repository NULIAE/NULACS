<main class="Meta-data affiliate-status">
	<div class="container">
		<div class="Wrapper">
			<div class="row justify-content-end date">
				<div class="col t-r pr-0"> <i class="i i-date ib-m p-r-5"></i> <span class="ib-m"><?php echo date('l F d, Y'); ?></span></div>
			</div>
			<div class="row document-mdata">
				<div class="head">
					<h3>ALL AFFILIATE STATUS</h3>
				</div>
			</div>

			<div class="row rel pt-4">
				<form class="filter" id="filter-form" action="<?php echo base_url('module/affiliate/status'); ?>">
					<input type="hidden" id="input-interval" name="interval" value="<?php echo (isset($_GET['interval']) ? $_GET['interval'] : "nav-y1"); ?>" />
					<div class="row align-items-end">
						<div class="col-lg-5 col-md-6 col-sm-24 d-row">
							<label for="region" class="rowLabel">Region</label>
							<select name="region_id" data-placeholder="Region" data-type="selector">
								<option value="">All Region</option>
								<?php foreach($regions as $region): ?>
								<option value="<?php echo $region['region_id']; ?>" <?php if(isset($_GET['region_id']) && $region['region_id'] == $_GET['region_id']) echo "selected"; ?>><?php echo $region['name']; ?></option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="col-lg-5 col-md-7 col-sm-24 d-row">
							<label for="role" class="rowLabel">Region(s) for the due date</label>
							<div class="d-flex justify-content-start">
								<div id="div-month-select" class="m-r-10">
								<?php
								// set the month array
								$monthArray = array(
									"01" => "JAN", "02" => "FEB", "03" => "MAR", "04" => "APR", "05" => "MAY", "06" => "JUN", "07" => "JUL", "08" => "AUG","09" => "SEP", "10" => "OCT", "11" => "NOV", "12" => "DEC",
								);
								$selectedMonth = isset($_GET['month']) ? $_GET['month'] : date("m", strtotime("-1 month", time()));
								?>
									<select name="month" data-placeholder="Month" data-type="selector">
										<?php foreach($monthArray as $key => $value): ?>
										<option value="<?php echo $key; ?>" <?php if($key == $selectedMonth) echo "selected"; ?>><?php echo $value; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div id="div-quarter-select" class="m-r-10">
								<?php
								$selectedQuarter = isset($_GET['quarter']) ? $_GET['quarter'] : ceil(date("m", strtotime("-1 month", time())/3));
								?>
									<select name="quarter" data-placeholder="Quarter" data-type="selector">
										<option value="1" <?php if($selectedQuarter == 1) echo "selected"; ?>>Q1</option>
										<option value="2" <?php if($selectedQuarter == 2) echo "selected"; ?>>Q2</option>
										<option value="3" <?php if($selectedQuarter == 3) echo "selected"; ?>>Q3</option>
										<option value="4" <?php if($selectedQuarter == 4) echo "selected"; ?>>Q4</option>
									</select>
								</div>
						
								<div>
									<?php 
									$yearArray = range(date('Y'), 2000);
									$selectedYear = isset($_GET['year']) ? $_GET['year'] : date("Y", strtotime("-1 month", time()));?>
									<select name="year" data-placeholder="Year" data-type="selector">
										<?php foreach($yearArray as $year): ?>
										<option value="<?php echo $year; ?>" <?php if($year == $selectedYear) echo "selected"; ?>><?php echo $year; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12 d-rows ">
							<label>Compliance Status</label>
							<select name="compliance_status" data-placeholder="Status" data-type="selector">
								<option value="">All Status</option>
								<?php foreach($compliance_status as $status): ?>
								<option value="<?php echo $status['id']; ?>" <?php if(isset($_GET['compliance_status']) && $status['id'] == $_GET['compliance_status']) echo "selected"; ?>>
									<?php echo $status['name']; ?>
								</option>
								<?php endforeach;?>
							</select>
						</div>

						<div class="col-lg-5 col-md-5 col-12 ">
							<div class="t-l"><button type="submit" class="btn btn-primary btn-rounded min w-100px">GET STATUS</button></div>
						</div>

						<p class="contentStatus">Please note the results in the dashboard are displayed for periods that were completed as on the selected month. So if you select August 2010, the results will display documents for the month of 
						July that were due in August.
						</p>
					</div>
				</form>
			</div>

			<div class="row mainTab">
				<div class="tab-content w-100">
					<nav>
						<div class="nav b-b-1 p-b-0" id="tab-inner" role="tablist">
							<a class="nav-item nav-link active" id="nav-y1-tab" data-toggle="tab" href="#nav-y1" role="tab" aria-controls="nav-y1" aria-selected="true" onclick="openTab('nav-y1')"><i class="i i-month-o"></i> View Monthly Status</a>
							<a class="nav-item nav-link" id="nav-y2-tab" data-toggle="tab" href="#nav-y2" role="tab" aria-controls="nav-y2" aria-selected="false" onclick="openTab('nav-y2')"><i class="i i-quater"></i> View Quarterly Status</a>
							<a class="nav-item nav-link" id="nav-y3-tab" data-toggle="tab" href="#nav-y3" role="tab" aria-controls="nav-y3" aria-selected="false" onclick="openTab('nav-y3')"><i class="i i-date-o"></i> View Yearly Status</a>
						</div>
					</nav>
					<div class="tab-content">
						<div class="tab-pane fade show active pane1" id="nav-y1" role="tabpanel" aria-labelledby="nav-y1-tab">

							<table class="table table1" id="#table1">
								<thead>
									<tr>
									<th scope="col">AFFILIATE NAME</th>
									<th scope="col">CURRENT MONTH</th>
									<th scope="col">Compliance Status</th>
									<?php foreach($monthly_documents as $item): ?>
										<th scope="col"><?php echo $item['document_name']; ?></th>
									<?php endforeach; ?>
									</tr>
								</thead>
								<tbody id="monthly-table-body">
									<?php if(!empty($monthly_status['affiliates'])): ?>
									<?php foreach($monthly_status['affiliates'] as $row): ?>
									<tr>
										<td scope="row"><a href="<?php echo base_url('module/affiliate/status/details/'.$row["affiliate_id"]); ?>"><?php echo $row['city'].','.$row['state']; ?></a></td>
										<td><?php echo $monthArray[$selectedMonth]."-".$selectedYear; ?></td>
										<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php echo $row['status_name']; ?>"><?php echo $row['icon']; ?></div></td>

										<?php foreach($monthly_documents as $doc): ?>
											<?php $status_flag = FALSE; ?>
											<?php foreach($row['document_status'] as $doc_status): ?>
												<?php if($doc['document_id'] == $doc_status['document_id']): ?>
													<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php echo $doc_status['status_name']; ?>"><?php echo $doc_status['icon']; ?></div></td>
													<?php $status_flag = TRUE; ?>
													<?php break; ?>
												<?php endif; ?>
											<?php endforeach; ?>
											<?php if( ! $status_flag ): ?>
												<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Submission Pending"><i class="i i-document-status d-status"></i></div></td>
											<?php endif; ?>
										<?php endforeach; ?>
									</tr>
									<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td scope="row" colspan="9">No affiliates found!</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>

							<div class="col-sm-24">
								<div class="p-a-15 p-b-0">
									<nav aria-label="Page navigation example" id="monthly-pagination">
										<?php echo $monthly_status['pagination']; ?>
									</nav>
								</div>
							</div>

						</div>

						<div class="tab-pane fade pane2" id="nav-y2" role="tabpanel" aria-labelledby="nav-y2-tab">

							<table class="table table2" id="#table2">
								<thead>
								<tr>
									<th scope="col">AFFILIATE NAME</th>
									<th scope="col">CURRENT Quarter</th>
									<th scope="col">Compliance Status</th>
									<?php foreach($quarterly_documents as $item): ?>
										<th scope="col"><?php echo $item['document_name']; ?></th>
									<?php endforeach; ?>
									<th scope="col">Key Indicators</th>
								</tr>
								</thead>
								<tbody id="quarterly-table-body">
									<?php if(!empty($quarterly_status['affiliates'])): ?>
									<?php foreach($quarterly_status['affiliates'] as $row): ?>
									<tr>
										<td scope="row"><a href="<?php echo base_url('module/affiliate/status/details/'.$row["affiliate_id"]); ?>"><?php echo $row['city'].','.$row['state']; ?></a></td>
										<td><?php echo "Q".$selectedQuarter."-".$selectedYear; ?></td>
										<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php echo $row['status_name']; ?>"><?php echo $row['icon']; ?></div></td>
										<?php foreach($quarterly_documents as $doc): ?>
											<?php $status_flag = FALSE; ?>
											<?php foreach($row['document_status'] as $doc_status): ?>
												<?php if($doc['document_id'] == $doc_status['document_id']): ?>
													<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php echo $doc_status['status_name']; ?>"><?php echo $doc_status['icon']; ?></div></td>
													<?php $status_flag = TRUE; ?>
													<?php break; ?>
												<?php endif; ?>
											<?php endforeach; ?>
											<?php if( ! $status_flag ): ?>
												<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Submission Pending"><i class="i i-document-status d-status"></i></div></td>
											<?php endif; ?>
										<?php endforeach; ?>

											<?php $key_indicator_flag = FALSE; ?>
											<?php if(isset( $row['key_indicator'][0]['status'])): ?>						
													<td>
														<div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php if($row['key_indicator'][0]['status']=='0'){ echo"Review Pending"; }else{ echo"Approved"; } ?>">
														<?php if($row['key_indicator'][0]['status']=='0'){ echo"<i class='i i-review-pending r-pending'></i>"; }else{ echo"<i class='i i-approved apprvd'></i>"; } ?></div>
													</td>
													<?php $key_indicator_flag = TRUE; ?>
										<?php endif; ?>
											<?php if( ! $key_indicator_flag ): ?>
												<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Submission Pending"><i class="i i-document-status d-status"></i></div></td>
											<?php endif; ?>
									</tr>
									<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td scope="row" colspan="5">No affiliates found!</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>

							<div class="col-sm-24">
								<div class="p-a-15 p-b-0">
									<nav aria-label="Page navigation example" id="quarterly-pagination">
										<?php echo $quarterly_status['pagination']; ?>
									</nav>
								</div>
							</div>

						</div>

						<div class="tab-pane fade pane3" id="nav-y3" role="tabpanel" aria-labelledby="nav-y3-tab">

							<table class="table table3" id="#table3">
								<thead>
									<tr>
										<th scope="col">AFFILIATE NAME</th>
										<th scope="col">CURRENT YEAR</th>
										<th scope="col">Compliance Status</th>
										<?php foreach($yearly_documents as $item): ?>
										<th scope="col"><?php echo $item['document_name']; ?></th>
									<?php endforeach; ?>
									</tr>
								</thead>
								<tbody id="yearly-table-body">
								<?php if(!empty($yearly_status['affiliates'])): ?>
									<?php foreach($yearly_status['affiliates'] as $row): ?>
									<tr>
										<td scope="row"><a href="<?php echo base_url('module/affiliate/status/details/'.$row["affiliate_id"]); ?>"><?php echo $row['city'].','.$row['state']; ?></a></td>
										<td><?php echo $selectedYear; ?></td>
										<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php echo $row['status_name']; ?>"><?php echo $row['icon']; ?></div></td>
										<?php foreach($yearly_documents as $doc): ?>
											<?php $status_flag = FALSE; ?>
											<?php foreach($row['document_status'] as $doc_status): ?>
												<?php if($doc['document_id'] == $doc_status['document_id']): ?>
													<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="<?php echo $doc_status['status_name']; ?>"><?php echo $doc_status['icon']; ?></div></td>
													<?php $status_flag = TRUE; ?>
													<?php break; ?>
												<?php endif; ?>
											<?php endforeach; ?>
											<?php if( ! $status_flag ): ?>
												<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="Submission Pending"><i class="i i-document-status d-status"></i></div></td>
											<?php endif; ?>
										<?php endforeach; ?>
									</tr>
									<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td scope="row" colspan="9">No affiliates found!</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>

							<div class="col-sm-24">
								<div class="p-a-15 p-b-0">
									<nav aria-label="Page navigation example" id="yearly-pagination">
										<?php echo $yearly_status['pagination']; ?>
									</nav>
								</div>
							</div>

						</div>

					</div>

					<!-- <div class="tab-foot">
						<div class="row justify-content-between">
							<div class="document-final">
								<p>Document Status</p>
								<ul class="document">
									<li><i class="i i-document-status d-status"></i>
									<div class="documentDef">Submission Pending</div>
									</li>
									<li><i class="i i-review-pending r-pending"></i> 
									<div class="documentDef">Review Pending </div>
									</li>
									<li><i class="i i-waiting wait"></i>
									<div class="documentDef">Waiting </div>
									</li>
									<li><i class="i i-approved apprvd"></i>   
									<div class="documentDef">Approved </div>
									</li>
								</ul>
							</div>

							<div class="document-final">
								<p>Compliance Status
								</p>
								<ul class="document">
									<li><i class="i i-compliant cmplt"></i> 
										<div class="documentDef">Compliant</div>
									</li>
									<li><i class="i i-non-compliant n-cmplt"></i>  
										<div class="documentDef">Non-Compliant </div>
									</li>
									<li><i class="i i-waiting wait"></i>  
										<div class="documentDef">Waiting </div>
									</li>
									<li><i class="i i-Indeterminate inter"></i>  
										<div class="documentDef">Indeterminate</div>
									</li>
								</ul>
							</div>
						</div>
					</div> -->
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
<script id="template-monthly" type="x-tmpl-mustache">
{{#affiliates}}
<tr>
	<td scope="row"><a href="">{{city}},{{state}}</a></td>
	<td>{{currentDate}}</td>
	<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="{{status_name}}">{{{icon}}}</div></td>
	{{{document_status_list}}}
</tr>
{{/affiliates}}
{{^affiliates}}
<tr>
	<td scope="row" colspan="9">No affiliates found!</td>
</tr>
{{/affiliates}}
</script>
<script id="template-quarterly" type="x-tmpl-mustache">
{{#affiliates}}
<tr>
	<td scope="row"><a href="">{{city}},{{state}}</a></td>
	<td>{{currentDate}}</td>
	<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="{{status_name}}">{{{icon}}}</div></td>
	{{{document_status_list}}}
	<td>{{{key_status}}}</td>
</tr>
{{/affiliates}}
{{^affiliates}}
<tr>
	<td scope="row" colspan="5">No affiliates found!</td>
</tr>
{{/affiliates}}
</script>
<script id="template-yearly" type="x-tmpl-mustache">
{{#affiliates}}
<tr>
	<td scope="row"><a href="">{{city}},{{state}}</a></td>
	<td>{{currentDate}}</td>
	<td><div class="icon-rounded" data-rel="tooltip" data-placement="bottom" title="{{status_name}}">{{{icon}}}</div></td>
	{{{document_status_list}}}
</tr>
{{/affiliates}}
{{^affiliates}}
<tr>
	<td scope="row" colspan="9">No affiliates found!</td>
</tr>
{{/affiliates}}
</script>
