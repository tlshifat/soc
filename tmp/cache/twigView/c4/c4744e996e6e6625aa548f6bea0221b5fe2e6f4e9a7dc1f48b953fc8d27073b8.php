<?php

/* C:\xampp\htdocs\CakePHP-BoilerPlate\vendor\cakephp\bake\src\Template\Bake\Template\add.twig */
class __TwigTemplate_b06ac278b486bc960b48180e630a7d8521544a7bad15a73ba9f722024355468b extends Twig_Template
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
        echo "<?php
/**
 * @var \\";
        // line 18
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\View\\AppView \$this
 * @var \\";
        // line 19
        echo twig_escape_filter($this->env, ($context["entityClass"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["singularVar"] ?? null), "html", null, true);
        echo "
 */
?>
";
        // line 22
echo $context['_view']->element("form",array(),array());
    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Template\\add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 22,  27 => 19,  23 => 18,  19 => 16,);
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
<?php
/**
 * @var \\{{ namespace }}\\View\\AppView \$this
 * @var \\{{ entityClass }} \${{ singularVar }}
 */
?>
{% element 'form' %}
", "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Template\\add.twig", "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Template\\add.twig");
    }
}
