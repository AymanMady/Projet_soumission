<?php
session_start() ;
$email = $_SESSION['email'];
if($_SESSION["role"]!="admin"){
    header("location:../authentification.php");
}

include "../nav_bar.php";

?>



<br><br><br>

<!DOCTYPE html><html lang="fr"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-pix_app.png">

    <meta name="theme-color" content="#ffffff">

    
<meta name="mon-pix/config/environment" content="%7B%22modulePrefix%22%3A%22mon-pix%22%2C%22environment%22%3A%22production%22%2C%22rootURL%22%3A%22%2F%22%2C%22locationType%22%3A%22history%22%2C%22EmberENV%22%3A%7B%22FEATURES%22%3A%7B%7D%2C%22EXTEND_PROTOTYPES%22%3A%7B%22Date%22%3Afalse%2C%22Function%22%3Afalse%2C%22String%22%3Afalse%2C%22Array%22%3Atrue%7D%2C%22_APPLICATION_TEMPLATE_WRAPPER%22%3Afalse%2C%22_DEFAULT_ASYNC_OBSERVERS%22%3Atrue%2C%22_JQUERY_INTEGRATION%22%3Afalse%2C%22_TEMPLATE_ONLY_GLIMMER_COMPONENTS%22%3Atrue%7D%2C%22APP%22%3A%7B%22API_HOST%22%3A%22%22%2C%22FT_FOCUS_CHALLENGE_ENABLED%22%3Atrue%2C%22isTimerCountdownEnabled%22%3Atrue%2C%22LOAD_EXTERNAL_SCRIPT%22%3Atrue%2C%22NUMBER_OF_CHALLENGES_BETWEEN_TWO_CHECKPOINTS%22%3A5%2C%22MAX_CONCURRENT_AJAX_CALLS%22%3A8%2C%22MILLISECONDS_BEFORE_MAIL_RESEND%22%3A7000%2C%22BANNER_CONTENT%22%3A%22%22%2C%22BANNER_TYPE%22%3A%22%22%2C%22IS_PROD_ENVIRONMENT%22%3Atrue%2C%22EMBED_ALLOWED_ORIGINS%22%3A%5B%22https%3A%2F%2Fepreuves.pix.fr%22%2C%22https%3A%2F%2F1024pix.github.io%22%5D%2C%22API_ERROR_MESSAGES%22%3A%7B%22BAD_REQUEST%22%3A%7B%22CODE%22%3A%22400%22%2C%22I18N_KEY%22%3A%22common.api-error-messages.bad-request-error%22%7D%2C%22LOGIN_UNAUTHORIZED%22%3A%7B%22CODE%22%3A%22401%22%2C%22I18N_KEY%22%3A%22common.api-error-messages.login-unauthorized-error%22%7D%2C%22USER_IS_TEMPORARY_BLOCKED%22%3A%7B%22CODE%22%3A%22403%22%2C%22I18N_KEY%22%3A%22common.api-error-messages.login-user-temporary-blocked-error%22%7D%2C%22USER_IS_BLOCKED%22%3A%7B%22CODE%22%3A%22403%22%2C%22I18N_KEY%22%3A%22common.api-error-messages.login-user-blocked-error%22%7D%2C%22INTERNAL_SERVER_ERROR%22%3A%7B%22CODE%22%3A%22500%22%2C%22I18N_KEY%22%3A%22common.api-error-messages.internal-server-error%22%7D%2C%22BAD_GATEWAY%22%3A%7B%22CODE%22%3A%22502%22%2C%22I18N_KEY%22%3A%22common.api-error-messages.internal-server-error%22%7D%2C%22GATEWAY_TIMEOUT%22%3A%7B%22CODE%22%3A%22504%22%2C%22I18N_KEY%22%3A%22common.api-error-messages.gateway-timeout-error%22%7D%7D%2C%22AUTHENTICATED_SOURCE_FROM_GAR%22%3A%22external%22%2C%22NUMBER_OF_CHALLENGES_FOR_FLASH_METHOD%22%3A48%2C%22COOKIE_LOCALE_LIFESPAN_IN_SECONDS%22%3A31536000%2C%22name%22%3A%22mon-pix%22%2C%22version%22%3A%223.354.0%22%7D%2C%22fontawesome%22%3A%7B%22warnIfNoIconsIncluded%22%3Afalse%7D%2C%22showdown%22%3A%7B%22openLinksInNewWindow%22%3Atrue%2C%22strikethrough%22%3Atrue%7D%2C%22matomo%22%3A%7B%22url%22%3A%22https%3A%2F%2Fanalytics.pix.fr%2Fjs%2Fcontainer_fNoTNeFZ.js%22%7D%2C%22%40sentry%2Fember%22%3A%7B%22disablePerformance%22%3Atrue%2C%22sentry%22%3A%7B%22dsn%22%3A%22https%3A%2F%2F025f316deef54118ad089fed5a436f61%40o46303.ingest.sentry.io%2F5476250%22%2C%22environment%22%3A%22production%22%2C%22maxBreadcrumbs%22%3A100%2C%22debug%22%3Afalse%2C%22release%22%3A%22v3.354.0%22%7D%7D%2C%22sentry%22%3A%7B%22enabled%22%3Afalse%7D%2C%22ember-cli-mirage%22%3A%7B%22usingProxy%22%3Afalse%2C%22useDefaultPassthroughs%22%3Atrue%7D%2C%22exportApplicationGlobal%22%3Afalse%7D">
<!-- Matomo Tag Manager -->
      <script type="text/javascript" async="" defer="" src="https://analytics.pix.fr/js/container_fNoTNeFZ.js"></script>
        <script type="text/javascript" src="/ember-cli-matomo-tag-manager/start-matomo-event.71daac504649f3f28a1cd4b689ba8cf1.js" data-matomo-debug-mode="false"></script>

        <!-- End Matomo Tag Manager -->

 