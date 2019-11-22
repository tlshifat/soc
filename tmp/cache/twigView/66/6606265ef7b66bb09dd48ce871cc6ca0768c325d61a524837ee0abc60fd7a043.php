<?php

/* C:\xampp\htdocs\CakePHP-BoilerPlate\vendor\cakephp\bake\src\Template\Bake\tests\fixture.twig */
class __TwigTemplate_efb1339e594d984778e7fa9c79979c79dc5708d1a4b50ad432e62628e9b6f58c extends Twig_Template
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
        // line 20
        echo "<?php
namespace ";
        // line 21
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\Test\\Fixture;

use Cake\\TestSuite\\Fixture\\TestFixture;

/**
 * ";
        // line 26
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "Fixture
 *
 */
class ";
        // line 29
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "Fixture extends TestFixture
{
";
        // line 31
        if (($context["table"] ?? null)) {
            // line 32
            echo "
    /**
     * Table name
     *
     * @var string
     */
    public \$table = '";
            // line 38
            echo ($context["table"] ?? null);
            echo "';
";
        }
        // line 41
        if (($context["import"] ?? null)) {
            // line 42
            echo "
    /**
     * Import
     *
     * @var array
     */
    public \$import = ";
            // line 48
            echo ($context["import"] ?? null);
            echo ";
";
        }
        // line 51
        if (($context["schema"] ?? null)) {
            // line 52
            echo "
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public \$fields = ";
            // line 59
            echo ($context["schema"] ?? null);
            echo ";
    // @codingStandardsIgnoreEnd
";
        }
        // line 63
        if (($context["records"] ?? null)) {
            // line 64
            echo "
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        \$this->records = ";
            // line 72
            echo ($context["records"] ?? null);
            echo ";
        parent::init();
    }
";
        }
        // line 76
        echo "}
";
    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\fixture.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 76,  100 => 72,  90 => 64,  88 => 63,  82 => 59,  73 => 52,  71 => 51,  66 => 48,  58 => 42,  56 => 41,  51 => 38,  43 => 32,  41 => 31,  36 => 29,  30 => 26,  22 => 21,  19 => 20,);
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
 * Fixture Template file
 *
 * Fixture Template used when baking fixtures with bake
 *
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
namespace {{ namespace }}\\Test\\Fixture;

use Cake\\TestSuite\\Fixture\\TestFixture;

/**
 * {{ name }}Fixture
 *
 */
class {{ name }}Fixture extends TestFixture
{
{% if table %}

    /**
     * Table name
     *
     * @var string
     */
    public \$table = '{{ table|raw }}';
{% endif %}

{%- if import %}

    /**
     * Import
     *
     * @var array
     */
    public \$import = {{ import|raw }};
{% endif %}

{%- if schema %}

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public \$fields = {{ schema|raw }};
    // @codingStandardsIgnoreEnd
{% endif %}

{%- if records %}

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        \$this->records = {{ records|raw }};
        parent::init();
    }
{% endif %}
}
", "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\fixture.twig", "C:\\xampp\\htdocs\\CakePHP-BoilerPlate\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\fixture.twig");
    }
}
