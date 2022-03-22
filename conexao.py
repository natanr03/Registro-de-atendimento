
import pyodbc

dados_conexao = (
  "Driver={SQL Server};"
    "Server=DESKTOP-AAE0RNM;"
    "Database=Carros;"
)

conexao = pyodbc.connect(dados_conexao)
print("Conexão Bem Sucedida")

cursor = conexao.cursor()


nome = "Sampiros"
telefone = 11977572011
marca = "FORD"
modelo = "CARGO1519B"
observação = "NÂO"

comando = f"""INSERT INTO Vendas(nome, telefone, marca, modelo, observação)
VALUES
    ({nome}, '{telefone}', '{marca}', '{modelo}', {observação})"""

cursor.execute(comando)
cursor.commit()