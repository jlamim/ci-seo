# SEO optimization library for Codeigniter projects

This is a library to assist in the SEO optimization process for websites developed with the Codeigniter framework.

It adds the necessary meta tags so that social networking platforms like Facebook, Twitter and Linkedin, for example, can display the title, description and illustrative image related to the shared link.

**Supported CodeIgniter Version:** 3.1.x

## Installation

Download the files and copy them to their respective directories:

- `application/config/ci_seo.php`
- `application/libraries/ci_seo.php`

For the library to work in your application you need to load it, either through `application/config/autoload.php` or `$this->load->library('ci_seo')` wherever you use it in the application.

## Configuration

In the `application/config/ci_seo.php` file you will find an array of configuration variables. See the following table for the usefulness of each in the library:

| Key               | Type    | Description                                                                    |
|-------------------|---------|--------------------------------------------------------------------------------|
| canonical\_url    | string  | Canonical URL of the application, which may be the result of `base\_url \(\)`  |
| site\_title       | string  | Site Title                                                                     |
| site\_description | string  | Website Description                                                            |
| site\_image       | string  | Illustrative site image \(size is usually 1200x630\)                           |
| twitter\_user     | string  | Twitter username including @                                                   |
| fb\_app\_id       | integer | Facebook app ID with which the site is associated \(developer\.facebook\.com\) |
| fb\_page\_id      | integer | Facebook Page ID with which the site is associated                             |

## How to use

After performing the installation and configuration, just call the method `$this->ci_seo->add_tags()` informing the parameters corresponding to the title, description and illustrative image of the page.

```
$this->ci_seo->add_tags('Page title', 'Page Description', 'image/path');
```

The `$this->ci_seo->add_tags()` method can be called either directly inside the `<head> </head>` tag or inside some method in the controller, returning the data to a variable that should be passed to the view should be retrieved inside `<head> </head>`.

```
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <?= $this->ci_seo->add_tags('Page title', 'Page Description', 'image/path'); ?>
</head>
<body></body>
</html>
```

## Contribute

Feel free to suggest and implement improvements, new features and bug fixes.

Fork the repository, apply the changes and submit your Pull Request.