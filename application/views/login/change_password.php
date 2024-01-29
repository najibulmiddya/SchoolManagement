 <h3 class="card-title text-left mb-3">Change Password</h3>
 
 <form accept="<?= base_url('user/change_password')?>" method="post">

     <form accept="admin/index" method="post">
         <div class="form-group">
             <label> New Password *</label>
             <input type="password" class="form-control p_input" name="newpassword">
             <?php echo form_error('newpassword', '<div class="error">', '</div>') ?>
         </div>

         <div class="form-group">
             <label>Confirm Password *</label>
             <input type="password" class="form-control p_input" name="cpassword">
             <?php echo form_error('cpassword', '<div class="error">', '</div>') ?>
         </div>

         <div class="text-center">
             <button type="submit" class="btn btn-primary btn-block enter-btn">Update Password</button>
         </div>

     </form>
 </form>