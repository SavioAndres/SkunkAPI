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