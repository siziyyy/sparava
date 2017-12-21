		<div class="g_good_admin_info_modal" id="product_form">
            <div class="close_product_details">&times;</div>
            <input type="hidden" class="product_id">        
            <div class="g_good_admin_info_modal_header"><span class="product_id_text"></span> - <span class="product_name_text"></span></div>
            <aside class="g_good_admin_info_modal_left fl_l">
                <div class="g_good_admin_info_modal_photo">
                    <img src="" alt="" class="product_image">
                </div>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Поставщик</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_provider">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Мера</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short product_type">
                </label>
                <label class="fl_r">
                    <span class="g_good_admin_info_modal_inpname">Вес</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_med product_weight">
                </label>
                <div class="clear"></div> 
                <label>
                    <span class="g_good_admin_info_modal_inpname">Упаковка</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_pack">
                </label>
                <div class="clear"></div>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Цена - опт</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short product_cost">
                </label>  
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname proc">%</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short product_percent proc_inp">
                </label>
                <label class="fl_l">
                    <span class="price_new_inf_mod final_price"></span>
                </label>			
                <div class="clear"></div>	
                <!--<label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Мера</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short product_mera">
                </label>   -->
                <div class="clear"></div>   
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Цена</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short product_price">
                </label> 
                <label class="fl_l product_cko_label">
                    <span class="g_good_admin_info_modal_inpname">ЦКО</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short product_cko">
                </label>                
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Кол</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short product_kol">
                </label>             
                <div class="clear"></div>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Состав</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_composition">
                </label>
                <div class="clear"></div>
                <div class="g_good_admin_info_modal_save black_small_button save_product_details">сохранить</div>
            </aside>
            <aside class="g_good_admin_info_modal_center fl_l">
                <label>
                    <span class="g_good_admin_info_modal_inpname nom">Название</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long check_length product_name" data-length="24">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Фото</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_image_src">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Подкатегория</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_category">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Бренд</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long check_length product_brand" data-length="12">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Статус</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_status">
                </label> 
                <label>
                    <span class="g_good_admin_info_modal_inpname">Описание</span>
                    <textarea type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long check_length product_description" data-length="125"></textarea>
                </label>
                <div class="clear"></div>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Ккал</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short3 product_kkal">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Белки</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short3 product_belki">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Жиры</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short3 product_jiri">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Угл.</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short3 product_uglevodi">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Gi</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short3 inpnom product_gi">
                </label>
                <div class="clear"></div>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Акция</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short2 product_special">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname g_good_admin_info_modal_inpname2">Начало (Г-М-Д)</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short2 product_special_begin">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname g_good_admin_info_modal_inpname2">Конец (Г-М-Д)</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short2 nom2 product_special_end">
                </label>
                <div class="clear"></div>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Видео 1</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_video_1">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Видео 2</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_video_2">
                </label>				
                <div class="clear"></div>
            </aside>
            <aside class="g_good_admin_info_modal_right fl_r">
                <label>
                    <span class="g_good_admin_info_modal_inpname">Средний вес</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_sr_ves">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Срок хранения</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_bbefore">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Состав</span>
                    <textarea type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_consist"></textarea>
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Производитель</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_manufacturer">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Страна</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_country">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Ссылка на блог</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long product_blog">
                </label>
                <label class="label_for_adminfchck">
                    <input type="checkbox" class="product_eko adm_inf_chck" value="1"> Эко
                </label>
                <label class="label_for_adminfchck">
                    <input type="checkbox" class="product_farm adm_inf_chck" value="1"> Фермер
                </label>
                <label class="label_for_adminfchck">
                    <input type="checkbox" class="product_diet adm_inf_chck" value="1"> Диет
                </label>
            </aside>
            <div class="clear"></div>
        </div>