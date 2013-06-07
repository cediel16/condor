<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// ------------------------------------------------------------------------

/**
 * Link
 *
 * Generates link to a script file
 *
 * @access	public
 * @param	mixed	stylesheet hrefs or an array
 * @param	string	rel
 * @param	string	type
 * @param	string	title
 * @param	string	media
 * @param	boolean	should index_page be added to the css path
 * @return	string
 */
if (!function_exists('link_tag')) {

    function script_tag($src = '', $type = 'text/javascript', $index_page = FALSE) {
        $CI = & get_instance();

        $script = '<script ';

        if (is_array($src)) {
            foreach ($src as $k => $v) {
                if ($k == 'src' AND strpos($v, '://') === FALSE) {
                    if ($index_page === TRUE) {
                        $script .= 'src="' . $CI->config->site_url($v) . '" ';
                    } else {
                        $script .= 'src="' . $CI->config->slash_item('base_url') . $v . '" ';
                    }
                } else {
                    $script .= "$k=\"$v\" ";
                }
            }

            $script .= "></script>";
        } else {
            if (strpos($src, '://') !== FALSE) {
                $script .= 'src="' . $src . '" ';
            } elseif ($index_page === TRUE) {
                $script .= 'src="' . $CI->config->site_url($src) . '" ';
            } else {
                $script .= 'src="' . $CI->config->slash_item('base_url') . $src . '" ';
            }

            $script .= 'type="' . $type . '" ';

            $script .= "></script>";
        }


        return $script;
    }

}

if (!function_exists('label')) {

    function label($type, $text) {
        if ($type != '') {
            $type = 'label-' . $type;
        }
        return '<span class="label ' . $type . '">' . $text . '</span>';
    }

}

if (!function_exists('status')) {

    function status($status) {
        switch ($status) {
            case 'activo':
                $type = 'success';
                break;
            case 'eliminado':
                $type = 'inverse';
                break;
            case 'suspendido':
                $type = 'warning';
                break;
            default:
                $type = '';
                break;
        }

        return label($type, ucfirst($status));
    }

}




/* End of file MY_html_helper.php */
/* Location: ./application/helpers/MY_html_helper.php */