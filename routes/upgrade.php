<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VcardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('session-time/{alias}', [VcardController::class, 'getSession'])->name('appointment-session-time');
Route::post('contact', [HomeController::class, 'store'])->name('contact.store')->middleware('setLanguage');
Route::get('vcards/{vcard}', [VcardController::class, 'download'])->name('vcard.download');
Route::get('/appointments-data', [DashboardController::class, 'appointments'])->name('appointmentsData.data');
Route::get('/upgrade-to-v1-1-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_01_25_045829_add_products_to_plan_features_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_01_25_053730_create_products_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_01_26_071259_change_field_type_json_in_media_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_01_27_041615_add_address_to_vcards_table.php',
        ]);
});

Route::get('/upgrade-to-v1-2-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_03_041325_add_appointments_to_plan_features_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_03_085714_create_galleries_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_03_100343_create_appointments_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_04_100737_create_schedule_appointments_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_05_043302_add_gallery_to_plan_features_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_09_065056_create_jobs_table.php',
        ]);
});

Route::get('/upgrade-to-v2-0-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_15_051819_create_analytics_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_17_051249_change_vcard_table_column.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_19_043114_add_theme_mode_to_users_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_23_113225_add_analytics_to_plan_features_table.php',
        ]);
});

Route::get('/upgrade-to-v2-1-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_02_28_120647_create_payment_gateways_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_03_02_052141_create_social_accounts_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_03_03_043217_add_tiktok_to_social_links_table.php',
        ]);
});

Route::get('/upgrade-to-v2-3-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_03_11_040528_add_seo_to_plan_features_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_03_11_043436_add_meta_to_vcards_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_03_14_071755_add_payment_type_to_subscriptions_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_03_15_074521_create_metas_table.php',
        ]);
});

Route::get('/upgrade-to-v4-0-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2021_11_27_062057_create_vcard_blog_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_03_11_040529_add_blog_to_plan_features_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_03_31_092107_create_languages_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_04_26_113358_add_payable_amount_in_subscriptions_table.php',
        ]);

    Artisan::call('db:seed', ['--class' => 'LanguageTableSeeder', '--force' => true]);
    Artisan::call('db:seed', ['--class' => 'DefaultLanguageSettingsSeeder', '--force' => true]);
});

Route::get('/upgrade-to-v5-0-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_05_04_112737_create_user_settings_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_05_05_084735_create_appointment_details_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_05_05_085632_create_appointment_transactions_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_05_11_104900_add_field_in_schedule_appointments_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_05_11_113546_add_field_in_appointment_transactions_table.php',
        ]);
});

Route::get('/upgrade-to-v5-2-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_05_30_041917_add_language_field_in_vcards_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_05_31_070404_add_google_analytics_to_metas_table.php',
        ]);
});

Route::get('/upgrade-to-v6-1-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_07_29_041154_create_term_conditions_table.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path' => 'database/migrations/2022_07_25_103401_create_privacy_policies_table.php',
        ]);
});

Route::get('/upgrade-to-v6-2-0', function () {
    Artisan::call('db:seed', ['--class' => 'TermsConditionsSeeder', '--force' => true]);
});
Route::get('/upgrade-to-v6-3-0', function () {
    Artisan::call('migrate',
    [
        '--path' => 'database/migrations/2022_08_08_093543_vcard_made_by_column_add.php',
        '--force' => true,
    ]);
    Artisan::call('db:seed', ['--class' => 'DefaultUserLanguageSettingsSeeder', '--force' => true]);
});

Route::get('upgrade/database', function () {
    if (config('app.upgrade_mode')) {
        Artisan::call('migrate', ['--force' => true]);
    }
});

Route::get('lang-js', function () {
    Artisan::call('lang:js');
})->name('lange-js');

