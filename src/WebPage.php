<?php

declare(strict_types = 1);

class WebPage
{
    private string $head;
    private string $title;
    private string $body;

    /** le constructeur permet de crée le debut de la page prenant en compt
     * le titre de la page
     * @param string $title
     * @return void
     */
    public function __constrict(string $title) :void{
        $this->head = <<<HTML
        <meta charset="utf-8">
        HTML;
        $this->title = $title;
    }

    /** La fonction getHead permet d'avoir un retour de head
     * @return string le contenus de head
     */
    public function getHead() :string{
        return $this->head;
    }

    /** getTitle permet de voir le titre
     * @return string valeur du titre
     */
    public function getTitle() :string{
        return $this->title;
    }

    /** getBody permet de voir le body
     * @return string le body de la page
     */
    public function getBody() :string{
        return $this->body;
    }

    /** appendToHead permet d'ajouter du contenus au head
     * @param string $content conetenus a ajouter
     * @return void
     */
    public function appendToHead(string $content) :void{
        $this->head .= "$content";
    }

    /** appendCss permet d'ajouter du CSS directement dans la page web
     * @param string $css CSS a ajouter
     * @return void
     */
    public function appendCss(string $css) :void{
        $this->head .= <<<HTML
        <script>
        {css}
        </script>
        HTML;
    }

    /** permet d'ajouter le chemin d'une page de CSS
     * @param string $url URL du chemin de la page de CSS
     * @return void
     */
    public function appendCssUrl(string $url) :void{
        $this->head.= <<<HTML
        <link rel="stylesheet" media="screen" href="{$url}">
        HTML;
    }

    /** appendJs permet dajouter du JS directment dans la page WEB
     * @param string $js JS a ajouter
     * @return void
     */
    public function appendJs(string $js) : void{
        $this->body .= <<<HTML
        <script>
        {$js}
        </script>
        HTML;
    }

    /** appendJsUrl permet d'ajouter un chemain d'une page JS
     * @param string $url chemin de la page JS
     * @return void
     */
    public function appendJsUrl(string $url) : void{
        $this->body .= <<<HTML
        <script src'{$url}'></script>
        HTML;
    }

    /** appendContent permet d'ajouter du contenus au body
     * @param string $content element a ajouter au body
     * @return void
     */
    public function appendContent(string $content) : void{
        $this->body .= "$content";
    }

    /** toHTML permet de crée la page HTML avec
     * tout les elemeent qui compose une page.
     * @return string la page HTML
     */
    public function toHTML() :string{
        return <<<HTML
        <!doctype html>
        <html lang="fr">
            <head>
                <title>{$this->title}</title>
                    {$this->head}
            </head>
            <body>
                {$this->body}
            </body>
        </html>
        HTML;
    }

    /** escapeString permet d'echaper les element passer en parametre
     * a tout les element spesifique au HTML
     * @param string $string element a echaper
     * @return string element echaper
     */
    public function escapeString(string $string) : string{
        return htmlspecialchars($string, $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5,);
    }

    /** getLastModification permet d'avoir la date de la dernière modification effectuer
     * @return int date de la dernière modif
     */
    public function getLastModification() : int{
        return getlastmod();
    }
}