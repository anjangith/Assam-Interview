<?php include("inc/loginheader.php"); ?>
<?php $username= $this->session->userdata('username');
       $email_id=$this->session->userdata('email');
?>
<div class="container">
  <div class="row">
  <div class="col-8"><h1 class="display-1"><?php echo $cname ?></h1></div>
  <div class="col-4">
  <?php echo anchor("users/find","GO BACK",['class'=>'mt-3 btn btn-primary','style'=>'float:right;']); ?>

</div>
</div>

<div class="list-group">
<?php if(count($sections)):?>
  <?php foreach($sections as $section): ?>
    <a href="<?php echo site_url("questions/quizdisplay/{$section->c_id}/{$section->s_id}") ?>" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php echo $section->title ?></h5>
      <small class="text-muted">NEW</small>
    </div>
    <p class="mb-1"><?php echo $section->description ?></p>
    <small class="text-muted">Click To Enroll Now</small>
  </a>
<?php endforeach;?>
<?php else:?>
<p>No Records Found</p>
<?php endif; ?>
</div>
</div>
<?php include("inc/footer.php"); ?>
