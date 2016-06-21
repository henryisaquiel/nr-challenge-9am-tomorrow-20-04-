# NR-CHALLENGE - WEB CRAWLER

Web Crawler é um projeto desenvolvido por Henry Franklin por solicitação da NR - Negócios Reais.
O objetivo é resgatar dados de licitação de websites registrados nesta plataforma

## Componentes

Este projeto foi desenvolvido utilizando o framework [Laravel](http://laravel.com/).
Base de dados Mysql.

## Garantia e atualizações

Este projeto encontra-se como está e não há previsão agendada de melhorias ou evoluções.

## Instalação

Baixar o pacote através deste repositório.

Executar o comando para atualizar as dependências através do composer

	`composer update`
 
Criar base de dados através de gerenciador.

Editar o arquivo ".env" na raiz e alterar os campos para os dados de acesso a base de dados a utilizar

	"DB_HOST": Url da base de dados
	"DB_PORT": Porta padrão (3306)
	"DB_DATABASE": Nome da base de dados
	"DB_USERNAME": Usuário com permissão leitura/escrita da base de dados
	"DB_PASSWORD": Senha de acesso a base de dados
	
Acessar via prompt de comando na pasta raiz do local onde o sistema foi colocado e executar o comando:

	`$ php artisan migrate`
	
Acessar o Tinker

	`$ php artisan tinker`

Digitar o comando para inserir o primeiro site de teste
	 	
	`App\Models\Sites::create(['name'=>'SEBRAE', 'urlsite'=>'http://www.sebrae.com.br', 'urlsearch'=>'http://www.sebrae.com.br/canaldofornecedor'])`

Saia do Tinker digitando `exit`

Execute a captura dos dados
	
	`$ php artisan sites:carregar-dados-licitacao`
	