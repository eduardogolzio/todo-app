# 📝 Todo App - Sistema de Lista de Tarefas

<div align="center">
  
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

**Sistema completo de gerenciamento de tarefas com autenticação de usuários**

[Sobre](#-sobre) • [Funcionalidades](#-funcionalidades) • [Tecnologias](#-tecnologias) • [Instalação](#-instalação) • [Uso](#-uso) • [Estrutura](#-estrutura-do-projeto)

</div>

---

## 📋 Sobre

Todo App é um sistema web completo de gerenciamento de tarefas (to-do list) desenvolvido como projeto acadêmico. O sistema permite que usuários se registrem, façam login e gerenciem suas listas de tarefas de forma personalizada e segura.

### ✨ Destaques do Projeto

- 🔐 **Sistema de autenticação completo** com registro e login
- 👤 **Gerenciamento de usuários** com senhas criptografadas
- ✅ **CRUD completo de tarefas** (Create, Read, Update, Delete)
- 🎨 **Interface moderna e responsiva** com design roxo/azul
- 🔄 **Atualizações em tempo real** sem recarregar a página
- 📱 **Design responsivo** que funciona em qualquer dispositivo
- 🛡️ **Segurança** com proteção de sessão e validação de dados

---

## 🚀 Funcionalidades

### Autenticação de Usuários
- ✅ Registro de novos usuários
- ✅ Login com validação de credenciais
- ✅ Senhas criptografadas com `password_hash()`
- ✅ Proteção de rotas com sessões PHP
- ✅ Logout seguro

### Gerenciamento de Tarefas
- ✅ Adicionar novas tarefas
- ✅ Listar todas as tarefas do usuário
- ✅ Marcar/desmarcar tarefas como concluídas
- ✅ Editar tarefas existentes
- ✅ Excluir tarefas com confirmação
- ✅ Ordenação por data de criação

### Interface do Usuário
- ✅ Design moderno com gradientes e animações
- ✅ Feedback visual para todas as ações
- ✅ Responsividade para mobile, tablet e desktop
- ✅ Acessibilidade melhorada
- ✅ Efeitos hover e transições suaves

---

## 🛠️ Tecnologias

### Backend
- **PHP 7.4+** - Linguagem de programação server-side
- **MySQL** - Banco de dados relacional
- **MySQLi** - Interface de conexão com banco de dados

### Frontend
- **HTML5** - Estrutura das páginas
- **CSS3** - Estilização e animações
- **JavaScript (Vanilla)** - Interatividade e requisições AJAX
- **Google Fonts (Poppins)** - Tipografia moderna

### Arquitetura
- **MVC Pattern** - Separação de responsabilidades
- **RESTful API** - Comunicação entre frontend e backend
- **Session Management** - Controle de autenticação
- **Prepared Statements** - Proteção contra SQL Injection

---

## 📦 Instalação

### Pré-requisitos

- XAMPP (ou similar com Apache + MySQL + PHP)
- Navegador web moderno
- Git (opcional)

### Passo a Passo

1. **Clone ou baixe o repositório**
```bash
git clone https://github.com/seu-usuario/todo-app.git
cd todo-app
```

2. **Instale e inicie o XAMPP**
   - Baixe o XAMPP em: https://www.apachefriends.org/

3. **Configure o projeto**
   - Copie os arquivos do projeto para a pasta `htdocs` do XAMPP
   - Exemplo: `C:\xampp\htdocs\todo-app\`

4. **Inicie os serviços necessários**
   - Abra o XAMPP Control Panel
   - Inicie o **Apache**
   - Inicie o **MySQL**

5. **O banco de dados será criado automaticamente!**
   - O sistema cria o banco `todo_app` e as tabelas automaticamente na primeira execução
   - Não é necessário executar scripts SQL manualmente

6. **Acesse o sistema**
   - Abra o navegador e acesse: `http://localhost/todo-app/`

---

## 💻 Uso

### Primeiro Acesso

1. **Cadastro**
   - Clique em "Cadastre-se" na tela de login
   - Preencha usuário e senha
   - Confirme a senha
   - Clique em "Cadastrar"

2. **Login**
   - Digite seu usuário e senha
   - Clique em "Entrar"

### Gerenciando Tarefas

**Adicionar Tarefa**
- Digite o título da tarefa no campo "Adicionar nova tarefa..."
- Clique em "Adicionar" ou pressione Enter

**Marcar como Concluída**
- Clique no checkbox ao lado da tarefa

**Editar Tarefa**
- Clique no botão "Editar" (laranja)
- Modifique o texto no campo de entrada
- Clique em "Atualizar"

**Excluir Tarefa**
- Clique no botão "Excluir" (vermelho)
- Confirme a exclusão

**Sair do Sistema**
- Clique em "Sair" no canto superior direito

---

## 📁 Estrutura do Projeto

```
todo-app/
│
├── 📄 index.html              # Página de login
├── 📄 register.html           # Página de registro
├── 📄 dashboard.html          # Interface principal (lista de tarefas)
│
├── 🎨 style.css               # Estilos das páginas de login/registro
├── 🎨 dashboard.css           # Estilos do dashboard
│
├── 📜 dashboard.js            # Lógica do frontend (AJAX, manipulação DOM)
│
├── ⚙️ config.php              # Configuração do banco de dados
├── ⚙️ login.php               # Processa autenticação
├── ⚙️ register.php            # Processa registro de usuários
├── ⚙️ dashboard.php           # API para operações CRUD de tarefas
├── ⚙️ logout.php              # Processa logout
│
├── 🖼️ todoapplogo.png         # Logo do aplicativo
├── 📁 favicon_io/             # Ícones do site
│
└── 📖 README.md               # Este arquivo
```

---

## 🗄️ Estrutura do Banco de Dados

### Tabela: `users`
| Campo    | Tipo         | Descrição                    |
|----------|--------------|------------------------------|
| id       | INT          | Chave primária (auto)        |
| username | VARCHAR(255) | Nome de usuário (único)      |
| password | VARCHAR(255) | Senha criptografada (hash)   |

### Tabela: `todos`
| Campo      | Tipo     | Descrição                          |
|------------|----------|------------------------------------|
| id         | INT      | Chave primária (auto)              |
| user_id    | INT      | Referência ao usuário (FK)         |
| title      | TEXT     | Título da tarefa                   |
| completed  | BOOLEAN  | Status de conclusão (0 ou 1)       |
| created_at | DATETIME | Data/hora de criação (automático)  |

---

## 🔐 Segurança

O projeto implementa várias medidas de segurança:

- ✅ **Criptografia de senhas** com `password_hash()` e `password_verify()`
- ✅ **Prepared Statements** para prevenir SQL Injection
- ✅ **Validação de sessões** em todas as páginas protegidas
- ✅ **Sanitização de inputs** no frontend e backend
- ✅ **Proteção CSRF** através de verificação de sessão
- ✅ **Validação de propriedade** (usuários só acessam suas próprias tarefas)

---

## 🎨 Design e Interface

### Paleta de Cores
- **Primária**: `#6366f1` (Roxo)
- **Secundária**: `#8b5cf6` (Roxo escuro)
- **Accent**: `#c084fc` (Roxo claro)
- **Fundo**: Gradiente animado roxo/azul
- **Texto**: `#1e293b` (Cinza escuro)

### Características Visuais
- Gradientes animados no background
- Efeitos de hover em todos os elementos interativos
- Animações de entrada suaves
- Checkboxes customizados
- Transições CSS3
- Sombras e efeitos de profundidade
- Design responsivo com breakpoints em 768px e 480px

---

## 📱 Responsividade

O sistema é totalmente responsivo e se adapta a diferentes tamanhos de tela:

- 📱 **Mobile** (< 480px): Layout vertical compacto
- 📱 **Tablet** (480px - 768px): Layout otimizado
- 💻 **Desktop** (> 768px): Layout completo com todos os recursos

---

## 🔄 API Endpoints

### Dashboard API (`dashboard.php`)

| Ação   | Método | Parâmetros               | Descrição                      |
|--------|--------|--------------------------|--------------------------------|
| list   | GET    | -                        | Lista todas as tarefas         |
| add    | POST   | title                    | Adiciona nova tarefa           |
| toggle | POST   | id, completed            | Marca/desmarca como concluída  |
| update | POST   | id, title                | Atualiza título da tarefa      |
| delete | POST   | id                       | Exclui tarefa                  |

---

## 🐛 Troubleshooting

### Problema: "Falha na conexão com o banco de dados"
**Solução**: Verifique se o MySQL está rodando no XAMPP Control Panel

### Problema: Página em branco
**Solução**: 
- Verifique se o Apache está rodando
- Confirme que os arquivos estão na pasta `htdocs`
- Verifique erros no console do navegador (F12)

### Problema: "Usuário já existe"
**Solução**: Escolha um nome de usuário diferente

### Problema: Tarefas não aparecem
**Solução**: 
- Verifique se está logado
- Limpe o cache do navegador
- Verifique o console para erros de JavaScript

---

## 👥 Autores

Este projeto foi desenvolvido como trabalho acadêmico da disciplina de **Programação Web**.

- **Eduardo Golzio** - [GitHub](https://github.com/eduardogolzio)
- **Romulo Araujo** - [GitHub](https://github.com/Romulo-AraujoDev)

---

## 📚 Aprendizados

Este projeto permitiu aplicar e aprofundar conhecimentos em:

- 🎯 Desenvolvimento full-stack com PHP
- 🎯 Manipulação de banco de dados MySQL
- 🎯 Criação de APIs RESTful
- 🎯 Sistema de autenticação e autorização
- 🎯 JavaScript assíncrono (Fetch API)
- 🎯 Design responsivo e UX
- 🎯 Segurança em aplicações web
- 🎯 Padrões de projeto MVC
- 🎯 Git e versionamento de código

---

## 🚀 Possíveis Melhorias Futuras

- [ ] Adicionar categorias/tags para tarefas
- [ ] Implementar filtros (todas, ativas, concluídas)
- [ ] Sistema de prioridades (alta, média, baixa)
- [ ] Definir prazos para tarefas
- [ ] Notificações para tarefas próximas do prazo
- [ ] Compartilhamento de tarefas entre usuários
- [ ] Modo escuro/claro
- [ ] Exportar tarefas (PDF, CSV)
- [ ] Upload de arquivos nas tarefas
- [ ] Histórico de alterações

---

## 📄 Licença

Este projeto foi desenvolvido para fins educacionais como parte da disciplina de Programação Web.

---

## 🙏 Agradecimentos

- Professor(a) da disciplina de Programação Web
- Colegas de turma pelas discussões e feedback
- Comunidade PHP e MySQL pela documentação

---

<div align="center">

**[⬆ Voltar ao topo](#-todo-app---sistema-de-lista-de-tarefas)**

Feito com ❤️ por Eduardo Golzio e Romulo Araujo

</div>
