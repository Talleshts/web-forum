# web-forum
Trabalho da disciplina de Desenvolvimento Web

# Webforum - Projeto de Troca de Mensagens

## Descrição

Este projeto é uma aplicação web simples desenvolvida em PHP que simula um webforum para troca de mensagens entre usuários. O sistema possui duas áreas principais: uma pública e uma restrita. Na área pública, os usuários podem se cadastrar e acessar a área restrita após autenticação. A área restrita permite o envio, visualização e remoção de mensagens.

## Funcionalidades

### Área Pública

- **Cadastro de Usuário**: Permite que novos usuários se registrem fornecendo um e-mail e uma senha. Esses dados são usados para autenticação futura.

### Área Restrita (Acessível após login)

- **Enviar Mensagem**: Usuários logados podem enviar mensagens para outros usuários cadastrados.
- **Visualizar Mensagens Recebidas**: Usuários podem ver uma lista de mensagens recebidas, incluindo remetente e assunto. Mensagens podem ser lidas em detalhes ao serem selecionadas.
- **Remover Mensagens**: Usuários podem excluir mensagens recebidas.

## Funcionalidades de Autenticação

- **Login**: Os usuários precisam estar autenticados para acessar a área restrita. A autenticação é gerida por sessões PHP para garantir que apenas usuários logados possam acessar recursos restritos.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação para o backend.
- **MySQL**: Banco de dados para armazenamento de informações de usuários e mensagens.
- **HTML/CSS**: Estrutura e estilo das páginas web.

## Estrutura do Projeto

- `public/`: Contém arquivos acessíveis publicamente (páginas de cadastro, formulário de login).
- `restricted/`: Contém arquivos para a área restrita (envio de mensagens, visualização de mensagens).
- `includes/`: Scripts PHP reutilizáveis e configuração de banco de dados.
- `css/`: Arquivos CSS para estilização.
- `js/`: Arquivos JavaScript para funcionalidades adicionais (se houver).

## Instalação

1. **Clone o Repositório**

   ```bash
   git clone <URL_DO_REPOSITORIO>

