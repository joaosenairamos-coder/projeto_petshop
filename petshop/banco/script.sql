-- Script para o Laragon/phpMyAdmin
-- 1) Crie um banco chamado "petshop" (ou rode este script já dentro dele)
-- 2) Cole este conteúdo na aba SQL do phpMyAdmin e clique em Executar

CREATE TABLE IF NOT EXISTS Animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    especie VARCHAR(30) NOT NULL,
    raca VARCHAR(30) NOT NULL,
    idade INT NOT NULL
);

INSERT INTO Animais (nome, especie, raca, idade) VALUES
('Rex', 'Cachorro', 'Labrador', 3),
('Mimi', 'Gato', 'Siamês', 2),
('Bob', 'Cachorro', 'Poodle', 5),
('Luna', 'Gato', 'Persa', 1),
('Thumper', 'Coelho', 'Mini Lop', 2),
('Toby', 'Cachorro', 'Bulldog', 4),
('Nina', 'Gato', 'Vira-lata', 3),
('Kiko', 'Ave', 'Calopsita', 1),
('Duque', 'Cachorro', 'Vira-lata', 6),
('Mel', 'Gato', 'Maine Coon', 2);

SELECT * FROM Animais;
