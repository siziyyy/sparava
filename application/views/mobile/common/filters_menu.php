<div class="filters_mask"></div>
    <aside class="filters"><!-- add / remove .opened_filters TO BODY -->
        <div class="filters_header">
            <div class="filters_header_icon sprite"></div>
        </div>
        <div class="filters_body" data-category="<?php echo $category ?>">

            <?php if(isset($sort_attr)) { ?>
                <a href="#" class="filters_reset" data-type="sort" data-sort="clear">Сбросить все фильтры<span class="filters_reset_icon">&times;</span></a>
                <form class="filters_body_cats filters_form">
                    <?php if(($sort_attr['razves'] and $sort_attr['pack']) or $sort_attr['bbox'] or $sort_attr['farm'] or $sort_attr['eko'] or $sort_attr['diet'] or $sort_attr['recommend']) { ?>
                        <div class="filters_form_part">
                            <?php if($sort_attr['razves'] and $sort_attr['pack']) { ?>
                                <a href="#" class="filters_form_link send <?php echo (isset($sort_order['razves']) ? 'active' : '') ?>" data-type="sort" data-sort="razves">На развес</a>
                            <?php } ?>
                            <?php if($sort_attr['pack'] and $sort_attr['razves']) { ?>
                                <a href="#" class="filters_form_link send <?php echo (isset($sort_order['pack']) ? 'active' : '') ?>" data-type="sort" data-sort="pack">Упаковка</a>
                            <?php } ?>
                            <?php if($sort_attr['bbox']) { ?>
                                <a href="#" class="filters_form_link send <?php echo (isset($sort_order['bbox']) ? 'active' : '') ?>" data-type="sort" data-sort="bbox">Большая упаковка</a>
                            <?php } ?>
                            <?php if($sort_attr['farm']) { ?>
                                <a href="#" class="filters_form_link send <?php echo (isset($sort_order['farm']) ? 'active' : '') ?>" data-type="sort" data-sort="farm">Фермерское</a>
                            <?php } ?>
                            <?php if($sort_attr['eko']) { ?>
                                <a href="#" class="filters_form_link send <?php echo (isset($sort_order['eko']) ? 'active' : '') ?>" data-type="sort" data-sort="eko">Эко / органик</a>
                            <?php } ?>
                            <?php if($sort_attr['diet']) { ?>
                                <a href="#" class="filters_form_link send <?php echo (isset($sort_order['diet']) ? 'active' : '') ?>" data-type="sort" data-sort="diet">Диетическое</a>
                            <?php } ?>
                            <?php if($sort_attr['recommend']) { ?>
                                <a href="#" class="filters_form_link send <?php echo (isset($sort_order['recommend']) ? 'active' : '') ?>" data-type="sort" data-sort="recommend">Особо рекомендуем</a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>

                <?php if(isset($attributes)) { ?>
                    <?php if(count($attributes['countries']) > 1) { ?>
                        <div class="filters_form_part">
                            <div class="filters_form_header">Страна</div>
                            <?php foreach($attributes['countries'] as $attribute) { ?>
                                <label class="filters_form_label">
                                    <input type="checkbox" class="filters_form_label_checkbox" value="<?php echo $attribute ?>" <?php echo (in_array($attribute,explode(';',$filters['country'])) ? 'checked' : '' ) ?> data-name="country" >
                                    <span class="filters_form_label_text"><?php echo $attribute ?></span>
                                </label>
                            <?php } ?>
                            <div class="filters_form_more">еще<span class="filters_form_more_icon sprite"></span></div>
                        </div>
                    <?php } ?>
                    <?php if(count($attributes['brands']) > 1) { ?>
                        <div class="filters_form_part">
                            <div class="filters_form_header">Бренд</div>
                            <?php foreach($attributes['brands'] as $attribute) { ?>
                                <label class="filters_form_label">
                                    <input type="checkbox" class="filters_form_label_checkbox" value="<?php echo $attribute ?>" <?php echo (in_array($attribute,explode(';',$filters['brand'])) ? 'checked' : '' ) ?> data-name="brand" >
                                    <span class="filters_form_label_text"><?php echo $attribute ?></span>
                                </label>
                            <?php } ?>
                            <div class="filters_form_more">еще<span class="filters_form_more_icon sprite"></span></div>
                        </div>
                    <?php } ?>
                    <?php if(count($attributes['compositions']) > 1) { ?>
                        <div class="filters_form_part">
                            <div class="filters_form_header">Состав</div>
                            <?php foreach($attributes['compositions'] as $attribute) { ?>
                                <label class="filters_form_label">
                                    <input type="checkbox" class="filters_form_label_checkbox" value="<?php echo $attribute ?>" <?php echo (in_array($attribute,explode(';',$filters['composition'])) ? 'checked' : '' ) ?> data-name="composition" >
                                    <span class="filters_form_label_text"><?php echo $attribute ?></span>
                                </label>
                            <?php } ?>
                            <div class="filters_form_more">еще<span class="filters_form_more_icon sprite"></span></div>
                        </div>
                    <?php } ?>
                    <?php if(count($attributes['weights']) > 1) { ?>
                        <div class="filters_form_part">
                            <div class="filters_form_header">Вес</div>
                            <?php foreach($attributes['weights'] as $attribute) { ?>
                                <label class="filters_form_label">
                                    <input type="checkbox" class="filters_form_label_checkbox" value="<?php echo $attribute ?>" <?php echo (in_array($attribute,explode(';',$filters['weight'])) ? 'checked' : '' ) ?> data-name="weight" >
                                    <span class="filters_form_label_text"><?php echo $attribute ?></span>
                                </label>
                            <?php } ?>
                            <div class="filters_form_more">еще<span class="filters_form_more_icon sprite"></span></div>
                        </div>
                    <?php } ?>
                    <?php if(count($attributes['packs']) > 1) { ?>
                        <div class="filters_form_part">
                            <div class="filters_form_header">Упаковка</div>
                            <?php foreach($attributes['packs'] as $attribute) { ?>
                                <label class="filters_form_label">
                                    <input type="checkbox" class="filters_form_label_checkbox" value="<?php echo $attribute ?>" <?php echo (in_array($attribute,explode(';',$filters['pack'])) ? 'checked' : '' ) ?> data-name="pack" >
                                    <span class="filters_form_label_text"><?php echo $attribute ?></span>
                                </label>
                            <?php } ?>
                            <div class="filters_form_more">еще<span class="filters_form_more_icon sprite"></span></div>
                        </div>
                    <?php } ?>
                    <?php if(count($attributes['assortiments']) > 1) { ?>
                        <div class="filters_form_part">
                            <div class="filters_form_header">Ассортимент</div>
                            <?php foreach($attributes['assortiments'] as $attribute) { ?>
                                <label class="filters_form_label">
                                    <input type="checkbox" class="filters_form_label_checkbox" value="<?php echo $attribute ?>" <?php echo (in_array($attribute,explode(';',$filters['assortiment'])) ? 'checked' : '' ) ?> data-name="assortiment" >
                                    <span class="filters_form_label_text"><?php echo $attribute ?></span>
                                </label>
                            <?php } ?>
                            <div class="filters_form_more">еще<span class="filters_form_more_icon sprite"></span></div>
                        </div>
                    <?php } ?>
                    <div class="filters_form_part">
                        <div class="filters_form_header">Цена</div>
                        <label class="filters_form_label">
                            <input type="radio" class="filters_form_label_checkbox" value="asc" name="price" data-name="price" <?php echo ($filters['price'] === 'asc' ? 'checked' : '' ) ?>>
                            <span class="filters_form_label_text">по возрастанию</span>
                        </label>
                        <label class="filters_form_label">
                            <input type="radio" class="filters_form_label_checkbox" value="desc" name="price" data-name="price" <?php echo ($filters['price'] === 'desc' ? 'checked' : '' ) ?>>
                            <span class="filters_form_label_text">по убыванию</span>
                        </label>
                    </div>

                    <a href="#" class="filters_button">применить</a>
                <?php } ?>
            </form>
            <!--<form class="filters_form">
                <label class="filters_form_label">
                    <input type="checkbox" class="filters_form_label_checkbox">
                    <span class="filters_form_label_text">Деликатесы</span>
                </label>
                <label class="filters_form_label">
                    <input type="checkbox" class="filters_form_label_checkbox">
                    <span class="filters_form_label_text">Бакалея</span>
                </label>
                <label class="filters_form_label">
                    <input type="checkbox" class="filters_form_label_checkbox">
                    <span class="filters_form_label_text">Консервация</span>
                </label>
                <label class="filters_form_label">
                    <input type="checkbox" class="filters_form_label_checkbox">
                    <span class="filters_form_label_text">Соусы</span>
                </label>
                <button class="filters_button">применить</button>
            </form>-->
        </div>
    </aside>