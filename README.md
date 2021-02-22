# Skunk API
Skunk API é um microframework PHP. Leve, rápido e simples para você criar projetos REST utilizando PHP.

## Start server
Para executar o seu projeto é necessário executa-lo a partir da pasta frontend.

![Comandos para execução](https://i.postimg.cc/gjV7N6MM/baixados.png)

## Organização do projeto
O framework está organizado em back-end e front-end. Porém, focado fortemente no back-end para a contrução da API.

### Back-end
O back-end está organizado em app e controller, no qual app contém as classes necessárias para ajuda-lo na contrução dos controllers. Leia mais sobre o back-end em <a href="backend">README</a> do mesmo.

### Front-end
O front-end está praticamente vazio, mas pronto para receber o front-end da sua escolha. Coloque-o na pasta <a href="public">public</a>.

# Skunk API - Back-end

## Organização
Para iniciar um projeto basta criar uma classe em controller que herde a classe Routes e implement a interface IMethod.

## Acessando API
Para acessar a API basta digitar na URL o nome da classe criada no contreller. 
Se você criar uma classe cujo nome sejá About o acesso a ela se dará em http://localhost/about, por meio do front-end será possivél atingir os methods GET, POST, PUT, PATCH e DELETE.

Você tem como exemplo a classe Inicio em controller.

## Acesso ao banco de dados
Para acessar o banco de dados navegue até o arquivo __app > Connect.php__ e preencha as informações $HOST, $NAME, $USER e $PASS.

Após isso é possível utilizar os metodos da classe __app > DataAccessObject.php__.
