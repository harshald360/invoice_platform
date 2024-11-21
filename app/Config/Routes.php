<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . "Config/Routes.php")) {
    require SYSTEMPATH . "Config/Routes.php";
}
/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace("App\Controllers");
$routes->setDefaultController("Home");
$routes->setDefaultMethod("index");
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->get("/", "Authenticate::fSignUp");

// adminPanel Routes
$routes->group("boards", function ($routes) {
    // authentication module
    $routes->get("/", "Authenticate::fSignUp");
    $routes->post("authenticate-user", "Authenticate::fVerifyUser");
    $routes->get("logout", "Authenticate::logout");
    // dashboard
    $routes->get("dashboard", "Dashboard::fBoardDashboard");

    // Companies
    $routes->group("companies", function ($routes) {
        $routes->get("/", "Company_settings::index");
        $routes->get("getCompanyList/(:num)", 'Company_settings::fGetCompanyList/$1');
        $routes->get("new", "Company_settings::NewCompany");
        $routes->post("add", "Company_settings::fAddCompany");
        $routes->get("edit/(:any)", 'Company_settings::fEditCompanyData/$1');
        $routes->get("status/(:num)/(:num)", 'Company_settings::fChangeUserStatus/$1/$2');
    });

    // users
    $routes->group("users", function ($routes) {
        $routes->get("/", "Users::index");
        $routes->get("getUsersList/(:num)", 'Users::fGetUsersList/$1');
        $routes->get("new", "Users::fRegisterUsers");
        $routes->post("add", "Users::fRegisterNewUsers");
        $routes->get("edit/(:any)", 'Users::fEditUsersDetails/$1');
        $routes->post("update", "Users::fUpdateUsersDetails");
        $routes->post("change-password", "Users::fChangeUsersPassword");
        $routes->get("status/(:num)/(:num)", 'Users::fChangeUserStatus/$1/$2');
    });

    $routes->group("masters", function ($routes) {
        $routes->group("config", function ($routes) {
            $routes->get("/", "Master::fConfiguration");
            $routes->post("update", "Master::fUpdateConfigurationDetails");
        });
    });

    $routes->group("products", function ($routes) {
        $routes->get("/", "Products::index");
        $routes->get("getProductList/(:num)", 'Products::fGetProductList/$1');
        $routes->get("new", "Products::fNewProducts");
        $routes->get(
            "getSubCategoriesByCategory/(:any)",
            'Products::getSubCategoriesByCategory/$1'
        );
        $routes->get(
            "getBrandsBySubCategory/(:any)",
            'Products::getBrandsBySubCategory/$1'
        );
        $routes->get(
            "getBrandsByCategory/(:any)",
            'Products::getBrandsByCategory/$1'
        );
        $routes->post("add", "Products::fAddProducts");
        $routes->get("edit/(:any)", 'Products::fEditProductsDetails/$1');
        $routes->post("update", "Products::fUpdateProductsDetails");
        $routes->get(
            "status/(:num)/(:num)",
            'Products::fChangeProductStatus/$1/$2'
        );
    });
});
