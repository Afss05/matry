
 
 <style>.mk_select{
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;
border: 1px solid #ccc;
}</style>


<form id="rsvp_form3" name="register" class="rsvp_form3 bgc-overlay-white7" action="<?php echo base_url(); ?>user/forgot_user_password_submit" method="post" novalidate="novalidate">

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 text-center clearfix">
<h1 class="text-thm2 ff-engnmt">Forgot Password</h1>
<div class="messages">
<?php if($this->session->flashdata('message')){     
?>    
<div class="alert alert-success success">
<?php echo $this->session->flashdata('message') ?>                   
</div>
<?php } ?>    

</div>
</div>

<div class="col-xxs-12  col-xs-12  col-sm-12 col-md-offset-3 col-md-6  clearfix">
<div class="form-group">
<label for="email">Email</label>
<input id="email" maxlength="120" required name="email" class="form-control" placeholder="Enter Email">
</div>
</div>

<div class="col-xs-12 col-sm-2 col-md-12 clearfix">
<div class="form-group text-center">
<input id="form_botcheck2" name="form_botcheck2" class="form-control" value="" type="hidden">
<button type="submit"  class="btn btn-lg ulockd-btn-thm2 bdrs20">Submit</button>
</div>

</div>
</div>
</form>

