<?php

namespace Libraries;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

class Twig
{
    protected $twig;

    public function __construct()
    {
        $this->_initialize();
    }

    private function _initialize()
    {
        $this->twig = new Environment(new FilesystemLoader(VIEWPATH));

        $filter = new TwigFilter('parse_detail', function ($string) {
            $list    = explode(':', $string);
            $list[0] = empty($list[0]) ? '' : '<span class="text-roboto-bold">' . $list[0] . '</span>';
            $list[1] = empty($list[1]) ? '' : $list[1];
            $list[2] = empty($list[2]) ? '' : '<span style="color:#008FEE">' . $list[2] . '</span>';
            return implode(' ', $list);
        });
        $this->twig->addFilter($filter);
    }

    public function render($view, $data = [])
    {
        echo $this->twig->render($view, $data);
    }
}
