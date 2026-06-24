<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Eventos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button a {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Adicionar Evento</h1>
    <form id="eventForm">
        <div class="form-group">
            <label for="eventName">Nome do Evento:</label>
            <input type="text" id="eventName" name="eventName" required>
        </div>
        <div class="form-group">
            <label for="eventDate">Data do Evento:</label>
            <input type="date" id="eventDate" name="eventDate" required>
        </div>
        <div class="form-group">
            <label for="eventDescription">Descrição do Evento:</label>
            <textarea id="eventDescription" name="eventDescription" rows="4" required></textarea>
        </div>
        
        <div class="button">
            <button type="submit">Adicionar Evento</button>
            <a href="calendario.php">Voltar para o Calendário</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('eventForm').onsubmit = function(event) {
        event.preventDefault(); // Impede o envio do formulário para teste

        const eventName = document.getElementById('eventName').value;
        const eventDate = document.getElementById('eventDate').value;
        const eventDescription = document.getElementById('eventDescription').value;

        // Extrai o dia e o mês da data
        const eventDateObj = new Date(eventDate);
        const day = eventDateObj.getDate();
        const monthName = eventDateObj.toLocaleString('pt-BR', { month: 'long' });

        // Adiciona os detalhes do evento em um objeto
        const eventDetails = {
            name: eventName,
            date: eventDate,
            description: eventDescription
        };

        // Salva o evento no localStorage
        localStorage.setItem('newEvent', JSON.stringify({ day, month: monthName, details: eventDetails }));

        // Mostra mensagem de sucesso
        alert('Evento adicionado com sucesso!');

        // Redireciona ou atualiza a lista de eventos conforme necessário
        window.location.href = 'calendario.php'; // Redireciona para o calendário
    };
</script>

</body>
</html>
