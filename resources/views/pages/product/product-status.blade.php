@extends('layouts.layout')

@section('title')
	Product Status
@endsection

@section('page-name')
	Product status
@endsection

@section('body')
<div class="container">
	<div class="table_border prod-status-table ">
		<div class="table-responsive table_bg">
			<table id="prod-status" class="table table-striped table-bordered table-hover">
				  <thead>
					<tr class="product_th">
						  <th>Product</th>
						  <th>Supplier</th>
						  <th>Progress</th>
						  <th></th>
						  <th>Actions</th>  
						  <th></th>  
						  <th></th>  
					</tr>
				  </thead>
				  <tbody>
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
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
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  wrench btn btn-default btn-xs" href="#" role="button">Download</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
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
									<p>10% complete</p>
								</div>
							</td>
							<td class="align_middle" width="15%">
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  check btn btn-default btn-xs" href="#" role="button">Approve</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
							</td>
							<td class="align_middle" width="20%">
								<div class="progress progressBar">
									<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
									</div>
								</div>
								<div class="percent">
									<p >80% complete</p>
								</div>
							</td>
							<td class="align_middle" width="15%">
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  wrench btn btn-default btn-xs" href="#" role="button">Download</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
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
									<p >40% complete</p>
								</div>
							</td>
							<td class="align_middle" width="15%">
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  check btn btn-default btn-xs" href="#" role="button">Approve</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
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
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  wrench btn btn-default btn-xs" href="#" role="button">Download</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>							
							</td>
							<td class="align_middle" width="20%">
								<div class="progress progressBar">
									<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
									</div>
								</div>
								<div class="percent">
									<p >95% complete</p>
								</div>
							</td>
							<td class="align_middle" width="15%">
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  check btn btn-default btn-xs" href="#" role="button">Approve</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>											
							</td>
							<td class="align_middle" width="20%">
								<div class="progress progressBar">
									<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
									</div>
								</div>
								<div class="percent">
									<p >5% complete</p>
								</div>
							</td>
							<td class="align_middle" width="15%">
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  wrench btn btn-default btn-xs" href="#" role="button">Download</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
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
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  check btn btn-default btn-xs" href="#" role="button">Approve</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
						<tr>
							<th scope="row" width="25%">
								<div class="product_name"><p>Pessamkin UI Created jan</p></div>
								<div class="product_date"> <p>Created jan  1, 2005</p></div>
							</th>
							<td class="align_middle" width="35%">
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>											
							</td>
							<td class="align_middle" width="20%">
								<div class="progress progressBar">
									<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
									</div>
								</div>
								<div class="percent">
									<p >100% complete</p>
								</div>
							</td>
							<td class="align_middle" width="15%">
								<div>
									<a class="orange btn btn-default btn-xs" href="#" role="button">Sucess</a>
								</div>
							</td>
							<td class="align_middle">
								<a class="blue folder btn btn-default btn-xs" href="#" role="button">View</a>
							</td>
							<td class="align_middle">
								<a class="orange  wrench btn btn-default btn-xs" href="#" role="button">Download</a>
							</td>
							<td class="align_middle">
								<div class="product_delete">	
									<a href="#" data-toggle="tooltip" data-placement="top" title="hey"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
								</div>
							</td>
						</tr><!--end of stripe-->
					
				  </tbody>
			</table>
		</div>
	</div>
</div>
@endsection