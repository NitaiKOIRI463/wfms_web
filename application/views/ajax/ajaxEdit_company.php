<div class="content-area">
  <form method="POST" action="<?php echo base_url('Company/update_cmp_Details'); ?>" enctype="multipart/form-data">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-6">
          <input type="hidden" name="company_code" id="company_code" value="<?php echo $editcmp_Details[0]['company_code']; ?>">
          <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $editcmp_Details[0]['company_name']; ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Company Logo</label>
            <input type="file" name="company_logo" id="company_logo" class="form-control" value="<?php echo $editcmp_Details[0]['logo']; ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Website Url</label>
            <input type="text" name="website_url" id="website_url" class="form-control" value="<?php echo $editcmp_Details[0]['website']; ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $editcmp_Details[0]['email_id']; ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Contact Person Name</label>
            <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?php echo $editcmp_Details[0]['contact_person']; ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" class="form-control" value="<?php echo $editcmp_Details[0]['contact_no']; ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Registration Date</label>
            <input type="date" name="registration_date" id="registration_date" class="form-control" value="<?php echo date("Y-m-d", strtotime($editcmp_Details[0]['registration_date'])); ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="<?php echo date("Y-m-d", strtotime($editcmp_Details[0]['expiry_date'])); ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>State</label>
            <input type="text" name="state" id="state" class="form-control" value="<?php echo $editcmp_Details[0]['state']; ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" id="city" class="form-control" value="<?php echo $editcmp_Details[0]['city']; ?>">
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address" id="address" required cols="2"><?php echo $editcmp_Details[0]['address']; ?></textarea>
          </div>
        </div>

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>