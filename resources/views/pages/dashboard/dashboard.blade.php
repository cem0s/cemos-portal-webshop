@extends('layouts.layout')

@section('title')
	Dashboard
@endsection

@section('page-name')
	Dashboard
@endsection


@section('body')
	<div class="container">	
		<div class="table-responsive table_bg2 col-md-12">
			<table id="prod-status" class=" table table-borderless dashboard_head">
				<thead>
					<tr  id="dashboard_icons" class="nav nav-tabs">
						  <th class="text-center col-md-3"><a data-toggle="tab" href="#home"><i class="fa fa-home black" aria-hidden="true"></i><p>+50</p></a></th>
						  <th class="text-center col-md-3"><a data-toggle="tab" href="#menu1"><i class="fa fa-check black" aria-hidden="true"></i><p>+50</p></a></th>
						  <th class="text-center col-md-3"><a data-toggle="tab" href="#menu2"><i class="fa fa-list black" aria-hidden="true"></i><p>+50</p></a></th>
						  <th class="text-center col-md-3"><a data-toggle="tab" href="#menu3"><i class="fa fa-file-text black" aria-hidden="true"></i><p>+50</p></a></th>
					</tr>
				 </thead>
			</table>
		</div>
	</div>


	<div  id="dashboard_wrap" class="tab-content container">
		<div id ="home" class="tab-pane fade in active  table_border prod-status-table "><!--tab1-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th>Product</th>
							  <th>Supplier</th>
							  <th>Progress</th>
							  <th></th>
						</tr>
					  </thead>
					  <tbody>
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										</div>
									</div>
									<div class="percent">
										<p >60% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe-->
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										</div>
									</div>
									<div class="percent">
										<p >60% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe--><tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										</div>
									</div>
									<div class="percent">
										<p >60% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
								<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe-->
						
					  </tbody>
				</table>
			</div>
		</div><!--end of tab1-->
					
		<div id ="menu1" class="tab-pane fade menu1 table_border prod-status-table "><!-- tab2-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th>Deliver</th>
							  <th>Supplier</th>
							  <th>Progress</th>
							  <th></th>
						</tr>
					  </thead>
					  <tbody>
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										</div>
									</div>
									<div class="percent">
										<p >60% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe-->
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
										</div>
									</div>
									<div class="percent">
										<p >10% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe--><tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
										</div>
									</div>
									<div class="percent">
										<p >70% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe-->
						
					  </tbody>
				</table>
			</div>
		</div><!--end of tab2-->
					
		<div id ="menu2" class="tab-pane fade menu1 table_border prod-status-table "><!-- tab3-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th>status</th>
							  <th>suplier</th>
							  <th>progress</th>
							  <th></th>
						</tr>
					  </thead>
					  <tbody>
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
										</div>
									</div>
									<div class="percent">
										<p >40 complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe-->
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70;">
										</div>
									</div>
									<div class="percent">
										<p >70% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe--><tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										</div>
									</div>
									<div class="percent">
										<p >60% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe-->
						
					  </tbody>
				</table>
			</div>
		</div><!--end of tab3-->
					
		<div id ="menu3" class="tab-pane fade menu1 table_border prod-status-table "><!-- tab4-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th>message</th>
							  <th>supplier</th>
							  <th>progress</th>
							  <th></th>
						</tr>
					  </thead>
					  <tbody>
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										</div>
									</div>
									<div class="percent">
										<p >60% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
								<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe-->
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										</div>
									</div>
									<div class="percent">
										<p >60% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe--><tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>Pessamkin UI Created jan</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
										<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
										</div>
									</div>
									<div class="percent">
										<p >90% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<div class="sucess">
										<p>Sucess</p>
									</div>
								</td>
							</tr><!--end of stripe-->
						
					  </tbody>
				</table>
			</div>
		</div><!--end of tab4-->
					
	</div><!--end of shop page-->
@endsection
