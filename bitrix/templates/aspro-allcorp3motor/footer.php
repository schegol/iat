<?//if(!$isIndex):?>
<!---->
<!--						--><?//TSolution::checkRestartBuffer();?>
<!--					--><?//endif;?>
<!--					--><?//IncludeTemplateLangFile(__FILE__);?>
<!--					--><?//global $arTheme, $isIndex, $is404;?>
<!--					--><?//if(!$isIndex):?>
<!--							--><?//if($is404):?>
<!---->
<!--							--><?//else:?>
<!--									--><?//TSolution::get_banners_position('CONTENT_BOTTOM');?>
<!--									 --><?//// class=right_block?>
<!--									--><?//if($APPLICATION->GetProperty("MENU") != "N" && !defined("ERROR_404")):?>
<!--										--><?//TSolution::ShowPageType('left_block');?>
<!--									--><?//endif;?>
<!--								--><?//// class=col-md-12 col-sm-12 col-xs-12 content-md?>
<!--							--><?//endif;?>
<!---->
<!--							--><?//// class="maxwidth-theme?>
<!---->
<!--						--><?//// class=row?>
<!--					--><?//else:?>
<!--						--><?//TSolution::ShowPageType('indexblocks');?>
<!--					--><?//endif;?>
<!--				--><?//// class=container?>
<!--				--><?//TSolution::get_banners_position('FOOTER');?>
<!--			--><?//// class=main?>
<!---->
<!--		--><?//// class=body?>
<!---->
<?//TSolution::ShowPageType('footer');?>
<!--		--><?//include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/footer/bottom_footer.php'));?>
<!---->
<!--    </body>-->
<!--</html>-->

<?if(!$isIndex):?>
    <?TSolution::checkRestartBuffer();?>
<?endif;?>
<?IncludeTemplateLangFile(__FILE__);?>
<?global $arTheme, $isIndex, $is404;?>
<?if(!$isIndex):?>
    <?if($is404):?>
        </div>
    <?else:?>
        <?TSolution::get_banners_position('CONTENT_BOTTOM');?>
        </div> <?// class=right_block?>
        <?if($APPLICATION->GetProperty("MENU") != "N" && !defined("ERROR_404")):?>
            <?TSolution::ShowPageType('left_block');?>
        <?endif;?>
        </div><?// class=col-md-12 col-sm-12 col-xs-12 content-md?>
    <?endif;?>

    </div><?// class="maxwidth-theme?>

    </div><?// class=row?>
<?else:?>
    <?TSolution::ShowPageType('indexblocks');?>
<?endif;?>
</div><?// class=container?>
<?TSolution::get_banners_position('FOOTER');?>
</div><?// class=main?>
</div><?// class=body?>
<?TSolution::ShowPageType('footer');?>
<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/footer/bottom_footer.php'));?>
<?php
?>
<script>
$(document).ready(function () {

        $('.phones__phone-link').on("click", function(){
            ym(94857077,'reachGoal','click-phone');
        });

        $('.link-wrapper .phone').on("click", function(){
            ym(94857077,'reachGoal','click-phone');
        });

        $('.social__link').on("click", function(){
            ym(94857077,'reachGoal','soc_click');
        });

        $('#credit_btn').on("click", function(){
            ym(94857077,'reachGoal','credit_click');
        });
    });
</script>
	<!-- Calltouch callback-->
        <script>
    jQuery(document).on('click', 'form [type="submit"]', function() {
    var m = jQuery(this).closest('form');
	var phone = m.find('input[data-sid="PHONE"]').val()
    var check = true;
	if (m.find('input[type="checkbox"]').length>0) check = check && !!m.find('input[type="checkbox"]').prop("checked");
	if (m.find('input[data-sid="NAME"]').length>0) check = check && !!m.find('input[data-sid="NAME"]').val();
	if (m.find('input[data-sid="EMAIL"]').length>0) check = check && !!m.find('input[data-sid="EMAIL"]').val();
			if (check && !!phone){
			var phone_ct = phone.replace(/[^0-9]/gim, '');
			if (phone_ct != '') {
				if (phone_ct[0] == '8') { phone_ct = phone_ct.substring(1); }
				if (phone_ct[0] == '7') { phone_ct = phone_ct.substring(1); }
				phone_ct = '7' + phone_ct;
				window.ctw.createRequest('cfmotoIAT', phone_ct,  [], function (success, data) {
                    console.log(success, data);
                    ym(94857077,'reachGoal','pop_click');
                });
			}
			}
});
</script>
<!-- Calltouch callback-->
</body>
</html>