<?php

class YoFLA360Settings {

    /**
     * Holds the values to be used in the fields callbacks
     */
    protected $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_admin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }
    /**
     * Add options page
     */
    public function add_plugin_admin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            '360&deg; Product Rotation',
            '360&deg; Product Rotation',
            'manage_options',
            'yofla-360-admin',
            array( $this, 'create_plugin_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_plugin_admin_page()
    {
        // Set class property
        $this->options = get_option( 'yofla_360_options' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>360&deg; Product Rotation Plugin Settings</h2>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields( 'yofla_360_option_group' );
                do_settings_sections( 'yofla-360-admin' );
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'yofla_360_option_group', // Option group
            'yofla_360_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'yofla_360_settings_section', // ID
            '3DRT License details', // Title
            array( $this, 'print_section_info' ), // Callback
            'yofla-360-admin' // Page
        );


        add_settings_section(
            'yofla_360_settings_section_shortcode', // ID
            'Shortcode defaults', // Title
            array( $this, 'print_section_info_shortcode' ), // Callback
            'yofla-360-admin' // Page
        );

        add_settings_section(
            'yofla_360_settings_section_advanced', // ID
            'Advanced ', // Title
            array( $this, 'print_section_info_advanced' ), // Callback
            'yofla-360-admin' // Page
        );

        //license id
        add_settings_field(
            'license_id',
            '<strong>License Key or Id:</strong>',
            array( $this, 'licenseid_callback' ),
            'yofla-360-admin',
            'yofla_360_settings_section'
        );

        //local engine
        add_settings_field(
            'local_engine',
            '<strong>Local Engine:</strong>',
            array( $this, 'local_engine_callback' ),
            'yofla-360-admin',
            'yofla_360_settings_section'
        );
        
        
        
        //rotatetooljs_url
        add_settings_field(
            'rotatetooljs_url',
            '<strong>rotatetool.js url:</strong><div style="font-size: 12px">(optional)</div>',
            array( $this, 'rotatetooljs_url_callback' ),
            'yofla-360-admin',
            'yofla_360_settings_section_advanced'
        );

        //iframe styles
        add_settings_field(
            'iframe_styles',
            '<strong>iframe_styles:</strong>',
            array( $this, 'iframe_styles_callback' ),
            'yofla-360-admin',
            'yofla_360_settings_section_shortcode'
        );

        //gaEnabled
        add_settings_field(
            'ga_enabled',
            '<strong>ga_enabled:</strong>',
            array( $this, 'ga_enabled_callback' ),
            'yofla-360-admin',
            'yofla_360_settings_section_shortcode'
        );
        
        //ga tracking id
        add_settings_field(
            'ga_tracking_id',
            '<strong>ga_tracking_id:</strong>',
            array( $this, 'ga_tracking_id_callback' ),
            'yofla-360-admin',
            'yofla_360_settings_section_shortcode'
        );



    }

    /**
     * Sanitize each setting field as needed
     * 
     * @param array $input Contains all settings fields as array keys
     * @return array
     */
    public function sanitize( $input )
    {
        $new_input = array();
        
        if( isset( $input['license_id'] ) ){
            $new_input['license_id'] = sanitize_text_field( $input['license_id'] );
        }
        
        if( isset( $input['rotatetooljs_url'] ) ){
            $new_input['rotatetooljs_url'] = sanitize_text_field( $input['rotatetooljs_url'] );
            $new_input['rotatetooljs_url'] = YoFLA360()->Utils()->addHttp($new_input['rotatetooljs_url']);
        }

        if( isset( $input['iframe_styles'] ) ){
            $new_input['iframe_styles'] = sanitize_text_field( $input['iframe_styles'] );
            //remove trailing/leading " or '
            $new_input['iframe_styles']= trim($new_input['iframe_styles']," '\"");
        }
        
        if( isset( $input['ga_tracking_id'] ) ){
            $new_input['ga_tracking_id'] = sanitize_text_field( $input['ga_tracking_id'] );
            //remove trailing/leading " or '
            $new_input['ga_tracking_id']= trim($new_input['ga_tracking_id']," '\"");
        }

        if( isset( $input['ga_enabled'] ) ){
            $new_input['ga_enabled'] = 1;
        }

        if( isset( $input['local_engine'] ) ){
            $new_input['local_engine'] = 1;
        }

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        if(isset($this->options['license_id']) && strlen($this->options['license_id']) > 0)
        {
            $data = $this->_get_order_data($this->options['license_id']);
            if(gettype($data) == 'array')
            {
                //$updates_end_days = round((strtotime($data['updatesend'])-time())/(60*60*24));
                //$updatesend = date_format(date_create(strtotime($data['updatesend'])), 'g:ia \o\n l jS F Y');

                $updatesend = date('jS F Y', strtotime($data['updatesend']));

                //$updatesend = $data['updatesend'];

                $out =  "<table>";
                $out .=  "<tr>";
                $out .=  "    <td>";
                $out .=  "    360&deg; Rotations by:";
                $out .=  "    </td>";
                $out .=  "    <td>";
                $out .=  "    <strong>{$data['license_holder']}</strong>";
                $out .=  "    </td>";
                $out .=  "</tr>";
                $out .=  "<tr>";
                $out .=  "    <td>";
                $out .=  "    License type:";
                $out .=  "    </td>";
                $out .=  "    <td>";
                $out .=  "    {$data['productid']}";
                $out .=  "    </td>";
                $out .=  "</tr>";
                $out .=  "<tr>";
                $out .=  "    <td>";
                $out .=  "    Free updates until:";
                $out .=  "    </td>";
                $out .=  "    <td>";
                $out .=  "    {$updatesend}";
                $out .=  "    </td>";
                $out .=  "</tr>";
                $out .=  "</table>";

                echo $out;

                //update license id
                if( isset($data['orderuid']))
                {
                    $this->options['license_id'] = $data['orderuid'];
                    update_option('yofla_360_options', $this->options);
                }

            }
            elseif(gettype($data) == 'string')
            {
                echo '<p><span style="color: red">'.$data.'</span></p>';
            }
            else
            {
                echo '<p><span style="color: red">License Key is invalid!</span></p>';
                //remove void option
                $this->options['license_id'] = '';
                update_option('yofla_360_options', $this->options);

            }
        }

        $msg = '<p>Please enter your License Key or License ID to replace the free 360&deg; player with a licensed version. License Key will be converted to License ID after submitting.';
        $msg .= ' If you are already using a licensed player, entering the License Key here will make ';
        $msg .= ' all 360&deg; product rotations use the latest 360&deg; player from the cloud.</p>';
        echo $msg;
    }

    /**
     * Print the Section text for shortcode options
     */
    public function print_section_info_advanced()
    {
        //$msg = '<p>.';
        //$msg .= '</p>';
        $msg = '';
        echo $msg;
    }

    /**
     * Print the Section text for shortcode options
     */
    public function print_section_info_shortcode()
    {
        $msg = '<p>Set default site-wide default shortcode values for embedding the 360&deg; product rotation.';
        $msg .= '</p>';
        echo $msg;

    }

    /**
     * Get the settings option array and print one of its values
     */
    public function licenseid_callback()
    {
        printf(
            '<input type="text" id="license_id" name="yofla_360_options[license_id]" value="%s" />',
            isset( $this->options['license_id'] ) ? esc_attr( $this->options['license_id']) : ''
        );
    }
    public function local_engine_callback()
    {

        $desc = '<br />If checked, the local rotatetool.js uploaded with the 360 view will be used, instead of the global one.';

        printf(
            '<input type="checkbox" id="local_engine" value="1" name="yofla_360_options[local_engine]" %s />%s',
            isset( $this->options['local_engine'] ) ? 'checked' : '', $desc
        );
    }
    

    /**
     * Get the settings option array and print one of its values
     */
    public function rotatetooljs_url_callback()
    {
        printf(
            '<input type="text" id="rotatetooljs_url" name="yofla_360_options[rotatetooljs_url]" value="%s" />',
            isset( $this->options['rotatetooljs_url'] ) ? esc_attr( $this->options['rotatetooljs_url']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function iframe_styles_callback()
    {
        $desc = '<br />When not set, this default is used: "max-width: 100%; border: 1px solid silver;"';
        printf(
            '<input type="text" id="iframe_styles" name="yofla_360_options[iframe_styles]" value="%s" />%s',
            isset( $this->options['iframe_styles'] ) ? esc_attr( $this->options['iframe_styles']) : '', $desc
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function ga_enabled_callback()
    {

        $desc = '<br />Turns on Google Analytics Events Tracking. <a href="http://www.yofla.com/3d-rotate/support/manuals/tracking-user-engagement-using-google-analytics/" target="_blank">More Info.</a>';

        printf(
            '<input type="checkbox" id="ga_enabled" value="1" name="yofla_360_options[ga_enabled]" %s />%s',
            isset( $this->options['ga_enabled'] ) ? 'checked' : '', $desc
        );
    }
    
    /**
     * Get the settings option array and print one of its values
     */
    public function ga_tracking_id_callback()
    {
        $desc = '<br />Your Google Analytics profile tracking ID, e.g. UA-123456-7';
        printf(
            '<input type="text" id="ga_tracking_id" name="yofla_360_options[ga_tracking_id]" value="%s" />%s',
            isset( $this->options['ga_tracking_id'] ) ? esc_attr( $this->options['ga_tracking_id']) : '', $desc
        );
    }


    /**
     * Checks if order data is valid
     *
     * @param $license_id
     * @return array|null
     */
    private function _get_order_data($license_id)
    {

        $url = YOFLA_LICENSE_ID_CHECK_URL.$license_id;

        add_filter( 'https_local_ssl_verify', '__return_false' );
        $response = wp_remote_get($url);

        if(is_wp_error($response))
        {
            $error = $response->get_error_message();
            $msg   =  '<div id="message" class="error"><p>' . 'Error communicating with server! ' . $error. '</p>';
            return $msg;
        }


        if($response && isset($response['body']))
        {
            $body = $response['body'];
            $data = explode('|',$body);

            //sucess
            if($data[0]=='ok')
            {
                $order_data = array();
                $order_data['license_holder'] = $data[1];
                $order_data['updatesend'] = $data[2];
                $order_data['productid'] = $data[3];
                $order_data['orderuid'] = $data[4];
                return $order_data;
            }
            //error
            else
            {
                return $body;
            }
        }

        return null;
    }

}
