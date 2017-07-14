@extends('layouts.layout')

@section('title')
	Edit Property
@endsection

@section('page-name')
	Edit Property
@endsection

@section('body')
	<div id="addProperty" class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<form name="userForm" class="form-horizontal" method="POST"  action="{{url('edit-property')}}/{{$object['id']}}" >
					<div class="row">
				        <div class="col-md-6">
				            <div class="panel panel-default">
				            	<div class="panel-heading">Address</div>
				                <div class="panel-body">
				                    <div class="modal-body">
				                        <div class="tab-content">
				                            <div role="tabpanel" class="tab-pane active" id="add">  <!-- Company -->
				                               <input type="hidden" name="_token" value="{{csrf_token()}}">
				                                <div class="form-group">
				                                    <label for="address1" control-label">Primary address</label>
			                                        <div id="address1" class="col-sm-12">
			                                            <input type="text" class="form-control" name="address1" value="{{$object['address1']}}" required>
			                                        </div>
				                                </div>
				                                <div class="form-group">
				                                    <label for="address2" control-label">Secondary address</label>
			                                        <div id="address2" class="col-sm-12">
			                                            <input type="text" class="form-control" name="address2" value="{{$object['address2']}}" required>
			                                        </div>
				                                </div>
				                                <div class="form-group">
				                                  	<label for="postalcode" control-label">Postal code</label>
			                                        <div id="postalcode" class="col-sm-12">
			                                            <input type="text" class="form-control" name="postalcode" value="{{$object['postalcode']}}" required>
			                                        </div>
				                                </div>
				                                <div class="form-group">
				                                  	<label for="town" control-label">Town</label>
			                                        <div id="town" class="col-sm-12">
			                                            <input type="text" class="form-control" name="town" value="{{$object['town']}}" required>
			                                        </div>
				                                </div>
				                                <div class="form-group">
				                                  	<label for="country" control-label">Country</label>
			                                        <div id="country" class="col-sm-12">
				                                        <select class="form-control" name="country" required>
			                                            	<option value="">Please select</option>
			                                            	@if($object['country']=="ph")
			                                            		<option value="ph" selected="selected">Philippines</option>
			                                            	@else
			                                            		<option value="ph">Philippines</option>
			                                            	@endif

			                                            	@if($object['country']=="others")
			                                            		<option value="others" selected="selected">Others</option>
			                                            	@else
			                                            		<option value="others">Others</option>
			                                            	@endif
			                                            </select>
			                                        </div>
				                                </div>
				                            </div>
				                        </div>                    
				                    </div>
				                </div>
				            </div>
				        </div>	
				        <div class="col-md-6">
				        	<div class="panel panel-default">
				        		<div class="panel-heading">Object Details</div>
				        		<div class="panel-body">
				        			<div class="modal-body">
					        			<div class="tab-content">
					        				<div class="form-group">
			                                    <label for="builtin" control-label">Built in</label>
		                                        <div id="builtin" class="col-sm-12">
		                                            <select class="form-control" name="builtin">
		                                            	<option value="">-- Please select --</option>
		                                            	@if($object['object_property']['built_in']=="before 1960")
		                                            		<option value="before 1960" selected="selected">Before 1960</option>
		                                            	@else
		                                            		<option value="before 1960">Before 1960</option>
		                                            	@endif
		                                            	@if($object['object_property']['built_in']=="after 1960")
		                                            		<option value="after 1960" selected="selected">After 1960</option>
		                                            	@else
		                                            		<option value="after 1960">After 1960</option>
		                                            	@endif
		                                            	
		                                            	
		                                            </select>
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="area" control-label">Area (approximately)</label>
		                                        <div id="area" class="col-sm-12">
		                                            <select class="form-control" name="area">
		                                            	<option value="">-- Please select --</option>
		                                            	@if($object['object_property']['area'] ="below 172")
		                                            		<option value="below 172" selected="selected">< 172 m2</option>
		                                            	@else
		                                            		<option value="below 172">< 172 m2</option>
		                                            	@endif
		                                            	@if($object['object_property']['area'] ="176 - 250")
		                                            		<option value="176 - 250" selected="selected">176 - 250 m2</option>
		                                            	@else
		                                            		<option value="176 - 250">176 - 250 m2</option>
		                                            	@endif
		                                            	@if($object['object_property']['area'] ="251 - 350")
		                                            		<option value="251 - 350" selected="selected">251 - 350 m2</option>
		                                            	@else
		                                            		<option value="251 - 350">251 - 350 m2</option>
		                                            	@endif
		                                            	@if($object['object_property']['area'] ="351 - 500")
		                                            		<option value="351 - 500" selected="selected">351 - 500 m2</option>
		                                            	@else
		                                            		<option value="351 - 500">351 - 500 m2</option>
		                                            	@endif
		                                            	@if($object['object_property']['area'] ="above 500")
		                                            		<option value="above 500" selected="selected">> 500 m2</option>
		                                            	@else
		                                            		<option value="above 500">> 500 m2</option>
		                                            	@endif
		                                            </select>
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="nooffloors" control-label">No. of floors</label>
		                                        <div id="nooffloors" class="col-sm-12">
		                                            <input type="text" class="form-control" name="nooffloors" value="{{$object['object_property']['no_floors']}}">
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="noofrooms" control-label">No. of rooms</label>
		                                        <div id="noofrooms" class="col-sm-12">
		                                            <input type="text" class="form-control" name="noofrooms" value="{{$object['object_property']['no_rooms']}}">
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="occupied" control-label">Occupied</label>
		                                        <div id="occupied" class="col-sm-12">
		                                            <select class="form-control" name="occupied">
		                                            	<option value="">-- Please select --</option>
		                                            	@if($object['object_property']['occupied']=="Yes")
		                                            		<option value="Yes" selected="selected">Yes</option>
		                                            	@else
		                                            		<option value="Yes">Yes</option>
		                                            	@endif
		                                            	@if($object['object_property']['occupied']=="No")
		                                            		<option value="No" selected="selected">No</option>
		                                            	@else
		                                            		<option value="No">No</option>
		                                            	@endif
		                                            </select>
		                                        </div>
			                                </div>
					        			</div>
				        			</div>
				        		</div>
				        	</div>
				        </div>
					</div>
					<div class="row">
						<div class="col-md-6">
				        	<div class="panel panel-default">
				        		<div class="panel-heading">Object Type</div>
				        		<div class="panel-body">
				        			<div class="modal-body">
					        			<div class="tab-content">
					        				<div class="form-group">
			                                    <label for="buildingtype" control-label">Building type</label>
		                                        <div id="buildingtype" class="col-sm-12">
		                                            <select class="form-control" name="buildingtype">
		                                            	<option value="">-- Please select --</option>
		                                            	<option value="residential">Residential</option>
		                                            	<option value="commercial">Commercial</option>
		                                            	<option value="others">Others</option>
		                                            </select>
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="buildingtype" control-label">Property type</label>
		                                        <div id="buildingtype" class="col-sm-12">
		                                            <select class="form-control" name="buildingtype">
		                                            	<option value="">-- Please select --</option>
		                                            	@if($object['object_property']['property_type']=="appartment")
		                                            		<option value="appartment" selected="selected">Appartment</option>
		                                            	@else
		                                            		<option value="appartment">Appartment</option>
		                                            	@endif
		                                            	@if($object['object_property']['property_type']=="house")
		                                            		<option value="house" selected="selected">House</option>
		                                            	@else
		                                            		<option value="house">House</option>
		                                            	@endif
		                                            	@if($object['object_property']['property_type']=="others")
		                                            		<option value="others" selected="selected">Others</option>
		                                            	@else
		                                            		<option value="others">Others</option>
		                                            	@endif
		                                            </select>
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="built" control-label">Built</label>
		                                        <div id="built" class="col-sm-12">
		                                            <select class="form-control" name="built">
		                                            	<option value="">-- Please select --</option>
		                                            	@if($object['object_property']['built']=="new building")
		                                            		<option value="new building" selected="selected">New building</option>
		                                            	@else
		                                            		<option value="new building">New building</option>
		                                            	@endif
		                                            	@if($object['object_property']['built']=="existing building")
		                                            		<option value="existing building" selected="selected">Existing building</option>
		                                            	@else
		                                            		<option value="existing building">Existing building</option>
		                                            	@endif
		                                            	
		                                            	
		                                            </select>
		                                        </div>
			                                </div>
			                            </div>
			                        </div>
				        		</div>
				        	</div>
				        </div>
				        <div class="col-md-6">
				        	<div class="panel panel-default">
				        		<div class="panel-heading">Owner Information</div>
				        		<div class="panel-body">
				        			<div class="modal-body">
					        			<div class="tab-content">
					        				<div class="form-group">
			                                    <label for="name" control-label">Name</label>
		                                        <div id="name" class="col-sm-12">
		                                            <input type="text" class="form-control" name="name" value="{{$object['object_property']['owner_name']}}">
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="telno" control-label">Telephone no.</label>
		                                        <div id="telno" class="col-sm-12">
		                                            <input type="text" class="form-control" name="telno" value="{{$object['object_property']['owner_tel']}}">
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="mobno" control-label">Mobile no.</label>
		                                        <div id="mobno" class="col-sm-12">
		                                            <input type="text" class="form-control" name="mobno" value="{{$object['object_property']['owner_mob']}}">
		                                        </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="emailadd" control-label">Email Address</label>
		                                        <div id="emailadd" class="col-sm-12">
		                                            <input type="text" class="form-control" name="emailadd" value="{{$object['object_property']['owner_email']}}">
		                                        </div>
			                                </div>
			                            </div>
			                        </div>
				        		</div>
				        	</div>
				        </div>
	                </div>
					<div class="row">
						<div class="form-group">
		                	<div class="col-sm-12">
		                		<div class="form-actions right">
									<button type="submit" class="btn btn-primary"> Save</button>
								</div>
		                    </div>
		                </div>
	                </div>
                </form>
			</div>
		</div>
		
	</div>
@endsection

<!-- To do -->
<!-- Get the building type for dymanic data -->
<!-- Make javascript to change property type depending on the building type -->