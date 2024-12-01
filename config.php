<?php
  // Cria o banco de dados SQLite3
  $db = new SQLite3('database.db');

  // Cria a tabela com os métodos id(chave primária), nome, descrição e preço
  $reservas = 'CREATE TABLE IF NOT EXISTS reserva (
            id INTEGER PRIMARY KEY,
            ra TEXT NOT NULL,
            nome TEXT NOT NULL,
            livro TEXT NOT NULL,
            serie TEXT NOT NULL,
            retirada TEXT,
            devolucao TEXT
  )';

  #$excluir = 'DROP TABLE reserva';

  $livros = 'CREATE TABLE IF NOT EXISTS livros(
            isbn INTEGER PRIMARY KEY,
            quantidade INTEGER NOT NULL,
            titulo TEXT NOT NULL,
            descricao TEXT NOT NULL,
            categoria TEXT NOT NULL,
            autor TEXT NOT NULL,
            editora TEXT NOT NULL,
            imagem TEXT NOT NULL
  )';

  $db->exec($livros);
  $db->exec($reservas);
  #$db->exec($excluir);
?>