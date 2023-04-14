<?php

declare(strict_types = 1);

class WebPage
{
    private string $head;
    private string $title;
    private string $body;

    /**
     * @param string $title
     * @return void
     */
    public function __constrict(string $title) :void{
        $this->head = <<<HTML
        <meta charset="utf-8">
        HTML;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getHead() :string{
        return $this->head;
    }

    /**
     * @return string
     */
    public function getTitle() :string{
        return $this->title;
    }

    /**
     * @return string
     */
    public function getTitle() :void{
    }

    public function getBody() :string{
        return $this->body;
    }

    /**
     * @param string $content
     * @return void
     */
    public function appendToHead(string $content) :void{
        $this->head .= "$content";
    }

    /**
     * @param string $css
     * @return void
     */
    public function appendCss(string $css) :void{
        $this->head .= <<<HTML
        <stipt>
        {css}
        </stipt>
        HTML;
    }

    /**
     * @param string $url
     * @return void
     */
    public function appendCssUrl(string $url) :void{
        $this->head.= <<<HTML
        <link rel="stylesheet" media="screen" href="{$url}">
        HTML;
    }

    /**
     * @param string $js
     * @return void
     */
    public function appendJs(string $js) : void{
        $this->body .= <<<HTML
        <stipt>
        {$js}
        </stipt>
        HTML;
    }

    /**
     * @param string $url
     * @return void
     */
    public function appendJsUrl(string $url) : void{
        $this->body .= <<<HTML
        <stipt src'{$url}'></stipt>
        HTML;
    }

    /**
     * @param string $content
     * @return void
     */
    public function appendContent(string $content) : void{
        $this->body .= "$content";
    }

    /**
     * @return string
     */
    public function toHTML() :string{
        return <<<HTML
        <!doctype html>
        <html lang="fr">
            <head>
                {$this->head}
                {$this->title}
            </head>
            <body>
                {$this->body}
            </body>
        </html>
        HTML;
    }

    /**
     * @param string $string
     * @return string
     */
    public function escapeString(string $string) : string{
        return preg_replace($string);
    }

    /**
     * @return string
     */
    public function getLastModification() : string{

    }
}