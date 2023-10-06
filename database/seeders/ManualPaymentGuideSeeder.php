<?php

namespace Database\Seeders;

use App\Models\Setting;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ManualPaymentGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            $manualPaymentGuideView = view('settings.manual_payment_guide.manual_payment_guide')->render();

            $manualPaymentGuide = Setting::where('key', 'manual_payment_guide')->exists();

            if (! $manualPaymentGuide) {
                Setting::create(['key' => 'manual_payment_guide', 'value' => $manualPaymentGuideView]);
            }

            $isManualPaymentGuideOn = Setting::where('key', 'is_manual_payment_guide_on')->exists();

            if (! $isManualPaymentGuideOn) {
                Setting::create(['key' => 'is_manual_payment_guide_on', 'value' => 1]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
        }
    }
}
