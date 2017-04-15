<?php 

defined( 'ABSPATH' ) || die;

if ( ! function_exists('wcd_survey_register_meta_boxes') ) {
    
function wcd_survey_register_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'id'         => 'survey',
        'title'      => __( 'Survey Upload', 'wcd-survey' ),
        'post_types' => array( 'survey' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            
            array(
                'name'  => __( 'File', 'wcd-survey' ),
                'id'    => 'survey_file',
                'type'  => 'file_advanced',
            ),
            
        )
    );

    $meta_boxes[] = array(
        'id'         => 'user',
        'title'      => __( 'Access', 'wcd-survey' ),
        'post_types' => array( 'survey' ),
        'context'    => 'side',
        'priority'   => 'low',
        'fields' => array(
            
            array(
                'name'          => __( 'Chose User', 'wcd-survey' ),
                'id'            => 'survey_user',
                'type'          => 'user',
                'field_type'    => 'select_advanced',
            ),
            
        )
    );

    
    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wcd_survey_register_meta_boxes' );
    
}