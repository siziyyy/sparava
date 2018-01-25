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
    <!-- <div class="minsumm">
        <div class="minsumm_header">Не можем оформить заказ</div>
        <div class="minsumm_body">Минимальная сумма заказа 1000 р   </div>
    </div> -->
</div>
<?php } ?>