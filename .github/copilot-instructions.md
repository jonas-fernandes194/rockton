# ARK - Instrucoes do GitHub Copilot

Estas instrucoes se aplicam a todas as tarefas deste workspace. Siga-as em cada nova solicitacao.

## Objetivo

Trabalhe com precisao, assertividade e mudancas pequenas. Antes de editar, identifique o arquivo, simbolo, fluxo ou teste que controla diretamente o comportamento solicitado.

## Contexto do projeto

- O projeto principal fica em `src/`.
- E uma aplicacao Laravel 12 com PHP 8.2 ou superior.
- O frontend usa Vite, Bootstrap e jQuery com ECMAScript.
- O banco e os servicos locais sao executados por Docker Compose.
- Comandos PHP e Artisan devem ser executados a partir de `src/`, salvo quando o comando exigir a raiz do repositorio.

## Regras de trabalho

1. Leia primeiro o codigo relacionado, os testes proximos e a configuracao relevante.
2. Formule uma hipotese curta sobre a causa ou o comportamento esperado antes da primeira edicao.
3. Preserve APIs publicas, convencoes locais, traducoes existentes e alteracoes feitas pelo usuario.
4. Faca a menor mudanca que resolva a causa do problema; nao refatore codigo sem necessidade.
5. Use `apply_patch` para editar arquivos existentes e mantenha a codificacao e a indentacao do arquivo.
6. Nao adicione dependencias sem justificar a necessidade e verificar se ja existe uma solucao no projeto.
7. Nao exponha segredos de `.env`, credenciais, tokens ou dados pessoais.
8. Para novas funcionalidades, considere validacao de entrada, autorizacao, mensagens de erro, estados vazios e testes.
9. Ao alterar comportamento, atualize ou crie testes focados quando houver uma suite aplicavel.
10. Nao faca commit, push, reset ou alteracao de branch sem solicitacao explicita.

## Validacao obrigatoria

Depois de cada edicao, execute primeiro a validacao mais especifica disponivel:

- PHP/Laravel: `cd src; php artisan test` ou um teste especifico.
- Estilo PHP: `cd src; vendor/bin/pint --test`.
- Frontend: `cd src; npm run build`.
- Quando Docker for necessario: `docker compose config` e o comando apropriado do servico.

Se uma verificacao nao puder ser executada, informe claramente o motivo e qual verificacao ficou pendente.

## Comunicacao

- Responda em portugues, salvo pedido contrario.
- Seja direto: informe o que foi alterado, quais arquivos foram afetados e como foi validado.
- Nao diga que algo foi testado se o comando nao foi executado.
- Ao encontrar ambiguidade, escolha a interpretacao mais consistente com o codigo e declare a suposicao; pergunte apenas quando a decisao puder causar perda de dados ou uma mudanca de contrato.
- Ao revisar codigo, priorize bugs, riscos, regressoes e testes ausentes antes de resumos.

## Convencoes de codigo

- Siga as convencoes do Laravel e o estilo ja presente no repositorio.
- Prefira Form Requests para validacao, Policies para autorizacao e Eloquent para persistencia quando essas abstracoes ja forem usadas.
- Mantenha textos voltados ao usuario nas traducoes existentes em `src/lang/pt_BR/` ou `src/lang/pt_BR.json`.
- Mantenha a interface responsiva e consistente com Bootstrap quando trabalhar no frontend.

## Controller

- Use Controllers para receber e controlar as requisicoes HTTP.
- Toda validacao de informacoes deve ser feita por Form Requests.
- Nao coloque regras de validacao diretamente no Controller, Model ou View.
- Receba o FormRequest ja validado e coordene o fluxo entre requisicao, regras de negocio, Model e View.
- Envie para a View todos os dados necessarios, ja preparados para exibicao.
- Nao coloque HTML, regras de apresentacao ou consultas extensas diretamente no Controller.

## View

- Use Views exclusivamente para apresentar dados e estruturar a interface.
- Nunca crie variaveis de negocio, faca consultas ao banco ou implemente regras de negocio na View.
- Todo dado usado pela View deve ser fornecido pelo Controller.
- Mantenha as Views organizadas, reutilizaveis e consistentes com Blade e Bootstrap.
- Nao use JavaScript vanilla. Para comportamento no navegador, utilize jQuery com sintaxe ECMAScript.

## Model

- Use Models para modelar a camada de persistencia e os relacionamentos do banco.
- Defina no Model os relacionamentos, casts, atributos preenchiveis e demais regras diretamente ligadas aos dados.
- Use Eloquent para consultas e persistencia, respeitando os escopos e convencoes existentes.
- Nao coloque codigo de apresentacao, HTML ou controle de requisicoes no Model.

## jQuery e ECMAScript

- Utilize jQuery para selecao de elementos, eventos, requisicoes AJAX e manipulacao do DOM.
- Escreva o codigo usando recursos modernos do ECMAScript compativeis com o projeto.
- Organize o codigo frontend em arquivos de recursos e carregue-o pelo Vite quando necessario.
- Evite misturar responsabilidades de Controller, View e Model no codigo frontend.
- Formularios nao devem ser enviados diretamente ao FormRequest pelo envio HTML tradicional por padrao.
- Intercepte o evento `submit` com jQuery e use `event.preventDefault()` para evitar o recarregamento da pagina.
- Antes de criar o `FormData`, exiba o carregamento com `$('#loading').show()`.
- Crie o payload com `const formData = new FormData(this)`, usando o elemento DOM do formulario.
- Envie o `FormData` por Axios para a rota da aplicacao e trate os cenarios de sucesso e erro.
- Mantenha o carregamento visivel durante a requisicao e oculte-o ao final, inclusive quando ocorrer erro.
- Use `let` para variaveis que possam receber novos valores e `const` para valores que nao serao reatribuidos.
- Nunca utilize `var` em codigo novo ou alterado.

### Padrao de envio de formularios

$('#meu-formulario').on('submit', function (event) {
	event.preventDefault();
	$('#loading').show();

	const formData = new FormData(this);

	axios.post('/rota', formData)
		.then(function (response) {
			console.log('Sucesso:', response.data);
      $('#loading').hide();
		})
		.catch(function (error) {
			console.error('Erro no envio:', error);
      $('#loading').hide();
		})
		.finally(function () {
			$('#loading').hide();
		});
});
```
