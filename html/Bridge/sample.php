<?php
//webpageの階層
interface WebPage
{
    public function __construct(Theme $theme);
    public function getContent(); 
}

class About implements WebPage
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return $this->theme->getColor()."のAboutページ";
    }
}

class Careers implements WebPage{

    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return $this->theme->getColor(). "のCareersページ";
    }
}

//Themeの階層
interface Theme
{
    public function getColor();
}

class DarkTheme implements Theme
{
    public function getColor()
    {
        return "Dark Black";
    }
}

class LightTheme implements Theme
{
    public function getColor()
    {
        return "Light White";
    } 
}

class AquaBlue implements Theme
{
    public function getColor()
    {
        return "Aqua Blue";
    } 
}

$darkTheme = new DarkTheme();

$about = new About($darkTheme);
$careers = new Careers($darkTheme);

echo $about->getContent();
echo $careers->getContent();


?>