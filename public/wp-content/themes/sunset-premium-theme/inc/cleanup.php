<?php
function sunset_remove_wp_ver($id) {
    global $wp_version;
    parse_str(parse_url($id, PHP_URL_QUERY),$query);
    if(!empty($query['ver']) && $query['ver']===$wp_version){
        $id=remove_query_arg('ver', $id);
    }
    return $id;
}

    add_filter('script_loader_src', 'sunset_remove_wp_ver');
    add_filter('style_loader_src', 'sunset_remove_wp_ver');

function sunset_remove_meta_ver(){
return '';
}

    add_filter('the_generator', 'sunset_remove_meta_ver');