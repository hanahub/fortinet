<?php

require_once (APPPATH . 'core/functions.php');

class MY_Loader extends CI_Loader {
    
    public function template($template_name, $vars = array(), $return = FALSE) {

        //print_r($_SESSION);
        $CI =& get_instance();

        $common_vars['current_page'] = $template_name;
        $common_vars['login'] = $CI->session->userdata("login");
        $common_vars['controller'] = $CI->router->fetch_class();

        if (is_object($vars)) {
            if (!isset($vars->page_title)) {
                $vars->page_title = ucwords(str_replace("_", " ", $template_name));
            }
            $common_vars["css_files"] = $vars->css_files;
            $common_vars["js_files"] = $vars->js_files;
            
        } else {
            if (!isset($vars['page_title'])) {
                $vars['page_title'] = ucwords(str_replace("_", " ", $template_name));
            }
        }        

        
        if($return):
            $content  = $this->view('header', $common_vars, $return);
            $content  = $this->view('sidebar', $common_vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('footer', $common_vars, $return);

            return $content;
        else:
            $this->view('header', $common_vars);
            $this->view('sidebar', $common_vars);
            $this->view($template_name, $vars);
            $this->view('footer', $common_vars);
        endif;
    }
}