<?php

/* C:\xampp\htdocs\CakePHP-BoilerPlate\vendor\cakephp\bake\src\Template\Bake\Plugin\composer.json.twig */
class __TwigTemplate_1db4fe1cf440073f027f6b314204241cefbf5ba152362ae1b2acb07e060a411b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 16
        $context["namespace"] = twig_replace_filter(($context["namespace"] ?? null), array("\\" => "\\\\"));
        // line 17
        echo "{
    \"name\": \"";
        // line 18
        echo twig_escape_filter($this->env, ($context["package"] ?? null), "html", null, true);
        echo "\",
    \"description\": \"";
        // line 19
        echo twig_escape_filter($this->env, ($context["plugin"] ?? null), "html", null, true);
        echo " plugin for CakePHP\",
    \"type\": \"cakephp-plugin\",
    \"license\": \"MIT\",
    \"require\": {
        \"cakephp/cakephp\": \"^3.5\"
    },
    \"require-dev\": {
        \"phpunit/phpunit\": \"^5.7.14|^6.0\"
    },
    \"autoload\": {
        \"psr-4\": {
            \"";
        // line 30
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\\\\": \"src/\"
        }
    },
    \"autoload-dev\": {
        \"psr-4\": {
            \"";
        // line 35
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\\\Test\\\\\": \"tests/\",
            \"Cake\\\\Test\\\\\": \"vendor/cakephp/cakephp/tests/\"
        }
    }
}
";
    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Plugin\\composer.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 35,  42 => 30,  28 => 19,  24 => 18,  21 => 17,  19 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
{% set namespace = namespace|replace({'\\\\': '\\\\\\\\'}) %}
{
    \"name\": \"{{ package }}\",
    \"description\": \"{{ plugin }} plugin for CakePHP\",
    \"type\": \"cakephp-plugin\",
    \"license\": \"MIT\",
    \"require\": {
        \"cakephp/cakephp\": \"^3.5\"
    },
    \"require-dev\": {
        \"phpunit/phpunit\": \"^5.7.14|^6.0\"
    },
    \"autoload\": {
        \"psr-4\": {
            \"{{ namespace }}\\\\\": \"src/\"
        }
    },
    \"autoload-dev\": {
        \"psr-4\": {
            \"{{ namespace }}\\\\Test\\\\\": \"tests/\",
            \"Cake\\\\Test\\\\\": \"vendor/cakephp/cakephp/tests/\"
        }
    }
}
", "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Plugin\\composer.json.twig", "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Plugin\\composer.json.twig");
    }
}
