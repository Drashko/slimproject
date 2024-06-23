<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* admin/partials/sidebar.twig */
class __TwigTemplate_4030101cc808d0d3f622c236bdb940bb extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<nav class=\"navbar navbar-vertical navbar-expand-lg\">
";
        // line 8
        echo "    <div class=\"collapse navbar-collapse\" id=\"navbarVerticalCollapse\">
        <!-- scrollbar removed-->
        <div class=\"navbar-vertical-content\">
            <ul class=\"navbar-nav flex-column\" id=\"navbarVerticalNav\">
                <li class=\"nav-item\">
                    <!-- label-->
                    <p class=\"navbar-vertical-label\">Dashboard</p>
                    <hr class=\"navbar-vertical-line\" />
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link label-1\" href=\"/admin\" role=\"button\" data-bs-toggle=\"\" aria-expanded=\"false\">
                            <div class=\"d-flex align-items-center\"><span class=\"nav-link-icon\"><span data-feather=\"pie-chart\"></span></span><span class=\"nav-link-text-wrapper\"><span class=\"nav-link-text\">Home</span></span>
                            </div>
                        </a>
                    </div>
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link label-1\" href=\"/admin/users\" role=\"button\" data-bs-toggle=\"\" aria-expanded=\"false\">
                            <div class=\"d-flex align-items-center\"><span class=\"nav-link-icon\"><span data-feather=\"users\"></span></span><span class=\"nav-link-text-wrapper\"><span class=\"nav-link-text\">Members</span></span>
                            </div>
                        </a>
                    </div>
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link label-1\" href=\"/admin/settings\" role=\"button\" data-bs-toggle=\"\" aria-expanded=\"false\">
                            <div class=\"d-flex align-items-center\"><span class=\"nav-link-icon\"><span data-feather=\"calendar\"></span></span><span class=\"nav-link-text-wrapper\"><span class=\"nav-link-text\">Settings</span></span>
                            </div>
                        </a>
                    </div>
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link label-1\" href=\"/admin/test\" role=\"button\" data-bs-toggle=\"\" aria-expanded=\"false\">
                            <div class=\"d-flex align-items-center\"><span class=\"nav-link-icon\"><span data-feather=\"calendar\"></span></span><span class=\"nav-link-text-wrapper\"><span class=\"nav-link-text\">Test</span></span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class=\"nav-item\">
                    <!-- label-->
                    <p class=\"navbar-vertical-label\">Apps
                    </p>
                    <hr class=\"navbar-vertical-line\" />
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link dropdown-indicator label-1\" href=\"#nv-e-commerce\" role=\"button\" data-bs-toggle=\"collapse\" aria-expanded=\"false\" aria-controls=\"nv-e-commerce\">
                            <div class=\"d-flex align-items-center\">
                                <div class=\"dropdown-indicator-icon\"><span class=\"fas fa-caret-right\"></span></div><span class=\"nav-link-icon\"><span data-feather=\"shopping-cart\"></span></span><span class=\"nav-link-text\">E commerce</span>
                            </div>
                        </a>
                        <div class=\"parent-wrapper label-1\">
                            <ul class=\"nav collapse parent\" data-bs-parent=\"#navbarVerticalCollapse\" id=\"nv-e-commerce\">
                                <li class=\"collapsed-nav-item-title d-none\">E commerce
                                </li>
                                <li class=\"nav-item\"><a class=\"nav-link dropdown-indicator\" href=\"#nv-admin\" data-bs-toggle=\"collapse\" aria-expanded=\"true\" aria-controls=\"nv-admin\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"dropdown-indicator-icon\"><span class=\"fas fa-caret-right\"></span></div><span class=\"nav-link-text\">Admin</span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                    <div class=\"parent-wrapper\">
                                        <ul class=\"nav collapse parent show\" data-bs-parent=\"#e-commerce\" id=\"nv-admin\">
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/add-product.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Add product</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/products.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Products</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/customers.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Customers</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/customer-details.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Customer details</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/orders.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Orders</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/order-details.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Order details</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/refund.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Refund</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class=\"nav-item\"><a class=\"nav-link dropdown-indicator\" href=\"#nv-customer\" data-bs-toggle=\"collapse\" aria-expanded=\"true\" aria-controls=\"nv-customer\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"dropdown-indicator-icon\"><span class=\"fas fa-caret-right\"></span></div><span class=\"nav-link-text\">Customer</span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                    <div class=\"parent-wrapper\">
                                        <ul class=\"nav collapse parent show\" data-bs-parent=\"#e-commerce\" id=\"nv-customer\">
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/homepage.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Homepage</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/product-details.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Product details</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/products-filter.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Products filter</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/cart.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Cart</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/checkout.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Checkout</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/shipping-info.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Shipping info</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/profile.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Profile</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/favourite-stores.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Favourite stores</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/wishlist.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Wishlist</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/order-tracking.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Order tracking</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/invoice.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Invoice</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
    <div class=\"navbar-vertical-footer\">
        <button class=\"btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center\"><span class=\"uil uil-left-arrow-to-left fs-0\"></span><span class=\"uil uil-arrow-from-right fs-0\"></span><span class=\"navbar-vertical-footer-text ms-2\">Collapsed View</span></button>
    </div>
