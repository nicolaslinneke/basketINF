<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário 2024</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .month {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            position: relative;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            position: relative; /* Necessário para a tooltip */
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .highlight {
            background-color: #ffeb3b; /* Cor de destaque */
        }
        .tooltip {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            z-index: 10;
        }
        .add-event, .view-events {
            text-align: center;
            margin: 20px 0;
        }
        .add-event a, .view-events a {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1>Calendário 2024</h1>
<div class="calendar" id="calendar"></div>

<div class="add-event">
    <a href="eventos.php">Adicionar Evento</a>
</div><br>

<div class="view-events">
    <a href="index.php">VOLTAR</a>
</div>

<script>
    const months = [
        { name: "Janeiro", days: 31 },
        { name: "Fevereiro", days: 29 },
        { name: "Março", days: 31 },
        { name: "Abril", days: 30 },
        { name: "Maio", days: 31 },
        { name: "Junho", days: 30 },
        { name: "Julho", days: 31 },
        { name: "Agosto", days: 31 },
        { name: "Setembro", days: 30 },
        { name: "Outubro", days: 31 },
        { name: "Novembro", days: 30 },
        { name: "Dezembro", days: 31 },
    ];

    const calendarContainer = document.getElementById('calendar');

    months.forEach(month => {
        const monthDiv = document.createElement('div');
        monthDiv.className = 'month';
        
        const monthHeader = document.createElement('h2');
        monthHeader.textContent = month.name;
        monthDiv.appendChild(monthHeader);

        const table = document.createElement('table');
        const headerRow = document.createElement('tr');
        const daysOfWeek = ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'];

        daysOfWeek.forEach(day => {
            const th = document.createElement('th');
            th.textContent = day;
            headerRow.appendChild(th);
        });
        table.appendChild(headerRow);

        const firstDay = new Date(2024, months.indexOf(month), 1).getDay();
        const totalDays = month.days;
        let dayCounter = 1;

        for (let i = 0; i < 6; i++) {
            const row = document.createElement('tr');

            for (let j = 0; j < 7; j++) {
                const td = document.createElement('td');

                if (i === 0 && j < firstDay) {
                    td.textContent = '';
                } else if (dayCounter > totalDays) {
                    td.textContent = '';
                } else {
                    td.textContent = dayCounter;
                    td.setAttribute("data-day", dayCounter);
                    td.setAttribute("data-month", month.name);
                    td.classList.add('day'); // Adiciona classe para selecionar dias
                    dayCounter++;
                }

                row.appendChild(td);
            }
            table.appendChild(row);
        }

        monthDiv.appendChild(table);
        calendarContainer.appendChild(monthDiv);
    });

    // Função para destacar o dia e adicionar evento
    function highlightDay(day, month, eventDetails) {
        const dayElements = document.querySelectorAll('.day');
        dayElements.forEach(td => {
            if (td.getAttribute('data-day') == day && td.getAttribute('data-month') == month) {
                td.classList.add('highlight');
                // Cria tooltip com detalhes do evento
                const tooltip = document.createElement('div');
                tooltip.className = 'tooltip';
                tooltip.textContent = eventDetails.name + '\n' + eventDetails.date + '\n' + eventDetails.description;
                td.appendChild(tooltip);

                // Exibe a tooltip ao passar o mouse
                td.onmouseover = () => tooltip.style.display = 'block';
                td.onmouseout = () => tooltip.style.display = 'none';
            }
        });
    }

    // Listen for events from localStorage
    window.addEventListener('storage', (event) => {
        if (event.key === 'newEvent') {
            const eventData = JSON.parse(event.newValue);
            highlightDay(eventData.day, eventData.month, eventData.details);
        }
    });

</script>

</body>
</html>
