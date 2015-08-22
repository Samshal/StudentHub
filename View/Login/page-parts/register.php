<div class="col-md-12">
	<div class="row">
		<div class="text-center center-block" id="information"></div>
		<div class="text-center center-block form-header" ><h2>Fill In The Form Below To Become A Part Of StudentHub</h2></div>
		<form role="form" id="registrationform">
			<div class="col-md-12">
			<div class="form-group col-md-4">
				<label class="control-label">First Name</label>
				<input type="text" id="FIRSTNAME" name="FIRSTNAME" class="form-control" placeholder="First Name e.g: John" />
			</div>
			<div class="form-group col-md-4">
				<label class="control-label">Middle Name</label>
				<input type="text" id="MIDDLENAME" name="MIDDLENAME" class="form-control" placeholder="Middle Name e.g: Anon" />
			</div>
			<div class="form-group col-md-4">
				<label class="control-label">Last Name</label>
				<input type="text" id="LASTNAME" name="LASTNAME" class="form-control" placeholder="Last Name e.g: Doe" />
			</div>
			<div class="form-group col-md-6">
				<label class="control-label">Email Address</label>
				<input type="email" id="EMAIL" name="EMAIL" class="form-control" placeholder="E-Mail e.g: johndoe@default.com" />
			</div>
			<div class="form-group col-md-6">
				<label class="control-label">Mobile Number</label>
				<input type="number" id="PHONENUMBER" name="PHONENUMBER" class="form-control" placeholder="Mobile Number e.g: 08012345678" />
			</div>
			<div class="form-group col-md-8">
				<label class="control-label">Date Of Birth</label>
				<input type="date" id="DATEOFBIRTH" name="DATEOFBIRTH" class="form-control" placeholder="Date Of Birth" />
			</div>
			<div class="form-group col-md-4">
				<label class="control-label">Gender</label>
				<select id="GENDER" name="GENDER" class="form-control">
					<option value="">Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Unspecified</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label class="control-label">Country</label>
				<select id="COUNTRY" name="COUNTRY" class="form-control">
					<option value="">Country</option>
					<option value="Nigeria">Nigeria</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label class="control-label">State</label>
				<select id="STATE" name="STATE" class="form-control">
					<option value="">State</option>
					<option value="Kaduna">Kaduna</option>
				</select>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label">Home Address</label>
				<textarea id="HOMEADDRESS" name="HOMEADDRESS" class="form-control">Current Home Address</textarea>
			</div>
			<div class="form-group">
				<span style="padding-left: 400px">
				<label>
					<input type="checkbox" style="width: 15px; height: 15px;" class="form-control" id="CONTINUE" name="CONTINUE" value="1"/><span style="padding: 0px 0px 0px 20px; position: absolute; top: 415px">I am not a robot, I know exactly what I'm doing</span>
				</label>
				</span>
			</div>
			<button role="submit" class="col-md-5 col-md-offset-3 btn btn-success registration-submit">Continue Registration <span><i class="glyphicon glyphicon-circle-arrow-right"></i></span></button>
		</div>
		</form>
	</div>
</div>
<script src = "Server/registration.js"></script>