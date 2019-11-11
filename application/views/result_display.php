<?php include("inc/loginheader.php"); ?>
<div class="container">
<div id="container">
	<div class="row">
	  <div class="col-8">
			<?php $score =0; ?>

				<?php $array1= array(); ?>
				<?php $array2= array(); ?>
				<?php $array3= array(); ?>
				<?php $array4= array(); ?>
				<?php $array5= array(); ?>
				<?php $array6= array(); ?>
				<?php $array7= array(); ?>
				<?php $array8= array(); ?>

					 <?php foreach($checks as $checkans) { ?>
								 <?php array_push($array1, $checkans); } ?>


					<?php foreach($results as $res) { ?>
								 <?php array_push($array2, $res->answer);
								array_push($array3, $res->q_no);
								array_push($array4, $res->question);
								array_push($array5, $res->option1);
								array_push($array6, $res->option2);
								array_push($array7, $res->option3);
								array_push($array8, $res->option4);
					} ?>


						 <?php
						for ($x=0; $x <10; $x++) { ?>

			<form method="get" action="<?php echo site_url("users/category/{$detail['category']}") ?>">


			<h3><?=$array3[$x]?>.<?=$array4[$x]?></h3>


				<?php if ($array2[$x]!=$array1[$x]) { ?>

						 <h5><span style="background-color: #f73438"><?=$array1[$x]?></span></h5>
						 <h5><span style="background-color: #38bed6"><?=$array2[$x]?></span></h5>

				<?php } else { ?>

						 <h5><span style="background-color: #38bed6"><?=$array1[$x]?></span></h5>

						 <?php $score = $score + 1; ?>

			<?php } } ?>

			<br><br>
		</div>
	  <div class="col-4"><h2 class="display-4">Your Score is</h2>
			<h1 class="text-dark"><?=$score?>/10</h1>
		<input class="btn btn-primary" type="submit" value="Back!">
		</form></div>
	</div>
</div>
</div>

<?php include("inc/footer.php"); ?>
