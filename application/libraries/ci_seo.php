<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CI_Seo
{

    private $CI;

    function __construct()
    {
        $this->CI = get_instance();
        $this->CI->load->helper('url');
        $this->CI->config->load('ci_seo');
    }

    public function set_tags($title = "", $description = "", $image = "")
    {
        $current_url = current_url();
        echo "<meta property='og:url' content='$current_url' />\n";

        $this->set_titletags($title);
        $this->set_descriptiontags($description);
        $this->set_imagetags($image);
        $this->set_twtags();
        $this->set_fbtags();
        $this->set_canonical();
    }

    private function set_titletags($title)
    {        
        if ($title != "") {
            echo "<title>$title</title>\n";
            echo "<meta property='og:title' content='$title' />\n";
            echo "<meta name='twitter:title' content='$title' />\n";
        } elseif ($this->CI->config->item('site_title') != "") {
            echo "<title>" . $this->CI->config->item('site_title') . "</title>\n";
            echo "<meta property='og:title' content='" . $this->CI->config->item('site_title') . "' />\n";
            echo "<meta property='og:site_name' content='" . $this->CI->config->item('site_title') . "' />\n";
            echo "<meta name='twitter:title' content='" . $this->CI->config->item('site_title') . "' />\n";
        }

    }

    private function set_descriptiontags($description)
    {       
        if ($description != "") {
            echo "<meta name='description' content='$description'/>\n";
            echo "<meta property='og:description' content='$description' />\n";
            echo "<meta name='twitter:description' content='$description' />\n";
        } elseif ($this->CI->config->item('site_description') != "") {
            echo "<meta name='description' content='" . $this->CI->config->item('site_description') . "'/>\n";
            echo "<meta property='og:description' content='" . $this->CI->config->item('site_description') . "' />\n";
            echo "<meta name='twitter:description' content='" . $this->CI->config->item('site_description') . "' />\n";
        }
    }

    private function set_imagetags($image)
    {        
        $image_path = null;

        if ($image != "") {
            $image_path = $this->format_imagetag($image);            
        } elseif ($this->CI->config->item('site_image') != "") {
            $image_path = $this->format_imagetag($this->CI->config->item('site_image'));            
        }

        if($image_path){
            list($width, $height) = getimagesize($image_path);
            echo "<meta property='og:image' content='$image_path' />\n";
            echo "<meta property='og:image:secure_url' content='$image_path' />\n";
            echo "<meta name='twitter:image' content='$image_path' />\n";
            echo "<meta name='twitter:card' content='summary_large_image' />\n";
            echo "<meta property='og:image:width' content='$width' />\n<meta property='og:image:height' content='$height' />\n";
        }        
    }

    private function set_twtags()
    {
        if ($this->CI->config->item('twitter_user') != "") {
            echo "<meta name='twitter:site' content='" . $this->CI->config->item('twitter_user') . "' />\n";
        }
    }

    private function set_fbtags()
    {
        if ($this->CI->config->item('fb_page_id') != "") {
            echo "<meta property='fb:pages' content='" . $this->CI->config->item('fb_page_id') . "' />\n";
        }

        if ($this->CI->config->item('fb_app_id') != "") {
            echo "<meta property='fb:app_id' content='" . $this->CI->config->item('fb_app_id') . "' />\n";
        }
    }

    private function set_canonical()
    {
        if ($this->CI->config->item('canonical_url') != "") {
            echo "<link rel='canonical' href='" . $this->CI->config->item('canonical_url') . "' />\n";
        }
    }

    private function format_imagetag($image_path)
    {
        $path = parse_url($image_path);

        if ($path['scheme'] == "http" || $path['scheme'] == "https") {
            return $image_path;
        } else {
            return base_url($image_path);
        }
    }
}