</nav>
";
    }

    public function getTemplateName()
    {
        return "admin/partials/sidebar.twig";
    }

    public function getDebugInfo()
    {
        return array (  40 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-vertical navbar-expand-lg\">
{#    <script>#}
{#        var navbarStyle = window.config.config.phoenixNavbarStyle;#}
{#        if (navbarStyle && navbarStyle !== 'transparent') {#}
{#            document.querySelector('body').classList.add(`navbar-\${navbarStyle}`);#}
{#        }#}
{#    </script>#}
    <div class=\"collapse navbar-collapse\" id=\"navbarVerticalCollapse\">
        <!-- scrollbar removed-->
        <div class=\"navbar-vertical-content\">
            <ul class=\"navbar-nav flex-column\" id=\"navbarVerticalNav\">
                <li class=\"nav-item\">
                    <!-- label-->
                    <p class=\"navbar-vertical-label\">Dashboard</p>
                    <hr class=\"navbar-vertical-line\" />
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link label-1\" href=\"/admin\" role=\"button\" data-bs-toggle=\"\" aria-expanded=\"false\">
                            <div class=\"d-flex align-items-center\"><span class=\"nav-link-icon\"><span data-feather=\"pie-chart\"></span></span><span class=\"nav-link-text-wrapper\"><span class=\"nav-link-text\">Home</span></span>
                            </div>
                        </a>
                    </div>
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link label-1\" href=\"/admin/users\" role=\"button\" data-bs-toggle=\"\" aria-expanded=\"false\">
                            <div class=\"d-flex align-items-center\"><span class=\"nav-link-icon\"><span data-feather=\"users\"></span></span><span class=\"nav-link-text-wrapper\"><span class=\"nav-link-text\">Members</span></span>
                            </div>
                        </a>
                    </div>
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link label-1\" href=\"/admin/settings\" role=\"button\" data-bs-toggle=\"\" aria-expanded=\"false\">
                            <div class=\"d-flex align-items-center\"><span class=\"nav-link-icon\"><span data-feather=\"calendar\"></span></span><span class=\"nav-link-text-wrapper\"><span class=\"nav-link-text\">Settings</span></span>
                            </div>
                        </a>
                    </div>
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link label-1\" href=\"/admin/test\" role=\"button\" data-bs-toggle=\"\" aria-expanded=\"false\">
                            <div class=\"d-flex align-items-center\"><span class=\"nav-link-icon\"><span data-feather=\"calendar\"></span></span><span class=\"nav-link-text-wrapper\"><span class=\"nav-link-text\">Test</span></span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class=\"nav-item\">
                    <!-- label-->
                    <p class=\"navbar-vertical-label\">Apps
                    </p>
                    <hr class=\"navbar-vertical-line\" />
                    <!-- parent pages-->
                    <div class=\"nav-item-wrapper\"><a class=\"nav-link dropdown-indicator label-1\" href=\"#nv-e-commerce\" role=\"button\" data-bs-toggle=\"collapse\" aria-expanded=\"false\" aria-controls=\"nv-e-commerce\">
                            <div class=\"d-flex align-items-center\">
                                <div class=\"dropdown-indicator-icon\"><span class=\"fas fa-caret-right\"></span></div><span class=\"nav-link-icon\"><span data-feather=\"shopping-cart\"></span></span><span class=\"nav-link-text\">E commerce</span>
                            </div>
                        </a>
                        <div class=\"parent-wrapper label-1\">
                            <ul class=\"nav collapse parent\" data-bs-parent=\"#navbarVerticalCollapse\" id=\"nv-e-commerce\">
                                <li class=\"collapsed-nav-item-title d-none\">E commerce
                                </li>
                                <li class=\"nav-item\"><a class=\"nav-link dropdown-indicator\" href=\"#nv-admin\" data-bs-toggle=\"collapse\" aria-expanded=\"true\" aria-controls=\"nv-admin\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"dropdown-indicator-icon\"><span class=\"fas fa-caret-right\"></span></div><span class=\"nav-link-text\">Admin</span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                    <div class=\"parent-wrapper\">
                                        <ul class=\"nav collapse parent show\" data-bs-parent=\"#e-commerce\" id=\"nv-admin\">
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/add-product.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Add product</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/products.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Products</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/customers.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Customers</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/customer-details.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Customer details</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/orders.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Orders</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/order-details.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Order details</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/admin/refund.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Refund</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class=\"nav-item\"><a class=\"nav-link dropdown-indicator\" href=\"#nv-customer\" data-bs-toggle=\"collapse\" aria-expanded=\"true\" aria-controls=\"nv-customer\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"dropdown-indicator-icon\"><span class=\"fas fa-caret-right\"></span></div><span class=\"nav-link-text\">Customer</span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                    <div class=\"parent-wrapper\">
                                        <ul class=\"nav collapse parent show\" data-bs-parent=\"#e-commerce\" id=\"nv-customer\">
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/homepage.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Homepage</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/product-details.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Product details</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/products-filter.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Products filter</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/cart.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Cart</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/checkout.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Checkout</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/shipping-info.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Shipping info</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/profile.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Profile</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/favourite-stores.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Favourite stores</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/wishlist.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Wishlist</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/order-tracking.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Order tracking</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"apps/e-commerce/landing/invoice.html\" data-bs-toggle=\"\" aria-expanded=\"false\">
                                                    <div class=\"d-flex align-items-center\"><span class=\"nav-link-text\">Invoice</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
    <div class=\"navbar-vertical-footer\">
        <button class=\"btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center\"><span class=\"uil uil-left-arrow-to-left fs-0\"></span><span class=\"uil uil-arrow-from-right fs-0\"></span><span class=\"navbar-vertical-footer-text ms-2\">Collapsed View</span></button>
    </div>
</nav>
", "admin/partials/sidebar.twig", "C:\\laragon\\www\\slimproject\\templates\\admin\\partials\\sidebar.twig");
    }
}