<?php
namespace App\Console\Commands;

use App\Models\Product;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CrawlData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:tgdd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CrawlerData the gioi di dong';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $client = new Client();
        $url = 'https://www.thegioididong.com/dtdd';
        $crawler = $client->request('GET', $url);
        $crawler->filter('ul.homeproduct li.item a')->each(function ($node) {
            $url = $node->attr('href');
            $this->crawlDetail('https://www.thegioididong.com'.$url);
        });
    }

    public function crawlDetail($url)
    {
        try {
            $client = new Client();
            $product = new Product();
            $crawler = $client->request('GET', $url);
            $name = $crawler->filter('.rowtop h1')->first()->text();
            $thumbnail =  $crawler->filter('.icon-position img')->first()->attr('src');

            $product->name = $name;
            $product->thumbnail = $thumbnail;
            $product->category_id =1;
            $price = $crawler->filter('.slideMemory-carousel .item strong')->first()->text();
            $product->price = preg_replace('/\D/', '', $price);
            $product->brand_id =1;
            $product->operator_id = 1;
            $product->title = $name;
            $product->camera_after_id = 1;
            $product->camera_before_id = 1;
            $product->cpu_id = 1;
            $product->ram_id = 1;
            $product->memory_id = 1;
            $product->sim_id = 1;
            $product->pin_id = 1;
            $product->display_id = 1;
            $product->time_of_launch = 1;
            $product->slug = Str::slug($name);
            $product->is_default = 1;
            $product->qty = 20;
            $product->content = $crawler->filter('.area_article')->last()->html();
            $product->save();
            $this->info('Crawl thành công: ' . $name);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
