<?php

require_once 'view/faq.php';
require_once 'controller/registercheck.php';
require_once 'view/highlight.php';
require_once 'view/policy.php';
require_once 'view/accessibility.php';
require_once 'controller/logincheck.php';

session_start();

// Basic Router to handle requests
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($page) {
    case 'auth':
        $authController = new AuthController();
        if ($action === 'login') {
            $authController->login();
        } elseif ($action === 'signup') {
            $authController->signup();
        } elseif ($action === 'logout') {
            $authController->logout();
        }
        break;

    case 'faq':
        $faqController = new FaqController();
        if ($action === 'list') {
            $faqController->listFaqs();
        }
        break;

    case 'highlights':
        $highlightsController = new HighlightsController();
        if ($action === 'list') {
            $highlightsController->listHighlights();
        }
        break;

    case 'policy':
        $policyController = new PolicyController();
        if ($action === 'view') {
            $policyController->viewPolicies();
        }
        break;

    case 'accessibility':
        $accessibilityController = new AccessibilityController();
        if ($action === 'list') {
            $accessibilityController->listAccessibilityFeatures();
        }
        break;

    default:
        include 'views/shared/header.php';
        echo "<h1>Welcome to the Hotel Management System</h1>";
        include 'views/shared/footer.php';
        break;
}

?>
