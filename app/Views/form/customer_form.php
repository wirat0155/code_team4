<!--
* customer_form
* Display customer form
* @input    customer information
* @output   customer form
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

<?php
  $attr = '';
  if ($type == 2) {
    $attr = 'readonly';
  }
?>

<div class="col-md-2 input-label branch-div">
  <div class="form-group">
    <label for="cus_branch">Branch <span class="text-info">(Optional)</span></label>
  </div>
</div>

<div class="col-md-2">
  <input type="text" class="form-control" id="cus_branch" name="cus_branch" placeholder="Branch" value="<?php echo $cus_branch ?>" <?php echo $attr?>>
  <label class="error"><?php echo $_SESSION['cus_branch_error'] ?></label>
</div>

<div class="col-md-1">
  <div class="form-group">
    <label for="cus_tax">Tax number</label>
  </div>
</div>

<div class="col-md-3">
  <input type="text" class="form-control" id="cus_tax" name="cus_tax" placeholder="1234567890123" value="<?php echo $cus_tax ?>" <?php echo $attr?>>
</div>

<div class="col-md-2 input-label">
  <div class="form-group">
    <label for="cus_address">Company location </label>
  </div>
</div>

<div class="col-md-6" style="margin-right: 10%">
  <textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location" <?php echo $attr?>><?php echo $cus_address ?></textarea>
</div>
</div>

<h3>2. Contact information</h3>
<div class="row">
  <div class="col-md-2 input-label">
    <div class="form-group">
      <label for="cus_firstname">First name </label>
    </div>
  </div>


  <div class="col-md-6" style="margin-right: 10%">
    <input type="text" class="form-control" id="cus_firstname" name="cus_firstname" placeholder="First name" value="<?php echo $cus_firstname ?>" <?php echo $attr?>>
  </div>

  <div class="col-md-2 input-label">
    <div class="form-group">
      <label for="cus_lastname">Last name </label>
    </div>
  </div>

  <div class="col-md-6" style="margin-right: 10%">
  <input type="text" class="form-control" id="cus_lastname" name="cus_lastname" placeholder="Last name" value="<?php echo $cus_lastname ?>" <?php echo $attr?>>
  </div>

  <div class="col-md-2 input-label">
    <div class="form-group">
      <label for="cus_tel">Contact number </label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="input-group" style="margin-right: 10%">
      <div class="input-group-prepend ">
        <span class="input-group-text "><i class="fas fa-phone"></i></span>
      </div>
      <input type="tel" class="form-control" id="cus_tel" name="cus_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $cus_tel ?>" <?php echo $attr?>>
    </div>
  </div>

  <div class="col-md-2 input-label">
    <div class="form-group">
      <label for="cus_email">Email </label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="input-group" style="margin-right: 10%">
      <div class="input-group-prepend ">
        <span class="input-group-text "><i class="fas fa-envelope"></i></span>
      </div>
      <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="example@gmail.com" value="<?php echo $cus_email ?>" <?php echo $attr?>>
    </div>
  </div>

</div>
</div>
</div>