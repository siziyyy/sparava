<?php foreach($totals as $total_title => $total) { ?>
<div class="c_inners_right_footer">
	<?php if($total_title == 'bonus' and $total['value'] != 0) { ?>
		<div class="c_inners_right_footer_yep fl_r send" data-type="use_bonus">
			<?php echo ( $total['use_bonus'] ? 'нет' : 'да' ) ?>
		</div>
	<?php } ?>
	<div class="c_inners_right_footer_num fl_r"><?php echo $total['value'] ?> р.</div>
	<div class="c_inners_right_footer_text fl_r"><?php echo $total['title'] ?></div>
	<div class="clear"></div>
</div>
<?php } ?>