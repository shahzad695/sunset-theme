<h1>Sunset Sidebar Options Page</h1>
<?php settings_errors();
    global $sideBarOptions;
    
?>
<div class="siderbar-overview">
    <div class="image-container">
        <div id="profile_picture_preview" class="image-background"
            style="background-image: url(<?php echo $sideBarOptions['profile_picture'] ?>);">
        </div>
    </div>
    <div class="sidebar-main">
        <h1 class="sunset-username"><?php echo $sideBarOptions['first_name'] .' '. $sideBarOptions['last_name']  ?></h1>
        <h2 class="sunset-description"><?php echo $sideBarOptions['description'] ?></h2>
        <div class="icon-wraper"></div>
    </div>
</div>
<form method="post" action="options.php" class="form-overview">
    <?php settings_fields('sunset_sidebar_options_group')?>
    <?php do_settings_sections('sunset_premium')?>
    <?php submit_button()?>

</form>