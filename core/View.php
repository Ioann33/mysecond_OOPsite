<?php


class View
{
    const DEFAULT_TEMPLATE = 'default';

    /**
     * html content block for current page
     * @var string
     */
    protected $page;

    /**
     * templating html form main tags
     * @var string
     */
    protected $template;

    /**
     * View constructor.
     * @param null $template
     */
    public function __construct($template = null)
    {
        $this->template = $template ?? self::DEFAULT_TEMPLATE;
    }

    public function render(string $page, array $data = []){
        extract($data);
        include_once 'includes'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'templates'. DIRECTORY_SEPARATOR. $this->template.'.php';
    }

}