<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Analytics\Period;
use Analytics;
use App\Events\MessageNotification;
use App\Models\Order;
use Carbon\Carbon;
use Exception;

class SystemController extends Controller
{

    public function dashboard()
    {
        // Google analytics
        //fetch visitors and page views
        $stats = [];
        try{
            $analytics = $this->getAnalytics(60);
            // Get total numbers
            $stats['totalPageViews'] = $analytics->sum('pageViews');
            $stats['totalVisitors'] = $analytics->sum('visitors');
            // Convert data to suit chartjs
            $analyticschartdata = $analytics->map(function ($item, $k) {
                return [
                    //Carbon::parse($item['date'])->format('d'),
                    $k,
                    $item['visitors']
                ];
            });
            $stats['analyticschartdates'] = $analytics->map(function ($item, $k) {
                return Carbon::parse($item['date'])->format('d M');
            });
            $stats['analyticschartdata'] = json_encode($analyticschartdata);
            // chartjs data completed
            // Get extra data
            $bounceRateAnalytics = $this->getBounceRateAnalytics(30);
            $stats['bounceRateAnalytics'] = round($bounceRateAnalytics->rows[0][0] ?? 0, 2);

            $stats['countries'] = $this->getCountriesAnalytics(30);

            // Get alexa rank
            // $siteRank = AlexaService::getAlexaRank(env('APP_URL'));
            // event(new MessageNotification("Analytics data fetched from Google Analytics"));

        }catch(Exception $e){
            $stats = [];
            // event(new MessageNotification("Your Google Analytics account can not be reached!"));
        }

        // Order stats
        $stats['orders'] = Order::latest()->take(6)->get();

        $stats = (object) $stats;


        return view('dashboard', compact('stats'));
    }

    /**
     * Get analytics data for a period
     */
    public function getAnalytics($days)
    {
        return Cache::remember('dashboard-data', 86400, function () use ($days) {
            return Analytics::fetchVisitorsAndPageViews(Period::days($days));
        });
    }


    /**
     * Get analytics for bounce rate
     */
    public function getBounceRateAnalytics($days)
    {
        return Cache::remember('bouncerate', 86400, function () use ($days) {
            return Analytics::performQuery(
                Period::days($days),
                'ga:bounceRate'
            );
        });
    }

    /**
     * Get analytics for bounce rate
     */
    public function getCountriesAnalytics($days)
    {
        return Cache::remember('countries', 86400, function () use ($days) {
            return Analytics::performQuery(
                Period::days($days),
                'ga:users',
                [
                    'dimensions' => 'ga:country'
                ]
            );
        });
    }

    
    public function clearCache()
    {
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Cache cleared successfully');
    }

    public function setLocale($locale)
    {
        if( key_exists($locale, config('app.site_locales')) )
            session()->put('locale', $locale);
        return redirect()->back();
    }

    public function backupList()
    {
        $backupList = Storage::disk('local')->files( config('backup.backup.name') );
        return view('system.backup.index', compact('backupList'));
    }

    public function takeBackup()
    {
        event(new MessageNotification("Backup process is queued. Please do not refresh or leave the page until process is finished! You will be notified once backup is complete."));
        Artisan::call('backup:run');
        return response()->json(['message' => Artisan::output(), 'reload' => true]);
    }
}
