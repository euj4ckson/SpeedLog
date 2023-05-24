PROJETO FINAL
Desenvolvimento de Sistemas
A SpeedLog é uma empresa que oferece serviços de entrega rápida utilizando o serviço de motoboys em Juiz de Fora. A missão da SpeedLog é fortalecer o comércio local, oferecendo soluções que facilitem e agilizem o transporte de mercadorias. Atualmente, o atendimento é feito por telefone e funciona da seguinte forma:
O cliente liga para a SpeedLog e conversa com uma atendente.
O cliente informa o peso estimado da mercadoria, CEP da retirada e CEP de entrega da mercadoria.
O atendente consulta às três tabelas abaixo para calcular o valor do frete:
Peso da mercadoria - Valor
Menos de 1Kg - R$3,00
Entre 1Kg e 3Kg - R$5,00
Entre 3Kg e 8Kg - R$9,00
Entre 8Kg e 12Kg - R$12,00
Acima de 12Kg - Não é possível transportar

Distância - Valor
1 Km rodado - R$0,50

 
Tempo de deslocamento - Valor
1 minuto de deslocamento - R$0,30

O valor do frete é a soma de cada uma das informações: peso, distância e tempo. Por exemplo: uma mercadoria de 7Kg custa R$9,00 (valor por peso). A distância de entrega é 10 Km, o que custa R$5,00. O tempo de deslocamento é 10 min, que custa  R$3,00. Portanto, o valor total do frete é R$17,00.
Todo esse processo é feito de acordo com o conhecimento dos atendentes, pois o tempo de entrega e distância são calculados hoje por estimativa. A empresa tem atendido muitos clientes por telefone e não tem sido possível atender a todos de forma rápida.
Você e sua equipe foram contratados para resolver o problema do atendimento e cálculo do preço de frete e para isso seu sistema deverá fornecer as seguintes funcionalidades:
1.   O sistema deve armazenar os parâmetros de cálculo do valor do frete (peso, distância e tempo) no banco de dados de forma que seja possível editá-los quando necessário.
2.  O sistema terá a interface do administrador com acesso restrito por senha, onde será possível visualizar todas as entregas registradas e seus status (agendada: quando o motoboy ainda não iniciou a corrida), em andamento (quando o motoboy está a caminho do endereço) e finalizada (quando o motoboy realizou a entrega).
3.   O sistema terá a interface para acesso do usuário com acesso restrito por senha. Um novo cliente poderá se cadastrar na plataforma a qualquer tempo. Nessa interface o usuário pode solicitar um transporte e acompanhar todos os transportes solicitados, visualizando: o nome do motoboy e foto, horário de início do transporte, horário previsto para entrega e valor do frete. O cliente pode acessar sua interface pelo smartphone. Pense na responsividade.
4.   O sistema terá a interface do motoboy com acesso restrito por senha, onde os motoboys cadastrados podem ver as solicitações que estão em aberto, aguardando pelo aceite de um motoboy. Cada motoboy deve ter registrado no sistema: nome completo, CPF, telefone de contato, placa da moto e foto do rosto (3x4). O motoboy pode escolher qual entrega quer atender e receberá o valor de 70% do total da corrida realizada. Também poderá ver as corridas que ele aceitou e sinalizar que uma entrega foi feita. Nesse painel de entregas em aberto o motoboy poderá visualizar o bairro e origem, o bairro de destino, o tempo estimado de deslocamento, a distância que será percorrida quanto dele receberá pela corrida. O motoboy fará o acesso pelo smartphone. Pense na responsividade.
Tecnologias que deverão ser utilizadas na solução: HTML, CSS, JavaScript, BootStrap, JQuery, PHP, CodeIgniter, MySQL.
Prazo de entrega: até as 23:59h do dia 30/03/2023. 
Formato da entrega: Toda a pasta do projeto deverá ser entregue compactada no Classroom pelo líder. O arquivo com o banco de dados de dados será exportado em formato SQL de forma que a importação do arquivo SQL crie o banco de dados e as tabelas. Façam os testes de importação do arquivo SQL antes de postar. Deverá ser criado um vídeo apresentando a solução. No vídeo deve-se dar ênfase a todas as funcionalidades, mostrando passo-a-passo a utilização das funcionalidades criadas.

Anexos
API significa Application Programming Interface (Interface de Programação de Aplicação). No contexto de APIs, a palavra Aplicação refere-se a qualquer software com uma função distinta. A interface pode ser pensada como um contrato de serviço entre duas aplicações. Esse contrato define como as duas se comunicam usando solicitações e respostas. A documentação de suas respectivas APIs contém informações sobre como os desenvolvedores devem estruturar essas solicitações e respostas.
Existem APIs que podem nos auxiliar a obter informações na Internet. Para nosso projeto vocês deverão descobrir a distância entre dois CEPs e o tempo de deslocamento. Para isso, a biblioteca Distance Matrix API é capaz de nos fornecer tais informações. É uma biblioteca que pode ser usada por estudantes com algumas limitações. Basta um cadastrado no site: https://distancematrix.ai/product.  Para ter acesso a API é necessário se cadastrar gratuitamente. Após o cadastro você receberá um e-mail com um TOKEN (uma sequência de caracteres que funciona como uma chave exclusiva de acesso). Esse token deve ser usado toda vez que uma requisição for feita.
O código abaixo mostra um exemplo de funcionamento de uma chamada à API Distance Matrix.
<!DOCTYPE html>
 <html>
<head>
    <body>
    <script src="http://code.jquery.com/jquery-1.8.1.js" type="text/javascript"></script>
    <script>
         //Exemplo da API Google Distance Matrix para obter a distância entre dois CEPs e o tempo estimado de deslocamento
        $.get( "https://api.distancematrix.ai/maps/api/distancematrix/json?origins=36085190&destinations=36045120&key=<INSIRA_SEU_TOKEN_AQUI!>", function( data ) {
          console.log(data);
        });
         //Exemplo de API do IBGE para encontrar os dados de endereço a partir do CEP informado
        var cep='36085190';
        $.get( "https://viacep.com.br/ws/"+ cep +"/json/?data=?", function( data ) {
            console.log(data);
        });
    </script>
  </body>
</head>
<body>
O código acima também mostra uma chamada a uma API do IBGE que retorna dados de endereço a partir do CEP.
