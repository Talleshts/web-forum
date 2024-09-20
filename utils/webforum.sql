-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/09/2024 às 23:54
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webforum`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `conversa`
--

CREATE TABLE `conversa` (
  `id` varchar(36) NOT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `conversa`
--

INSERT INTO `conversa` (`id`, `data_criacao`) VALUES
('21745833-1874-4cbf-9ee9-731333077451', '0000-00-00 00:00:00'),
('3aa1fff1-cc6d-4521-b1ec-1afd6f1518c4', '0000-00-00 00:00:00'),
('46b36b80-42b4-4189-a187-4df9ddd65b3b', '0000-00-00 00:00:00'),
('542b9b41-891b-4956-a519-103c92234d64', '0000-00-00 00:00:00'),
('5c3c7639-cc31-49a9-9163-9f3f9fc28c4d', '0000-00-00 00:00:00'),
('707d909c-8f0b-4dde-94fc-1efa177a278b', '0000-00-00 00:00:00'),
('814b948b-5d7e-45f4-ac8c-830c14cd4875', '0000-00-00 00:00:00'),
('f53be27c-948f-47f3-8fe4-b26e8a038236', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` varchar(36) NOT NULL,
  `assunto` varchar(128) DEFAULT NULL,
  `titulo` char(128) NOT NULL,
  `conteudo` text DEFAULT NULL,
  `remetente` int(10) UNSIGNED NOT NULL,
  `destinatario` int(10) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `id_conversa` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `mensagem`
--

INSERT INTO `mensagem` (`id`, `assunto`, `titulo`, `conteudo`, `remetente`, `destinatario`, `data`, `id_conversa`) VALUES
('319001b5-e825-4a1b-b315-863c49c334f0', '', 'Teste livro 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 1, '2024-09-19 02:21:25', ''),
('96af4e00-dd21-4aa6-8e01-6d9c42f7975e', 'vbsfb', 'vdfbdf', 'bv gnj', 1, 1, '2024-09-19 02:11:20', ''),
('c5c3c444-387f-4f24-b054-aa2cf7d8a61e', 'vcdvbs', 'Envio de mensagem', 'tdrhsv', 1, 2, '2024-09-19 02:34:20', ''),
('eb44a117-b141-4b45-a367-fba2e2b25a30', 'Vasco', 'MEnsagem JC', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 1, 76, '2024-09-19 03:16:11', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `nome` char(50) NOT NULL,
  `email` char(25) NOT NULL,
  `login` char(13) NOT NULL,
  `senha` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'Filipe Teste', 'teste@mail.com', 'teste@mail.co', '1234'),
(2, 'usuario2', 'usuario2@mail.com', 'usuario2@mail', '1234'),
(76, 'JC', 'vocevaidormir@mail.com', 'vocevaidormir', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `conversa`
--
ALTER TABLE `conversa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mensagem_id_rem` (`remetente`),
  ADD KEY `fk_mensagem_id_dest` (`destinatario`),
  ADD KEY `fk_conversa_id_rem` (`id_conversa`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fk_mensagem_id_dest` FOREIGN KEY (`destinatario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_mensagem_id_rem` FOREIGN KEY (`remetente`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
