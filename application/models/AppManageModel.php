<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AppManageModel extends CI_Model {

    function pageTitle() {
        return $this->uri->segment(2, '');
    }

    function metaTags() {
        $meta = array(
            array(
                'name' => 'viewport',
                'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
            ),
            array(
                'name' => 'keywords',
                'content' => 'real time training institutes in hyderabad,real time training and development center,real time training, web development training institute, web development training in hyderabad, web development training, web development training and placement'
            ),
            array(
                'name' => 'description',
                'content' => 'ushodaya Solutions is the first & only organization who will give Real-Time and hands-on Practical Experience on your pre-learnt technologies.'
            ),
            array(
                'name' => 'author',
                'content' => 'Akurathi Anand Kumar'
            ),
            array(
                'name' => 'organisation',
                'content' => 'Abhi Tech Soft'
            )
        );
        return meta($meta);
    }

    function minifyCss($param) {
        $cssLink = '';
        if (file_exists('assets/css/webmobiles.minified.css')) {
            $cssLink .= link_tag('assets/css/webmobiles.minified.css');
        } else {
            $this->load->library('minify');
            $this->minify->css($param);
            $cssLink .= $this->minify->deploy_css();
        }
        return $cssLink;
    }

    function formCssLinks($links = '') {
        $cssLink = '';
        if (!empty($links)) {
            $my_file = 'assets/css/webmobiles.minified.min.css';
            if (file_exists($my_file)) {
                $cssLink .= link_tag($my_file);
            } else {
                foreach ($links as $value) {
                    $cssLink .= link_tag($value);
                }
            }
        } else {
            $cssLink = '';
        }
        return $cssLink;
    }

    function defaultCss() {
        $links = array(
            /*  'bootstrap.min.css',
            'font-awesome.min.css', 
            'animate.min.css',
            'bootstrap-switch.min.css', 
            'checkbox3.min.css',
            'jquery.dataTables.min.css',          
            'dataTables.bootstrap.css',          
             'select2.min.css',          
             'style.css',
            'flat-blue.css',
            'daterangepicker.css',
            'custom.css',*/
            
        );
        return $this->minifyCss($links);
    }

    function minifyJs($jsFiles) {
        $js = '';
        $my_file = 'assets/js/webmobiles.minified.js';
        if (file_exists($my_file)) {
            $js .= '<script src="' . b2cBaseUrl . $my_file . '" type="text/javascript"></script>';
        } else {
            $handle = fopen($my_file, 'a') or die('Cannot open file:  ' . $my_file);
            foreach ($jsFiles as $value) {
                if (file_exists($value) && is_readable($value)) {
                    $handle1 = fopen($value, 'r');
                    $data = fread($handle1, filesize($value));
                    fwrite($handle, $data . "\n/* -------------------- $value -------------------------- */\n");
                }
            }
            $js .= '<script src="' . b2cBaseUrl . $my_file . '" type="text/javascript"></script>';
        }
        return $js;
    }

    function defaultJs() {
        $links = array(
            'assets/dist/lib/js/jquery.min.js',
          
            
        );
        return $this->minifyJs($links);
    }

}
