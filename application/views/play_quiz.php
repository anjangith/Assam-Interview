
<?php include("inc/header.php"); ?>
<div class="container">
<div id="container">
    <form method="post" action="<?php echo site_url("questions/resultdisplay/{$detail['category']}/{$detail['section']}") ?>">
      <? print_r($questions) ?>
    <?php foreach($questions as $row) { ?>

    <?php $ans_array = array($row->option1, $row->option2, $row->option3, $row->option4);
	   shuffle($ans_array); ?>

    <h4 class="text-primary"><?=$row->q_no?>.<?=$row->question?></h4>
    <h5 class="text-dark"><input type="radio" name="quizid<?=$row->q_no?>" value="<?=$ans_array[0]?>" required><?=$ans_array[0]?><br></h5>
    <h5 class="text-secondary"><input type="radio" name="quizid<?=$row->q_no?>" value="<?=$ans_array[1]?>"> <?=$ans_array[1]?><br></h5>
    <h5 class="text-dark"><input type="radio" name="quizid<?=$row->q_no?>" value="<?=$ans_array[2]?>"> <?=$ans_array[2]?><br></h5>
      <h5 class="text-secondary"><input type="radio" name="quizid<?=$row->q_no?>" value="<?=$ans_array[3]?>"> <?=$ans_array[3]?><br></h5>
    <?php } ?>
    <br>
    <?php echo anchor("admin/dashboard","END TEST",['class'=>'btn btn-danger mb-4']); ?>
    <input class=" ml-2 btn btn-success mb-4" type="submit" value="Submit!">
    </form>
</div>
</div>
<?php include("inc/footer.php"); ?>
<script>
window.onhashchange = function() {
  window.addEventListener("hashchange", function(e) {
    alert("Back pressed");
  })
}
</script>
