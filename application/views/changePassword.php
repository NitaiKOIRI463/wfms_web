<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Password </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Password</a></li>
          <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Change Password</h4>
            <form method="POST" action="#">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Old Password</label>
                      <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Enter old password">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>New Password</label>
                      <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter new password">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <span id="cnfrm_msg"></span>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" onblur="confirmPassword();" placeholder="Enter confirm password">
                    </div>
                  </div>
                </div>
              </div>
              <div class="btn-area" style="float: right;">
                <button type="submit" class="btn btn-md btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  function confirmPassword()
  {
    var newPass = $("#new_password").val();
    var cnfrmPass = $("#confirm_password").val();

    if(cnfrmPass == newPass){
      $("#cnfrm_msg").html('<span style="color: green;"> ( Password matched )</span>');
    }else{
      alert("Confirm Password Not Matched !!");
    }
  }
</script>