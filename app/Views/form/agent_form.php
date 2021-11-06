<?php
$attr = '';
if ($type == 2) {
  $attr = 'readonly';
}
?>

<div class="col-md-2 input-label branch-div">
  <div class="form-group">
    <label for="agn_tax">Tax number </label>
  </div>
</div>

<div class="col-md-6 " style="margin-right: 10%;">
  <input type="text" class="form-control" id="agn_tax" name="agn_tax" placeholder="1234567890123" <?php echo $attr;?>>
</div>

<div class="col-md-2 input-label">
  <div class="form-group">
    <label for="agn_address">Company location </label>
  </div>
</div>

<div class="col-md-6 " style="margin-right: 10%;">
  <textarea type="text" class="form-control" id="agn_address" name="agn_address" placeholder="Company location" <?php echo $attr;?>></textarea>
</div>

</div>
<h3>2. Contact information</h3>
<div class="row">
  <div class="col-md-2 input-label">
    <div class="form-group">
      <label for="agn_firstname">First name </label>
    </div>
  </div>

  <div class="col-md-6 " style="margin-right: 10%;">
    <input type="text" class="form-control" id="agn_firstname" name="agn_firstname" placeholder="First name" <?php echo $attr;?>>
  </div>

  <div class="col-md-2 input-label">
    <div class="form-group">
      <label for="agn_lastname">Last name </label>
    </div>
  </div>

  <div class="col-md-6 " style="margin-right: 10%;">
    <input type="text" class="form-control" id="agn_lastname" name="agn_lastname" placeholder="Last name" <?php echo $attr;?>>
  </div>

  <div class="col-md-2 input-label">
    <div class="form-group">
      <label for="agn_tel">Contact number </label>
    </div>
  </div>

  <div class="col-md-6 ">
    <div class="input-group" style="margin-right: 10%;">
      <div class="input-group-prepend ">
        <span class="input-group-text "><i class="fas fa-phone"></i></span>
      </div>
      <input type="tel" class="form-control" id="agn_tel" name="agn_tel" placeholder="xxx-xxx-xxxx" <?php echo $attr;?>>
    </div>
  </div>

  <div class="col-md-2 input-label">
    <div class="form-group">
      <label for="agn_email">Email </label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="input-group" style="margin-right: 10%;">
      <div class="input-group-prepend ">
        <span class="input-group-text "><i class="fas fa-envelope"></i></span>
      </div>
      <input type="email" class="form-control" id="agn_email" name="agn_email" placeholder="example@gmail.com" <?php echo $attr;?>>
    </div>
  </div>
</div>
</div>
</div>
