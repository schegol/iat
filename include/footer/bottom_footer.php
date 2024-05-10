<?$APPLICATION->IncludeComponent("aspro:theme.".VENDOR_SOLUTION_NAME, "", array('SHOW_TEMPLATE' => 'Y'), false, ['HIDE_ICONS' => 'Y']);?>
<?\TSolution\Extensions::init('logo_depend_banners');?>
<script>
if (typeof logo_depend_banners === 'function') {
    logo_depend_banners();
}
</script>
<?\TSolution\Notice::showOnAuth();?>    