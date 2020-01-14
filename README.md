# SEO optimization library for projects developed with the Codeigniter framework

This is a library to assist in the SEO optimization process for websites developed with the Codeigniter framework.

## Installation

Download the files and copy them to their respective directories:

- ´application/config/ci_seo.php´
- ´application/libraries/ci_seo.php´

For the library to work in your application you need to load it, either through ´application/config/autoload.php´ or ´$this->load->library('ci_seo')´ wherever you use it in the application.

## Configuration

In the ´application/config/ci_seo.php´ file you will find an array of configuration variables. See the following table for the usefulness of each in the library:

| Key               | Type    | Description                                                                    |
|-------------------|---------|--------------------------------------------------------------------------------|
| canonical\_url    | string  | Canonical URL of the application, which may be the result of ´base\_url \(\) ´ |
| site\_title       | string  | Site Title                                                                     |
| site\_description | string  | Website Description                                                            |
| site\_image       | string  | Illustrative site image \(size is usually 1200x630\)                           |
| twitter\_user     | string  | Twitter username including @                                                   |
| fb\_app\_id       | integer | Facebook app ID with which the site is associated \(developer\.facebook\.com\) |
| fb\_page\_id      | integer | Facebook Page ID with which the site is associated                             |
