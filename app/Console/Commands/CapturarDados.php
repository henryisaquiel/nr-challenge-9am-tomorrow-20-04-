<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sites;
use PhpParser\Node\Stmt\Foreach_;
use Malahierba\WebHarvester\WebHarvester;
use Symfony\Component\HttpKernel\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\SitesDados;

class CapturarDados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sites:carregar-dados-licitacao';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Capturar os dados de licitação dos sites';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Capturando sites...');
        try {
        	
	        $sites = Sites::get();
	        foreach ($sites as $site){
	        	
	        	/*
	        	$http_client = curl_init();
	        	curl_setopt($http_client, CURLOPT_URL, $site->urlsearch);
	        	curl_setopt($http_client, CURLOPT_FOLLOWLOCATION, true);
	        	curl_setopt($http_client, CURLOPT_RETURNTRANSFER, true);
	        	curl_setopt($http_client, CURLOPT_REDIR_PROTOCOLS, true);
	        	curl_setopt($http_client, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
	        	
	        	$response = curl_exec($http_client);
	        	$cod = curl_getinfo($http_client, CURLINFO_HTTP_CODE);
	        	if($cod == 200){
	        		$this->info($response);
	        		//$site->algo = $response;
	        		//$site->save();
	        	} else {
		        	$this->info('Falha, a página retornou o código de erro: '. $cod);
	        	}
	        	*/
	        	
	        	$webharvester = new WebHarvester();
	        	
	        	//Custom User Agent
	        	$webharvester->setUserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
	        	//Ignore SSL Errors
	        	$webharvester->setIgnoreSSLErrors(true);
	        	
	        	$load = $webharvester->load($site->urlsearch);
	        	//Check if we can process the URL and Load it
	        	if ($load) {
	        	
	        		$content = $webharvester->content();
	        		
        			$cl = new Crawler($content);
        			
	        		$tables = $cl->filter('table#ContentPlaceHolder1_gdvResultado tr table div a')->each(function (Crawler $node, $i) {
        				return $ret = array(
				        				'unidade'	=> $node->filter('span')->text(),
				        				'titulo'	=> $node->filter('h3')->text(),
				        				'objeto'	=> $node->filter('p')->text(),
        							);
	        		});
	        		
	        		foreach ($tables as $table){
	        			$table['idsite']	= $site->id;
	        			SitesDados::firstOrCreate($table);
	        		}
	        	} else {
	        		$this->info('Não foi possível resgatar os dados' . $webharvester->getStatusCode());
	        	}
	        	
	        }
	        
	        $this->info('Dados carregados');
        } catch (Exception $e) {
        	$this->info('Problemas ao capturar os dados');
        }
    }
}
