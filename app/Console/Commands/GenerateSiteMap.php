<?php

namespace App\Console\Commands;

use App\Models\Vcard;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a site map for your vcard view urls';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $content = 'Sitemap: '.config('app.url').'/sitemap.xml
User-agent: *
Disallow:';

        file_put_contents(public_path('robots.txt'), $content);

        $activeVcard = Vcard::where('status', true)->pluck('url_alias', 'id')->toArray();

        $sitemap = SitemapGenerator::create(config('app.url'))->getSitemap();

        foreach ($activeVcard as $value) {
            $sitemap->add(route('vcard.show', ['alias' => $value]))
                ->writeToFile(public_path('sitemap.xml'));
        }
    }
}
