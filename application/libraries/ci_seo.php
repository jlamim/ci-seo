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

        if ($title != "") {
            echo "<meta property='og:title' content='$title' />\n";
            echo "<meta name='twitter:title' content='$title' />\n";
        } elseif ($this->CI->config->item('site_title') != "") {
            echo "<meta property='og:title' content='" . $this->CI->config->item('site_title') . "' />\n";
            echo "<meta property='og:site_name' content='" . $this->CI->config->item('site_title') . "' />\n";
            echo "<meta name='twitter:title' content='" . $this->CI->config->item('site_title') . "' />\n";
        }

        if ($description != "") {
            echo "<meta property='og:description' content='$description' />\n";
            echo "<meta name='twitter:description' content='$description' />\n";
        } elseif ($this->CI->config->item('site_description') != "") {
            echo "<meta property='og:description' content='" . $this->CI->config->item('site_description') . "' />\n";
            echo "<meta name='twitter:description' content='" . $this->CI->config->item('site_description') . "' />\n";
        }

        if ($image != "") {
            list($width, $height) = getimagesize($image);
            echo "<meta property='og:image' content='$image' />\n";
            echo "<meta property='og:image:secure_url' content='$image' />\n";
            echo "<meta name='twitter:image' content='$image' />\n";
            echo "<meta name='twitter:card' content='summary_large_image' />\n";
            echo "<meta property='og:image:width' content='$width' />\n<meta property='og:image:height' content='$height' />";
        } elseif ($this->CI->config->item('site_image') != "") {
            list($width, $height) = getimagesize($this->CI->config->item('site_image'));
            echo "<meta property='og:image' content='" . $this->CI->config->item('site_image') . "' />\n";
            echo "<meta property='og:image:secure_url' content='" . $this->CI->config->item('site_image') . "' />\n";
            echo "<meta name='twitter:card' content='summary_large_image' />\n";
            echo "<meta name='twitter:image' content='" . $this->CI->config->item('site_image') . "' />\n";
            echo "<meta property='og:image:width' content='$width' />\n<meta property='og:image:height' content='$height' />";
        }

        if ($this->CI->config->item('twitter_user') != "") {
            echo "<meta name='twitter:site' content='" . $this->CI->config->item('twitter_user') . "' />\n";
        }

        $this->set_fbtags();
        $this->set_canonical();
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
}
