@extends('layouts.layout')

@section('title')
	Add Property
@endsection

@section('page-name')
	Property details
@endsection

@section('body')
	<div id="addProperty" class="container">
		<div class="row">
	        <div class="col-md-5">
	            <div class="panel panel-default">
	            	<div class="panel-heading">Address</div>
	                <div class="panel-body">
	                    <div class="modal-body">
	                        <form name="userForm" class="form-horizontal" method="POST"  action="{{url('add-property')}}" >
	                        <div class="tab-content">
	                            <div role="tabpanel" class="tab-pane active" id="add">  <!-- Company -->
	                               <input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-group">
	                                    <label for="address1" class="col-sm-2 control-label"></label>
                                        <div id="address1" class="col-sm-12">
                                            <input type="text" class="form-control" name="address1" required  placeholder="Address 1">
                                        </div>
                                        <div class="col-sm-12">
                                          
                                        </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="address1" class="col-sm-2 control-label"></label>
                                        <div id="address2" class="col-sm-12">
                                            <input type="text" class="form-control" name="address2" required  placeholder="Address 2">
                                        </div>
                                        <div class="col-sm-12">
                                          
                                        </div>
	                                </div>
	                                <div class="form-group">
	                                  	<label for="address1" class="col-sm-2 control-label"></label>
                                        <div id="postalcode" class="col-sm-12">
                                            <input type="text" class="form-control" name="postalcode" required  placeholder="Postal Code">
                                        </div>
                                        <div class="col-sm-12">
                                          
                                        </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-12">
                                          	<button type="submit" class="btn btn-primary"> Save</button>
                                        </div>
	                                </div>
	                            </div>
	                        </div>   
	                        </form>                   
	                    </div>
	                </div>
	            </div>
	        </div>	
		</div>
	</div>
@endsection