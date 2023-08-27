<?php
    $contact_form = get_option('sunset_custom_contact_form');
    if ($contact_form == 1){
        add_action( 'init', 'custom_message_post_type',26 );
        add_filter( 'manage_sunset_message_posts_columns', 'custom_message_post_columns' );
        add_action( 'manage_sunset_message_posts_custom_column', 'custom_message_post_column_content', 10, 2 );
        add_action('add_meta_boxes', 'sunset_contact_form_email_metabox');
        add_action('save_post', 'sunset_contact_email_save_data_callback');

    }
  
    // Add and display custom Post Type
    function custom_message_post_column_content ($column,$post_id){
        switch ($column) {
            case 'message':
                echo get_the_excerpt();
                break;
            case 'email':
                $email = get_post_meta($post_id, '_sunset_contact_form_email_key', true);
                echo ''.$email.'';
                break;
        }
        
    }

    function custom_message_post_columns ($columns){
        $newColumns['title'] = 'Sender';
        $newColumns['message'] = 'Message';
        $newColumns['email'] = 'Email';
        $newColumns['date'] = 'Date';
        return $newColumns;
    }

    function custom_message_post_type() {
        $labels = array(
            'name'               => 'Messages',
            'singular_name'      => 'Message',
            'menu_name'          => 'Messages',
            'name_admin_bar'     => 'Message',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Message',
            'new_item'           => 'New Message',
            'edit_item'          => 'Edit Message',
            'view_item'          => 'View Message',
            'all_items'          => 'All Messages',
            'search_items'       => 'Search Messages',
            'parent_item_colon'  => 'Parent Messages:',
            'not_found'          => 'No messages found.',
            'not_found_in_trash' => 'No messages found in Trash.'
        );
    
        $args = array(
            'labels'             => $labels,
            'description'        => 'Description.',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'message' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author' ),
            'map_meta_cap'       => true,
            'menu_icon'          => 'dashicons-email'
        );
    
        register_post_type( 'sunset_message', $args );
    }

     //    Add and display custom metabox

    function sunset_contact_form_email_metabox(){
        add_meta_box('sunset_contact_form_email', 'User Email', 'sunset_contact_form_email_callback', 'sunset_message', 'side');  
    }
    function sunset_contact_form_email_callback($post) {
        wp_nonce_field('sunset_contact_email_save_data_callback', 'sunset_contact_form_email_nonce');
        $value = get_post_meta($post->ID, '_sunset_contact_form_email_key', true);
        echo '<label for="sunset_contact_form_email_field">User Email Address</label>';
        echo '<input type="email" name="sunset_contact_form_email_field" id="sunset_contact_form_email_field" value="' . $value . '" />';
    }

    function sunset_contact_email_save_data_callback($post_id){
     
        if (! isset( $_POST['sunset_contact_form_email_nonce'] )){
            return;
        }
        if (! wp_verify_nonce( $_POST['sunset_contact_form_email_nonce'],'sunset_contact_email_save_data_callback')){
            return;
        }
        if (!current_user_can('edit_post',$post_id)){
            return;
        }
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
            return;
        }
        if(! isset( $_POST['sunset_contact_form_email_field'] )){
            return;
        }
        $emailData = sanitize_text_field( $_POST['sunset_contact_form_email_field'] );
        update_post_meta($post_id, '_sunset_contact_form_email_key', $emailData);
    }