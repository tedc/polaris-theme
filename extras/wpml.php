<?php
    // LANG

    if ( !function_exists( 'acf_get_language_default' ) )
    {
        function acf_get_language_default()
        {
            return acf_get_setting( 'default_language' );
        }
    }

    if ( !function_exists( 'acf_set_language_to_default' ) )
    {
        function acf_set_language_to_default()
        {
            add_filter( 'acf/settings/current_language', 'acf_get_language_default', 100 );
        }
    }

    if ( !function_exists( 'acf_unset_language_to_default' ) )
    {
        function acf_unset_language_to_default()
        {
            remove_filter( 'acf/settings/current_language', 'acf_get_language_default', 100 );
        }
    }
    function icl_selector() {
        global $post;
        $langs = '<ul class="menu-language">';
        $other_langs = '';
        $languages = icl_get_languages('skip_missing=0');
        $lang = "'lang'";
        if(!empty($languages)){
            $langs .= '<li class="menu-item lang-menu-item menu-item-has-children">';
            foreach($languages as $l){
                $language_link = $l['url'];
                $language_code = $l['language_code'];
                if($language_code != ICL_LANGUAGE_CODE) {
                    if(icl_object_id( $post->ID,  get_post_type(), false, $language_code) ) {
                        $other_langs .= '<li class="menu-item" ><a href="'.$language_link.'">'.$language_code.'</a></li>';
                    }
                }
            }
            foreach($languages as $l){
                $language_link = $l['url'];
                $language_code = $l['language_code'];
                if($language_code == ICL_LANGUAGE_CODE) {
                    $langs .= '<a href="'.$language_link.'">'.$language_code.'</a><ul class="sub-menu">'.$other_langs.'</ul></li>';
                }
            }
        }
        $langs.="</ul>";
        if(apply_filters( 'wpml_element_has_translations',  NULL, $post->ID, get_post_type()) ) {
            echo $langs;
        }
    }