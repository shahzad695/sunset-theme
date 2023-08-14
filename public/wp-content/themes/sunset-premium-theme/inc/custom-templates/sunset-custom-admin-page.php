<h1>Sunset Theme Options Page</h1>
<?php settings_errors()?>
<form method="post" action="options.php">
    <?php settings_fields('sunset_theme_settings_group')?>
    <?php do_settings_sections('sunset_premium')?>
    <?php submit_button()?>

</form>