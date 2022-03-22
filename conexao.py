import pyodbc

dados_conexao = (
    "Driver={SQL Server};"
    "Server=DESKTOP-AAE0RNM;"
    "Database=Carros;"
)

conexao = pyodbc.connect(dados_conexao)
print("Conexão Bem Sucedida")

cursor = conexao.cursor()
comando = """ INSERT INTO Carros (nome,telefone,marca,modelo,observação)
VALUES
('Natan', 11962388170,'SCANIA','G 420 6X2', 'nada')"""

cursor.execute(comando)
commit()